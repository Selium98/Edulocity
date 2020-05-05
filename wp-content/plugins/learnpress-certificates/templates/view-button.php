<?php
/**
 * Template for displaying button to view certificate inside course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/certificates/view-button.php.
 *
 * @package LearnPress/Templates/Certificates
 * @author  ThimPress
 * @version 3.0.0
 */

defined( 'ABSPATH' ) or die();

if ( ! isset( $certificate ) ) {
	return;
}

?>
<form name="certificate-form-button" class="form-button" action="<?php echo $certificate->get_sharable_permalink(); ?>" method="post">
    <button><?php _e( 'Certificate', 'learnpress-certificates' ); ?></button>
</form>
