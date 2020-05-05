<?php
/**
 * Template for displaying add-to-cart button
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 2.2
 */

defined( 'ABSPATH' ) || exit();
$course     = learn_press_get_course();
$course_id  = $course->get_id();
$woopayment = LP()->settings()->get( 'woo-payment' );
?>
<?php if ( learn_press_is_course_archive() ) { ?>
    <input type="hidden" disabled="disabled" name="course_url"
           value="<?php echo esc_attr( get_permalink( $course_id ) ); ?>"/>
<?php } ?>
<?php if ( $woopayment['purchase_button'] == 'single' ) { ?>
    <input type="hidden" name="single-purchase" value="yes"/>
<?php } elseif ( $woopayment['purchase_button'] == 'cart' ) { ?>
    <button class="button button-add-to-cart" data-action="add-to-cart"
            data-block-content="yes"><?php _e( 'Add to cart', 'learnpress-woo-payment' ); ?></button>
<?php } ?>
<input type="hidden" name="add-to-cart" value="<?php echo $course_id; ?>"/>