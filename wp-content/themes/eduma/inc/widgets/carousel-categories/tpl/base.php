<?php
global $post;
$item_visible    = !empty( $instance['visible'] ) ? $instance['visible'] : 1;
$pagination      = ( !empty( $instance['pagination'] ) && $instance['pagination'] == 'yes' ) ? true : false;
$navigation      = ( !empty( $instance['navigation'] ) && $instance['navigation'] != 'yes' ) ? false : true;
$cat_id        = !empty( $instance['cat_id'] ) ? $instance['cat_id'] : array();
$post_limit      = !empty( $instance['post_limit'] ) ? $instance['post_limit'] : 4;
$data_itemtablet = ( $item_visible < 2 ) ? $item_visible : 2;
$list_cat = array();
if( !is_array($cat_id) ) $list_cat[] = $cat_id;
else $list_cat = $cat_id;
$html = '';

if ( !empty( $list_cat ) ) {
    $html .= '<div class="thim-post-caregories-slider">';
    $html .= '<div class="thim-carousel-wrapper" data-visible="' . $item_visible . '" data-itemtablet="' . $data_itemtablet . '" data-pagination="' . $pagination . '" data-navigation="' . $navigation . '" data-navigation-text="2">';
    foreach ( $list_cat as $k => $cat_id ) {
        $is_cat = get_term( $cat_id, 'category' );
        if ( empty( $is_cat ) ) {
            return;
        }
        $query_args = array(
            'posts_per_page'      => $post_limit,
            'post_type'           => 'post',
            'ignore_sticky_posts' => true
        );

        //$posts_array = new WP_Query( $query_args );
        $posts_array = get_posts(
            array(
                'posts_per_page' => $post_limit,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $cat_id,
                    )
                )
            )
        );

        $cat_name    = get_cat_name( $cat_id );
        $top_image   = get_term_meta( $cat_id, 'thim_archive_top_image', true );
        $description = category_description( $cat_id );

        $img = '<a href="' . esc_url( get_term_link( (int) $cat_id, 'category' ) ) . '">';
        if ( $top_image && '' != $top_image['id'] ) {
            $img .= thim_get_feature_image( $top_image['id'], 'full', 420, 420, $cat_name );
        } else {
            $img .= thim_get_feature_image( null, 'full', 420, 420, $cat_name );
        }
        $img .= '</a>';

        $html .= '<div class="item">';
        $html .= '<div class="image">';
        $html .= $img;
        $html .= '</div>';
        $html .= '<div class="content-wrapper">';
        $html .= '<h3 class="title"><a href="' . esc_url( get_term_link( (int) $cat_id, 'category' ) ) . '">' . $cat_name . '</a></h3>';
        if ( !empty( $description ) ) {
            $html .= '<div class="desc">' . $description . '</div>';
        }
        if ( !empty( $posts_array ) ) {
            $html .= '<div class="list-course-items">';
            $html .= '<label>' . esc_html__( 'Course:', 'eduma' ) . '</label>';
            foreach ( $posts_array as $key => $value ) {
                $html .= '<a class="course-link" href="' . get_the_permalink( $value->ID ) . '">' . $value->post_title . '</a>';
            }
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '</div>';
        wp_reset_postdata();
    }
    $html .= '</div>';
	$html .= '<script type="text/javascript">';
	$html .= 'jQuery(document).ready(function(){';
	$html .= '"use strict";';
	$html .= 'if (jQuery("body").hasClass("vc_editor")) {';
	$html .= 'jQuery(".thim-carousel-wrapper").each(function() {
				var item_visible = jQuery(this).data("visible") ? parseInt(
					jQuery(this).data("visible")) : 4,
					item_desktopsmall = jQuery(this).data("desktopsmall") ? parseInt(
						jQuery(this).data("desktopsmall")) : item_visible,
					itemsTablet = jQuery(this).data("itemtablet") ? parseInt(
						jQuery(this).data("itemtablet")) : 2,
					itemsMobile = jQuery(this).data("itemmobile") ? parseInt(
						jQuery(this).data("itemmobile")) : 1,
					pagination = !!jQuery(this).data("pagination"),
					navigation = !!jQuery(this).data("navigation"),
					autoplay = jQuery(this).data("autoplay") ? parseInt(
						jQuery(this).data("autoplay")) : false,
					navigation_text = (jQuery(this).data("navigation-text") &&
						jQuery(this).data("navigation-text") === "2") ? [
						"<i class=\"fa fa-long-arrow-left \"></i>",
						"<i class=\"fa fa-long-arrow-right \"></i>",
					] : [
						"<i class=\"fa fa-chevron-left \"></i>",
						"<i class=\"fa fa-chevron-right \"></i>",
					];

				jQuery(this).owlCarousel({
					items            : item_visible,
					itemsDesktop     : [1200, item_visible],
					itemsDesktopSmall: [1024, item_desktopsmall],
					itemsTablet      : [768, itemsTablet],
					itemsMobile      : [480, itemsMobile],
					navigation       : navigation,
					pagination       : pagination,
					lazyLoad         : true,
					autoPlay         : autoplay,
					navigationText   : navigation_text,
					afterAction    : function () {
						var width_screen = jQuery(window).width();
						var width_container = jQuery("#main-home-content").width();
						var elementInstructorCourses = jQuery(".thim-instructor-courses");

						if(elementInstructorCourses.length){
							if( width_screen > width_container ){
								var margin_left_value = ( width_screen - width_container ) / 2 ;
								jQuery(".thim-instructor-courses .thim-course-slider-instructor .owl-controls .owl-buttons").css("left",margin_left_value+"px");
							}
						}
					}
				});
			});';
	$html .= '}';
	$html .= '});';
	$html .= '</script>';

    if ( !empty( $instance['link_view_all'] ) && !empty( $instance['text_view_all'] ) ) {
        $html .= '<a class="link-view-all" href="' . $instance['link_view_all'] . '">' . $instance['text_view_all'] . '</a>';
    }
    $html .= '</div>';

}

if ( $instance['title'] ) {
    echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
}

echo ent2ncr( $html );