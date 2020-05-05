<?php
/**
 * LP_Email_Enrolled_Course for Co-instructor Class.
 *
 * @author   ThimPress
 * @package  LearnPress/Co-Instructor/Classes
 * @version  3.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'LP_Email_Type_Enrolled_Course' ) ) {
	return;
}

if ( ! class_exists( 'LP_Email_Enrolled_Course_Co_Instructor' ) ) {

	/**
	 * Class LP_Email_Enrolled_Course_Instructor
	 */
	class LP_Email_Enrolled_Course_Co_Instructor extends LP_Email_Type_Enrolled_Course {

		/**
		 * LP_Email_Enrolled_Course_Instructor constructor.
		 */
		public function __construct() {
			$this->id          = 'enrolled-course-co-instructor';
			$this->title       = __( 'Co-instructor', 'learnpress-co-instructor' );
			$this->description = __( 'Send this email to co-instructor when they have enrolled course.', 'learnpress-co-instructor' );

			$this->template_html  = 'emails/enrolled-course.php';
			$this->template_plain = 'emails/plain/enrolled-course.php';

			$this->default_subject = __( '{{user_display_name}} has enrolled course', 'learnpress-co-instructor' );
			$this->default_heading = __( 'Enrolled course', 'learnpress-co-instructor' );

			// add email to list admin enrolled course email settings
			add_filter( 'learn-press/emails/enrolled-course', array( $this, 'email_enrolled_course' ) );

			parent::__construct();
		}

		/**
		 * Add co-instructor email settings to email enrolled course group.
		 *
		 * @param $emails
		 *
		 * @return array
		 */
		public function email_enrolled_course( $emails ) {
			$emails = array_merge( $emails, array( $this->id ) );

			return $emails;
		}

		/**
		 * Trigger email.
		 *
		 * @param int $course_id
		 * @param int $user_id
		 * @param int $user_item_id
		 *
		 * @return mixed
		 */
		public function trigger( $course_id, $user_id, $user_item_id ) {
			parent::trigger( $course_id, $user_id, $user_item_id );
			if ( ! $this->enable ) {
				return;
			}
			$co_instructors_id = learn_press_co_instructor_get_instructors( $course_id );

			if ( ! $co_instructors_id ) {
				return false;
			}

			$return = array();

			foreach ( $co_instructors_id as $co_instructor_id ) {
				$co_instructor = $co_instructor_id ? learn_press_get_user( $co_instructor_id ) : '';

				$this->recipient = $co_instructor->get_data( 'email' );

				$this->get_object();
				$this->get_variable();

				if ( $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), array(), $this->get_attachments() ) ) {
					$return[] = $this->get_recipient();
				}
			}

			return $return;
		}
	}
}

return new LP_Email_Enrolled_Course_Co_Instructor();