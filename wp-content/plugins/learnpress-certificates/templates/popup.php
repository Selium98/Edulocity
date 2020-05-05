<?php
/**
 * Template for displaying certificate popup inside course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/certificates/popup.php.
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
<div id="certificate-popup">
	<?php learn_press_display_message( __( 'Congrats! You have achieved certificate.', 'learnpress-certificates' ) ); ?>
	<?php learn_press_certificate_get_template( 'details.php', array( 'certificate' => $certificate ) ); ?>
    <a href="" data-tooltip="<?php esc_attr_e( 'Click or press ESC to close.', 'learnpress-certificates' ); ?>"
       class="close-popup"></a>
</div>
