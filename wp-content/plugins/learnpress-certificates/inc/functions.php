<?php
/**
 * @param string $template_name
 * @param array $args
 */
function learn_press_certificate_get_template( $template_name, $args = array() ) {
	learn_press_get_template( $template_name, $args, learn_press_template_path() . '/addons/certificates/', LP_ADDON_CERTIFICATES_PATH . '/templates/' );
}

/**
 * @param string $template_name
 * @param array $args
 *
 * @return string
 */
function learn_press_certificate_locate_template( $template_name ) {
	return learn_press_locate_template( $template_name, learn_press_template_path() . '/addons/certificates/', LP_ADDON_CERTIFICATES_PATH . '/templates/' );
}

function learn_press_certificates_button_download( $certificate ) {
	learn_press_certificate_get_template( 'buttons/download.php', array( 'certificate' => $certificate ) );
}

/**
 * @param LP_User_Certificate $certificate
 */
function learn_press_certificates_buttons( $certificate ) {

	if ( $socials = LP()->settings->get( 'certificates.socials' ) ) {

		$socials   = array_flip( $socials );
		$permalink = $certificate->get_permalink( '' );
		$text      = $certificate->get_title();

		foreach ( $socials as $k => $v ) {
			ob_start();
			switch ( $k ) {
				case 'twitter':
					?>
                    <a href="http://twitter.com/share" data-count="none" class="twitter-share-button" lang="en"
                       data-url="<?php echo esc_url( $permalink ); ?>"
                       data-text="<?php echo esc_attr( $text ); ?>"></a>
                    <script type="text/javascript">jQuery.getScript('https://platform.twitter.com/widgets.js')</script>
					<?php
					break;
				case 'facebook':
					?>
                    <div class="fb-like" href="<?php echo esc_url( $permalink ); ?>" width="180" send="false"
                         showfaces="false" action="like" data-share="true" data-layout="button"></div>
                    <script type="text/javascript">LP_Certificate.loadJs('//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5')</script>
					<?php
					break;
				case 'plusone':
					?>
                    <div class="g-plusone" data-href="<?php echo esc_url( $permalink ); ?>" data-size="medium"
                         data-annotation="none">
                    </div>
                    <script type="text/javascript">LP_Certificate.loadJs('https://apis.google.com/js/plusone.js')</script>
					<?php
					break;
			}
			$socials[ $k ] = ob_get_clean();
		}
	}
	learn_press_certificate_get_template( 'buttons.php',
		array(
			'socials'     => $socials,
			'certificate' => $certificate
		)
	);
}

add_action( 'learn-press/certificates/after-certificate-content', 'learn_press_certificates_buttons', 10 );

