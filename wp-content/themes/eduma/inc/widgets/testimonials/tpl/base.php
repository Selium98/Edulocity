<?php

$link           = $regency = '';
$link_to_single = ! empty( $instance['link_to_single'] ) ? true : false;
$limit          = ( $instance['limit'] && '' <> $instance['limit'] ) ? (int) $instance['limit'] : 10;
$item_visible   = ( $instance['item_visible'] && '' <> $instance['item_visible'] ) ? (int) $instance['item_visible'] : 5;
$item_time      = ( $instance['pause_time'] && '' <> $instance['pause_time'] ) ? (int) $instance['pause_time'] : 5000;
$autoplay       = $instance['autoplay'] ? 1 : 0;
$mousewheel     = $instance['mousewheel'] ? 1 : 0;

$testomonial_args = array(
	'post_type'           => 'testimonials',
	'posts_per_page'      => $limit,
	'ignore_sticky_posts' => true
);

$testimonial = new WP_Query( $testomonial_args );

if ( $testimonial->have_posts() ) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	$html = '<div class="thim-testimonial-slider" data-time="' . $item_time . '" data-visible="' . $item_visible . '" data-auto="' . $autoplay . '" data-mousewheel="' . $mousewheel . '">';
	while ( $testimonial->have_posts() ) : $testimonial->the_post();
		$link    = get_post_meta( get_the_ID(), 'website_url', true );
		$regency = get_post_meta( get_the_ID(), 'regency', true );

		$html .= '<div class="item">';
		if ( has_post_thumbnail() ) {
			$html .= '<div class="image">';
			$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', apply_filters( 'thim_testimonial_thumbnail_width', 100 ), apply_filters( 'thim_testimonial_thumbnail_height', 100 ) );
			$html .= '</div>';
		}
		$html .= '<div class="content">';
		if ( $link_to_single ) {
			$html .= '<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
		} else if ( $link <> '' ) {
			$html .= '<h3 class="title"><a href="' . $link . '">' . get_the_title() . '</a></h3>';
		} else {
			$html .= '<h3 class="title">' . get_the_title() . '</h3>';
		}
		$html .= '<div class="regency">' . esc_html( $regency ) . '</div>';
		$html .= '<div class="description">' . apply_filters( 'the_content', get_the_content() ) . '</div>';
		$html .= '</div></div>';

	endwhile;
	$html .= '</div>';

	$html .= '<script type="text/javascript">';
	$html .= 'jQuery(document).ready(function(){';
	$html .= '"use strict";';
	$html .= 'if (jQuery("body").hasClass("vc_editor")) {';
	$html .= 'jQuery(".thim-testimonial-slider").each(function() {
                var elem = jQuery(this),
                    item_visible = parseInt(elem.data("visible")),
                    item_time = parseInt(elem.data("time")),
                    autoplay = elem.data("auto") ? true : false,
                    item_ratio = elem.data("ratio") ? elem.data("ratio") : 1.18,
                    item_padding = elem.data("padding") ? elem.data("padding") : 15,
                    item_activepadding = elem.data("activepadding") ? elem.data(
                        "activepadding") : 0,
                    item_width = elem.data("width") ? elem.data("width") : 100,
                    mousewheel = !!elem.data("mousewheel");

                var testimonial_slider = jQuery(this).thimContentSlider({
                    items            : elem,
                    itemsVisible     : item_visible,
                    mouseWheel       : mousewheel,
                    autoPlay         : autoplay,
                    pauseTime        : item_time,
                    itemMaxWidth     : item_width,
                    itemMinWidth     : item_width,
                    activeItemRatio  : item_ratio,
                    activeItemPadding: item_activepadding,
                    itemPadding      : item_padding,
                });

            });';
	$html .= '}';
	$html .= '});';
	$html .= '</script>';

	wp_reset_postdata();
	echo ent2ncr( $html );
}
?>


