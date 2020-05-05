<?php

define( 'LP_ADDON_CERTIFICATES_CERT_CPT', 'lp_cert' );
define( 'LP_ADDON_CERTIFICATES_USER_CERT_CPT', 'lp_user_cert' );
define( 'LP_ADDON_CERTIFICATES_PATH', dirname( LP_ADDON_CERTIFICATES_FILE ) );
define( 'LP_ADDON_CERTIFICATES_TEMPLATE', learn_press_template_path() . '/addons/certificates/' );

/**
 * Class LP_Addon_Certificates
 */
class LP_Addon_Certificates extends LP_Addon {
	/**
	 * @var string
	 */
	public $version = LP_ADDON_CERTIFICATES_VERSION;

	/**
	 * @var string
	 *
	 * LP Version
	 */
	public $require_version = LP_ADDON_CERTIFICATES_VERSION_REQUIRES;

	/**
	 * LP_Addon_Gradebook constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->_maybe_upgrade_data();

		LP_Request::register_ajax( 'cert-update-layer', array( $this, 'update_layer' ) );
		LP_Request::register_ajax( 'cert-update-layers', array( $this, 'update_layers' ) );
		LP_Request::register_ajax( 'cert-load-layer', array( $this, 'load_layer' ) );
		LP_Request::register_ajax( 'cert-remove-layer', array( $this, 'remove_layer' ) );
		LP_Request::register_ajax( 'cert-update-template', array( $this, 'update_template' ) );

		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_script_data' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_scripts' ) );
		add_action( 'template_include', array( $this, 'show_cert' ) );
		add_action( 'admin_head', array( $this, 'header_google_fonts' ) );
		add_action( 'wp_head', array( $this, 'header_google_fonts' ) );
		add_action( 'wp_footer', array( $this, 'show_certificate' ) );
		add_action( 'learn-press/user-course-finished', array( $this, 'update_user_certificate' ), 10, 3 );
		add_action( 'learn-press/course-buttons', array( $this, 'button_certificate' ), 10 );

		// Filters
		add_filter( 'learn-press/profile-tabs', array( $this, 'profile_tabs' ) );
		add_filter( 'learn-press/admin/settings-tabs-array', array( $this, 'admin_settings' ) );

	}

	protected function _maybe_upgrade_data() {

		if ( ! ( version_compare( LP_ADDON_CERTIFICATES_VER, '3.0.0', '=' ) && version_compare( get_option( 'certificates_db_version' ), '3.0.0', '<' ) ) ) {
			return;
		}

		global $wpdb;

		$query = $wpdb->prepare( "
			    SELECT meta_id AS id, meta_value AS layers
			    FROM {$wpdb->postmeta}
			    WHERE meta_key = %s
			", '_lp_cert_layers' );

		if ( ! $certs = $wpdb->get_results( $query ) ) {
			return;
		}

		$queue_items = array();

		foreach ( $certs as $cert ) {
			$layers = maybe_unserialize( $cert->layers );

			if ( ! $layers ) {
				continue;
			}

			foreach ( $layers as $k => $layer ) {
				settype( $layer, 'array' );
				if ( ! array_key_exists( 'variable', $layer ) ) {
					$layer['variable'] = $layer['text'];
				}
				$layers[ $k ] = $layer;
			}

			$wpdb->update( $wpdb->postmeta, array( 'meta_value' => serialize( $layers ) ), array( 'meta_id' => $cert->id ), array( '%s' ), array( '%d' ) );
		}
	}

	public function show_certificate() {
		$user_id = get_current_user_id();

		if ( learn_press_is_course() ) {
			$course_id = get_the_ID();

			if ( $cert_id = LP_Certificate::get_course_certificate( $course_id ) ) {

				if ( get_transient( 'lp-show-certificate-' . $user_id . '-' . $course_id ) ) {
					delete_transient( 'lp-show-certificate-' . $user_id . '-' . $course_id );
					?>
                    <script>var auto_show_certificate = true;</script><?php
				}

				if ( $cert_key = LP_Certificate::get_cert_key( $user_id, $course_id, 0, false ) ) {

					$certificate = LP_Certificate::get_cert_by_key( $cert_key );
					if ( is_a( $cert_key, 'LP_User_Certificate' ) ) {
						learn_press_certificate_get_template( 'popup.php', array( 'certificate' => $certificate ) );
					}
				}
			}
		}
	}

	/**
	 * Display button in single course to view certificate
	 */
	public function button_certificate() {
		$user   = LP_Global::user();
		$course = LP_Global::course();
		if ( $user && ( $certificate = LP_Certificate::user_achieved_certificate( $user->get_id(), $course->get_id() ) ) ) {
			$_lp_certificate_price = get_post_meta( $certificate->get_id(), '_lp_certificate_price', true );
			if ( ! $_lp_certificate_price || ( $_lp_certificate_price && $can_get_cert = learn_press_certificate_can_get( $course->get_id(), $user->get_id() ) ) ) {
				learn_press_certificate_get_template( 'view-button.php', array( 'certificate' => $certificate ) );
			}
		}
	}

