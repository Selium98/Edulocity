<?php

function __load_wprls() {

	load_wprls_classes();


	//Plugin loaded
	wprls_loaded();

}

function load_wprls_classes() {

	wprls_include_admin( 'class-wprls-slider.php' );
	wprls_include_admin( 'class-wprls-slider-theme.php' );
	

	new Wprls_Slider( $do_start = true );
	new Wprls_Slider_Theme( $do_start = true );

	do_action( 'wprls_classes_loaded'  );
	

}

function wprls_loaded() {

	do_action( 'wprls_loaded' );

}

function wprls_include_admin( $file_name, $require = true ) {

	if ( $require )
		require ROCKETLAYERSLIDER_PLUGIN_INCLUDE_ADMIN_DIRECTORY . $file_name;
	else
		include ROCKETLAYERSLIDER_PLUGIN_INCLUDE_ADMIN_DIRECTORY . $file_name;

}

function wprls_view_admin_path( $view_name, $is_php = true ) {

	$directory = ROCKETLAYERSLIDER_PLUGIN_ADMIN_DIRECTORY . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

	if ( strpos( $view_name, '.php' ) === FALSE && $is_php )
		return  $directory . $view_name . '.php';

	return $directory . $view_name;

}

function wprls_image_url( $image_name ) {

	return plugins_url( 'images/' . $image_name, ROCKETLAYERSLIDER_MAIN_FILE );

}

function wprls_image_admin_url( $image_name ) {

	return plugins_url( 'images/' . $image_name, ROCKETLAYERSLIDER_MAIN_FILE );

}

function wprls_get_sliders() {

	$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'wprls_slider',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);

	$sliders = get_posts( $args );

	return $sliders;

}

function wprls_get_slider_data( $slider_id ) {

	return get_post_meta( $slider_id, 'sl_data', true );

}

function wprls_get_slider_slides( $slider_id ) {

	$slider = get_post( $slider_id );

	if ( ! $slider )
		return FALSE;

	$slides = get_post_meta( $slider_id, 'sl_slides', true );

	return $slides;

}

function wprls_get_slides_count( $slider_id ) {

	if ( wprls_get_slider_slides( $slider_id )  )
		return count( wprls_get_slider_slides( $slider_id ) );
	else
		return 1;

}