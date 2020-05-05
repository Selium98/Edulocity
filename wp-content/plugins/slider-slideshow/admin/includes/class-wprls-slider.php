<?php

class Wprls_Slider{

	function __construct( $do_start = false ) {

		if ( $do_start ) {

			$this->_init();
			$this->_hooks();
			$this->_filters();

		}

	}

	function _init() {

			

	}


	function _hooks() {

		add_action( 'init', array( $this, 'register_post_type' ) );

		add_action( 'init', array( $this, 'save_slider_options' ) );

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		add_action( 'admin_init', array( $this, 'add_assets' ) );

		add_action( 'wp_ajax_wprlsajaxsave', array( $this, 'save_slide_ajax' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'public_assets' ) );

		add_action( 'admin_head', array( $this, 'add_custom_fonts' ), 0, 999 );
	}

	function _filters() {

	}

	function register_post_type() {

		$labels = array(
				'name'               => _x( 'Sliders', 'post type general name', 'wprls' ),
				'singular_name'      => _x( 'Slider', 'post type singular name', 'wprls' ),
				'menu_name'          => _x( 'Sliders', 'admin menu', 'wprls' ),
				'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'wprls' ),
				'add_new'            => _x( 'Add New', 'Slider', 'wprls' ),
				'add_new_item'       => __( 'Add New Slider', 'wprls' ),
				'new_item'           => __( 'New Slider', 'wprls' ),
				'edit_item'          => __( 'Edit Slider', 'wprls' ),
				'view_item'          => __( 'View Slider', 'wprls' ),
				'all_items'          => __( 'All Sliders', 'wprls' ),
				'search_items'       => __( 'Search Sliders', 'wprls' ),
				'parent_item_colon'  => __( 'Parent Sliders:', 'wprls' ),
				'not_found'          => __( 'No Sliders found.', 'wprls' ),
				'not_found_in_trash' => __( 'No Sliders found in Trash.', 'wprls' )
		);
	
		$args = array(
				'labels'             => $labels,
		        'description'        => __( 'Description.', 'wprls' ),
				'public'             => false,
				'publicly_queryable' => false,
				'show_ui'            => false,
				'show_in_menu'       => false,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'wprls_slider' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title' )
		);

		register_post_type( 'wprls_slider', $args );

	}

	function admin_menu() {

		$page_title = __( 'Layer Slider', 'wprls' );
		$menu_title = __( 'Layer Slider', 'wprls' );
		$capability = 'manage_options';
		$menu_slug = 'edit.php?post_type=wprls_slider';

		add_menu_page( $page_title, $menu_title , $capability,
		  	'wprls_sliders_page', 
		  	array( $this, 'sliders_page' ),'dashicons-images-alt2' );

    	add_submenu_page( 'wprls_sliders_page', 'Slider', 'Add New Slider', $capability, 'wprls_add_slider', array( $this, 'add_new_slider' ) );

	}


