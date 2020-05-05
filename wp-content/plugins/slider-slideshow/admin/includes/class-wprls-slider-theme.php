<?php

class Wprls_Slider_Theme {

	function __construct( $do_start = false ) {

		if ( $do_start ) {

			$this->_init();
			$this->_hooks();
			$this->_filters();

		}
	}

	function _init() {

		add_shortcode( 'rlslider', array( $this, 'process_shortcode' )  );

	}


	function _hooks() {

		
		
	}

	function _filters() {

	}

	/**
		Make an associative array random. Used in process_shortcode function randomize the slides.
	**/
	function shuffle_assoc(&$array) {
	  $keys = array_keys($array);
	  shuffle($keys);
	  foreach($keys as $key) {
	   $new[$key] = $array[$key];
	  }
	  $array = $new; return true;
	}

	/**
		Shortcode output function. Handles all the slider templates. 
	**/
	function process_shortcode( $atts ) {

		extract( shortcode_atts( array(
				'id' => null
			), $atts ) );

		if ( ! $id )
			return FALSE;

		if ( get_post_status( $id ) !== 'publish' )
			return FALSE;

		$slider_id = $id;

		$slider_options = wprls_get_slider_data( $slider_id );

		$slides = wprls_get_slider_slides( $slider_id );

		if ( $slider_options['slide_order'] == 'rnd' )
			$this->shuffle_assoc( $slides );

		//Disable Javascript random function to preserve layers
		$slider_options['slider_order'] = 'seq';

        if ( ! isset( $slider_options['thumbnails'] ) )
            $slider_options['thumbnails'] = false;

        if ( ! isset( $slider_options['full_width'] ) )
        	$slider_options['full_width'] = false;

        if ( ! isset( $slider_options['full_screen'] ) )
        	$slider_options['full_screen'] = false;

        if ( ! isset( $slider_options['is_text_responsive'] ) )
        	$slider_options['is_text_responsive'] = false;

        if ( ! isset( $slider_options['nav_arrows'] ) )
        	$slider_options['nav_arrows'] = true;

        if ( ! isset( $slider_options['nav_dots'] ) )
        	$slider_options['nav_arrows'] = false;

        $slider_view_path = wprls_view_admin_path( 'public/slider-1.php' );

        $slider_view_path = apply_filters( 'wprls_slider_view_path', $slider_view_path, $id  );

		ob_start();
		
		include ( $slider_view_path ); 

		$content = ob_get_contents();
		ob_end_clean();

		return $content;


	}

	/**
		Filter the layer html to add support for shortcodes and oembeds. 
	**/
	function html_content( $content, $slider_id = false ) {

		if ( ! isset( $content_width ) )
			$content_width = 750;

		global $wp_embed;

		//$content = wpautop( $content );
		
    	$content = $wp_embed->run_shortcode( $content );
    	$content = do_shortcode( $content );
    	

		return $content;
		
	}

	/**
		Load Google fonts selected in the layers. Remove duplicates.
	**/
	public function custom_fonts( $slider_id, $echo = false ) {

		$slides = wprls_get_slider_slides( $slider_id );

		if ( empty( $slides ) )
			return;

		$fonts = array();

		$links = array();

		$api = '//fonts.googleapis.com/css?family=';

		foreach ( $slides as $index => $slide ) {
			
			foreach( $slide['layers'] as $lindex => $layer ) {

				if ( $layer['googlefont'] !== '' )
					$fonts[] = esc_attr( $layer['googlefont'] );

			}


		}

		$fonts = array_unique( $fonts );

		foreach( $fonts as $font ) {

			$url = $api . $font;

			$link = '<link href="' . $url . '" rel="stylesheet" type="text/css">';

			$links[] = $link;

		}

		if ( ! $echo )
			return $links;


		foreach( $links as $link ) {

			echo $link;

		}		

	}

}