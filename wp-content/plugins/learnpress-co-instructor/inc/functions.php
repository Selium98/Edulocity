<?php
/**
 * LearnPress Co-Instructor Functions
 *
 * Define common functions for both front-end and back-end
 *
 * @author   ThimPress
 * @package  LearnPress/Co-Instructor/Functions
 * @version  3.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'learn_press_co_instructor_get_instructors' ) ) {
	/**
	 * Get course co-instructors.
	 *
	 * @param null $course_id
	 *
	 * @return mixed
	 */
	function learn_press_co_instructor_get_instructors( $course_id = null ) {
		if ( ! $course_id ) {
			$course_id = learn_press_get_course_id();
		}

		return get_post_meta( $course_id, '_lp_co_teacher' );
	}
}


if ( ! function_exists( 'learn_press_get_course_of_user_instructor' ) ) {
	/**
	 * Get course of user instructor.
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function learn_press_get_course_of_user_instructor( $args = array() ) {
		global $wpdb;
		$args = wp_parse_args(
			$args,
			array(
				'status'  => 'publish',
				'limit'   => - 1,
				'paged'   => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
				'orderby' => 'post_title',
				'order'   => 'ASC',
				'user_id' => get_current_user_id()
			)
		);
		$args = apply_filters( 'learn_press_param_get_course_instructor', $args, $args['user_id'] );

		ksort( $args );
		$limit = "\n";
		if ( $args['limit'] > 0 ) {
			if ( ! $args['paged'] ) {
				$args['paged'] = 1;
			}
			$start = ( $args['paged'] - 1 ) * $args['limit'];
			$limit .= "LIMIT " . $start . ',' . $args['limit'];
		}
		$order = "\nORDER BY " . ( $args['orderby'] ? 'a.' . $args['orderby'] : 'a.post_title' ) . ' ' . $args['order'];
		$query = $wpdb->prepare( "
					SELECT SQL_CALC_FOUND_ROWS * FROM (
						SELECT po.* FROM {$wpdb->prefix}postmeta pmt
						INNER JOIN {$wpdb->posts} po
						WHERE pmt.meta_key = %s 
							AND pmt.meta_value = %d 
							AND pmt.post_id = po.ID 
							AND po.post_type = %s
							AND po.post_status = %s
					) a GROUP BY a.ID
				", '_lp_co_teacher', $args['user_id'], LP_COURSE_CPT, $args['status'] ? $args['status'] : 'publish' );

		$query            .= $order . $limit;
		$results          = array(
			'rows' => $wpdb->get_results( $query ),
		);
		$results['count'] = $wpdb->get_var( "SELECT FOUND_ROWS();" );

		return $results;
	}
}