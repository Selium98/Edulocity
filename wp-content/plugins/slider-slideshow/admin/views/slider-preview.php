<div id="wp_rls_layer_canvas" style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px">
                <div class="slider_preview" style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px">
                <div style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px" class="wprlslayers wprlslayers<?php echo $index+1 ?>">
                    <?php foreach( $slide['layers'] as $lindex => $layer ): ?>
                        <div data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="wprlslayercontent ui-widget-content parentlayercontent<?php echo $index+1 . $lindex+1; ?>" style="">

                        <?php
                            
                            if ( $layer['height'] !== 'auto' )
                                $layer['height'] = $layer['height'].'px';

                            if ( ! isset( $layer['textalign'] ) )
                                $layer['textalign'] = 'left';

                            if ( $layer['googlefont'] !== '' )
                                $googlefont = str_replace('+', ' ', $layer['googlefont']);
                            else
                                $googlefont = 'Lato';


                
                        ?>
                            
                            <?php if ( empty($layer['type']) || $layer['type'] === 'text'  ) : ?>

                            <div data-slideid="<?php echo $index+1 ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="layercontentcont layercontent<?php echo $index+1 . $lindex+1; ?>" style="background-color:<?php echo $layer['bgcolor'] ?>;color: <?php echo $layer['tcolor'] ?>; font-size: <?php echo $layer['tsize'] ?>px;width: <?php echo $layer['width'] ?>%; height: <?php echo $layer['height'] ?>;top: <?php echo $layer['top'] ?>px;left: <?php echo $layer['left'] ?>px;">
                            <span style="font-family: '<?php esc_attr_e( $googlefont ) ?>'" class="wprlslayertext wprlslayertext<?php esc_attr_e( $layer['textalign'] ); ?>"><?php echo $layer['tcontent'] ?></span></div>

                            <?php endif; ?>

                            <?php if ( $layer['type'] === 'link'  ) : ?>

                            <div data-slideid="<?php echo $index+1 ?>" data-type="link" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="layercontentcont layercontentlinkcont layercontent<?php echo $index+1 . $lindex+1; ?>" style="background-color:<?php echo $layer['bgcolor'] ?>;color: <?php echo $layer['tcolor'] ?>; font-size: <?php echo $layer['tsize'] ?>px;width: <?php echo $layer['width'] ?>%; height: <?php echo $layer['height'] ?>;top: <?php echo $layer['top'] ?>px;left: <?php echo $layer['left'] ?>px;">
                            <?php echo $layer['linkbeforetext'] ?> 
                            <a class="layercontentlink" target="_blank" href="<?php echo $layer['linkurl'] ?>" style="color:<?php echo $layer['linkcolor'] ?>"><?php echo $layer['linktext'] ?></a>
                            <?php echo $layer['linkaftertext'] ?>
                            </div>

                            <?php endif; ?>

                            <?php if ( $layer['type'] === 'image'  ) : ?>

                            <div data-slideid="<?php echo $index+1 ?>" data-type="image" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="layercontentcont layercontentimagecont layercontent<?php echo $index+1 . $lindex+1; ?>" style="background-color:<?php echo $layer['bgcolor'] ?>;color: <?php echo $layer['tcolor'] ?>; font-size: <?php echo $layer['tsize'] ?>px;width: <?php echo $layer['width'] ?>%; height: <?php echo $layer['height'] ?>;top: <?php echo $layer['top'] ?>px;left: <?php echo $layer['left'] ?>px;">
                            
                                <img style="" src="<?php echo $layer['imageurl'] ?>" class="layercontenttypeimage" />
                               
                            </div>

                            <?php endif; ?>

                            <?php if ( $layer['type'] === 'video'  ) : ?>

                            <div data-slideid="<?php echo $index+1 ?>" data-type="video" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="layercontentcont layercontentvideocont layercontent<?php echo $index+1 . $lindex+1; ?>" style="background-color:<?php echo $layer['bgcolor'] ?>;color: <?php echo $layer['tcolor'] ?>; font-size: <?php echo $layer['tsize'] ?>px;width: <?php echo $layer['width'] ?>%; height: <?php echo $layer['height'] ?>;top: <?php echo $layer['top'] ?>px;left: <?php echo $layer['left'] ?>px;">
                                <img src="<?php echo $layer['videoposterurl'] ?>" class="layercontenttypevideo" />
                            </div>

                            <?php endif; ?>

                            <?php if (  $layer['type'] === 'html'  ) : ?>

                            <div data-type="html" data-slideid="<?php echo $index+1 ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="layercontenthtml layercontentcont layercontent<?php echo $index+1 . $lindex+1; ?>" style="background-color:<?php echo $layer['bgcolor'] ?>;color: <?php echo $layer['tcolor'] ?>; font-size: <?php echo $layer['tsize'] ?>px;width: <?php echo $layer['width'] ?>%; height: <?php echo $layer['height'] ?>;top: <?php echo $layer['top'] ?>px;left: <?php echo $layer['left'] ?>px;">
                            <?php echo $layer['hcontent'] ?>
                            </div>

                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
                <img class="slider_preview_image" src="<?php echo $slide['bgimage'] ?>" style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px"/>
                
                </div>
            </div>