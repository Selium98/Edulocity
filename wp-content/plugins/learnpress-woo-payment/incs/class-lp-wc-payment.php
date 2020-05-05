<?php

defined( 'ABSPATH' ) || exit();

class LP_WC_Payment {

	public static function init() {
	    if(is_admin()){
        		add_filter( 'learn_press_payment_method', array( __CLASS__, 'add_payment' ) );
        		add_action( 'wp_footer', array( __CLASS__, 'scripts' ) );
	    }
	}

	/**
	 * Add Woo payment
	 */
	public static function add_payment( $methods ) {
    		require_once LP_ADDON_WOO_PAYMENT_PATH . '/incs/class-lp-gateway-woo.php';
    		$methods['woocommerce'] = 'LP_Gateway_Woo';
		return $methods;
	}

	public static function scripts() {
		if ( !LP_Addon_Woo_Payment::instance()->is_enabled() ) {
			return;
		}
		?>
		<style type="text/css">
			.learnpress-woo-payment {
				/*display: none;*/
				list-style: none;
				margin-left: 30px;
			}
		</style>
		<?php ob_start(); ?>
		<script>
			;
			(function ($) {
				var $form = $('#learn-press-checkout');
				$form.on('learn_press_checkout_place_order', function () {
					var chosen = $('input[type="radio"]:checked', $form);
					$form.find('input[name="woocommerce_chosen_method"]').remove();
					if (chosen.val() == 'woocommerce') {
						$form.append('<input type="hidden" name="woocommerce_chosen_method" value="' + chosen.data('method') + '"/>');
					}
				});
			})(jQuery);
		</script>
		<?php
		$js = ob_get_clean();
		if ( is_callable( array( 'LP_Assets', 'add_script_tag' ) ) ) {
			LP_Assets::add_script_tag( $js, 'learn-press-checkout' );
		} else {
			echo $js;
		}
		?>
		<?php

	}

}

LP_WC_Payment::init();
