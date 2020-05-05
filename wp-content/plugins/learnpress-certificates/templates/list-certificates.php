<?php
/**
 * Template for displaying user's certificates in profile page.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/certificates/list-certificates.php.
 *
 * @author  ThimPress
 * @package LearnPress/Certificates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) or exit;
$cert_image = ( 'image' == LP()->settings->get( 'certificates.cer_type' ));

if ( $certificates ) {
	?>
    <h3 class="profile-heading"><?php esc_html_e( 'Certificates', 'learnpress-certificates' ); ?></h3>
    <ul class="learn-press-courses profile-certificates">
		<?php foreach ( $certificates as $course_id => $data ) {
			$course      = learn_press_get_course( $course_id );
			$_lp_certificate_price = get_post_meta($data['cert_id'], '_lp_certificate_price', true);
		    if ( !$_lp_certificate_price || ($_lp_certificate_price && $can_get_cert = learn_press_certificate_can_get($data['course_id'], $data['user_id']))) {?>
            <li class="course">
				<?php
				$certificate = new LP_User_Certificate( $data );
				$template_id = uniqid( $certificate->get_uni_id() );
				?>
                <a href="<?php echo $certificate->get_sharable_permalink(); ?>" class="course-permalink">
                    <div class="course-thumbnail">
                    	<?php 
                    	if(!$cert_image){
                    	?>
                        <div id="<?php echo $template_id; ?>" class="certificate-preview">
                            <div class="certificate-preview-inner">
                                <img class="cert-template" src="<?php echo $certificate->get_template(); ?>">
                                <canvas></canvas>
                            </div>
                        </div>
                        <?php 
                    	} else {
                            $cert_thumb = '';
                            $file_path = $certificate->get_file_path();
                            if(isset($file_path['img_thumb_url'])){
                                $cert_thumb = $file_path['img_thumb_url'];
                            }
                    	?>
                    		<img class="cert-template" src="<?php echo esc_url($cert_thumb);?>"/>
                    	<?php 
                    	}?>
                    </div>
                </a>
                <h4 class="course-title">
                    <a href="<?php echo $course->get_permalink();?>"><?php echo $course->get_title(); ?></a>
                </h4>
            </li>
            <script type="text/javascript">

                jQuery(function ($) {
                    window.certificates = window.certificates || [];
                    window.certificates.push(new LP_Certificate('#<?php echo $template_id;?>', <?php echo $certificate;?>));
                })

            </script>
		<?php } else { ?>
			    <li class="course">
                    <p><?php echo sprintf( __( 'In order to get the certificate of the %s course, please pay first!', 'learnpress-certificates' ), '<a href="' . $course->get_permalink() . '">' . $course->get_title() . '</a>' );?></p>
			    <?php learn_press_certificate_buy_button($course); ?>
			    </li>
        <?php    }
        } ?>
    </ul>
<?php } else {
	learn_press_display_message( __( 'No certificates!', 'learnpress-certificates' ) );
} ?>