	/**
	 * Update certificate data when user finished course
	 *
	 * @param int $course_id
	 * @param int $user_id
	 * @param int $course_item
	 */
	public function update_user_certificate( $course_id, $user_id, $course_item ) {
		if ( $cert_id = LP_Certificate::get_course_certificate( $course_id ) ) {
			$user        = learn_press_get_user( $user_id );
			$course_data = $user->get_course_data( $course_id );

			$data = array(
				'course_data' => $course_data->get_results( false ),
				'cert_id'     => $cert_id,
				'user_id'     => $user_id,
				'course_id'   => $course_id
			);

			$key = LP_Certificate::get_cert_key( $user_id, $course_id, 0, false );
			update_option( "user_cert_{$key}", $data );
			set_transient( 'lp-show-certificate-' . $user_id . '-' . $course_id, $key );
			$this->generate_image_certificate($key);
		}
	}
	
	public function generate_image_certificate( $cert ) {
		learn_press_certificate_generate_image_certificate($cert);
	}

	public function admin_settings( $tabs ) {
		$tabs['certificates'] = include_once LP_ADDON_CERTIFICATES_PATH . '/inc/class-lp-certificate-settings.php';

		return $tabs;
	}

	public function show_cert( $template ) {
		global $wp;

		if ( ! empty( $wp->query_vars['view-cert'] ) ) {
			if ( $cert = LP_Certificate::get_cert_by_key( $wp->query_vars['view-cert'] ) ) {
				$template = learn_press_certificate_locate_template( 'single-certificate.php' );
				include $template;
				die();
			}

			learn_press_404_page();
		}

		return $template;
	}

	/**
	 * Register tab with Profile
	 */
	public function profile_tabs( $tabs ) {
		$tabs['certificates'] = array(
			'title'    => __( 'Certificates', 'learnpress-certificates' ),
			'slug'     => 'certificates',
			'callback' => array( $this, 'profile_certificates' ),
			'priority' => 12
		);

		return $tabs;
	}

	public function profile_certificates() {
		$profile = learn_press_get_profile();

		global $wp;
		if ( ! empty( $wp->query_vars['act'] ) && ! empty( $wp->query_vars['cert-id'] ) ) {
			$key = $wp->query_vars['cert-id'];
			if ( $certificate = LP_Certificate::get_cert_by_key( $key ) ) {
				if ( $certificate->get_id() ) {
					learn_press_certificate_get_template( 'details.php', array( 'certificate' => $certificate ) );
				}
			}
		} else {
			$certificates = LP_Certificate::get_user_certificates( $profile->get_user()->get_id() );
			learn_press_certificate_get_template( 'list-certificates.php', array( 'certificates' => $certificates ) );
		}
	}

	public function remove_layer() {
		$id          = LP_Request::get_int( 'id' );
		$certificate = new LP_Certificate( $id );
		$certificate->remove_layer( LP_Request::get_string( 'layer' ) );
	}

	/**
	 * Load layer options
	 */
	public function load_layer() {
		$id          = LP_Request::get_int( 'id' );
		$certificate = new LP_Certificate( $id );

		if ( ! $certificate->get_id() ) {
			return;
		}

		$layer_id = LP_Request::get_string( 'layer' );

		$certificate->layer_options( $layer_id );
		die();
	}

