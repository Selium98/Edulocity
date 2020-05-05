<div style="" class="parentlayerslidercont">
<div data-slider_options="<?php echo esc_attr(json_encode( $slider_options )); ?>" class="slider-pro wprlslayerslider" id="slider<?php echo $slider_id ?>" data-sliderid="<?php echo $slider_id ?>" data-iwidth="<?php echo esc_attr($slider_options['width']) ?>" data-iheight="<?php echo esc_attr($slider_options['height']) ?>">
    <div class="sp-slides">
    	<?php foreach ( $slides as $index => $slide ): ?>
        <?php

            if ( isset( $slide['attachid'] ) )
                $attach_data = wp_prepare_attachment_for_js( $slide['attachid'] );
            else
                $attach_data = false;

            if ( ! isset( $slide['animation'] ) || $slide['animation'] == '' )
                $slide['animation'] = esc_attr( $slider_options['slide_animation'] );
            
            if ( intval($slide['slideduration']) == 500 )
                $slide['slideduration'] = 1000;
        ?>
        <div class="sp-slide sp-slide<?php echo $index ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-slideduration="<?php echo intval($slide['slideduration']) ?>" data-animation="<?php esc_attr_e( $slide['animation'] ) ?>">

            <?php if ( ! empty( $slide['bgimage'] ) ): ?>
            
            <?php if ( $slider_options['lazy_load'] ): ?>
            
            <img class="sp-image" alt="<?php esc_attr_e( $attach_data['alt'] ) ?>" data-src="<?php echo esc_url($slide['bgimage']) ?>" src="<?php echo plugins_url('admin/img/blank.gif',ROCKETLAYERSLIDER_PLUGIN_ADMIN_DIRECTORY) ?>" />
            
            <?php else: ?>
            
            <img class="sp-image" alt="<?php esc_attr_e( $attach_data['alt'] ) ?>" src="<?php echo esc_url($slide['bgimage']) ?>" />
            
            <?php endif; ?>

            <?php endif; ?>
            
            <?php if ( $slider_options['thumbnails'] && is_array( $attach_data ) ): ?>
            <div class="sp-thumbnail">

                <?php if ( $slider_options['lazy_load'] ): ?>

                <img alt="" class="sp-thumbnail-image" data-src="<?php echo esc_url($attach_data['sizes']['thumbnail']['url']) ?>" src="<?php echo plugins_url('admin/img/blank.gif',ROCKETLAYERSLIDER_PLUGIN_ADMIN_DIRECTORY) ?>" />

                <?php else: ?>

                <img alt="" class="sp-thumbnail-image" src="<?php echo esc_url($attach_data['sizes']['thumbnail']['url']) ?>" />

                <?php endif; ?>

            </div>
            <?php endif; ?>
           <?php if ( is_admin() ) :?>
           <div class="wprls-layers">
           
            <?php foreach ( $slide['layers'] as $lindex => $layer ): ?>

             <?php

                $layer['origheight'] = $layer['height'];
                $layer['textwidth'] = $layer['width'];

                if ( $layer['height'] !== 'auto' )
                    $layer['height'] = $layer['height'].'px';

                if ( ! isset( $layer['textalign'] ) )
                    $layer['textalign'] = 'left';

                if ( $layer['width'] !== 'auto' )
                    $layer['textwidth'] = $layer['width'].'%';
            ?>
            
            <?php if ( empty($layer['type']) || $layer['type'] === 'text'  ) : ?>
            
            <div id="sp-layer<?php echo $index+1 . $lindex+1; ?>" data-type="text" class="sp-layer sp-layertext sp-layerindex<?php echo $lindex ?> sp-layer<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-sliderid="<?php echo $slider_id ?>" data-show-delay="<?php echo $layer['animationdelay']  ?>" data-delay="<?php echo $layer['animationdelay']  ?>" data-animation="<?php echo $layer['animation'] ?>" style="position:absolute;top:<?php echo $layer['top'] ?>px;left:<?php echo $layer['left'] ?>px;color:<?php echo $layer['tcolor'] ?>;font-size:<?php esc_attr_e($layer['tsize']) ?>px;width:<?php echo $layer['textwidth'] ?>;height:<?php echo $layer['height'] ?>;" data-oldwidth="<?php echo $layer['width'] ?>" data-oldtop="<?php echo $layer['top'] ?>" data-oldleft="<?php echo $layer['left'] ?>" data-ishide="<?php esc_attr_e( $layer['hideme'] ) ?>" data-hidewith="<?php esc_attr_e( $layer['hideme_animation'] ) ?>" data-hideafter="<?php echo intval( $layer['hideme_after'] ) ?>" data-font="<?php echo $layer['googlefont'] ?>">
                    
                    <p style="font-size:<?php echo $layer['tsize'] ?>px;background-color: <?php echo $layer['bgcolor'] ?>;height:<?php echo $layer['height'] ?>;" class="wprlslayertext wprlslayertext<?php esc_attr_e( $layer['textalign'] ); ?>">
                    <?php echo $layer['tcontent'] ?>
                    </p>

            </div>


            <?php endif; ?>

            <?php if ( $layer['type'] === 'link'  ) : ?>

            <div id="sp-layer<?php echo $index+1 . $lindex+1; ?>" data-type="link" class="sp-layer sp-layertext sp-layerlink sp-layerindex<?php echo$lindex ?> sp-layer<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-sliderid="<?php echo $slider_id ?>" data-layer-init="1" data-delay="<?php echo $layer['animationdelay']  ?>" data-animation="<?php echo $layer['animation'] ?>" style="position:absolute;top:<?php echo $layer['top'] ?>px;left:<?php echo $layer['left'] ?>px;color:<?php echo $layer['tcolor'] ?>;font-size:<?php echo $layer['tsize'] ?>px;width:<?php echo $layer['textwidth'] ?>;height:<?php echo $layer['height'] ?>;" data-oldwidth="<?php echo $layer['width'] ?>" data-oldtop="<?php echo $layer['top'] ?>" data-oldleft="<?php echo $layer['left'] ?>"><p style="font-size:<?php echo $layer['tsize'] ?>px;background-color: <?php echo $layer['bgcolor'] ?>;" class="wprlslayertext wprlslayertext<?php esc_attr_e( $layer['textalign'] ); ?>" data-ishide="<?php esc_attr_e( $layer['hideme'] ) ?>" data-hidewith="<?php esc_attr_e( $layer['hideme_animation'] ) ?>" data-hideafter="<?php echo intval( $layer['hideme_after'] ) ?>" data-font="<?php echo $layer['googlefont'] ?>">
                <?php echo $layer['linkbeforetext'] ?> 
                <a class="layercontentlink" style="color:<?php echo $layer['linkcolor'] ?>" target="_blank" href="<?php echo $layer['linkurl'] ?>"><?php echo $layer['linktext'] ?></a>
                <?php echo $layer['linkaftertext'] ?></p>
            </div>

            <?php endif; ?>

           

            <?php if ( $layer['type'] === 'image'  ) : ?>

            <div id="sp-layer<?php echo $index+1 . $lindex+1; ?>" class="sp-layer sp-layerimage sp-layerindex<?php echo$lindex ?> sp-layer<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-sliderid="<?php echo $slider_id ?>" data-layer-init="1" data-delay="<?php echo $layer['animationdelay']  ?>" data-animation="<?php echo $layer['animation'] ?>" style="position:absolute;top:<?php echo $layer['top'] ?>px;left:<?php echo $layer['left'] ?>px;background-color: <?php echo $layer['bgcolor'] ?>;color:<?php echo $layer['tcolor'] ?>;font-size:<?php echo $layer['tsize'] ?>px;width:<?php echo $layer['width'] ?>%;height:<?php echo $layer['height'] ?>" data-ishide="<?php esc_attr_e( $layer['hideme'] ) ?>" data-hidewith="<?php esc_attr_e( $layer['hideme_animation'] ) ?>" data-hideafter="<?php echo intval( $layer['hideme_after'] ) ?>">
                <img style="" src="<?php echo $layer['imageurl'] ?>" class="layercontenttypeimage" />
            </div>

            <?php endif; ?>

            <?php if ( $layer['type'] === 'video'  ) : ?>

            <div id="sp-layer<?php echo $index+1 . $lindex+1; ?>" class="sp-layer sp-layervideo sp-layerindex<?php echo$lindex ?> sp-layer<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-sliderid="<?php echo $slider_id ?>" data-layer-init="1" data-delay="<?php echo $layer['animationdelay']  ?>" data-animation="<?php echo $layer['animation'] ?>" style="position:absolute;top:<?php echo $layer['top'] ?>px;left:<?php echo $layer['left'] ?>px;background-color: <?php echo $layer['bgcolor'] ?>;color:<?php echo $layer['tcolor'] ?>;font-size:<?php echo $layer['tsize'] ?>px;width:<?php echo $layer['width'] ?>%;height:<?php echo $layer['height'] ?>;" data-width="<?php echo $layer['width'] ?>" data-height="<?php echo $layer['origheight'] ?>" data-ishide="<?php esc_attr_e( $layer['hideme'] ) ?>" data-hidewith="<?php esc_attr_e( $layer['hideme_animation'] ) ?>" data-hideafter="<?php echo intval( $layer['hideme_after'] ) ?>">
                
                <?php if ( $layer['videotype'] == 'youtube' || $layer['videotype'] == 'vimeo' ) : ?>
                <a class="sp-video sp-videoyouvim" href="<?php echo $layer['videourl'] ?>">

                    <?php if ( empty( $layer['videoposterurl'] ) ): ?>
                        <img src="<?php echo plugins_url('admin/img/default_poster_image.png',ROCKETLAYERSLIDER_PLUGIN_ADMIN_DIRECTORY) ?>" class="layercontenttypevideoimage" width="<?php echo $layer['width'] ?>" height="<?php echo $layer['height'] ?>" />
                    <?php else: ?>
                        <img src="<?php echo $layer['videoposterurl'] ?>" class="layercontenttypevideoimage" />
                    <?php endif; ?>
                </a>
                <?php endif; ?>

                <?php if ( $layer['videotype'] == 'html5' ) : ?>
                
                    <?php if ( empty( $layer['videoposterurl'] ) ): ?>
                    <video class="sp-video" poster="<?php echo plugins_url('admin/img/default_poster_image.png',ROCKETLAYERSLIDER_PLUGIN_ADMIN_DIRECTORY) ?>" width="<?php echo $layer['width'] ?>%" height="<?php echo $layer['height'] ?>" controls="controls" preload="none">
                    <?php else: ?>
                    <video class="sp-video" poster="<?php echo $layer['videoposterurl'] ?>" width="<?php echo $layer['width'] ?>%" height="<?php echo $layer['height'] ?>" controls="controls" preload="none">
                    <?php endif; ?>
                        <source src="<?php echo $layer['videourl'] ?>" type="video/mp4"/>
                    </video>
                

                <?php endif; ?>
                </div>
            <?php endif; //video endif ?>

            <?php if ( $layer['type'] === 'html'  ) : ?>
            
            <div id="sp-layer<?php echo $index+1 . $lindex+1; ?>" data-type="text" class="sp-layer sp-layertext sp-layerhtml sp-layerindex<?php echo $lindex ?> sp-layer<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-sliderid="<?php echo $slider_id ?>" data-show-delay="<?php echo $layer['animationdelay']  ?>" data-delay="<?php echo $layer['animationdelay']  ?>" data-animation="<?php echo $layer['animation'] ?>" style="position:absolute;top:<?php echo $layer['top'] ?>px;left:<?php echo $layer['left'] ?>px;color:<?php echo $layer['tcolor'] ?>;font-size:<?php echo $layer['tsize'] ?>px;width:<?php echo $layer['textwidth'] ?>;height:<?php echo $layer['height'] ?>;background-color: <?php echo $layer['bgcolor'] ?>" data-oldwidth="<?php echo $layer['width'] ?>" data-oldtop="<?php echo $layer['top'] ?>" data-oldleft="<?php echo $layer['left'] ?>" data-ishide="<?php esc_attr_e( $layer['hideme'] ) ?>" data-hidewith="<?php esc_attr_e( $layer['hideme_animation'] ) ?>" data-hideafter="<?php echo intval( $layer['hideme_after'] ) ?>" data-font="<?php echo $layer['googlefont'] ?>"><?php echo $this->html_content( $layer['hcontent'] ) ?></div>


            <?php endif; ?> <!-- end html layer tpe-->

            <?php endforeach; ?>
            </div> <!-- End <div class="wprls-layers"> -->
            <?php endif; ?>
        
            </div>
    	<?php endforeach; ?>
    
</div>
</div>
</div> <!-- end slider -->
<!-- CUSTOM CSS -->
<style><?php echo $slider_options['custom_css'] ?></style>
<!-- END CUSTOM CSS -->