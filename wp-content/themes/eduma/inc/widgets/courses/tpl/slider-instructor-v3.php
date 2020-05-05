<?php

global $post;
$limit        = $instance['limit'];
$item_visible = $instance['slider-options']['item_visible'];
$pagination   = $instance['slider-options']['show_pagination'] ? $instance['slider-options']['show_pagination'] : 0;
$navigation   = $instance['slider-options']['show_navigation'] ? $instance['slider-options']['show_navigation'] : 0;
$autoplay     = isset( $instance['slider-options']['auto_play'] ) ? $instance['slider-options']['auto_play'] : 0;
$featured     = ! empty( $instance['featured'] ) ? true : false;
$thumb_w      = ( ! empty( $instance['thumbnail_width'] ) && '' != $instance['thumbnail_width'] ) ? $instance['thumbnail_width'] : apply_filters( 'thim_course_thumbnail_width', 450 );
$thumb_h      = ( ! empty( $instance['thumbnail_height'] ) && '' != $instance['thumbnail_height'] ) ? $instance['thumbnail_height'] : apply_filters( 'thim_course_thumbnail_height', 400 );

$condition = array(
	'post_type'           => 'lp_course',
	'posts_per_page'      => $limit,
	'ignore_sticky_posts' => true,
);
$sort      = $instance['order'];

if ( $sort == 'category' && $instance['cat_id'] && $instance['cat_id'] != 'all' ) {
	if ( get_term( $instance['cat_id'], 'course_category' ) ) {
		$condition['tax_query'] = array(
			array(
				'taxonomy' => 'course_category',
				'field'    => 'term_id',
				'terms'    => $instance['cat_id']
			),
		);
	}
}


if ( $sort == 'popular' ) {
	global $wpdb;
	$query = $wpdb->prepare( "
	  SELECT ID, a+IF(b IS NULL, 0, b) AS students FROM(
		SELECT p.ID as ID, IF(pm.meta_value, pm.meta_value, 0) as a, (
	SELECT COUNT(*)
  FROM (SELECT COUNT(item_id), item_id, user_id FROM {$wpdb->prefix}learnpress_user_items GROUP BY item_id, user_id) AS Y
  GROUP BY item_id
  HAVING item_id = p.ID
) AS b
FROM {$wpdb->posts} p
LEFT JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id  AND pm.meta_key = %s
WHERE p.post_type = %s AND p.post_status = %s
GROUP BY ID
) AS Z
ORDER BY students DESC
	  LIMIT 0, $limit
 ", '_lp_students', 'lp_course', 'publish' );

	$post_in = $wpdb->get_col( $query );

	$condition['post__in'] = $post_in;
	$condition['orderby']  = 'post__in';

}

if ( $featured ) {
	$condition['meta_query'] = array(
		array(
			'key'   => '_lp_featured',
			'value' => 'yes',
		)
	);
}

$the_query = new WP_Query( $condition );

if ( $the_query->have_posts() ) :
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}

	?>
	<div class="thim-course-slider-instructor" data-visible="<?php echo esc_attr( $item_visible ); ?>" data-desktopsmall="3" data-itemtablet="2"
	     data-pagination="<?php echo esc_attr( $pagination ); ?>" data-navigation="<?php echo esc_attr( $navigation ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="course-item">

				<div class="course-thumbnail">
					<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
						<?php echo thim_get_feature_image( get_post_thumbnail_id( get_the_ID() ), 'full', $thumb_w, $thumb_h, get_the_title() ); ?>
					</a>
				</div>

				<div class="thim-course-overlay"></div>

				<div class="thim-course-content">
					<?php
					the_title( sprintf( '<h2 class="course-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					?>
				</div>

			</div>
		<?php
		endwhile;
		?>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			"use strict";

			if (jQuery("body").hasClass("vc_editor")) {

				jQuery('.thim-course-slider-instructor').each(function() {
					var item_visible = jQuery(this).data('visible') ? parseInt(
						jQuery(this).data('visible')) : 4,
						item_desktopsmall = jQuery(this).data('desktopsmall') ? parseInt(
							jQuery(this).data('desktopsmall')) : item_visible,
						itemsTablet = jQuery(this).data('itemtablet') ? parseInt(
							jQuery(this).data('itemtablet')) : 2,
						itemsMobile = jQuery(this).data('itemmobile') ? parseInt(
							jQuery(this).data('itemmobile')) : 1,
						pagination = !!jQuery(this).data('pagination'),
						navigation = !!jQuery(this).data('navigation'),
						autoplay = jQuery(this).data('autoplay') ? parseInt(
							jQuery(this).data('autoplay')) : false,
						navigation_text = (jQuery(this).data('navigation-text') &&
							jQuery(this).data('navigation-text') === '2') ? [
							'<i class=\'fa fa-long-arrow-left \'></i>',
							'<i class=\'fa fa-long-arrow-right \'></i>',
						] : [
							'<i class=\'fa fa-chevron-left \'></i>',
							'<i class=\'fa fa-chevron-right \'></i>',
						];

					jQuery(this).owlCarousel({
						items            : item_visible,
						itemsDesktop     : [1400, item_desktopsmall],
						itemsDesktopSmall: [1024, itemsTablet],
						itemsTablet      : [768, itemsTablet],
						itemsMobile      : [480, itemsMobile],
						navigation       : navigation,
						pagination       : pagination,
						lazyLoad         : true,
						autoPlay         : autoplay,
						navigationText   : navigation_text,
						afterAction    : function () {
							var width_screen = jQuery(window).width();
							var width_container = jQuery('#main-home-content').width();
							var elementInstructorCourses = jQuery('.thim-instructor-courses');

							if(elementInstructorCourses.length){
								if( width_screen > width_container ){
									var margin_left_value = ( width_screen - width_container ) / 2 ;
									jQuery('.thim-instructor-courses .thim-course-slider-instructor .owl-controls .owl-buttons').css('left',margin_left_value+'px');
								}
							}
						}
					});
				});
			}
		});
	</script>
<?php
endif;
wp_reset_postdata();
