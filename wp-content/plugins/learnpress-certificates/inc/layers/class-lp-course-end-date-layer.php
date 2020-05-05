<?php

class LP_Certificate_Course_End_Date_Layer extends LP_Certificate_Datetime_Layer {
	public function apply( $data ) {

		$user        = learn_press_get_user( $data['user_id'] );
		$course_data = $user->get_course_data( $data['course_id'] );
		$course_data->get_end_time();
		$end_time_formated = learn_press_date_i18n( $course_data->get_end_time()->getTimestamp(), $this->get_format() );
		if ( ! $end_time_formated ) {
			$end_time_formated = learn_press_date_i18n( $course_data->get_end_time_gmt()->getTimestamp(), $this->get_format() );
		}
		$this->options['text'] = ( $course_data ) ? $end_time_formated : $this->options['text'];
	}
}