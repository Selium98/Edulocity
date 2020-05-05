<?php
/**
 * WooCommerce Payments Addon functions
 *
 * @author  ThimPress
 * @version 2.2.1
 * @package LearnPress/Functions
 */

defined( 'ABSPATH' ) || exit();
add_action( 'template_include', 'learn_press_wc_defines' );
function learn_press_wc_defines( $template ) {
	define( 'LP_WC_TEMPLATE', learn_press_template_path() . '/addons/woo-payment/' );

	return $template;
}

/**
 * Get template file for addon
 *
 * @param      $name
 * @param null $args
 */
function learn_press_wc_get_template( $name, $args = null ) {
	learn_press_get_template( $name, $args, learn_press_template_path() . '/addons/woo-payment/', LP_ADDON_WOO_PAYMENT_PATH . '/templates/' );
}

function learn_press_wc_locate_template( $name ) {
	// Look in folder learnpress-woo-payment in the theme first
	$file = learn_press_locate_template( $name, 'learnpress', LP_WC_TEMPLATE );

	// If template does not exists then look in learnpress/addons/woo-payment in the theme
	if ( ! file_exists( $file ) ) {
		$file = learn_press_locate_template( $name, LP_WC_TEMPLATE, LP_ADDON_WOO_PAYMENT_PATH . '/templates/' );
	}

	return $file;
}

if ( LP()->settings->get( 'woo-payment.enable' ) === 'yes' ) {

	add_filter( 'woocommerce_json_search_found_products', 'learn_press_woocommerce_json_search_found_products_callback' );
	function learn_press_woocommerce_json_search_found_products_callback( $products ) {
		global $wpdb;
		$term = wc_clean( empty( $term ) ? stripslashes( $_GET['term'] ) : $term );
		$sql  = $wpdb->prepare( "SELECT 
				ID, post_title
			FROM
				{$wpdb->posts}
			WHERE
				post_title LIKE %s
					AND post_type = 'lp_course'
					AND post_status = 'publish'", '%' . $wpdb->esc_like( $term ) . '%' );
		$rows = $wpdb->get_results( $sql );
		foreach ( $rows as $row ) {
			$products[ $row->ID ] = $row->post_title . ' (' . __( 'Course', 'learnpress-woo-payment' ) . ' #' . $row->ID . ')';
		}

		return $products;
	}


	add_filter( 'woocommerce_get_product_from_item', 'learnpress_woo_payment_woocommerce_get_product_from_item_callback', 10, 3 );
	function learnpress_woo_payment_woocommerce_get_product_from_item_callback( $product, $item, $order ) {
		if ( get_class( $item ) !== 'WC_Order_Item_LP_Course' ) {
			$course_id = wc_get_order_item_meta( $item->get_id(), '_course_id', true );
			if ( $course_id && LP_COURSE_CPT == get_post_type( $course_id ) ) {
				$product = new WC_Product_LP_Course( $course_id );
			}
		}

		return $product;
	}

	add_filter( 'woocommerce_product_is_taxable', 'learnpress_woo_payment_woocommerce_product_is_taxable_callback', 10, 2 );
	function learnpress_woo_payment_woocommerce_product_is_taxable_callback( $taxable, $product ) {
		if ( 'WC_Product_LP_Course' == get_class( $product ) ) {
			$course = learn_press_get_course( $product->get_id() );
			if ( $course && LP_COURSE_CPT == get_post_type( $product->get_id() ) ) {
				$enable_tax = get_post_meta( $course->get_id(), '_lp_woo_payment_enable_tax', true );
				if ( $enable_tax == 'yes' ) {
					$taxable = true;
				} elseif ( $enable_tax == 'no' ) {
					$taxable = false;
				}
			}
		}

		return $taxable;
	}

	add_filter( 'woocommerce_get_order_item_classname', 'learnpress_woo_payment_woocommerce_get_order_item_classname', 10, 3 );

	function learnpress_woo_payment_woocommerce_get_order_item_classname( $classname, $item_type, $id ) {
		if ( in_array( $item_type, array( 'line_item', 'product' ) ) ) {
			$course_id = wc_get_order_item_meta( $id, '_course_id' );
			if ( $course_id && LP_COURSE_CPT == get_post_type( $course_id ) ) {
				$classname = 'WC_Order_Item_LP_Course';
			}
		}

		return $classname;
	}


// Disable Guest Checkout for Course
	add_filter( 'pre_option_woocommerce_enable_guest_checkout', 'learn_press_conditional_guest_checkout_based_on_course' );
	function learn_press_conditional_guest_checkout_based_on_course( $value ) {
		if ( WC()->cart ) {
			$cart = WC()->cart->get_cart();
			foreach ( $cart as $item ) {
				if ( get_post_type( $item ['product_id'] ) === LP_COURSE_CPT || get_class( $item ['data'] ) === 'WC_Product_LP_Course' ) {
					$value = 'no';
					break;
				}
			}
		}

		return $value;
	}

	/**
	 * special function for some site
	 */

// add_filter( 'woocommerce_order_get_items', 'learn_press_filter_woocommerce_order_get_items_callback', 10, 3 );
	function learn_press_filter_woocommerce_order_get_items_callback( $items, $order, $types ) {
		if ( ! in_array( 'line_item', $types ) ) {
			return $items;
		}
		if ( $items && ! empty( $items ) ) {
			return $items;
		}
		$lp_order_id = get_post_meta( $order->get_id(), '_learn_press_order_id', true );
		if ( ! $lp_order_id ) {
			return array();
		}

		$lp_order = learn_press_get_order( $lp_order_id );
		if ( ! $lp_order ) {
			return array();
		}
		$lp_items = $lp_order->get_items();
		$items    = array();
		foreach ( $lp_items as $lp_item ) {
			$item = new WC_Order_Item_LP_Course();
			$item->set_product_id( $lp_item['course_id'] );
			$item->set_name( $lp_item['name'] );
			$item->set_quantity( $lp_item['quantity'] );
			$item->set_subtotal( $lp_item['subtotal'] );
			$item->set_total( $lp_item['total'] );
			$items[] = $item;
		}

		return $items;
	}

	function learn_press_woo_payment_get_lp_order_id_from_woo( $wc_order_id ) {
		global $wpdb;
		$lp_order_id = get_post_meta( $wc_order_id, '_learn_press_order_id', true );
		if ( $lp_order_id && get_post_type( $lp_order_id ) == LP_ORDER_CPT ) {
			return $lp_order_id;
		}
		$sql         = $wpdb->prepare( "SELECT `meta_value` FROM `{$wpdb->postmeta}` where post_id = %s and `meta_key`='_learn_press_order_id'", $wc_order_id );
		$lp_order_id = $wpdb->get_var( $sql );

		return $lp_order_id;
	}

	function learn_press_woo_payment_get_post_meta( $post_id, $meta_key, $single = false ) {
		global $wpdb;
		$meta_value = get_post_meta( $post_id, $meta_key, $single );
		if ( $meta_value ) {
			return $meta_value;
		}
		$sql        = $wpdb->prepare( "SELECT `meta_value` FROM `{$wpdb->postmeta}` where post_id = %s and `meta_key`=%s", $post_id, $meta_key );
		$meta_value = $wpdb->get_var( $sql );

		return $meta_value;
	}

}