<?php
/**
 * Plugin load class.
 *
 * @author   ThimPress
 * @package  LearnPress/Co-Instructor/Classes
 * @version  3.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'LP_Addon_Co_Instructor' ) ) {
	/**
	 * Class LP_Addon_Co_Instructor
	 */
	class LP_Addon_Co_Instructor extends LP_Addon {

		/**
		 * @var string
		 */
		public $version = LP_ADDON_CO_INSTRUCTOR_VER;

		/**
		 * @var string
		 */
		public $require_version = LP_ADDON_CO_INSTRUCTOR_REQUIRE_VER;

		/**
		 * LP_Addon_Co_Instructor constructor.
		 */
		public function __construct() {
			parent::__construct();

			// Prepare user data
			$this->user = get_current_user_id();

			// add co-instructor email settings
			//$this->add_co_instructor_emails();
			add_action( 'learn-press/register-emails', array( $this, 'add_co_instructor_emails' ) );
			add_action( 'plugins_loaded', array( $this, 'backward_add_co_instructor_emails' ) );

			$current_user = wp_get_current_user();
			if ( in_array( 'lp_teacher', $current_user->roles ) || in_array( 'administrator', $current_user->roles ) ) {
				// add co-instructor tabs in profle page
				add_filter( 'learn-press/profile-tabs', array( $this, 'add_profile_instructor_tab' ) );
			}
		}

		/**
		 * Define Learnpress Co-Instructor constants.
		 *
		 * @since 3.0.0
		 */
		protected function _define_constants() {
			define( 'LP_ADDON_CO_INSTRUCTOR_PATH', dirname( LP_ADDON_CO_INSTRUCTOR_FILE ) );
			define( 'LP_ADDON_CO_INSTRUCTOR_INC', LP_ADDON_CO_INSTRUCTOR_PATH . '/inc/' );
			define( 'LP_ADDON_CO_INSTRUCTOR_TEMPLATE', LP_ADDON_CO_INSTRUCTOR_PATH . '/templates/' );
		}

		/**
		 * Include required core files used in admin and on the frontend.
		 *
		 * @since 3.0.0
		 */
		protected function _includes() {
			include_once LP_ADDON_CO_INSTRUCTOR_INC . 'functions.php';
		}

		/**
		 * Hook into actions and filters.
		 */
		protected function _init_hooks() {
			add_action( 'wp_before_admin_bar_render', array( $this, 'before_admin_bar_render' ) );
			add_filter( 'learn-press/edit-admin-bar-button', array( $this, 'before_admin_bar_course_item' ), 10, 2 );

			$current_user = wp_get_current_user();
			if ( ! in_array( 'administrator', $current_user->roles ) ) {
				add_action( 'pre_get_posts', array( $this, 'pre_get_co_instructor_items' ) );
			}
			// add co-instructor settings to course meta box
			add_filter( 'learn_press_course_author_meta_box', array( $this, 'add_meta_box' ) );

			add_filter( 'learn_press_valid_courses', array( $this, 'get_available_courses' ) );
			add_filter( 'learn_press_valid_lessons', array( $this, 'co_instructor_valid_lessons' ) );
			add_filter( 'learn_press_valid_quizzes', array( $this, 'co_instructor_valid_quizzes' ) );
			add_filter( 'learn_press_valid_questions', array( $this, 'co_instructor_valid_questions' ) );

			add_action( 'admin_head-post.php', array( $this, 'process_teacher' ) );

			// add co-instructor settings in admin settings page
			add_filter( 'learn-press/profile-settings-fields/sub-tabs', array(
				$this,
				'co_instructor_settings'
			), 10, 2 );

			// update post author for items in course, quiz
			add_filter( 'learnpress_course_insert_item_args', array( $this, 'course_insert_item_args' ) );
			add_filter( 'learnpress_quiz_insert_item_args', array( $this, 'quiz_insert_question_args' ), 10, 2 );

			add_filter( 'learn_press_excerpt_duplicate_post_meta', array(
				$this,
				'excerpt_duplicate_post_meta'
			), 10, 3 );;

			add_action( 'learn-press/after-single-course-instructor', array(
				$this,
				'single_course_instructors'
			) );
		}

		/**
		 * Add email classes.
		 */
		public function add_co_instructor_emails( &$emails ) {
//			LP_Emails::instance()->emails['LP_Email_Enrolled_Course_Co_Instructor'] = include( 'emails/class-lp-co-instructor-email-enrolled-course.php' );
//			LP_Emails::instance()->emails['LP_Email_Finished_Course_Co_Instructor'] = include( 'emails/class-lp-co-instructor-email-finished-course.php' );

			$emails['LP_Email_Enrolled_Course_Co_Instructor'] = include( 'emails/class-lp-co-instructor-email-enrolled-course.php' );
			$emails['LP_Email_Finished_Course_Co_Instructor'] = include( 'emails/class-lp-co-instructor-email-finished-course.php' );
		}

		public function backward_add_co_instructor_emails() {
			if ( class_exists( 'LP_Emails' ) ) {
				$emails = LP_Emails::instance()->emails;
				$this->add_co_instructor_emails( $emails );
			}
		}

		/**
		 * Remove edit course in admin bar for unauthorized user.
		 *
		 * @return mixed
		 */
		public function before_admin_bar_render() {

			global $post, $wp_admin_bar;

			if ( current_user_can( 'administrator' ) ) {
				return $wp_admin_bar;
			}

			if ( learn_press_is_course() && ! in_array( $post->ID, $this->get_available_courses() ) ) {
				$wp_admin_bar->remove_menu( 'edit' );
			}

			return $wp_admin_bar;
		}

		/**
		 * Remove edit lesson, quiz, question in admin bar for unauthorized user.
		 *
		 * @param $can_edit
		 * @param $course_item
		 *
		 * @return bool
		 */
		public function before_admin_bar_course_item( $can_edit, $course_item ) {
			if ( ! $course_item ) {
				return false;
			}

			if ( current_user_can( 'administrator' ) ) {
				return true;
			}

			$item_id = $course_item->get_id();
			$type    = get_post_type( $item_id );
			if ( $type == LP_LESSON_CPT ) {
				if ( in_array( $item_id, $this->co_instructor_valid_lessons() ) ) {
					return false;
				}
			} elseif ( $type == LP_QUIZ_CPT ) {
				if ( in_array( $item_id, $this->co_instructor_valid_quizzes() ) ) {
					return false;
				}
			} elseif ( $type == LP_QUESTION_CPT ) {
				if ( in_array( $item_id, $this->co_instructor_valid_questions() ) ) {
					return false;
				}
			}

			return apply_filters( 'learn-press/co-instructor/edit-admin-bar', $can_edit, $item_id );
		}


		/**
		 * Pre query items for co-instructor.
		 *
		 * @param $query
		 */
		public function pre_get_co_instructor_items( $query ) {

			global $pagenow;

			$current_user = wp_get_current_user();

			if ( is_admin() && ( in_array( 'lpr_teacher', $current_user->roles ) || in_array( 'lp_teacher', $current_user->roles ) ) && $pagenow == 'edit.php' ) {
				$post_type = isset( $_REQUEST['post_type'] ) ? sanitize_text_field( $_REQUEST['post_type'] ) : '';

				if ( in_array( $post_type, apply_filters( 'learn-press/co-instructor/item-types', array(
					'lpr_course',
					'lp_course',
					'lpr_lesson',
					'lp_lesson',
					'lpr_quiz',
					'lp_quiz',
					'lpr_question',
					'lp_question'
				) ) ) ) {
					$courses = $this->get_available_courses();

					$empty_post_type = 'lpr_empty';

					if ( in_array( $post_type, array( 'lpr_course', 'lp_course' ) ) ) {
						if ( count( $courses ) == 0 ) {
							// set query lp_empty post type
							if ( $post_type === 'lp_course' ) {
								$empty_post_type = 'lp_empty';
							}
							$query->set( 'post_type', $empty_post_type );
						} else {
							$query->set( 'post_type', $post_type );
							$query->set( 'post__in', $courses );
						}
						add_filter( 'views_edit-lpr_course', array( $this, 'restrict_co_instructor_items' ), 20 );
						add_filter( 'views_edit-lp_course', array( $this, 'restrict_co_instructor_items' ), 20 );

						return;
					} else if ( in_array( $post_type, array( 'lpr_lesson', 'lp_lesson' ) ) ) {
						$lessons = $this->get_available_lessons( $courses );
						if ( count( $lessons ) == 0 ) {
							// set query lp_empty post type
							if ( $post_type === 'lp_lesson' ) {
								$empty_post_type = 'lp_empty';
							}
							$query->set( 'post_type', $empty_post_type );
						} else {
							$query->set( 'post_type', $post_type );
							$query->set( 'post__in', $lessons );
						}
						add_filter( 'views_edit-lpr_lesson', array( $this, 'restrict_co_instructor_items' ), 20 );
						add_filter( 'views_edit-lp_lesson', array( $this, 'restrict_co_instructor_items' ), 20 );

						return;
					} else if ( in_array( $post_type, array( 'lpr_quiz', 'lp_quiz' ) ) ) {
						$quizzes = $this->get_available_quizzes( $courses );
						if ( count( $quizzes ) == 0 ) {
							// set query lp_empty post type
							if ( $post_type === 'lp_quiz' ) {
								$empty_post_type = 'lp_empty';
							}
							$query->set( 'post_type', $empty_post_type );
						} else {
							$query->set( 'post_type', $post_type );
							$query->set( 'post__in', $quizzes );
						}
						add_filter( 'views_edit-lpr_quiz', array( $this, 'restrict_co_instructor_items' ), 20 );
						add_filter( 'views_edit-lp_quiz', array( $this, 'restrict_co_instructor_items' ), 20 );

						return;
					} else if ( in_array( $post_type, array( 'lpr_question', 'lp_question' ) ) ) {
						$quizzes   = $this->co_instructor_valid_quizzes();
						$questions = $this->get_available_questions( $quizzes );
						if ( count( $questions ) == 0 ) {
							// set query lp_empty post type
							if ( $post_type === 'lp_question' ) {
								$empty_post_type = 'lp_empty';
							}
							$query->set( 'post_type', $empty_post_type );
						} else {
							$query->set( 'post_type', $post_type );
							$query->set( 'post__in', $questions );
						}
						add_filter( 'views_edit-lpr_question', array( $this, 'restrict_co_instructor_items' ), 20 );
						add_filter( 'views_edit-lp_question', array( $this, 'restrict_co_instructor_items' ), 20 );

						return;
					} else {
						do_action( 'learn-press/co-instructor/pre-get-posts', $this, $courses, $post_type, $query );
					}
				}
			}

		}

		/**
		 * Restrict co-instructor items.
		 *
		 * @param $views
		 *
		 * @return mixed
		 */
		public function restrict_co_instructor_items( $views ) {
			$post_type = get_query_var( 'post_type' );
			$author    = get_current_user_id();

			$new_views = array(
				'all'        => __( 'All', 'learnpress-co-instructor' ),
				'mine'       => __( 'Mine', 'learnpress-co-instructor' ),
				'publish'    => __( 'Published', 'learnpress-co-instructor' ),
				'private'    => __( 'Private', 'learnpress-co-instructor' ),
				'pending'    => __( 'Pending Review', 'learnpress-co-instructor' ),
				'future'     => __( 'Scheduled', 'learnpress-co-instructor' ),
				'draft'      => __( 'Draft', 'learnpress-co-instructor' ),
				'trash'      => __( 'Trash', 'learnpress-co-instructor' ),
				'co_teacher' => __( 'Co-instructor', 'learnpress-co-instructor' )
			);

			$url = 'edit.php';

			foreach ( $new_views as $view => $name ) {

				$query = array(
					'post_type' => $post_type
				);

				if ( $view == 'all' ) {
					$query['all_posts'] = 1;
					$class              = ( get_query_var( 'all_posts' ) == 1 || ( get_query_var( 'post_status' ) == '' && get_query_var( 'author' ) == '' ) ) ? ' class="current"' : '';
				} elseif ( $view == 'mine' ) {
					$query['author'] = $author;
					$class           = ( get_query_var( 'author' ) == $author ) ? ' class="current"' : '';
				} elseif ( $view == 'co_teacher' ) {
					$query['author'] = - $author;
					$class           = ( get_query_var( 'author' ) == - $author ) ? ' class="current"' : '';
				} else {
					$query['post_status'] = $view;
					$class                = ( get_query_var( 'post_status' ) == $view ) ? ' class="current"' : '';
				}

				$result = new WP_Query( $query );

				if ( $result->found_posts > 0 ) {
					$views[ $view ] = sprintf(
						'<a href="%s"' . $class . '>' . __( $name, 'learnpress-co-instructor' ) . ' <span class="count">(%d)</span></a>',
						esc_url( add_query_arg( $query, $url ) ),
						$result->found_posts
					);
				} else {
					unset( $views[ $view ] );
				}
			}

			return $views;
		}

		/**
		 * Get all editable courses of current user.
		 *
		 * @return array
		 */
		public function get_available_courses() {
			$user = learn_press_get_current_user();

			if ( ! $user->is_admin() && ! $user->is_instructor() ) {
				return array();
			}

			/**
			 * Cache available courses for current instructor
			 * @since 3.0.0
			 */
			if ( false === ( $courses = wp_cache_get( 'user-' . $user->get_id(), 'co-instructor-courses' ) ) ) {
				global $wpdb;

				$query = $wpdb->prepare( "
	                SELECT DISTINCT p.ID 
	                FROM $wpdb->posts AS p
	                INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
	                WHERE 
		                ( p.post_author = %d AND ( p.post_type = %s OR p.post_type = %s ) )
		                OR ( ( pm.meta_key = %s OR pm.meta_key = %s ) AND pm.meta_value= %d AND ( p.post_type = %s OR p.post_type = %s ) )
	            ",
					get_current_user_id(), 'lpr_course', 'lp_course', '_lpr_co_teacher', '_lp_co_teacher', get_current_user_id(), 'lpr_course', 'lp_course'
				);

				$courses = $wpdb->get_col( $query );

				wp_cache_set( 'user-' . $user->get_id(), $courses, 'co-instructor-courses' );

				$course_factory = new LP_Course_CURD();
				$course_factory->read_course_sections( $courses );
			}

			return $courses;
		}

		/**
		 * Get all editable lessons of current user, return array lessons id.
		 *
		 * @since 3.0.0
		 *
		 * @param $courses
		 *
		 * @return array
		 */
		public function get_available_lessons( $courses ) {

			$user_id = get_current_user_id();

			/**
			 * Cache available lessons for instructor
			 * @since 3.0.0
			 */
			if ( false === ( $lessons = wp_cache_get( 'user-' . $user_id, 'co-instructor-lessons' ) ) ) {
				global $wpdb;

				$query = $wpdb->prepare( "
					SELECT ID FROM $wpdb->posts 
					WHERE ( post_type = %s OR post_type = %s )
					AND post_author = %d
				", 'lpr_lesson', 'lp_lesson', get_current_user_id() );

				$lessons = $wpdb->get_col( $query );
				if ( $courses ) {
					foreach ( $courses as $course_id ) {
						$temp    = $this->get_available_lesson_from_course( $course_id );
						$lessons = array_unique( array_merge( $lessons, $temp ) );
					}
				}

				wp_cache_set( 'user-' . $user_id, $lessons, 'co-instructor-lessons' );
			}

			return $lessons;
		}

		/**
		 * Get all editable quizzes of current user, return array quizzes id.
		 *
		 * @since 3.0.0
		 *
		 * @param $courses
		 *
		 * @return array
		 */
		public function get_available_quizzes( $courses ) {

			$user_id = get_current_user_id();

			/**
			 * Cache quizzes for instructor
			 * @since 3.0.0
			 */
			if ( false === ( $quizzes = wp_cache_get( 'user-' . $user_id, 'co-instructor-quizzes' ) ) ) {
				global $wpdb;
				$query = $wpdb->prepare( "
					SELECT ID FROM $wpdb->posts
					WHERE ( post_type = %s OR post_type = %s )
					AND post_author = %d
				", 'lpr_quiz', 'lp_quiz', get_current_user_id()
				);

				// get quizzes of self co-instructor
				$quizzes = $wpdb->get_col( $query );
				if ( $courses ) {
					foreach ( $courses as $course ) {
						// get quizzes of course
						$temp    = $this->get_available_quizzes_from_course( $course );
						$quizzes = array_unique( array_merge( $quizzes, $temp ) );
					}
				}

				wp_cache_set( 'user-' . $user_id, $quizzes, 'co-instructor-quizzes' );
			}

			return $quizzes;
		}

		public function get_available_questions( $quizzes ) {
			global $wpdb;

			// get questions of self co-instructor
			$query     = $wpdb->prepare( "
				SELECT ID FROM $wpdb->posts
				WHERE ( post_type = %s OR post_type = %s )
				AND post_author = %d
			", 'lpr_question', 'lp_question', get_current_user_id()
			);
			$questions = $wpdb->get_col( $query );

			if ( $quizzes ) {
				foreach ( $quizzes as $quiz ) {
					// get questions of quiz
					$temp      = $this->get_available_question_from_quiz( $quiz );
					$questions = array_unique( array_merge( $questions, $temp ) );
				}
			}

			return $questions;
		}

		/**
		 * Get all lessons from course.
		 *
		 * @since 3.0.0
		 *
		 * @param null $course_id
		 *
		 * @return array
		 */
		public function get_available_lesson_from_course( $course_id = null ) {

			if ( empty( $course_id ) ) {
				return array();
			}

			$course  = learn_press_get_course( $course_id );
			$lessons = $course->get_items( LP_LESSON_CPT );

			$available = array();

			if ( $lessons ) {
				foreach ( $lessons as $lesson_id ) {
					$available[ $lesson_id ] = absint( $lesson_id );
				}
			}

			return $available;
		}

		/**
		 * Get all quizzes from course, return array quizzes ids.
		 *
		 * @since 3.0.0
		 *
		 * @param null $course_id
		 *
		 * @return array
		 */
		public function get_available_quizzes_from_course( $course_id = null ) {

			if ( empty( $course_id ) ) {
				return array();
			}

			$course  = learn_press_get_course( $course_id );
			$quizzes = $course->get_items( LP_QUIZ_CPT );

			$available = array();

			if ( $quizzes ) {
				foreach ( $quizzes as $quiz_id ) {
					$available[ $quiz_id ] = absint( $quiz_id );
				}
			}

			return $available;
		}

		/**
		 * Get all questions form quiz, return array questions ids.
		 *
		 * @param null $quiz_id
		 *
		 * @return array
		 */
		public function get_available_question_from_quiz( $quiz_id = null ) {

			if ( empty( $quiz_id ) ) {
				return array();
			}

			$quiz      = learn_press_get_quiz( $quiz_id );
			$questions = $quiz->get_questions();

			$available = array();

			foreach ( $questions as $question_id ) {
				$available[] = absint( $question_id );
			}

			return $available;
		}

		/**
		 * Add co-instructor settings in course meta box.
		 *
		 * @param $meta_box
		 *
		 * @return mixed
		 */
		public function add_meta_box( $meta_box ) {
			$class       = '';
			$post_author = '';
			if ( isset( $_GET['post'] ) && isset( get_post( $_GET['post'] )->post_author ) ) {
				$post_author = get_post( $_GET['post'] )->post_author;
				if ( $post_author != get_current_user_id() && ! current_user_can( 'manage_options' ) ) {
					$class = 'hidden';
				}
			}

			// roles can be co-instructor
			$instructor_roles = apply_filters( 'learn-press/co-instructor/instructor-roles', array(
				'administrator',
				'lp_teacher',
				'lpr_teacher'
			) );

			// get users
			$users       = array();
			$instructors = get_users( array( 'role__in' => $instructor_roles, 'exclude' => $post_author ) );
			foreach ( $instructors as $instructor ) {
				$users[ $instructor->ID ] = $instructor->user_login;
			}

			// show option when has user options
			$meta_box['fields'][] = array(
				'name'        => __( 'Co-Instructors', 'learnpress-co-instructor' ),
				'id'          => "_lp_co_teacher",
				'desc'        => sizeof( $users ) ? __( 'Colleagues will work with you.', 'learnpress-co-instructor' ) : wp_kses( __( 'There is no instructor to select. Create <a href="' . admin_url( "user-new.php" ) . '" target="_blank">here</a>.', 'learnpress-co-instructor' ), array(
					'a' => array(
						'href'   => array(),
						'target' => array()
					)
				) ),
				'class'       => $class,
				'multiple'    => true,
				'type'        => 'select_advanced',
				'placeholder' => __( 'Instructors', 'learnpress-co-instructor' ),
				'options'     => $users
			);

			return $meta_box;
		}

		/**
		 * Valid lessons.
		 *
		 * @return array
		 */
		public function co_instructor_valid_lessons() {
			$courses = $this->get_available_courses();

			return $this->get_available_lessons( $courses );
		}

		/**
		 * Valid quizzes.
		 *
		 * @return array
		 */
		public function co_instructor_valid_quizzes() {
			$courses = $this->get_available_courses();

			return $this->get_available_quizzes( $courses );
		}

		/**
		 * Valid questions.
		 *
		 * @return array
		 */
		public function co_instructor_valid_questions() {
			$quizzes = $this->co_instructor_valid_quizzes();

			return $this->get_available_questions( $quizzes );
		}

		/**
		 * Check Co-instructor processes.
		 */
		public function process_teacher() {
			global $post;
			if ( current_user_can( 'manage_options' ) ) {
				return;
			}

			$post_id = $post->ID;
			if ( current_user_can( LP_TEACHER_ROLE ) ) {
				if ( $post->post_author == get_current_user_id() ) {
					return;
				}
				$courses   = apply_filters( 'learn_press_valid_courses', array() );
				$lessons   = apply_filters( 'learn_press_valid_lessons', array() );
				$quizzes   = apply_filters( 'learn_press_valid_quizzes', array() );
				$questions = apply_filters( 'learn_press_valid_questions', array() );

				// get all types
				$all = array_merge( $courses, $lessons, $quizzes, $questions );

				if ( in_array( $post_id, $all ) ) {
					return;
				}

				//				wp_die( __( 'Sorry! You don\'t have permission to do this action', 'learnpress-co-instructor' ), 403 );
			}
		}

		/**
		 * Add co-instructor settings in admin settings.
		 *
		 * @param $settings
		 * @param $object
		 *
		 * @return array
		 */
		public function co_instructor_settings( $settings, $object ) {

			$instructor_setting = array(
				'title'       => __( 'Instructor', 'learnpress-co-instructor' ),
				'id'          => 'profile_endpoints[profile-instructor]',
				'default'     => 'instructor',
				'type'        => 'text',
				'placeholder' => '',
				'desc'        => __( 'This is a slug and should be unique.', 'learnpress-co-instructor' ) . sprintf( ' %s <code>[profile/admin/instructor]</code>', __( 'Example link is', 'learnpress-co-instructor' ) )
			);
			$instructor_setting = apply_filters( 'learn_press_page_settings_item_instructor', $instructor_setting, $settings, $object );

			$new_settings = array();

			foreach ( $settings as $index => $setting ) {

				$new_settings[] = $setting;

				if ( isset( $setting['id'] ) && $setting['id'] === 'profile_endpoints[profile-order-details]' ) {
					$new_settings[]     = $instructor_setting;
					$instructor_setting = false;
				}
			}

			if ( $instructor_setting ) {
				$new_settings[] = $instructor_setting;
			}

			return $new_settings;
		}

		/**
		 * Insert post author of items in course.
		 *
		 * @param $args
		 *
		 * @return mixed
		 */
		public function course_insert_item_args( $args ) {
			$owner               = $this->get_own_user_of_post();
			$args['post_author'] = $owner;

			return $args;
		}

		/**
		 * Insert post author of items in quiz.
		 *
		 * @param $args
		 * @param $quiz_id
		 *
		 * @return mixed
		 */
		public function quiz_insert_question_args( $args, $quiz_id ) {

			$author = get_current_user_id();

			if ( ! empty( $quiz_id ) ) {
				$post   = get_post( $quiz_id );
				$author = $post->post_author;
			}

			if ( ! empty( $author ) ) {
				$args['post_author'] = $author;
			}

			return $args;
		}

		/**
		 * Get own user.
		 *
		 * @return int
		 */
		public function get_own_user_of_post() {

			global $post;
			// Check if current user have permissions admin

			if ( current_user_can( 'administrator' ) && isset( $_REQUEST['_lp_course_author'] ) && ! empty( $_REQUEST['_lp_course_author'] ) ) {
				$this->user = $_REQUEST['_lp_course_author'];
			} else {
				$this->user = $post->post_author;
			}
			$this->user = absint( $this->user );

			return $this->user;
		}

		/**
		 * Add instructor tab in profile page.
		 *
		 * @param $tabs
		 *
		 * @return array
		 */
		public function add_profile_instructor_tab( $tabs ) {

			$tab = apply_filters( 'learn-press-co-instructor/profile-tab', array(
				'title'    => __( 'Instructor', 'learnpress-co-instructor' ),
				'callback' => array( $this, 'profile_instructor_tab_content' )
			), $tabs );

			$instructor_endpoint = LP()->settings->get( 'profile_endpoints.profile-instructor', 'instructor' );

			if ( empty( $instructor_endpoint ) || empty( $tab ) ) {
				return $tabs;
			}

			if ( in_array( $instructor_endpoint, array_keys( $tabs ) ) ) {
				return $tabs;
			}

			$instructor = array( $instructor_endpoint => $tab );

			$course_endpoint = LP()->settings->get( 'profile_endpoints.profile-courses' );

			if ( ! empty( $course_endpoint ) ) {

				$pos  = array_search( $course_endpoint, array_keys( $tabs ) ) + 1;
				$tabs = array_slice( $tabs, 0, $pos, true ) + $instructor + array_slice( $tabs, $pos, count( $tabs ) - 1, true );

			} else {
				$tabs = $tabs + $instructor;
			}

			return $tabs;
		}

		/**
		 * Get instructor tab content in profile page.
		 *
		 * @param $current
		 * @param $tab
		 * @param $user
		 */
		public function profile_instructor_tab_content( $current, $tab, $user ) {
			learn_press_get_template( 'profile-tab.php', array(
				'user'    => $user,
				'current' => $current,
				'tab'     => $tab
			), learn_press_template_path() . '/addons/co-instructors/', LP_ADDON_CO_INSTRUCTOR_PATH . '/templates/' );
		}

		/**
		 * Show list instructors in single course page.
		 */
		public function single_course_instructors() {
			$course = LP_Global::course();

			$course_id   = $course->get_id();
			$instructors = $this->get_instructors( $course_id );

			learn_press_get_template( 'single-course-tab.php', array( 'instructors' => $instructors ), learn_press_template_path() . '/addons/co-instructors/', LP_ADDON_CO_INSTRUCTOR_TEMPLATE );
		}

		/**
		 * Get all course instructors.
		 *
		 * @param $course_id
		 *
		 * @return mixed
		 */
		public function get_instructors( $course_id ) {
			if ( $course_id ) {
				$course_id = learn_press_get_course_id();
			}

			if ( ! $course_id ) {
				return false;
			}

			$instructors = learn_press_co_instructor_get_instructors( $course_id );

			return $instructors;
		}

		/**
		 * Excerpt duplicate post meta.
		 *
		 * @param $excerpt
		 * @param $old_post_id
		 * @param $new_post_id
		 *
		 * @return array
		 */
		public function excerpt_duplicate_post_meta( $excerpt, $old_post_id, $new_post_id ) {
			if ( ! in_array( '_lp_co_teacher', $excerpt ) ) {
				$excerpt[] = '_lp_co_teacher';
			}

			return $excerpt;
		}
	}

	add_action( 'plugins_loaded', array( 'LP_Addon_Co_Instructor', 'instance' ) );
}