	/**
	 * Ajax update layer options
	 */
	public function update_layer() {
		$layer = LP_Request::get_array( 'layer' );
		if ( ! $layer ) {
			return;
		}

		if ( empty( $layer['name'] ) ) {
			$layer['name'] = uniqid();
		}

		$id = LP_Request::get_int( 'id' );

		if ( get_post_type( $id ) !== LP_ADDON_CERTIFICATES_CERT_CPT ) {
			return;
		}

		if ( ! $layers = get_post_meta( $id, '_lp_cert_layers', true ) ) {
			$layers = array( $layer['name'] => $layer );
		} else {
			if ( ! is_array( $layers ) ) {
				settype( $layers, 'array' );
			}
			$_layers = array();
			$found   = false;
			foreach ( $layers as $_layer ) {
				if ( is_object( $_layer ) ) {
					$_layer = (array) $_layer;
				}
				if ( empty( $_layer['name'] ) ) {
					$_layer['name'] = uniqid();
				}
				if ( $_layer['name'] == $layer['name'] ) {
					$_layers[ $_layer['name'] ] = $layer;
					$found                      = true;
				} else {
					$_layers[ $_layer['name'] ] = $_layer;
				}
			}
			if ( ! $found ) {
				$_layers[ $layer['name'] ] = $layer;
			}
			$layers = $_layers;
		}

		update_post_meta( $id, '_lp_cert_layers', $layers );

		if ( 'yes' === LP_Request::get_string( 'load-settings' ) ) {
			$id          = LP_Request::get_int( 'id' );
			$certificate = new LP_Certificate( $id );
			$certificate->layer_options( $layer['name'] );
		}

		die();
	}

	/**
	 * Ajax update layer options
	 */
	public function update_layers() {
		$layers = LP_Request::get_array( 'layers' );

		if ( ! $layers ) {
			return;
		}

		$id = LP_Request::get_int( 'id' );

		if ( get_post_type( $id ) !== LP_ADDON_CERTIFICATES_CERT_CPT ) {
			return;
		}

		update_post_meta( $id, '_lp_cert_layers', $layers );

		die();
	}

	/**
	 * Ajax update template
	 */
	public function update_template() {
		$id       = LP_Request::get_int( 'id' );
		$template = LP_Request::get_string( 'template' );
		if ( $id ) {
			update_post_meta( $id, '_lp_cert_template', $template );
		}
	}

	public function init() {

		//$this->_enqueue_assets();

		$profile_id = learn_press_get_page_id( 'profile' );

		add_rewrite_rule(
			'^' . get_post_field( 'post_name', $profile_id ) . '/([^/]*)/?(certificates)/?(view)/?([^/]*)/?$',
			'index.php?page_id=' . $profile_id . '&user=$matches[1]&view=$matches[2]&act=$matches[3]&cert-id=$matches[4]',
			'top'
		);

		add_rewrite_rule(
			'^certificates/([^/]*)/?$',
			'index.php?view-cert=$matches[1]',
			'top'
		);

		add_rewrite_tag( '%cert-id%', '(.*)' );
		add_rewrite_tag( '%act%', '(.*)' );
		add_rewrite_tag( '%view-cert%', '(.*)' );

	}

	/**
	 * Include files
	 */
	protected function _includes() {
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/class-lp-certificate-post-type.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/class-lp-certificate.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/class-lp-user-certificate.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/layers/class-lp-certificate-layer.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/layers/_datetime.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/layers/class-lp-course-name-layer.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/layers/class-lp-student-name-layer.php';
		include_once LP_ADDON_CERTIFICATES_PATH . '/inc/functions.php';
	}

	public function wp_scripts() {
		$this->_enqueue_assets();
	}

