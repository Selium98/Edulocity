<?php
/*
Plugin Name: LearnPress - WooCommerce Payment Methods Integration
Plugin URI: http://thimpress.com/learnpress
Description: Using the payment system provided by WooCommerce.
Author: ThimPress
Version: 3.2.0
Author URI: http://thimpress.com
Tags: learnpress, woocommerce
Text Domain: learnpress-woo-payment
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
define( 'LP_ADDON_WOO_PAYMENT_FILE', __FILE__ );
define( 'LP_ADDON_WOO_PAYMENT_PATH', dirname( __FILE__ ) );
define( 'LP_ADDON_WOO_PAYMENT_VER', '3.1.9' );
define( 'LP_ADDON_WOO_PAYMENT_REQUIRE_VER', '3.0.1' );
define( 'LP_ADDON_WOOCOMMERCE_PAYMENT_VER', '3.1.8' );

class LP_Addon_Woo_Payment_Preload {

	/**
	 * LP_Addon_Wishlist_Preload constructor.
	 */
	public function __construct() {
		add_action( 'learn-press/ready', array( $this, 'load' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
	}

	/**
	 * Load addon
	 */
	public function load() {
		LP_Addon::load( 'LP_Addon_Woo_Payment', 'incs/load.php', __FILE__ );
		remove_action( 'admin_notices', array( $this, 'admin_notices' ) );
	}

	/**
	 * Admin notice
	 */
	public function admin_notices() {
		?>
        <div class="error">
            <p><?php echo wp_kses(
					sprintf(
						__( '<strong>%s</strong> addon version %s requires %s version %s or higher is <strong>installed</strong> and <strong>activated</strong>.', 'learnpress-woo-payment' ),
						__( 'LearnPress Woo Payment', 'learnpress-woo-payment' ),
						LP_ADDON_WOO_PAYMENT_VER,
						sprintf( '<a href="%s" target="_blank"><strong>%s</strong></a>', admin_url( 'plugin-install.php?tab=search&type=term&s=learnpress' ), __( 'LearnPress', 'learnpress-woo-payment' ) ),
						LP_ADDON_WOO_PAYMENT_REQUIRE_VER
					),
					array(
						'a'      => array(
							'href'  => array(),
							'blank' => array()
						),
						'strong' => array()
					)
				); ?>
            </p>
        </div>
		<?php
	}
}

new LP_Addon_Woo_Payment_Preload();