	function public_assets() {

		if ( is_admin() ) return;

		wp_enqueue_style( 'wprls-style', plugins_url( '../css/public/slider-pro.min.css' , __FILE__ ) );

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'wprls-script', plugins_url( '../js/public/rsslider.js', __FILE__ ) );

	}

	function add_assets() {

			if ( ! isset( $_GET['page'] ) ) return;

			if ( $_GET['page'] == 'wprls_add_slider' ) {
				
				wp_enqueue_style( 'wprls-style', plugins_url( '../css/style.css' , __FILE__ ) );

				wp_enqueue_style( 'alpha-color-picker', plugins_url('../js/alpha-color-picker/alpha-color-picker.css', __FILE__),  array( 'wp-color-picker' )  );

				wp_enqueue_script( 'jquery' );

				wp_enqueue_script( 'jquery-ui' );

				wp_enqueue_script( 'jquery-ui-core' );

				wp_enqueue_script( 'jquery-ui-tabs' );

				wp_enqueue_script( 'jquery-ui-draggable' );

				wp_enqueue_script( 'jquery-ui-resizable' );

				wp_enqueue_script( 'jquery-ui-droppable' );

				wp_enqueue_script( 'wp-color-picker' );

				wp_enqueue_script( 'alpha-color-picker', plugins_url('../js/alpha-color-picker/alpha-color-picker.js', __FILE__ ), array( 'jquery', 'wp-color-picker' )  );

				wp_enqueue_script( 'wprls-script', plugins_url( '../js/wprls.js', __FILE__ ) );

				 wp_enqueue_media();

				 $js = array(
				 		'bgimgbutton' => plugins_url( '../img/not_set.png', __FILE__ ),
				 		'videoposterimageurl' => plugins_url( '../img/default_poster_image.png', __FILE__ ),
				 		'admin_url' => admin_url(),
				 		'ajaxurl' => admin_url( 'admin-ajax.php' )
				 	);			 

				wp_localize_script( 'wprls-script', 'wprlsslider', $js );

				wp_enqueue_style( 'wprls-preview-style', plugins_url( '../css/public/slider-pro.min.css' , __FILE__ ) );

				wp_enqueue_script( 'wprls-preview-script', plugins_url( '../js/rls-admin-preview.js', __FILE__ ) );
			
			}

	}

	function sliders_page() {

		$nonce = wp_create_nonce( 'wprls_slider_delete_nonce' );

		if ( isset( $_GET['action'] ) ) {

			if ( $_GET['action'] == 'delete_slider' ) {
				
				$post_id = intval($_GET['post_id']);

				wp_delete_post( $post_id, true );

			}
		
		}

		include wprls_view_admin_path( 'sliders-page.php' );

	}

	function add_new_slider() {

		$nonce = wp_create_nonce( 'wprls_settings_nonce' );

		$slider_nonce = wp_create_nonce( 'wprls_slides_nonce' );

		$slider_options = $this->default_slider_options();

		$slides = $this->default_slide_options();

		$save_link = admin_url('admin.php?page=wprls_add_slider&action=wprls_add_slider&new_post=1');

		if ( isset( $_GET['action'] ) ) {

			if ( $_GET['action'] == 'edit_slider' ) {

				$post_id = (int)$_GET['post_id'];

				$save_link = admin_url('admin.php?page=wprls_add_slider&action=edit_slider&post_id=' . $post_id );

				$slider_options = get_post_meta( $post_id, 'sl_data', true );

				$slider_options['title'] = get_the_title( $post_id );

				$slides = wprls_get_slider_slides( $_GET['post_id'] );

				if ( ! $slides )
					$slides = $this->default_slide_options();

			}

		}
		
		if ( isset( $_POST['submit'] ) || isset( $_GET['msg'] ) )
			include wprls_view_admin_path( 'success-settings' );

		include wprls_view_admin_path( 'add-slider-page.php' );

	}

	function add_custom_fonts() {

		if ( isset( $_GET['action'] ) ) {

			if ( $_GET['action'] == 'edit_slider' ) {

				$slider_id = intval( $_GET['post_id'] );

				$theme_handler = new Wprls_Slider_Theme( false );

				$theme_handler->custom_fonts( $slider_id, true );
			
			}

		}

		

	}


	

	function default_slider_options() {

		$default_options = array(
				'title' => '',
				'is_responsive' => true,
				'width' => 700,
				'height' => 380,
				'nav_skin' => '1',
				'nav_color' => '2',
				'player_skin' => '1',
				'auto_start' => false,
				'pause_on_mouse_over' => true,
				'slide_order' => 'seq',
				'random_order' => false,
				'autoplay_vid' => false,
				'pause_slideshow_vid' => true,
				'autoplay_delay' => 6000,
				'slide_animation' => 'fade',
				'full_width' => false,
				'thumbnails' => false,
				'full_screen' => false,
				'is_text_responsive' => false,
				'nav_arrows' => true,
				'nav_dots' => false,
				'slide_bgcolor' => '#ffffff',
				'slider_shadow' => '1',
				'arrow_color' => '#ffffff',
				'arrow_size' => 1,
				'thumbnails_position' => 'bottom',
				'thumbnails_arrow' => false,
				'dots_color' => '#000000',
				'dots_border_color' =>  '#000000',
				'dots_size' => '10',
				'dots_position' => 'bottom',
				'selected_thumb_border_color' => '#000000',
				'slider_border_color' => '#fff',
				'is_slider_border_color' => true,
				'lazy_load' => false,
				'theme' => 'default',
				'custom_css' => ''
			);

		return $default_options;

	}

	function default_slide_options() {

		$default_options = array(
				'bgimage' => '',
				'slideduration' => '1000',
				'transduration' => '1000',
				'attach_id' => '',
				'animation' => ''
			);

		$slide = array(
				'type' => 'text',
				'width' => '30',
				'height' => 'auto',
				'top' => '0',
				'left' => '0',
				'tsize' => '15',
				'imgwidth' => '',
				'imgheight' => '',
				'tcolor' => '#000000',
				'tcontent' => 'Empty Text',
				'hcontent' => 'Empty HTML',
				'bgcolor' => '#ffffff',
				'animationdelay' => '1100',
				'animation' => 'fadeIn',
				'linkurl' => '',
				'linktext' => '',
				'linkbeforetext' => '',
				'linkaftertext' => '',
				'linkcolor' => '#337ab7',
				'imageurl' => '',
				'videotype' => 'youtube',
				'videourl' => '',
				'videoposterurl' => plugins_url( '../img/default_poster_image.png', __FILE__ ),
				'textalign' => 'left',
				'googlefont' => '',
				'hideme' => false,
				'hideme_after' => '2000',
				'hideme_animation' => 'fadeOut'
			);

		$default_options['layers'] = array(
				$slide
			);

		$slides = array( $default_options );

		

		return $slides;

	}

	function save_slides_options() {




	}

	function save_slider_options() {

		if ( ! isset( $_POST['wprls_nonce'] ) ) return;

		if ( ! wp_verify_nonce( $_POST['wprls_nonce'], 'wprls_settings_nonce' ) ) die ( 'Security Error' );


		$sl_data = $_POST;
		
		if ( isset( $_GET['new_post'] ) ) {
			
			$postarr = array( 
					'post_title' => wp_strip_all_tags( $sl_data['title'] ),
					'post_status' => 'publish',
					'post_type' => 'wprls_slider',
					'post_author' => 1,
				);

			$post_id = wp_insert_post( $postarr );


			$meta_sl_data = array();

			$meta_sl_data['width'] = $sl_data['width'];

			$meta_sl_data['height'] = $sl_data['height'];

			$meta_sl_data['autoplay_delay'] = $sl_data['autoplay_delay'];

			$meta_sl_data['slide_bgcolor'] = '#fff';

			$meta_sl_data['slide_order'] = $sl_data['slide_order'];

			$meta_sl_data['slide_animation'] = $sl_data['slide_animation'];

			$meta_sl_data['slider_shadow'] = $sl_data['slider_shadow'];

			$meta_sl_data['arrow_color'] = '#fff';

			$meta_sl_data['arrow_size'] = 1;

			$meta_sl_data['thumbnails_position'] = 'bottom';

			$meta_sl_data['dots_color'] = '#000';

			$meta_sl_data['dots_border_color'] = '#000';

			$meta_sl_data['dots_size'] = 10;

			$meta_sl_data['dots_position'] = 'bottom';

			$meta_sl_data['selected_thumb_border_color'] = '#000';

			$meta_sl_data['slider_border_color'] = '#fff';

			$meta_sl_data['custom_css'] = '';

			if ( isset( $sl_data['is_responsive'] ) )
				$meta_sl_data['is_responsive'] = true;
			else
				$meta_sl_data['is_responsive'] = false;

			if ( isset( $sl_data['auto_start'] ) )
				$meta_sl_data['auto_start'] = true;
			else
				$meta_sl_data['auto_start'] = false;

			if ( isset( $sl_data['pause_on_mouse_over'] ) )
				$meta_sl_data['pause_on_mouse_over'] = true;
			else
				$meta_sl_data['pause_on_mouse_over'] = false;

			if ( isset( $sl_data['autoplay_vid'] ) )
				$meta_sl_data['autoplay_vid'] = true;
			else
				$meta_sl_data['autoplay_vid'] = false;

			if ( isset( $sl_data['pause_slideshow_vid'] ) )
				$meta_sl_data['pause_slideshow_vid'] = true;
			else
				$meta_sl_data['pause_slideshow_vid'] = false;

			if ( isset( $sl_data['full_width'] ) )
				$meta_sl_data['full_width'] = true;
			else
				$meta_sl_data['full_width'] = false;

			if ( isset( $sl_data['thumbnails'] ) )
				$meta_sl_data['thumbnails'] = true;
			else
				$meta_sl_data['thumbnails'] = false;

			if ( isset( $sl_data['thumbnails_arrow'] ) )
				$meta_sl_data['thumbnails_arrow'] = true;
			else
				$meta_sl_data['thumbnails_arrow'] = false;

			if ( isset( $sl_data['full_screen'] ) )
				$meta_sl_data['full_screen'] = true;
			else
				$meta_sl_data['full_screen'] = false;

			if ( isset( $sl_data['is_text_responsive'] ) )
				$meta_sl_data['is_text_responsive'] = true;
			else
				$meta_sl_data['is_text_responsive'] = false;

			if ( isset( $sl_data['nav_arrows'] ) )
				$meta_sl_data['nav_arrows'] = true;
			else
				$meta_sl_data['nav_arrows'] = false;

			if ( isset( $sl_data['nav_dots'] ) )
				$meta_sl_data['nav_dots'] = true;
			else
				$meta_sl_data['nav_dots'] = false;


			if ( isset( $sl_data['is_slider_border_color'] ) )
				$meta_sl_data['is_slider_border_color'] = true;
			else
				$meta_sl_data['is_slider_border_color'] = false;

			if ( isset( $sl_data['is_slider_lazy_load'] ) )
				$meta_sl_data['lazy_load'] = true;
			else
				$meta_sl_data['lazy_load'] = false;

 
			update_post_meta( $post_id, 'sl_data', $meta_sl_data );

			$location = admin_url('admin.php?page=wprls_add_slider&action=edit_slider&post_id=' . $post_id );

			wp_redirect( $location );

			exit;

		} else if ( isset( $_GET['post_id'] ) && $_GET['action'] == 'edit_slider' ) {

			$post_id = $_GET['post_id'];

			if ( FALSE === get_post_status( $post_id ) ) return;

			$title = wp_strip_all_tags( $sl_data['title'] );

			$postarr = array( 
					'ID' => $post_id,
					'post_title' => $title
				);

			wp_update_post( $postarr );

			$meta_sl_data = array();


			$meta_sl_data['width'] = $sl_data['width'];

			$meta_sl_data['height'] = $sl_data['height'];

			$meta_sl_data['autoplay_delay'] = $sl_data['autoplay_delay'];

			$meta_sl_data['slide_bgcolor'] = '#fff';

			$meta_sl_data['slide_order'] = $sl_data['slide_order'];

			$meta_sl_data['slide_animation'] = $sl_data['slide_animation'];

			$meta_sl_data['slider_shadow'] = $sl_data['slider_shadow'];

			$meta_sl_data['arrow_color'] = '#fff';

			$meta_sl_data['arrow_size'] = 1;

			$meta_sl_data['thumbnails_position'] = 'bottom';

			$meta_sl_data['dots_color'] = '#000';

			$meta_sl_data['dots_border_color'] = '#000';

			$meta_sl_data['dots_size'] = 10;

			$meta_sl_data['dots_position'] = 'bottom';

			$meta_sl_data['selected_thumb_border_color'] = '#000';

			$meta_sl_data['slider_border_color'] = '#fff';

			$meta_sl_data['custom_css'] = '';

			if ( isset( $sl_data['is_responsive'] ) )
				$meta_sl_data['is_responsive'] = true;
			else
				$meta_sl_data['is_responsive'] = false;

			if ( isset( $sl_data['auto_start'] ) )
				$meta_sl_data['auto_start'] = true;
			else
				$meta_sl_data['auto_start'] = false;

			if ( isset( $sl_data['pause_on_mouse_over'] ) )
				$meta_sl_data['pause_on_mouse_over'] = true;
			else
				$meta_sl_data['pause_on_mouse_over'] = false;

			if ( isset( $sl_data['autoplay_vid'] ) )
				$meta_sl_data['autoplay_vid'] = true;
			else
				$meta_sl_data['autoplay_vid'] = false;

			if ( isset( $sl_data['pause_slideshow_vid'] ) )
				$meta_sl_data['pause_slideshow_vid'] = true;
			else
				$meta_sl_data['pause_slideshow_vid'] = false;

			if ( isset( $sl_data['full_width'] ) )
				$meta_sl_data['full_width'] = true;
			else
				$meta_sl_data['full_width'] = false;

			if ( isset( $sl_data['thumbnails'] ) )
				$meta_sl_data['thumbnails'] = true;
			else
				$meta_sl_data['thumbnails'] = false;

			if ( isset( $sl_data['thumbnails_arrow'] ) )
				$meta_sl_data['thumbnails_arrow'] = true;
			else
				$meta_sl_data['thumbnails_arrow'] = false;

			if ( isset( $sl_data['full_screen'] ) )
				$meta_sl_data['full_screen'] = true;
			else
				$meta_sl_data['full_screen'] = false;

			if ( isset( $sl_data['is_text_responsive'] ) )
				$meta_sl_data['is_text_responsive'] = true;
			else
				$meta_sl_data['is_text_responsive'] = false;

			if ( isset( $sl_data['nav_arrows'] ) )
				$meta_sl_data['nav_arrows'] = true;
			else
				$meta_sl_data['nav_arrows'] = false;

			if ( isset( $sl_data['nav_dots'] ) )
				$meta_sl_data['nav_dots'] = true;
			else
				$meta_sl_data['nav_dots'] = false;

			if ( isset( $sl_data['is_slider_border_color'] ) )
				$meta_sl_data['is_slider_border_color'] = true;
			else
				$meta_sl_data['is_slider_border_color'] = false;

			if ( isset( $sl_data['is_slider_lazy_load'] ) )
				$meta_sl_data['lazy_load'] = true;
			else
				$meta_sl_data['lazy_load'] = false;
 
			update_post_meta( $post_id, 'sl_data', $meta_sl_data );

			

		}


	}

	function save_slide_ajax() {

		if ( ! current_user_can( 'manage_options' ) )
			die(0);

		$json = stripcslashes($_POST['json']);

		$postid = intval($_POST['postid']);

		$slides = json_decode( $json, true );

		update_post_meta( $postid, 'sl_slides', $slides );

		exit( 'success' );

	}

	function live_slider_preview( $slider_id ) {

		$shortcode = sprintf( "[rlslider id='%s']", $slider_id );

		include wprls_view_admin_path( 'live-preview' );

	}


}