<div class="wrap" id="settings-cont">
<h3><strong><ul><li><?php _e('In free version only 15 features are available. ')?> </li> 
   <li> <?php _e('In  <a href=http://web-settler.com/layer-slider-plugin> Premium Version</a> 50+ features are available <a href=http://web-settler.com/layer-slider-plugin> <b> Go Pro now. </b></a> ')?></li>
   </ul></strong></h3></br>
    <span>
            To Get Premium Support 24/7 E-mail us: <a href="mailto:umar2bajwa@gmail.com">umar2bajwa@gmail.com</a>
          <br />
           </span>
    <?php include wprls_view_admin_path( 'slider-settings' ) ?>
    
    <?php if ( isset( $_GET['post_id'] ) ): ?>
    <div id="wp_rls_slides_settings">
        <h2 id="wp_rls_slides_options">Slides Options</h2>

        <div class="wp_rls_container">
            <a id="btnAddPage" class="wp_rls_add_slide_button" href="javascript:;" id="btnAddPage" role="button"><i class="glyphicon glyphicon-plus"></i> Add Slide</a>  
            <ul id="pageTab" class="nav nav-tabs">
                <?php foreach ( $slides as $index => $slide ): ?>

                    <li class="<?php if ( $index == 0) echo "slidepage active" ?>"><a id="wp_rls_slide_tab" href="#page<?php echo $index+1 ?>" data-toggle="tab">Slide <?php echo $index+1 ?> <?php if ( ! $index == 0 ) echo '<button class="close" type="button" title="Remove this page">×</button>' ?></a></li>
                <?php endforeach; ?>
            </ul>

            

            <div id="pageTabContent" class="tab-content">
                <?php foreach ( $slides as $index => $slide ): ?>
                <div class="tab-pane <?php if ( $index == 0) echo "active" ?>" id="page<?php echo $index+1 ?>">
                <div class="tab-pane wprls-slide <?php if ( $index == 0) echo "active" ?> slide<?php echo $index+1 ?>" id="page<?php echo $index+1 ?>">
            
            <?php include wprls_view_admin_path( 'slide-options' ) ?>     
            
            <h3 id="rls_wp_slider_preview">Slide Preview</h3>
            
            <?php include wprls_view_admin_path( 'slider-preview' ) ?>
            
            

            <h3 id="rls_wp_layer_options">Layers</h3>
            
            <?php include wprls_view_admin_path( 'admin-slider-preview' ) ?>

            <div id="wp_rls_layer_positioning">
                
                <div id="wp_rls_panel_group" class="panel-group panelcont">
                    <?php  if ( ! empty( $slide['layers'] ) ): ?>
                    <div class="panel-group" id="accordion<?php echo $index+1 ?>">
                        
                        <?php foreach( $slide['layers'] as $lindex => $layer ): ?>
                        <div class="panel panel-default" data-slide="<?php echo $index+1 ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-layercount="<?php echo count($slide['layers']) ?>">
                            <div class="panel-heading"> <span class="glyphicon glyphicon-remove-circle pull-right "></span>

                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $index+1 ?>" href="#collapseOne<?php echo $index+1 . $lindex+1; ?>">
                                        Layer <?php echo $lindex+1; ?>
                                    </a>
                                </h4>

                            </div>
                            <div id="collapseOne<?php echo $index+1 . $lindex+1; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <textarea style="display: none" class="wprls_htmlcontent wprlshcontent<?php echo $index+1 . $lindex+1; ?>"><?php echo $layer['hcontent'] ?></textarea>
                                    <textarea style="display: none" class="wprls_textcontent wprlstcontent<?php echo $index+1 . $lindex+1; ?>"><?php echo $layer['tcontent'] ?></textarea>
                                    <input style="display: none" class="wprls_textalign wprlstextalign<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['textalign'] ?>">
                                    <input style="display: none" class="wprls_textgooglefont wprlstextgooglefont<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['googlefont'] ?>">

                                    <input style="display: none" class="wprls_linkurl wprlslinkurl<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['linkurl'] ?>">
                                    <input style="display: none" class="wprls_linkcolor wprlslinkcolor<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['linkcolor'] ?>">
                                    <input style="display: none" class="wprls_linktext wprlslinktext<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['linktext'] ?>">
                                    <input style="display: none" class="wprls_linkbeforetext wprlslinkbeforetext<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['linkbeforetext'] ?>">
                                    <input style="display: none" class="wprls_linkaftertext wprlslinkaftertext<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['linkaftertext'] ?>">

                                    <input style="display: none" class="wprls_imageurl wprlsimageurl<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['imageurl'] ?>">


                                    <input style="display: none" class="wprls_videourl wprlsvideourl<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['videourl'] ?>">

                                    <input style="display: none" class="wprls_videoposterurl wprlsvideoposterurl<?php echo $index+1 . $lindex+1; ?>" value="<?php echo $layer['videoposterurl'] ?>">

                                    <select style="display: none" class="wprls_videotype wprlsvideotype<?php echo $index+1 . $lindex+1; ?>">
                                      <option <?php selected( $layer['videotype'], 'youtube' ) ?> value="youtube">Youtube</option>
                                      <option <?php selected( $layer['videotype'], 'vimeo' ) ?> value="vimeo">Vimeo</option>
                                      <option <?php selected( $layer['videotype'], 'html5' ) ?> value="html5">HTML5</option>
                                      <option <?php selected( $layer['videotype'], 'videojs' ) ?> value="videojs">Video.js</option>
                                      <option <?php selected( $layer['videotype'], 'sublimevideo' ) ?> value="sublimevideo">SublimeVideo</option>
                                      <option <?php selected( $layer['videotype'], 'jw' ) ?> value="jw">JW Player</option>
                                    </select>



                                    <input type="button" id="wp_rls_layer_text" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button triggertextmodal mlayer<?php echo $index+1 . $lindex+1; ?>" value="Text" data-toggle="modal" data-target="#wp_rls_text_box" />
                                    <input type="button" id="wp_rls_layer_image"  data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button triggerimagemodal mlayer<?php echo $index+1 . $lindex+1; ?>" value="Image" data-toggle="modal" data-target="#wp_rls_image_box" />
                                    <input type="button" id="wp_rls_layer_video" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button triggervideomodal mlayer<?php echo $index+1 . $lindex+1; ?>"  value="Video" data-toggle="modal" data-target="#wp_rls_video_box" />
                                    <input type="button" id="wp_rls_layer_link" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button triggerlinkmodal mlayer<?php echo $index+1 . $lindex+1; ?>"  value="Link" data-toggle="modal" data-target="#wp_rls_link_box" />

                                    <input type="button" id="wp_rls_layer_html" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button triggerhtmlmodal mlayer<?php echo $index+1 . $lindex+1; ?>" value="HTML" data-toggle="modal" data-target="#wp_rls_html_box" />

                                    <table id="wp_rls_layers_table">

                                        <tr>
                                            <td>Type</td>

                                            <td>
                                                <select data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="input input--dropdown wp_rls_layer_box_type  inputlayertype inputlayertype<?php echo $index+1 . $lindex+1; ?>">
                                                    <option <?php selected( $layer['type'], 'text' ) ?> value="text">Text</option>
                                                    <option <?php selected( $layer['type'], 'image' ) ?> value="image">Image</option>
                                                    <option <?php selected( $layer['type'], 'video' ) ?> value="video">Video</option>
                                                    <option <?php selected( $layer['type'], 'link' ) ?> value="link">Link</option>
                                                    <option <?php selected( $layer['type'], 'html' ) ?> value="html">HTML</option>
                                                </select>
                                            </td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Layer Animation</td>

                                            <td> 

                                            <select class="input input--dropdown js--animations wp_rls_layer_box_animation  inputlayeranimation inputlayeranimation<?php echo $index+1 . $lindex+1; ?>">
                                              <option <?php selected( $layer['animation'], 'static' ) ?> value="static">static</option>
                                                <optgroup label="Attention Seekers">
                                                  <option <?php selected( $layer['animation'], 'bounce' ) ?> value="bounce">bounce</option>
                                                  <option <?php selected( $layer['animation'], 'flash' ) ?> value="flash">flash</option>
                                                  <option <?php selected( $layer['animation'], 'pulse' ) ?> value="pulse">pulse</option>
                                                  <option <?php selected( $layer['animation'], 'rubberBand' ) ?> value="rubberBand">rubberBand</option>
                                                  <option <?php selected( $layer['animation'], 'shake' ) ?> value="shake">shake</option>
                                                  <option <?php selected( $layer['animation'], 'swing' ) ?> value="swing">swing</option>
                                                  <option <?php selected( $layer['animation'], 'tada' ) ?> value="tada">tada</option>
                                                  <option <?php selected( $layer['animation'], 'wobble' ) ?> value="wobble">wobble</option>
                                                  <option <?php selected( $layer['animation'], 'jello' ) ?> value="jello">jello</option>
                                                </optgroup>

                                                <optgroup label="Bouncing Entrances">
                                                  <option <?php selected( $layer['animation'], 'bounceIn' ) ?> value="bounceIn">bounceIn</option>
                                                  <option <?php selected( $layer['animation'], 'bounceInDown' ) ?> value="bounceInDown">bounceInDown</option>
                                                  <option <?php selected( $layer['animation'], 'bounceInLeft' ) ?>  value="bounceInLeft">bounceInLeft</option>
                                                  <option <?php selected( $layer['animation'], 'bounceInRight' ) ?>  value="bounceInRight">bounceInRight</option>
                                                  <option <?php selected( $layer['animation'], 'bounceInUp' ) ?> value="bounceInUp">bounceInUp</option>
                                                </optgroup>

                                                <optgroup label="Bouncing Exits">
                                                  <option <?php selected( $layer['animation'], 'bounceOut' ) ?>  value="bounceOut">bounceOut</option>
                                                  <option <?php selected( $layer['animation'], 'bounceOutDown' ) ?>  value="bounceOutDown">bounceOutDown</option>
                                                  <option <?php selected( $layer['animation'], 'bounceOutLeft' ) ?>  value="bounceOutLeft">bounceOutLeft</option>
                                                  <option <?php selected( $layer['animation'], 'bounceOutRight' ) ?>  value="bounceOutRight">bounceOutRight</option>
                                                  <option <?php selected( $layer['animation'], 'bounceOutUp' ) ?>  value="bounceOutUp">bounceOutUp</option>
                                                </optgroup>

                                                <optgroup label="Fading Entrances">
                                                  <option <?php selected( $layer['animation'], 'fadeIn' ) ?> value="fadeIn">fadeIn</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInDown' ) ?> value="fadeInDown">fadeInDown</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInDownBig' ) ?> value="fadeInDownBig">fadeInDownBig</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInLeft' ) ?> value="fadeInLeft">fadeInLeft</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInLeftBig' ) ?> value="fadeInLeftBig">fadeInLeftBig</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInRight' ) ?> value="fadeInRight">fadeInRight</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInRightBig' ) ?> value="fadeInRightBig">fadeInRightBig</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInUp' ) ?> value="fadeInUp">fadeInUp</option>
                                                  <option <?php selected( $layer['animation'], 'fadeInUpBig' ) ?> value="fadeInUpBig">fadeInUpBig</option>
                                                </optgroup>

                                                <optgroup label="Flippers">
                                                  <option <?php selected( $layer['animation'], 'flip' ) ?> value="flip">flip</option>
                                                  <option <?php selected( $layer['animation'], 'flipInX' ) ?> value="flipInX">flipInX</option>
                                                  <option <?php selected( $layer['animation'], 'flipInY' ) ?> value="flipInY">flipInY</option>
                                                  <option <?php selected( $layer['animation'], 'flipOutX' ) ?> value="flipOutX">flipOutX</option>
                                                  <option <?php selected( $layer['animation'], 'flipOutY' ) ?> value="flipOutY">flipOutY</option>
                                                </optgroup>

                                                <optgroup label="Lightspeed">
                                                  <option <?php selected( $layer['animation'], 'lightSpeedIn' ) ?> value="lightSpeedIn">lightSpeedIn</option>
                                                </optgroup>

                                                <optgroup label="Rotating Entrances">
                                                  <option <?php selected( $layer['animation'], 'rotateIn' ) ?> value="rotateIn">rotateIn</option>
                                                  <option <?php selected( $layer['animation'], 'rotateInDownLeft' ) ?> value="rotateInDownLeft">rotateInDownLeft</option>
                                                  <option <?php selected( $layer['animation'], 'rotateInDownRight' ) ?> value="rotateInDownRight">rotateInDownRight</option>
                                                  <option <?php selected( $layer['animation'], 'rotateInUpLeft' ) ?> value="rotateInUpLeft">rotateInUpLeft</option>
                                                  <option <?php selected( $layer['animation'], 'rotateInUpRight' ) ?> value="rotateInUpRight">rotateInUpRight</option>
                                                </optgroup>



                                                <optgroup label="Sliding Entrances">
                                                  <option <?php selected( $layer['animation'], 'slideInUp' ) ?> value="slideInUp">slideInUp</option>
                                                  <option <?php selected( $layer['animation'], 'slideInDown' ) ?> value="slideInDown">slideInDown</option>
                                                  <option <?php selected( $layer['animation'], 'slideInLeft' ) ?> value="slideInLeft">slideInLeft</option>
                                                  <option <?php selected( $layer['animation'], 'slideInRight' ) ?> value="slideInRight">slideInRight</option>

                                                </optgroup>
                                               
                                                
                                                <optgroup label="Zoom Entrances">
                                                  <option <?php selected( $layer['animation'], 'zoomIn' ) ?> value="zoomIn">zoomIn</option>
                                                  <option <?php selected( $layer['animation'], 'zoomInDown' ) ?> value="zoomInDown">zoomInDown</option>
                                                  <option <?php selected( $layer['animation'], 'zoomInLeft' ) ?> value="zoomInLeft">zoomInLeft</option>
                                                  <option <?php selected( $layer['animation'], 'zoomInRight' ) ?> value="zoomInRight">zoomInRight</option>
                                                  <option <?php selected( $layer['animation'], 'zoomInUp' ) ?> value="zoomInUp">zoomInUp</option>
                                                </optgroup>
                                                
                                               

                                                <optgroup label="Specials">
                                                  <option <?php selected( $layer['animation'], 'hinge' ) ?> value="hinge">hinge</option>
                                                  <option <?php selected( $layer['animation'], 'rollIn' ) ?> value="rollIn">rollIn</option>
                                              
                                                </optgroup>



                                              </select>


                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                            
                                        </tr>

                                        <tr>
                                            <td>Layer Animation Delay</td>

                                            <td> <input value="<?php echo $layer['animationdelay']  ?>" id="wp_rls_layer_animation_delay" type="number" placeholder="ms" class="wp_rls_layer_box_animation_delay inputlayerdelay inputlayerdelay<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" /> (ms)</td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                        </tr>

                                        <tr>
                                            <td>Hide Layer</td>

                                            <td> 

                                                <div class="onoffswitch">
                                                     <input type="checkbox" name="hideme" class="onoffswitch-checkbox wprls_hide_me"  id="layer_hide_me<?php echo $index+1 . $lindex+1; ?>"  <?php checked( true, esc_attr($layer['hideme']) ) ?> />
                                                     <label class="onoffswitch-label" for="layer_hide_me<?php echo $index+1 . $lindex+1; ?>">
                                                     <span class="onoffswitch-inner"></span>
                                                     <span class="onoffswitch-switch"></span>
                                             
                                                    </label>
                                                </div>

                                            <td>
                                                With
                                                <select class="input input--dropdown js--animations wp_rls_hide_layer_box_animation  inputhidelayeranimation inputhidelayeranimation<?php echo $index+1 . $lindex+1; ?>">
                                                    <optgroup label="Bouncing Exits">
                                                  <option <?php selected( $layer['hideme_animation'], 'bounceOut' ) ?>  value="bounceOut">bounceOut</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'bounceOutDown' ) ?>  value="bounceOutDown">bounceOutDown</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'bounceOutLeft' ) ?>  value="bounceOutLeft">bounceOutLeft</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'bounceOutRight' ) ?>  value="bounceOutRight">bounceOutRight</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'bounceOutUp' ) ?>  value="bounceOutUp">bounceOutUp</option>
                                                </optgroup>

                                                <optgroup label="Fading Exits">
                                                  <option <?php selected( $layer['hideme_animation'], 'fadeOut' ) ?>  value="fadeOut">fadeOut</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'fadeOutDown' ) ?>  value="fadeOutDown">fadeOutDown</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'fadeOutLeft' ) ?>  value="fadeOutLeft">fadeOutLeft</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'fadeOutRight' ) ?>  value="fadeOutRight">fadeOutRight</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'fadeOutUp' ) ?>  value="fadeOutUp">fadeOutUp</option>
                                                </optgroup>

                                                <optgroup label="Rotating Exits">
                                                  <option <?php selected( $layer['hideme_animation'], 'rotateOut' ) ?> value="rotateOut">rotateOut</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'rotateOutDownLeft' ) ?> value="rotateOutDownLeft">rotateOutDownLeft</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'rotateOutDownRight' ) ?> value="rotateOutDownRight">rotateOutDownRight</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'rotateOutUpLeft' ) ?> value="rotateOutUpLeft">rotateOutUpLeft</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'rotateOutUpRight' ) ?> value="rotateOutUpRight">rotateOutUpRight</option>
                                            </optgroup>

                                            <optgroup label="Zoom Exits">
                                                  <option <?php selected( $layer['hideme_animation'], 'zoomOut' ) ?> value="zoomOut">zoomOut</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'zoomOutDown' ) ?> value="zoomOutDown">zoomOutDown</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'zoomOutLeft' ) ?> value="zoomOutLeft">zoomOutLeft</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'zoomOutRight' ) ?> value="zoomOutRight">zoomOutRight</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'zoomOutUp' ) ?> value="zoomOutUp">zoomOutUp</option>
                                                </optgroup>

                                                <optgroup label="Sliding Exits">
                                                  <option <?php selected( $layer['hideme_animation'], 'slideOutUp' ) ?> value="slideOutUp">slideOutUp</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'slideOutDown' ) ?> value="slideOutDown">slideOutDown</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'slideOutLeft' ) ?> value="slideOutLeft">slideOutLeft</option>
                                                  <option <?php selected( $layer['hideme_animation'], 'slideOutRight' ) ?> value="slideOutRight">slideOutRight</option>
                                                  
                                                </optgroup>

                                            </select>
                                        </td>

                                            <td>
                                                After
                                                <input value="<?php echo $layer['hideme_after']  ?>" id="wp_rls_hide_layer_animation_delay" type="number" placeholder="ms" class="wp_rls_hide_layer_box_animation_delay inputhidelayerdelay inputhidelayerdelay<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" />(ms)
                                            </td>
                                            <td></td>
                                            
                                        </tr>



                                        <tr>
                                            <td>Size & Position:</td>
                                            <td>Width <input value="<?php echo $layer['width']  ?>" id="wp_rls_layer_image_size_width" type="number" placeholder="%" class="wp_rls_layer_box_width inputlayerwidth inputlayerwidth<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" /> (%)</td>
                                            <td>Height <input value="<?php echo $layer['height']  ?>" id="wp_rls_layer_image_size_height" type="text" placeholder="px" class="wp_rls_layer_box_width wp_rls_layer_box_height inputlayerheight inputlayerheight<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
                                            <td>Top <input value="<?php echo $layer['top']  ?>" id="wp_rls_layer_top_position" class="wp_rls_layer_box_width wp_rls_layer_box_top inputlayertop inputlayertop<?php echo $index+1 . $lindex+1; ?>" type="number" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
                                            <td>Left <input value="<?php echo $layer['left']  ?>" id="wp_rls_layer_left_position" type="number" placeholder="px" class="wp_rls_layer_box_left wp_rls_layer_box_width inputlayerleft inputlayerleft<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
                                        </tr>
                                        <tr>
                                            <td>Text size</td>
                                            <td><input value="<?php echo $layer['tsize']  ?>" id="wp_rls_layer_text_size" type="number" class="wp_rls_layer_box_width wp_rls_layer_box_text_size inputlayertextsize inputlayertextsize<?php echo $index+1 . $lindex+1; ?>" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="layer_image_size">
                                            <td>Image size: </td>
                                            <td>Width <input value="<?php echo $layer['imgwidth']  ?>" id="wp_rls_layer_image_size_width" type="number" class="wp_rls_layer_box_width wp_rls_layer_box_image_width" placeholder="%" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (%)</td>
                                            <td>Height <input value="<?php echo $layer['imgheight']  ?>" id="wp_rls_layer_image_size_height" type="number" class="wp_rls_layer_box_width wp_rls_layer_box_image_height" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>" /> (px)</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Text color:</td>
                                            <td><input value="<?php echo $layer['tcolor']  ?>" id="wp_rls_layer_text_color" type="text" class="text-color-picker wp_rls_layer_box_width wp_rls_layer_box_text_color inputlayertextcolor inputlayertextcolor<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>Background color:</td>
                                            <td><input value="<?php echo $layer['bgcolor']  ?>" id="wp_rls_layer_bg_color" type="text" class="alpha-color-picker wp_rls_layer_box_width wp_rls_layer_box_bg_color inputlayerbgcolor inputlayerbgcolor<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            
                        </div> <?php endforeach; //layers loop ?>

                        </div>


                    <?php else: ?>

                        <div class="panel-group" id="accordion<?php echo $index+1 ?>"></div>

                    <?php endif; ?>



                        
                    
                    <button id="wp_rls_add_new_layer" class="btn btn-lg btn-primary btn-add-panel" data-slide="<?php echo $index+1 ?>" data-layercount="<?php echo count($slide['layers']) ?>"> 
                        <i class="glyphicon glyphicon-plus"></i> Add new Layer</button>
                        
                    </div>
                    
                </div>
            </div>
            
            
        </div>

        <?php endforeach; ?>
        
        <p class="submit"><input type="submit" name="submit" id="submit-slides" class="button button-primary" value="Save"></p>
        <?php endif; ?>
        
        <input type="hidden" value="<?php echo $nonce ?>" name="wprls_nonce" />

        <!-- Modal -->
        <?php include wprls_view_admin_path( 'slider-modals' ) ?>
        <!-- End Modal -->

        <?php if ( isset( $_GET['tab'] ) ): ?>
            <script>slidesTab();</script>
        <?php endif; ?>
        <div class="objectx"></div>
                <div class="objecty"></div>
                <p class="help_tips"><span>*</span>Double click on any layer in live preview box to edit.</p>
                <p class="help_tips"><span>*</span>Page will reload on slide delete or layer delete.</p>
                