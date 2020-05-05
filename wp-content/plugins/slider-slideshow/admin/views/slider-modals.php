    <div class="modal fade" id="wp_rls_html_box" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter HTML</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                        
                        <?php wp_editor( '', 'wprlshtmlcontent', array(
                            
                                'editor_height' => 300,
                                
                            )); 
                        ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modalbtn-html" class="btn btn-primary btn-lg" >Update layer HTML</button>
                        <p class="description"><strong>Tip: </strong>Change layer type to HTML from layer edit box.</p>
                        <p class="description">Your site theme can change html layer styling.</p>
                        <p class="description">Use other layer types if you are not comfortable with editing the code.</p>
                        <p class="description">Set background color of the layer to transparent.</p>
                    </div>
                </div>

            </div>
        </div>



        <div class="modal fade" id="wp_rls_url_box" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Unlock Content Types</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please purchase the paid version of the plugin to unlock layer content types.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="http://rocketplugins.com/layer-slider-for-wordpress/" class="btn btn-default" >Purchase</a>
                    </div>
                </div>

            </div>
        </div>




        <div class="modal fade" id="wp_rls_text_box" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter Text</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                        <?php wp_editor( '', 'wprlstextcontent', array(
                            'media_buttons' => false,
                            'quicktags' => false,
                            'teeny' => true
                        ) ); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="textalign">Text align</label>
                            <select class="form-control wprlslayertextalign" id="textalign">
                              <option value="left">Left</option>
                              <option value="center">Center</option>
                              <option value="right">Right</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="googlefonts">Google Fonts</label>
                            <table>
                                <tr>
                                </tr>
                                <td>
                                    <input type="text" value="" class="form-control wprlslayergooglefont" id="googlefonts" />
                                </td>
                            </tr>
                        </table>
                              
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modalbtn-text" class="btn btn-primary btn-lg" >Update layer text</button>
                       
                        <p class="description"><strong>Important: </strong>Using too many different Google Fonts for each layer may slow your site.</p>
                        
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="wp_rls_image_box" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Layer</h4>
                    </div>
                    <div class="modal-body">
                        
                        <img class="upload_image_modal" id="wp_rls_layer_background_img" src="<?php echo plugins_url( '../img/not_set.png', __FILE__ ) ?>" />
                        <input class="image_attach_url" type="hidden" value="" />
                        <img src="" class="image_modal_preview" />
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modalbtn-image" class="btn btn-primary btn-lg" >Update Image Layer</button>
                        <p class="description"><strong>Tip: </strong>Change layer type to Image from layer edit box.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="wp_rls_video_box" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Layer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="videotype">Video Type</label>
                            <select class="form-control wprlslayervideotype" id="videotype">
                              <option value="youtube">Youtube</option>
                              <option value="vimeo">Vimeo</option>
                              <option value="html5">HTML5</option>
                              <option value="videojs">Video.js</option>
                              <option value="sublimevideo">SublimeVideo</option>
                              <option value="jw">JW Player</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="videourl">Video URL</label>
                            <input type="url" class="form-control wprlslayervideourl" id="videourl">
                            <p class="help-block">Supported: YouTube, Vimeo, HTML5, Video.js, SublimeVideo, and JW</p>
                        </div>
                        <div class="form-group">
                            <label for="posterimage">Poster Image URL</label>
                            <input type="url" class="form-control wprlslayervideoposterurl" id="posterimage">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modalbtn-video" class="btn btn-primary btn-lg" >Update Video Layer</button>
                        <p class="description"><strong>Tip: </strong>Change layer type to Video from layer edit box.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="wp_rls_link_box" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Layer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="linkurl">URL</label>
                            <input type="url" class="form-control wprlslayerlinkurl" id="linkurl">
                        </div>
                        <div class="form-group">
                            <label for="linktext">Link Text:</label>
                            <input type="text" class="form-control wprlslayerlinktext" id="linktext">
                        </div>
                        <div class="form-group">
                            <label for="linkbeforetext">Before Link Text:</label>
                            <input type="text" class="form-control wprlslayerlinkbeforetext" id="beforelinktext">
                        </div>
                        <div class="form-group">
                            <label for="linkaftertext">After Link Text:</label>
                            <input type="text" class="form-control wprlslayerlinkaftertext" id="afterlinktext">
                        </div>
                        <div class="form-group">
                            <label for="linkaftertext">Link Color:</label>
                            <input type="text" class="form-control wprlslayerlinkcolor link-color-picker" id="afterlinktext" value="#337ab7">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modalbtn-link" class="btn btn-primary btn-lg" >Update Link Data</button>
                        <p class="description"><strong>Tip: </strong>Change layer type to Link from layer edit box.</p>
                    </div>
                </div>

            </div>
        </div>