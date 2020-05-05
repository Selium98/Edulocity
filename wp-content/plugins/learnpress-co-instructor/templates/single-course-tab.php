<?php
/**
 * Template for displaying instructor tab in single course page.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/co-instructor/single-course-tab.php.
 *
 * @author ThimPress
 * @package LearnPress/Co-Instructor/Templates
 * @version 3.0.2
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

/**
 * @var $instructors
 */
if ( $instructors ) {
	foreach ( $instructors as $instructor_id ) {
		$user = get_userdata( $instructor_id );
		if ( $user ) {
			$lp_info = get_the_author_meta( 'lp_info', $instructor_id );
			$link    = learn_press_user_profile_link( $instructor_id );
			?>
            <div class="course-instructor-item">
                <div class="author-wrapper">
                    <div class="author-avatar">
						<?php echo get_avatar( $instructor_id, 110 ); ?>
                    </div>
                    <div class="author-bio">
                        <div class="author-top">
                            <a itemprop="url" class="name" href="<?php echo esc_url( $link ); ?>">
                                <span itemprop="name"><?php echo get_the_author_meta( 'display_name', $instructor_id ); ?></span>
                            </a>
							<?php if ( isset( $lp_info['major'] ) && $lp_info['major'] ) : ?>
                                <p class="job" itemprop="jobTitle"><?php echo esc_html( $lp_info['major'] ); ?></p>
							<?php endif; ?>
                        </div>

                    </div>
					<?php
					?>
                    <div class="author-description" itemprop="description">
						<?php echo get_the_author_meta( 'description', $instructor_id ); ?>
                    </div>
                </div>
            </div>
			<?php
		}
	}
}