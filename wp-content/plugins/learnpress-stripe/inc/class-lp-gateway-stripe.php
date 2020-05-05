<?php
/**
 * Stripe payment gateway class.
 *
 * @author   ThimPress
 * @package  LearnPress/Stripe/Classes
 * @version  3.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'LP_Gateway_Stripe' ) ) {
	/**
	 * Class LP_Gateway_Stripe
	 */
	class LP_Gateway_Stripe extends LP_Gateway_Abstract {

		/**
		 * @var array
		 */
		private $form_data = array();

		/**
		 * @var string
		 */
		private $api_endpoint = 'https://api.stripe.com/v1/';

		/**
		 * @var object
		 */
		private $charge = null;

		/**
		 * @var array|null
		 */
		protected $settings = null;

		/**
		 * @var null
		 */
		protected $order = null;

		/**
		 * @var null
		 */
		protected $posted = null;

		/**
		 * Request Token
		 *
		 * @var string
		 */
		protected $token = null;

		/**
		 * @var null
		 */
		protected $publish_key = null;

		/**
		 * @var null
		 */
		protected $secret_key = null;

		/**
		 * LP_Gateway_Stripe constructor.
		 */
		public function __construct() {
			$this->id = 'stripe';

			$this->method_title       = 'Stripe';
			$this->method_description = __( 'Make a payment with Stripe.', 'learnpress-stripe' );
			$this->icon               = '';

			// Get settings
			$this->title       = LP()->settings->get( "{$this->id}.title", $this->method_title );
			$this->description = LP()->settings->get( "{$this->id}.description", $this->method_description );

			$settings = LP()->settings;

			// Add default values for fresh installs
			if ( $settings->get( "{$this->id}.enable" ) ) {
				$this->settings                     = array();
				$this->settings['test_mode']        = $settings->get( "{$this->id}.test_mode" );
				$this->settings['test_publish_key'] = $settings->get( "{$this->id}.test_publish_key" );
				$this->settings['test_secret_key']  = $settings->get( "{$this->id}.test_secret_key" );
				$this->settings['live_publish_key'] = $settings->get( "{$this->id}.live_publish_key" );
				$this->settings['live_secret_key']  = $settings->get( "{$this->id}.live_secret_key" );

				// API Info
				$this->publish_key = $this->settings['test_mode'] == 'yes' ? $this->settings['test_publish_key'] : $this->settings['live_publish_key'];
				$this->secret_key  = $this->settings['test_mode'] == 'yes' ? $this->settings['test_secret_key'] : $this->settings['live_secret_key'];
			}

			if ( did_action( 'learn_press/stripe-add-on/loaded' ) ) {
				return;
			}

			// check payment gateway enable
			add_filter( 'learn-press/payment-gateway/' . $this->id . '/available', array(
				$this,
				'stripe_available'
			), 10, 2 );

			do_action( 'learn_press/stripe-add-on/loaded' );

			parent::__construct();
		}

		/**
		 * Admin payment settings.
		 *
		 * @return array
		 */
		public function get_settings() {

			return apply_filters( 'learn-press/gateway-payment/stripe/settings',
				array(
					array(
						'title'   => __( 'Enable', 'learnpress-stripe' ),
						'id'      => '[enable]',
						'default' => 'no',
						'type'    => 'yes-no'
					),
					array(
						'type'       => 'text',
						'title'      => __( 'Title', 'learnpress-stripe' ),
						'default'    => __( 'Stripe', 'learnpress-stripe' ),
						'id'         => '[title]',
						'class'      => 'regular-text',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								)
							)
						)
					),
					array(
						'type'       => 'textarea',
						'title'      => __( 'Description', 'learnpress-stripe' ),
						'default'    => __( 'Pay with Credit Card', 'learnpress-stripe' ),
						'id'         => '[description]',
						'editor'     => array(
							'textarea_rows' => 5
						),
						'css'        => 'height: 100px;',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								)
							)
						)
					),
					array(
						'title'      => __( 'Live secret key', 'learnpress-stripe' ),
						'id'         => '[live_secret_key]',
						'type'       => 'text',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								),
								array(
									'field'   => '[test_mode]',
									'compare' => '!=',
									'value'   => 'yes'
								)
							)
						)
					),
					array(
						'type'       => 'text',
						'title'      => __( 'Live publish key', 'learnpress-stripe' ),
						'default'    => '',
						'id'         => '[live_publish_key]',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								),
								array(
									'field'   => '[test_mode]',
									'compare' => '!=',
									'value'   => 'yes'
								)
							)
						)
					),
					array(
						'title'      => __( 'Enable test mode', 'learnpress-stripe' ),
						'id'         => '[test_mode]',
						'default'    => 'no',
						'type'       => 'yes-no',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								)
							)
						)
					),
					array(
						'type'       => 'text',
						'title'      => __( 'Test secret key', 'learnpress-stripe' ),
						'default'    => '',
						'id'         => '[test_secret_key]',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								),
								array(
									'field'   => '[test_mode]',
									'compare' => '=',
									'value'   => 'yes'
								)
							)
						)
					),
					array(
						'type'       => 'text',
						'title'      => __( 'Test publish key', 'learnpress-stripe' ),
						'default'    => '',
						'id'         => '[test_publish_key]',
						'visibility' => array(
							'state'       => 'show',
							'conditional' => array(
								array(
									'field'   => '[enable]',
									'compare' => '=',
									'value'   => 'yes'
								),
								array(
									'field'   => '[test_mode]',
									'compare' => '=',
									'value'   => 'yes'
								)
							)
						)
					)
				)
			);
		}

		/**
		 * Payment form.
		 */
		public function get_payment_form() {
			ob_start();
			$template = learn_press_locate_template( 'form.php', learn_press_template_path() . '/addons/stripe-payment/', LP_ADDON_STRIPE_PAYMENT_TEMPLATE );
			include $template;

			return ob_get_clean();
		}

		/**
		 * @return mixed
		 */
		public function get_icon() {
			if ( empty( $this->icon ) ) {
				$this->icon = LP_ADDON_STRIPE_PAYMENT_URL . 'assets/images/stripe.jpg';
			}

			return parent::get_icon();
		}

		/**
		 * Check gateway available.
		 *
		 * @return bool
		 */
		public function stripe_available() {

			if ( LP()->settings->get( "{$this->id}.enable" ) != 'yes' ) {
				return false;
			}

			if ( LP()->settings->get( "{$this->id}.enable" ) == 'yes' ) {

				if ( LP()->settings->get( "{$this->id}.test_mode" ) == 'yes' ) {
					if ( ! LP()->settings->get( "{$this->id}.test_secret_key" ) || ! LP()->settings->get( "{$this->id}.test_publish_key" ) ) {
						return false;
					}
				} else {
					if ( ! LP()->settings->get( "{$this->id}.live_secret_key" ) || ! LP()->settings->get( "{$this->id}.live_publish_key" ) ) {
						return false;
					}
				}
			}

			return true;
		}

		/**
		 * Stripe payment process.
		 *
		 * @param $order
		 *
		 * @return array
		 * @throws string
		 */
		public function process_payment( $order ) {
			$this->order = learn_press_get_order( $order );
			$stripe      = $this->send_to_stripe();

			if ( ! empty( $stripe->error->message ) ) {
				learn_press_add_notice( $stripe->error->message, 'error' );
				$result = array(
					'result' => 'fail'
				);
			} else {
				$this->order_complete();

				update_post_meta( $this->order->id, '_lp_transaction_id', $stripe->id );
				update_post_meta( $this->order->id, '_lp_key', $this->secret_key );

				$result = array(
					'result'   => 'success',
					'redirect' => $this->get_return_url( $this->order )
				);
			}

			return $result;
		}

		/**
		 * Send to Stripe.
		 *
		 * @return bool|object
		 * @throws string
		 */
		public function send_to_stripe() {
			if ( $this->get_form_data() ) {
				$stripe_charge_data['amount']      = $this->form_data['amount']; // amount in cents
				$stripe_charge_data['currency']    = $this->form_data['currency'];
				$stripe_charge_data['capture']     = 'true';
				$stripe_charge_data['expand[]']    = 'balance_transaction';
				$stripe_charge_data['card']        = $this->form_data['token'];
				$stripe_charge_data['description'] = $this->form_data['description'];

				$charge       = $this->post_data( $stripe_charge_data );
				$this->charge = $charge;

				return $charge;
			}

			return false;
		}

		/**
		 * Get form data.
		 *
		 * @return array
		 */
		public function get_form_data() {
			if ( $this->order ) {
				$user            = learn_press_get_current_user();
				$this->form_data = array(
					'amount'      => (float) $this->order->order_total * 100,
					'currency'    => strtolower( learn_press_get_currency() ),
					'token'       => $this->token,
					'description' => sprintf( "Charge for %s", $user->get_data( 'email' ) ),
					'customer'    => array(
						'name'          => $user->get_data( 'display_name' ),
						'billing_email' => $user->get_data( 'email' ),
					),
					'errors'      => isset( $this->posted['form_errors'] ) ? $this->posted['form_errors'] : ''
				);
			}

			return $this->form_data;
		}

		/**
		 * Post data and get json.
		 *
		 * @param $post_data
		 * @param string $post_location
		 *
		 * @return object
		 * @throws string
		 */
		public function post_data( $post_data, $post_location = 'charges' ) {

			$response = wp_remote_post( $this->api_endpoint . $post_location, array(
				'method'     => 'POST',
				'headers'    => array(
					'Authorization' => 'Basic ' . base64_encode( $this->secret_key . ':' ),
				),
				'body'       => $post_data,
				'timeout'    => 70,
				'sslverify'  => false,
				'user-agent' => 'LearnPress Stripe',
			) );

			return $this->parse_response( $response );
		}

		/**
		 * Parse response.
		 *
		 * @param $response
		 *
		 * @return array|mixed|object
		 * @throws Exception
		 */
		public function parse_response( $response ) {
			if ( is_wp_error( $response ) ) {

				throw new Exception( 'error' );
			}

			if ( empty( $response['body'] ) ) {
				throw new Exception( 'error' );
			}

			$parsed_response = json_decode( $response['body'] );

			return $parsed_response;
		}

		/**
		 * Validate form fields.
		 *
		 * @return bool
		 * @throws Exception
		 * @throws string
		 */
		public function validate_fields() {
			$posted        = learn_press_get_request( 'learn-press-stripe' );
			$card_number   = ! empty( $posted['card_number'] ) ? $posted['card_number'] : null;
			$expiry_month  = ! empty( $posted['expiry_month'] ) ? $posted['expiry_month'] : 1;
			$expiry_year   = ! empty( $posted['expiry_year'] ) ? $posted['expiry_year'] : ( (int) date( 'Y', time() ) ) + 1;
			$card_expiry   = $expiry_month . '/' . $expiry_year;
			$card_code     = ! empty( $posted['card_code'] ) ? $posted['card_code'] : null;
			$error_message = array();
			if ( empty( $card_number ) ) {
				$error_message[] = __( 'Card number is empty.', 'learnpress-stripe' );
			}
			if ( empty( $card_expiry ) ) {
				$error_message[] = __( 'Card expiry is empty.', 'learnpress-stripe' );
			}
			if ( empty( $card_code ) ) {
				$error_message[] = __( 'Card code is empty.', 'learnpress-stripe' );
			}

			if ( empty( $error_message ) ) {

				$token = $this->post_data( array(
					'card' => array(
						'number'    => $card_number,
						'exp_month' => $expiry_month,
						'exp_year'  => $expiry_year,
						'cvc'       => $card_code,
					)
				), 'tokens' );

				if ( isset( $token->id ) ) {
					$this->token = $token->id;
				} else if ( ! empty ( $token->error ) ) {
					$error_message[] = sprintf( '%s', $token->error->message );
				}
			}
			if ( $error = sizeof( $error_message ) ) {
				throw new Exception( sprintf( '<div>%s</div>', join( '</div><div>', $error_message ) ), 8000 );
			}
			$this->posted = $posted;

			return $error ? false : true;
		}

		/**
		 * Complete order.
		 */
		public function order_complete() {

			if ( $this->order->status === 'completed' ) {
				return;
			}

			$this->order->payment_complete();
			LP()->cart->empty_cart();

			$this->order->add_note(
				sprintf(
					"%s payment completed with Transaction Id of '%s'", $this->title, $this->charge->id
				)
			);

			LP()->session->order_awaiting_payment = null;
		}

		/**
		 * Create order
		 */
		public function create_order() {
			_deprecated_function( __FUNCTION__, '1.0' );
			if ( $transaction_object = learn_press_generate_transaction_object() ) {
				$user = learn_press_get_current_user();
				learn_press_delete_transient_transaction( 'lpstripe', $this->charge->id );
				$order_id = learn_press_add_transaction(
					array(
						'order_id'           => 0,
						'method'             => 'stripe',
						'method_id'          => $this->charge->id,
						'status'             => $this->charge->paid ? 'Completed' : 'Pending',
						'user_id'            => $user->ID,
						'transaction_object' => $transaction_object
					)
				);

				return $order_id;
			}

			return false;
		}
	}

}