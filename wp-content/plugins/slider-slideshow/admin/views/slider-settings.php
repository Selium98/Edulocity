    
<style type="text/css">
    #premium_notice{
    color: #666;
    font-size: 18px;
    font-weight: 700;
    }
</style>

<form id="wprls_slider_form" class="" action="<?php echo $save_link ?>" method="POST">

        
        <?php if ( isset( $_GET['post_id'] ) ): ?>
            <input type="hidden" id="slideridvalue" name="postid" value="<?php echo esc_attr($_GET['post_id']) ?>" />
            <input type="hidden" id="sliderslidecount" name="sliderslidecount" value="<?php echo wprls_get_slides_count( $_GET['post_id'] ) ?>" />
        <?php else: ?>
            <input type="hidden"  id="slideridvalue" name="postid" value="" />
            <input type="hidden" id="sliderslidecount" name="sliderslidecount" value="1" />
        <?php endif; ?>
        
        <hr />
        <label for="rls_slider_name">Slider Name:</label>
        <input id="rls_slider_name" type="text" name="title" value="<?php echo $slider_options['title'] ?>" />
        <span id="rls_help_needed">Help Needed: 
            <a id="rls_docs" href="http://rocketplugins.com/layer-slider-for-wordpress/">Get Premium Layer Slider with 24/7 support</a>
        </span>
        
        <div id="wp_rls_menu_bar">
            <a href="#" class="wp_rls_menubuttons active" id="sliderTab" onClick="sliderTab()">Slider Settings</a>
            <?php if ( isset( $_GET['post_id'] ) ): ?>
            <a href="#" class="wp_rls_menubuttons" id="slidesTab" onClick="slidesTab()">Slides Settings</a>

            <div style="position: relative;width: 100%;left: 42%;">
                <span style="font-size: 13px;line-height:3.5;font-weight:bold">
                    Slider shortcode:  <span style="font-size:16px;font-style:italic;"> <input class="slider-shortcode-copy" type="text" value="[rlslider id=<?php echo intval($_GET['post_id']) ?>]" disabled /></span>
                </span>
            </div>
            <hr />
            
            <?php else: ?>
                <span  style="font-size: 16px;font-family: 'Open Sans';"><span style="line-height:3.5;margin-left:10px;">Click on the <strong>Create Slider</strong> button to create slider.</span></span>
            <?php endif; ?>

        </div>
        <div id="wp_rls_slider_settings">
            <div id="wp_rls_layout_settings" class="mediabox">

        <div class="wprls-accordion" id="wprls-accordion1">
          <div id="hed3"><h3><?php _e('General Settings')?></h3>
           <span class="heading_save_btn">
          <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
          </span></div>

          <table class="form-table">
                <tr valign='top'>
                <th scope='row'><?php _e('Responsive'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name="is_responsive" class="onoffswitch-checkbox"  id="is_responsive" <?php checked( true, $slider_options['is_responsive'] ) ?> />
                         <label class="onoffswitch-label" for="is_responsive">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         </label>
                    </div>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Width') ?></th>
                <td>
                   <label for="wprls_slider_width">
                         <input type="number" id="wprls_slider_width" name="width" value="<?php echo $slider_options['width'] ?>" /> 
                         <p class='description'><?php _e('Set slider width in px') ;?></p>
                         </label>
                    
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Height') ?></th>
                <td>
                   <label for="wprls_slider_height">
                         <input type="number" id="wprls_slider_height" name="height" value="<?php echo $slider_options['height'] ?>" /> 
                         <p class='description'><?php _e('Set slider height in px') ;?></p>
                         </label>
                    
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('AutoPlay Delay') ?></th>
                <td>
                        <label for="wprls_slider_autoplay_delay">
                            <input type="number" id="wprls_slider_autoplay_delay" name="autoplay_delay" value="<?php echo $slider_options['autoplay_delay'] ?>" /> 
                            <p class='description'><?php _e('Set autoplay time in miliseconds') ;?></p>
                         </label>
                    
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Autostart Slideshow'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name="auto_start" class="onoffswitch-checkbox"  id="wprls_slider_autostart" <?php checked( true, $slider_options['auto_start'] ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_autostart">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         </label>
                    </div>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Pause on Mouseover'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name='pause_on_mouse_over' class="onoffswitch-checkbox"  id="wprls_slider_pauseonmouse"  />
                         <label class="onoffswitch-label" for="wprls_slider_pauseonmouse">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <p class='description'><?php _e('Pause autostart slideshow on mouse hover') ;?></p>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Slides Order'); ?></th>
                <td>
                   <label><input type="radio" name="slide_order" <?php checked( 'seq', $slider_options['slide_order'] ) ?> value="seq" /> Sequential Order</label><br />
                    
                    <label><input type="radio" name="slide_order" <?php checked( 'rnd', $slider_options['slide_order'] ) ?> value="rnd" /> Random Order (<em>Random slide order</em>)</label>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Slides Animation'); ?></th>
                <td>
                   <label>
                    <select name="slide_animation">
                                <option value="fade" <?php selected( 'fade', $slider_options['slide_animation'] ) ?> >Fade</option>
                                <option disabled >Slide</option>
                                <option disabled >Rotate</option>
                                <option disabled >Opposite Rotate</option>
                                <option disabled >CubeX</option>
                                <option disabled >CubeY</option>
                                <option disabled >Cube3</option>
                                <option disabled >Bars3</option>
                                <option disabled >Cube5</option>
                                <option disabled >Bars5</option>
                                <option disabled >Zoom</option>
                                <option disabled >Zoom Out</option>
                                <option disabled >Wave</option>
                                <option disabled >Slice</option>
                                <option disabled >Puzzle</option>
                                <option disabled >Assemble</option>
                                <option disabled >Ripple</option>

                                
                        </select>
                        <br>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                   </label>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('AutoPlay Videos'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name="autoplay_vid" class="onoffswitch-checkbox"  id="wprls_slider_autoplay_vid" <?php checked( true, esc_attr($slider_options['autoplay_vid']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_autoplay_vid">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <p class='description'><?php _e('Set yes to autoplay videos on slide load') ;?></p>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Pause slideshow on video play'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name="pause_slideshow_vid" class="onoffswitch-checkbox"  id="wprls_slider_pause_slideshow_vid" <?php checked( true, esc_attr($slider_options['pause_slideshow_vid']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_pause_slideshow_vid">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <p class='description'><?php _e('Set yes to pause autoplay slideshow on video play.') ;?></p>
                </td>
                </tr>

        </table> </div> <!-- Close accordion -->


        <div class="wprls-accordion" id="wprls-accordion2">
        <div id="hed3"><h3><?php _e('Appearance')?></h3>
           <span class="heading_save_btn">
          <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
          </span></div>

          <table class="form-table">

            <tr valign='top'>
                <th scope='row'><?php _e('Full Width'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled class="onoffswitch-checkbox"  id="wprls_slider_full_width" <?php checked( true, esc_attr($slider_options['full_width']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_full_width">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Thumbnails'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled class="onoffswitch-checkbox"  id="wprls_slider_thumbnails" <?php checked( true, esc_attr($slider_options['thumbnails']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_thumbnails">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Thumbnails Position'); ?></th>
                <td>
                   <div class="">
                        <label>
                            <input type='radio'  disabled <?php checked( 'bottom', $slider_options['thumbnails_position'] ) ?> />
                            Bottom
                        </label>
                        <label style="margin-left: 14px">
                            <input type='radio'  disabled <?php checked( 'top', $slider_options['thumbnails_position'] ) ?> />
                            Top
                        </label>
                        <label style="margin-left: 14px">
                            <input type='radio'  disabled <?php checked( 'left', $slider_options['thumbnails_position'] ) ?> />
                            Left
                        </label>
                        <label style="margin-left: 14px">
                            <input type='radio'  disabled <?php checked( 'right', $slider_options['thumbnails_position'] ) ?> />
                            Right
                        </label>
                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Thumbnail Arrows'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled class="onoffswitch-checkbox"  id="wprls_slider_thumbnails_arrow" <?php checked( true, esc_attr($slider_options['thumbnails_arrow']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_thumbnails_arrow">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Full screen slider'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled class="onoffswitch-checkbox"  id="wprls_slider_full_screen" <?php checked( true, esc_attr($slider_options['full_screen']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_full_screen">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Responsive Text Layers'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled class="onoffswitch-checkbox"  id="wprls_slider_is_text_responsive" <?php checked( true, esc_attr($slider_options['is_text_responsive']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_is_text_responsive">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Navigation Arrows'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name="nav_arrows" class="onoffswitch-checkbox"  id="wprls_slider_nav_arrows" <?php checked( true, esc_attr($slider_options['nav_arrows']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_nav_arrows">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <p class='description'><?php _e('Set yes to show navigation arrows') ?></p>
            </td>
            </tr>

            <tr valign='top'>
                <th scope='row'><?php _e('Navigation Dots'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" name="nav_dots" class="onoffswitch-checkbox"  id="wprls_slider_nav_dots" <?php checked( true, esc_attr($slider_options['nav_dots']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_nav_dots">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <p class='description'><?php _e('Set yes to show navigation dots') ?></p>
            </td>
            </tr>


            <tr valign='top'>
                <th scope='row'><?php _e('Dots Position'); ?></th>
                <td>
                   <div class="">
                        <label>
                            <input type='radio' disabled value='bottom' name='dots_position' <?php checked( 'bottom', $slider_options['dots_position'] ) ?> />
                            Bottom
                        </label>
                        <label style="margin-left: 14px">
                            <input type='radio' disabled value='top' name='dots_position' <?php checked( 'top', $slider_options['thumbnails_position'] ) ?> />
                            Top
                        </label>
                        <label style="margin-left: 14px">
                            <input type='radio' disabled value='left' name='dots_position' <?php checked( 'left', $slider_options['dots_position'] ) ?> />
                            Left
                        </label>
                        <label style="margin-left: 14px">
                            <input type='radio' disabled value='right' name='dots_position' <?php checked( 'right', $slider_options['dots_position'] ) ?> />
                            Right
                        </label>
                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
            </td>
            </tr>

          </table>
        </div> <!-- close accordion 2 -->

    
        <div class="wprls-accordion" id="wprls-accordion3">
        <div id="hed3"><h3><?php _e('Design')?></h3>
            <span class="heading_save_btn">
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
            </span>
        </div>

          <table class="form-table">

                <tr valign='top'>
                    <th scope='row'><?php _e('Slide Background'); ?></th>
                    <td>
                        <label for="wprls_slider_slide_bgcolor">
                            <input type="text" id="wprls_slider_slide_bgcolor" disabled value="<?php esc_attr_e( $slider_options['slide_bgcolor'] ) ?>" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Slider Drop Shadow'); ?></th>
                <td>
                   <label>
                    <select name="slider_shadow">

                                <option value="0" <?php selected( '0', $slider_options['slider_shadow'] ) ?> >No Shadow</option>

                                <option selected value="1" >Effect 1</option>

                                <option disabled >Effect 2</option>

                                <option disabled >Effect 3</option>

                                <option disabled >Effect 4</option>

                                <option disabled >Effect 5</option>

                                <option disabled >Effect 6</option>

                                <option disabled >Effect 7</option>

                                <option disabled >Effect 8</option>

                                
                        </select>
                        <br>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                   </label>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Slider Border'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled class="onoffswitch-checkbox"  id="wprls_slider_border" <?php checked( true, esc_attr($slider_options['is_slider_border_color']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_slider_border">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Slider Border Color'); ?></th>
                    <td>
                        <label for="wprls_slider_border_color">
                            <input type="text" id="wprls_slider_border_color" disabled='disabled' value="#fff" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Selected Thumbnail Border Color'); ?></th>
                    <td>
                        <label for="wprls_slider_thumbnail_border_color">
                            <input type="text" id="wprls_slider_thumbnail_border_color" disabled value="<?php esc_attr_e( $slider_options['selected_thumb_border_color'] ) ?>" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Arrow Color'); ?></th>
                    <td>
                        <label for="wprls_slider_arrows_color">
                            <input type="text" id="wprls_slider_arrows_color" disabled value="<?php esc_attr_e( $slider_options['arrow_color'] ) ?>" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Arrow Size'); ?></th>
                    <td>
                        <label for="wprls_slider_arrows_size">
                            <input type="range" min="1" max="3" id="wprls_slider_arrows_size" disabled value="<?php esc_attr_e( intval($slider_options['arrow_size']) ) ?>" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Dots Color'); ?></th>
                    <td>
                        <label for="wprls_slider_dots_color">
                            <input type="text" id="wprls_slider_dots_color" disabled value="<?php esc_attr_e( $slider_options['dots_color'] ) ?>" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Dots Border Color'); ?></th>
                    <td>
                        <label for="wprls_slider_dots_border_color">
                            <input type="text" id="wprls_slider_dots_border_color" disabled value="<?php esc_attr_e( $slider_options['dots_border_color'] ) ?>" /> 
                            <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                         </label>
                        
                    </td>
                </tr>

                <tr valign='top'>
                    <th scope='row'><?php _e('Dots Size'); ?></th>
                    <td>
                        <label for="wprls_slider_dots_size">
                            <input type="number" min="5" size="10" max="50" id="wprls_slider_dots_size" disabled value="<?php echo intval( $slider_options['dots_size'] ) ?>" /> 
                         </label>
                         <br>
                         <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                        
                    </td>
                </tr>

            </table>
            </div> <!--Accordion 3 -->

            <div class="wprls-accordion" id="wprls-accordion4">
            <div id="hed3"><h3><?php _e('Advanced')?></h3>
                <span class="heading_save_btn">
                <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
                </span>
            </div>

            <table class="form-table">

                <tr valign='top'>
                <th scope='row'><?php _e('Lazy Loading'); ?></th>
                <td>
                   <div class="onoffswitch">
                         <input type="checkbox" disabled name="is_slider_lazy_load" class="onoffswitch-checkbox"  id="wprls_lazy_load" <?php checked( true, esc_attr($slider_options['lazy_load']) ) ?> />
                         <label class="onoffswitch-label" for="wprls_lazy_load">
                         <span class="onoffswitch-inner"></span>
                         <span class="onoffswitch-switch"></span>
                         </label>

                    </div>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                </td>
                </tr>

                <tr valign='top'>
                <th scope='row'><?php _e('Custom CSS'); ?></th>
                <td>
                    <textarea cols="60" disabled rows="15" name="custom_css" ><?php echo $slider_options['custom_css'] ?></textarea><br>
                    <b id="premium_notice">Premium Version <a href="http://web-settler.com/layer-slider-plugin/">Unlock Here</a> </b>
                </td>
                </tr>


            </table>

        </div> <!--Accordion 4 -->

                     
        </div> <!-- Close rls layout div -->
            

            <div id="wprls_slider_submit_cont">
            <?php if ( ! isset( $_GET['post_id'] ) ): ?>
                <?php submit_button( 'Create Slider' ); ?>
            <?php else: ?>
                <?php submit_button( 'Update Slider' ); ?>
            <?php endif; ?>
            </div>
            <input type="hidden" value="<?php echo $nonce ?>" name="wprls_nonce" />
            </form>
        </div> <!-- close wp_rls_slider_settings -->