if ( ! function_exists( 'learn_press_certificate_can_get' ) ) {
	function learn_press_certificate_can_get( $course_id, $user_id ) {
		$user_item = learn_press_get_user_item( array(
			'user_id'  => $user_id,
			'item_id'  => $course_id,
			'ref_type' => LP_ORDER_CPT
		), true );
		if ( $user_item ) {
			$lp_cert_order = learn_press_get_user_item_meta( $user_item->user_item_id, '_lp_certificate_order_id', true );
			if ( $lp_cert_order && 'completed' == learn_press_get_order_status( $lp_cert_order ) ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'learn_press_certificate_buy_button' ) ) {
	function learn_press_certificate_buy_button( $course ) {
		if ( $course_id = $course->get_id() ) {
			LP_Global::set_course( $course );
			global $post;
			$post = get_post( $course_id );

			setup_postdata( $post );
			add_action( 'learn-press/before-purchase-button', 'learn_press_certificate_extra_fields' );
			add_filter( 'learn-press/purchase-course-button-text', 'learn_press_certificate_button_text' );

			learn_press_get_template( 'single-course/buttons/purchase.php', array( 'course' => $course ) );

			remove_action( 'learn-press/before-purchase-button', 'learn_press_certificate_extra_fields' );
			remove_filter( 'learn-press/purchase-course-button-text', 'learn_press_certificate_button_text' );
			wp_reset_postdata();
			LP_Global::reset();
		}
	}

	function learn_press_certificate_button_text() {
		return __( 'Buy now', 'learnpress-certificates');
	}

	function learn_press_certificate_extra_fields() {
		global $post;
		$cert_id = (int) get_post_meta( $post->ID, '_lp_cert', true );
		if ( $cert_id ) {
			$cert_price = (int) get_post_meta( $cert_id, '_lp_certificate_price', true );
			echo '<input type="hidden" name="_learnpress_certificate_id" value="' . $cert_id . '">';
			echo '<input type="hidden" name="_learnpress_certificate_price" value="' . $cert_price . '">';
		}
	}
}



function learn_press_certificate_get_font_folders(){
	$font_dir = dirname(LP_ADDON_CERTIFICATES_FILE).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR;
	$dirs = glob($font_dir.'*', GLOB_ONLYDIR);
	$fonts = array();
	foreach ($dirs as $font){
		$key = $value = pathinfo($font, PATHINFO_BASENAME);
		$fonts[$key] = $value;
	}
	return $fonts;
}

/**
 * Find font file ttf
 */
function learn_press_certificate_get_font_files($fontFamily=''){
	$font_dir = dirname(LP_ADDON_CERTIFICATES_FILE).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR;
	$fonts_path = array();
	if($fontFamily){
		$fonts_path = glob($font_dir."*/".$fontFamily."*.ttf");
	} else {
		$fonts_path = glob($font_dir."*/*.ttf");
	}
	
	$font_files = array();
	foreach ($fonts_path as $font_path){
		$font_files[str_replace($font_dir, '', $font_path)]=pathinfo($font_path, PATHINFO_FILENAME);
	}
	return $font_files;
}

function learn_press_certificate_generate_image_certificate( $cert, $context = 'save' ) {
	if( 'image' !== LP()->settings->get( 'certificates.cer_type' )){
		return;
	}
	if( is_string( $cert ) ) {
		$cert = LP_Certificate::get_cert_by_key( $cert );
	}
	ob_start();
	$cert_id = $cert->get_data('cert_id');

	# get cert_key
	$user_id = $cert->get_data('user_id');
	$course_id = $cert->get_data('course_id');
	$cert_key = LP_Certificate::get_cert_key( $user_id, $course_id, 0, false );

	# get image template path
	$uploads 	= wp_upload_dir();
	$img_template 	= str_replace( $uploads['baseurl'], $uploads['basedir'], $cert->get_template() );
	
	$img_type_int 	= exif_imagetype( $img_template );
	if( !is_numeric($img_type_int) || $img_type_int > 3 ) {
		echo __('Image template type is not support, please ', 'learnpress-certificate');
		die();
	}

	$img 		= null;
	$types 		= array( 1=>'gif', 2=>'jpeg', 3 =>'png' );
	$img_type 	= $types[$img_type_int];

	$fn = 'imagecreatefrom'.$img_type;
	$img = call_user_func($fn, $img_template);
	
	$font_dir = dirname(LP_ADDON_CERTIFICATES_FILE).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR;
	$font_default = $font_dir.'Roboto'.DIRECTORY_SEPARATOR.'Roboto-Regular.ttf';
	$layers = $cert->get_layers();
	foreach ( $layers as $layer ) {
		
		$font = (isset($layer->options['fontFile']))?$font_dir.$layer->options['fontFile']:$font_default;
		if(!file_exists($font)){
			$font = $font_default;
		}

		$text = $layer->options['text'];

		$option_fill = isset($layer->options['fill'])?$layer->options['fill']:'rgb(0, 0, 0)';
		preg_match('/(\d+),(\d+),(\d+)/i', $option_fill, $fill);
		if(!is_array($fill) || empty($fill) ){
			$split = str_split( str_replace('#', '', $option_fill), 2);
			$r = hexdec($split[0]);
			$g = hexdec($split[1]);
			$b = hexdec($split[2]);
		} else {
			$r = $fill[1];
			$g = $fill[2];
			$b = $fill[3];
		}
		
		
		# TODO: change left and top when user have angle
		// 	$angle = abs($layer->options['angle']);

		if( class_exists('LP_Certificate_Verified_Link_Layer') &&  $layer instanceof LP_Certificate_Verified_Link_Layer ){
			$content 	= file_get_contents($text);
			$qr_type 	= exif_imagetype($text);
			$file_name = $uploads['basedir'].DIRECTORY_SEPARATOR.'t_'.$user_id.time().'.'.$types[$qr_type];
			file_put_contents($file_name,$content);
			$fn_imagecreatefromtype = 'imagecreatefrom'.$types[$qr_type];
			$src = call_user_func($fn_imagecreatefromtype, $file_name);
			$src_size = getimagesize($file_name);
			$left 	= isset($layer->options['left']) && abs($layer->options['left']) ? abs($layer->options['left']) : 0;
			$top 	= isset($layer->options['top']) && abs($layer->options['top']) ? abs($layer->options['top']) : 0;
			imagecopy($img, $src, $left, $top, 0, 0, $src_size[0], $src_size[1]);
			unlink($file_name);
		} else {
			$text_color 	= imagecolorallocate($img, $r, $g, $b);
			$font_size 		= ( isset($layer->options['fontSize']) && abs($layer->options['fontSize'])) ? abs($layer->options['fontSize']):14;
			$angle 			= isset($layer->options['angle'])&& abs($layer->options['angle']) ? abs($layer->options['angle']):0;
			$bbox 			= imagettfbbox($font_size, $angle, $font, $text);
			$bbox_width 	= abs($bbox[0])+abs($bbox[2]);
			$bbox_height 	= abs($bbox[1])+abs($bbox[5]);
			
			$align 	= isset($layer->options['originX'])?$layer->options['originX']:'center';
			$left 	= isset($layer->options['left']) && abs($layer->options['left']) ? abs($layer->options['left']) : 0;
			$top 	= isset($layer->options['top']) && abs($layer->options['top']) ? abs($layer->options['top'])+$bbox_height/4 : 0;
			if( $align == 'center' ) {
				$left = $left-( $bbox_width/2 );
			} elseif ( $align == 'right' ) {
				$left = $left - $bbox_width;
			}
			$top = $top + ($bbox[0]);
			imagettftext($img, $font_size, $angle, $left, $top, $text_color, $font, $text);
		}
		// 	exit();
	}

	$res = null;
	$cert_dir = $uploads['basedir'].DIRECTORY_SEPARATOR.'learn-press-cert'.DIRECTORY_SEPARATOR.$user_id.DIRECTORY_SEPARATOR;
	if (!file_exists($cert_dir)) {
		mkdir($cert_dir, 0777, true);
	}
	if( $context == 'save' ) {
		$img_width =imagesx($img);
		$img_height = imagesy($img);
		$new_width = 400;
		$new_height = ($img_height * $new_width)/ $img_width;
		$img_thumb = imagecreatetruecolor($new_width, $new_height);
		$img_thumb_path = '';
		imagecopyresized( $img_thumb, $img,
				0, 0, 0, 0,
				$new_width, $new_height,
				$img_width, $img_height );
	}
	$img_path = '';
	imagesavealpha( $img, true );
	$error = ob_get_clean();

	# SHOW ERRORS
	if( $error && $context == 'view' ) {
		echo $error;
		exit();
	}

	$fn2 = 'image'.$img_type;
	if ($context == 'save') {
		$img_thumb_path = $cert_dir . $cert_key . '_thumb.'.$img_type;
		$img_path = $cert_dir . $cert_key . '.'.$img_type;
		call_user_func_array( $fn2, array( $img, $img_path ) );
		call_user_func_array( $fn2, array( $img_thumb, $img_thumb_path ) );
	} elseif ($context == 'view') {
		header ( 'Content-Type: image/'.$img_type );
		call_user_func($fn2, $img );
	}

	imagedestroy($img);
	if( $context == 'save' ) {
		imagedestroy($img_thumb);
		# add img url & thumbnail img to certificate meta
		$img_url = str_replace( $uploads['basedir'], $uploads['baseurl'], $img_path );
		$img_thumb_url = str_replace( $uploads['basedir'], $uploads['baseurl'], $img_thumb_path );

		$lp_certs_prev = get_user_meta( $user_id, '_lp_certs', true );
		$lp_certs = (array) $lp_certs_prev;
			$lp_certs[$cert_key] = array(
				'img_path' => $img_path, 
				'img_url' => $img_url, 
				'img_thumb_path' => $img_thumb_path,
				'img_thumb_url'=> $img_thumb_url);
		update_user_meta( $user_id, '_lp_certs', $lp_certs, $lp_certs_prev );
	}
	
}

function learn_press_certificate_generate_image_certificate_admin_thumbnail( $cert_id=null, $cert_template=null, $cert_layer=null, $context='save' ) {
	if($cert_id){
		$cert_template = get_post_meta( $cert_id,'_lp_cert_template', true );
		$cert_layers = get_post_meta( $cert_id, '_lp_cert_layers', true );
	}
	$img_template = $cert_template;
	# get image template path
	if(!$img_template){
		return;
	}
	ob_start();
	$uploads 	= wp_upload_dir();
	if(!file_exists($cert_template)){
		$img_template 	= str_replace( $uploads['baseurl'], $uploads['basedir'], $img_template );
	}
	$img_type_int 	= exif_imagetype( $img_template );
	if( !is_numeric($img_type_int) || $img_type_int > 3 ) {
		echo __('Image template type is not support, please ', 'learnpress-certificate');
		die();
	}
	$img 		= null;
	$types 		= array( 1=>'gif', 2=>'jpeg', 3 =>'png' );
	$img_type 	= $types[$img_type_int];
	$fn = 'imagecreatefrom'.$img_type;
	$img = call_user_func($fn, $img_template);
	
	$font_dir = dirname(LP_ADDON_CERTIFICATES_FILE).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR;
	$font_default = $font_dir.'Roboto'.DIRECTORY_SEPARATOR.'Roboto-Regular.ttf';
	$layers = $cert_layer;
	foreach ( $layers as $layer ){
		$font = isset($layer['fontFile'])?$font_dir.$layer['fontFile']:$font_default;
		if(!file_exists($font)){
			$font = $font_default;
		}
		
		$text = $layer['text'];
		
		$option_fill = isset($layer['fill'])?$layer['fill']:'rgb(0, 0, 0)';
		preg_match('/(\d+),(\d+),(\d+)/i', $option_fill, $fill);
		if(!is_array($fill) || empty($fill) ){
			$split = str_split( str_replace('#', '', $option_fill), 2);
			$r = hexdec($split[0]);
			$g = hexdec($split[1]);
			$b = hexdec($split[2]);
		} else {
			$r = $fill[1];
			$g = $fill[2];
			$b = $fill[3];
		}
		
		# TODO: change left and top when user have angle
		
		$text_color 	= imagecolorallocate($img, $r, $g, $b);
		$font_size 	= ( isset($layer['fontSize']) && abs($layer['fontSize'])) ? abs($layer['fontSize']):14;
		$angle 		= isset($layer['angle'])&& abs($layer['angle']) ? abs($layer['angle']):0;
		
		$bbox 		= imagettfbbox($font_size, $angle, $font, $text);
		$bbox_width 	= abs($bbox[0])+abs($bbox[2]);
		$bbox_height 	= abs($bbox[1])+abs($bbox[5]);
		
		$align 	= isset($layer['originX'])?$layer['originX']:'center';
		$left 	= isset($layer['left']) && abs($layer['left']) ? abs($layer['left']) : 0;
		$top 	= isset($layer['top']) && abs($layer['top']) ? abs($layer['top'])+$bbox_height/4 : 0;
		if( $align == 'center' ) {
			$left = $left-( $bbox_width/2 );
		} elseif ( $align == 'right' ) {
			$left = $left - $bbox_width;
		}
		$top = $top+($bbox[0]);
		
		imagettftext($img, $font_size, $angle, $left, $top, $text_color, $font, $text);
	}

	$res = null;
	$cert_dir = $uploads['basedir'].DIRECTORY_SEPARATOR.'learn-press-cert'.DIRECTORY_SEPARATOR.'thumbnails'.DIRECTORY_SEPARATOR;
	$cert_key = md5($cert_id.pathinfo($img_template,PATHINFO_FILENAME));
	if ( !file_exists($cert_dir) && $context == 'save' ) {
		mkdir( $cert_dir, 0777, true );
	}
	$img_width =imagesx($img);
	$img_height = imagesy($img);
	$new_width = 400;
	$new_height = ($img_height * $new_width)/ $img_width;
	$new_image = imagecreatetruecolor($new_width, $new_height);
	
	imagecopyresized( $new_image, $img,
			0, 0, 0, 0,
			$new_width, $new_height,
			$img_width, $img_height );
	
	$error = ob_get_clean();
	imagesavealpha( $new_image, true );
	if( $error && $context == 'view' ) {
		echo $error;
		exit();
	}
	$fn2 = 'image'.$img_type;
	$new_image_path = $cert_dir . $cert_key . '.'.$img_type;
	if ($context == 'save') {
		call_user_func_array( $fn2, array( $new_image, $new_image_path ) );
	} elseif ($context == 'view') {
		header ( 'Content-Type: image/'.$img_type );
		call_user_func($fn2, $img );
	}
	imagedestroy($img);
	imagedestroy($new_image);
	if($context == 'save') {
		$new_image_url = str_replace( $uploads['basedir'], $uploads['baseurl'], $new_image_path );
		return $new_image_url;
	}
}