<?php
/*
Plugin Name: LearnPress - Co-Instructors
Plugin URI: http://thimpress.com/learnpress
Description: Building courses with other instructors.
Author: ThimPress
Version: 3.0.7
Author URI: http://thimpress.com
Tags: learnpress, lms, add-on, co-instructor
Text Domain: learnpress-co-instructor
Domain Path: /languages/
*/

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

define( 'LP_ADDON_CO_INSTRUCTOR_FILE', __FILE__ );
define( 'LP_ADDON_CO_INSTRUCTOR_VER', '3.0.7' );
define( 'LP_ADDON_CO_INSTRUCTOR_REQUIRE_VER', '3.0.0' );

if ( ! class_exists( 'LP_Co_Instructor_Preload' ) ) {

	/**
	 * Class LP_Co_Instructor_Preload
	 */
	class LP_Co_Instructor_Preload {

		/**
		 * LP_Co_Instructor_Preload constructor.
		 *
		 * @since 3.0.0
		 */
		public function __construct() {
			add_action( 'learn-press/ready', array( $this, 'add_on_loaded' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );
			register_activation_hook( __FILE__, array( $this, 'install' ) );
			register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );
		}

		/**
		 * Load plugin main class.
		 *
		 * @since 3.0.0
		 */
		public function add_on_loaded() {
			LP_Addon::load( 'LP_Addon_Co_Instructor', 'inc/load.php', __FILE__ );
			remove_action( 'admin_notices', array( $this, 'admin_notices' ) );

		}

		/**
		 * Require Learnpress.
		 */
		public function admin_notices() {
			?>
            <div class="error">
                <p><?php echo wp_kses(
						sprintf(
							__( '<strong>%s</strong> addon version %s requires %s version %s or higher is <strong>installed</strong> and <strong>activated</strong>.', 'learnpress-co-instructor' ),
							__( 'LearnPress Co-Instructor', 'learnpress-co-instructor' ),
							LP_ADDON_CO_INSTRUCTOR_VER,
							sprintf( '<a href="%s" target="_blank"> <strong>%s</strong></a>', admin_url( 'plugin-install.php?tab=search&type=term&s=learnpress' ), __( 'LearnPress', 'learnpress-co-instructor' ) ),
							LP_ADDON_CO_INSTRUCTOR_REQUIRE_VER
						),
						array(
							'a'      => array(
								'href'  => array(),
								'blank' => array()
							),
							'strong' => array()
						)
					); ?>
                </p>
            </div>
			<?php
		}

		/**
		 * Plugin install, add teacher capacities.
		 *
		 * @since 3.0.0
		 *
		 */
		public static function install() {
			$teacher = get_role( 'lp_teacher' );
			if ( $teacher ) {
				$teacher->add_cap( 'edit_others_lp_lessons' );
				$teacher->add_cap( 'edit_others_lp_courses' );
			}
		}

		/**
		 * Plugin uninstall, remove teacher capacities.
		 *
		 * @since 3.0.0
		 */
		public static function uninstall() {
			$teacher = get_role( 'lp_teacher' );
			if ( $teacher ) {
				$teacher->remove_cap( 'edit_others_lp_lessons' );
				$teacher->remove_cap( 'edit_others_lp_courses' );
			}
		}
	}
}

new LP_Co_Instructor_Preload();