	/**
	 * JS Settings
	 */
	public function add_script_data() {
		$this->_enqueue_assets();
		global $post;
		if ( LP_ADDON_CERTIFICATES_CERT_CPT !== get_post_type() || LP_Request::get_string( 'post_type' ) == LP_ADDON_CERTIFICATES_CERT_CPT ) {
			return;
		}
		$certificate = new LP_Certificate( $post->ID );
		$assets      = learn_press_admin_assets();

		$assets->add_script_data( 'certificates',
			array(
				'id'          => $certificate->get_id(),
				'layers'      => $certificate->get_raw_layers(),
				'template'    => $certificate->get_template(),
				'preview'     => $certificate->get_preview(),
				'systemFonts' => LP_Certificate::system_fonts(),
				'i18n'        => array(
					'confirm_remove_layer' => __( 'Delete this layer?', 'learnpress-certificates' )
				)
			)
		);
	}

	/**
	 * Default fields.
	 *
	 * @return array
	 */
	public static function get_fields() {
		return apply_filters(
			'certificates/fields',
			array(
				array(
					'name'  => 'course-name',
					'icon'  => 'dashicons-welcome-learn-more',
					'title' => __( 'Course name', 'learnpress-certificates' )
				),
				array(
					'name'  => 'student-name',
					'icon'  => 'dashicons-admin-users',
					'title' => __( 'Student name', 'learnpress-certificates' )
				),
				array(
					'name'  => 'course-start-date',
					'icon'  => 'dashicons-calendar-alt',
					'title' => __( 'Course start date', 'learnpress-certificates' )
				),
				array(
					'name'  => 'course-end-date',
					'icon'  => 'dashicons-calendar-alt',
					'title' => __( 'Course end date', 'learnpress-certificates' )
				),
				array(
					'name'  => 'current-time',
					'icon'  => 'dashicons-clock',
					'title' => __( 'Current time', 'learnpress-certificates' )
				),
				array(
					'name'  => 'verified-link',
					'icon'  => 'dashicons-yes',
					'title' => __( 'Verified Link', 'learnpress-certificates' )
				),
				array(
					'name'  => 'custom',
					'icon'  => 'dashicons-smiley',
					'title' => __( 'Custom', 'learnpress-certificates' )
				)
			)
		);
	}

	/**
	 * Enqueue asstes
	 */
	protected function _enqueue_assets() {
		if ( is_admin() ) {
			wp_enqueue_media();

			$assets = learn_press_admin_assets();
			$assets->enqueue_script( 'fabric', $this->get_plugin_url( 'assets/js/fabric.js' ) );
			$assets->enqueue_script( 'md5', $this->get_plugin_url( 'assets/js/md5.js' ) );
			$assets->enqueue_script( 'certificates', $this->get_plugin_url( 'assets/js/admin.certificates.js' ), array(
				'jquery',
				'wp-util',
				'jquery-ui-draggable',
				'jquery-ui-droppable',
				'fabric'
			) );
			$assets->enqueue_script( 'certificates_frontend', $this->get_plugin_url( 'assets/js/certificates.js' ), array(
				'jquery'
			) );
			$assets->enqueue_style( 'certificates', $this->get_plugin_url( 'assets/css/admin.certificates.css' ) );

		} else {
			$assets = learn_press_assets();
			$assets->enqueue_style( 'certificates', $this->get_plugin_url( 'assets/css/certificates.css' ) );
			$assets->enqueue_style( 'fontawesome' );

			$assets->enqueue_script( 'fabric', $this->get_plugin_url( 'assets/js/fabric.js' ) );
			$assets->enqueue_script( 'downloadjs', $this->get_plugin_url( 'assets/js/download.js' ) );
			$assets->enqueue_script( 'certificates', $this->get_plugin_url( 'assets/js/certificates.js?r=' . microtime( true ) ), array(
				'jquery',
				'fabric',
				'downloadjs'
			) );
		}
	}

	public function header_google_fonts() {
		if ( $fonts = LP_Certificate::google_fonts() ) {
			$fonts             = LP()->settings->get( 'certificates.google_fonts' );
			$fonts['families'] = explode( '|', $fonts['families'] );
			?>
            <script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
            <script>
                WebFont.load({
                    google:<?php echo LP_Helper::json_encode( $fonts );?>
                });
            </script>
			<?php
		}
	}

	public function admin_view( $view, $args = '' ) {
		learn_press_admin_view( $view, wp_parse_args( $args, array( 'plugin_file' => LP_ADDON_CERTIFICATES_FILE ) ) );
	}
}