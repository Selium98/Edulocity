<?php

function mo_openid_customise_social_icons(){
    ?><br/>
    <form id="form-apps" name="form-apps" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_customise_social_icons" />
        <input type="hidden" name="mo_openid_customise_social_icons_nonce" value="<?php echo wp_create_nonce( 'mo-openid-customise-social-icons-nonce' ); ?>"/>

        <div style="min-height: 608px" class="mo_openid_table_layout">
            <div style="float: left;width: 55%;">
                <div style="width: 100%;">
                    <div style="float:left;width:50%;">
                        <label style="font-size: 1.2em;"><b><?php echo mo_sl('Shape');?></b><br></label>
                        <label class="mo-openid-radio-container"><?php echo mo_sl('Round');?>
                            <input type="radio" id="mo_openid_login_shape_round"  name="mo_openid_login_theme" value="circle" onclick="shape_change();checkLoginButton();moLoginPreview(document.getElementById('mo_login_icon_size').value ,'circle',setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" <?php checked( get_option('mo_openid_login_theme') == 'circle' );?> /><br>
                            <span class="mo-openid-radio-checkmark"></span></label>
                        <label class="mo-openid-radio-container"><?php echo mo_sl('Rounded Edges');?>
                            <input type="radio" id="mo_openid_login_shape_rounded_edges" name="mo_openid_login_theme" value="oval" onclick="shape_change();checkLoginButton();moLoginPreview(document.getElementById('mo_login_icon_size').value ,'oval',setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)"  <?php checked( get_option('mo_openid_login_theme') == 'oval' );?> /><br>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo mo_sl('Square');?>
                            <input type="radio" id="mo_openid_login_shape_square" name="mo_openid_login_theme" value="square" onclick="shape_change();checkLoginButton();moLoginPreview(document.getElementById('mo_login_icon_size').value ,'square',setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" <?php checked( get_option('mo_openid_login_theme') == 'square' );?> /><br>
                            <span class="mo-openid-radio-checkmark"></span></label>
                        <label class="mo-openid-radio-container"><?php echo mo_sl('Long Button');?>
                            <input type="radio" id="mo_openid_login_shape_longbutton" name="mo_openid_login_theme" value="longbutton" onclick="shape_change();checkLoginButton();moLoginPreview(document.getElementById('mo_login_icon_width').value ,'longbutton',setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" <?php checked( get_option('mo_openid_login_theme') == 'longbutton' );?> /><br>
                            <span class="mo-openid-radio-checkmark"></span></label>
                    </div>
                    <div style="float: right; width: 50%;">
                        <label style="font-size: 1.2em;"><b><?php echo mo_sl('Theme');?></b><br></label>
                        <label class="mo-openid-radio-container"><?php echo mo_sl('Default');?>
                            <input type="radio" id="mo_openid_default_background_radio" name="mo_openid_login_custom_theme"
                                   value="default" onclick="checkLoginButton();moLoginPreview(setSizeOfIcons(), setLoginTheme(),'default',document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)"
                                <?php checked( get_option('mo_openid_login_custom_theme') == 'default' );?> /><br>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo mo_sl('Custom background*');?>
                            <input type="radio" id="mo_openid_custom_background_radio"  name="mo_openid_login_custom_theme" value="custom" onclick="checkLoginButton();moLoginPreview(setSizeOfIcons(), setLoginTheme(),'custom',document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)"
                                <?php checked( get_option('mo_openid_login_custom_theme') == 'custom' );?> /><br>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <input id="mo_login_icon_custom_color" style="width:135px;" name="mo_login_icon_custom_color"  class="color" value="<?php echo esc_attr(get_option('mo_login_icon_custom_color'))?>" onchange="moLoginPreview(setSizeOfIcons(), setLoginTheme(),'custom',document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" >
                    </div>

                </div>
                <div style="width: 85%; float: left" class="mo_openid_note_style"><strong><?php echo mo_sl('*Custom background:');?></strong> <?php echo mo_sl('This will change the background color of login icons');?>.</div>
                <div style="width: 100%; float: left">
                    <div style="float:left;width:50%; margin-top: 5%">
                        <label style="font-size: 1.2em;"><b><?php echo mo_sl('Size of Icons');?></b></label>
                        <div id="long_button_size">
                            <?php echo mo_sl('Width:');?> &nbsp;<input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 16%;margin-bottom: 3px" id="mo_login_icon_width" onkeyup="moLoginWidthValidate(this)" name="mo_login_icon_custom_width" type="text" value="<?php echo esc_attr(get_option('mo_login_icon_custom_width'))?>" >
                            <input id="mo_login_width_plus" type="button" value="+" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_width').value ,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" >
                            <input id="mo_login_width_minus" type="button" value="-" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_width').value ,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" ><br/>
                            <?php echo mo_sl('Height:');?>&nbsp;<input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 16%;margin-bottom: 3px" id="mo_login_icon_height" onkeyup="moLoginHeightValidate(this)" name="mo_login_icon_custom_height" type="text" value="<?php echo esc_attr(get_option('mo_login_icon_custom_height'))?>" >
                            <input id="mo_login_height_plus" type="button" value="+" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_width').value,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" >
                            <input id="mo_login_height_minus" type="button" value="-" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_width').value,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" ><br/>
                            <?php echo mo_sl('Curve:');?>&nbsp;&nbsp;<input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 16%;margin-bottom: 3px" id="mo_login_icon_custom_boundary" onkeyup="moLoginBoundaryValidate(this)" name="mo_login_icon_custom_boundary" type="text" value="<?php echo esc_attr(get_option('mo_login_icon_custom_boundary'))?>" />
                            <input id="mo_login_boundary_plus" type="button" value="+" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_width').value,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" />
                            <input id="mo_login_boundary_minus" type="button" value="-" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_width').value,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_height').value,document.getElementById('mo_login_icon_custom_boundary').value)" />
                        </div>
                        <div id="other_button_size">
                            <input style="width:50px" id="mo_login_icon_size" onkeyup="moLoginSizeValidate(this)" name="mo_login_icon_custom_size" type="text" value="<?php echo esc_attr(get_option('mo_login_icon_custom_size'))?>">
                            <input id="mo_login_size_plus" type="button" value="+" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_size').value ,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" />
                            <input id="mo_login_size_minus" type="button" value="-" onmouseup="moLoginPreview(document.getElementById('mo_login_icon_size').value ,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" />
                        </div>
                    </div>
                    <div style="width: 50%;float: right;margin-top: 5%">
                        <label style="font-size: 1.2em;"><b><?php echo mo_sl('Space between Icons');?></b></label><br/>
                        <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 16%;margin-bottom: 3px" onkeyup="moLoginSpaceValidate(this)" id="mo_login_icon_space" name="mo_login_icon_space" type="text" value="<?php echo esc_attr(get_option('mo_login_icon_space'))?>"/>
                        <input id="mo_login_space_plus" type="button" value="+" onmouseup="moLoginPreview(setSizeOfIcons() ,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" />
                        <input id="mo_login_space_minus" type="button" value="-" onmouseup="moLoginPreview(setSizeOfIcons()  ,setLoginTheme(),setLoginCustomTheme(),document.getElementById('mo_login_icon_custom_color').value,document.getElementById('mo_login_icon_space').value,document.getElementById('mo_login_icon_custom_boundary').value)" />
                    </div>
                </div>
                <div style="width: 100%; float: left">
                    <br><hr>
                    <h4 style="font-size: 1.2em"><?php echo mo_sl('Customize Text For Social Login Buttons / Icons');?></h4>
                    <div style="width: 100%">
                        <div style="width: 40%; float: left">
                            <label class="mo_openid_fix_fontsize"><?php echo mo_sl('Select color for customize text:');?></label>
                        </div>
                        <div style="width: 60%; float: right;">
                            <input id="mo_openid_table_textbox" name="mo_login_openid_login_widget_customize_textcolor"  class="color" value="<?php echo esc_attr(get_option('mo_login_openid_login_widget_customize_textcolor'))?>" >
                        </div>
                    </div>
                    <div style="width: 100%; margin-top: 12%">
                        <div style="width: 100%;">
                            <label class="mo_openid_fix_fontsize"><?php echo mo_sl('Enter text to show above login widget:');?></label>
                            <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" type="text" name="mo_openid_login_widget_customize_text" value="<?php echo esc_attr(get_option('mo_openid_login_widget_customize_text')); ?>" />
                        </div>
                    </div>
                    <div style="width: 100%; margin-top: 2%" id="long_button_text">
                        <div style="width: 100%; float: left">
                            <label class="mo_openid_fix_fontsize"><?php echo mo_sl('Enter text to show on your login buttons:');?></label>
                            <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" type="text" name="mo_openid_login_button_customize_text" value="<?php echo esc_attr(get_option('mo_openid_login_button_customize_text')); ?>"  />
                        </div>
                    </div>
                </div>
                <div style="width: 100%; float: left">
                    <br><hr>
                    <h4 style="font-size: 1.2em"><?php echo mo_sl('Customize Text to show user after Login');?></h4>
                    <div style="width: 100%;">
                        <div style="width: 100%; float: left">
                            <label class="mo_openid_fix_fontsize"><?php echo mo_sl('Enter text to show before the logout link. Use ##username## to display current username:');?></label> <br>
                            <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" type="text" name="mo_openid_login_widget_customize_logout_name_text"  value="<?php echo esc_attr(get_option('mo_openid_login_widget_customize_logout_name_text')); ?>" />
                        </div>
                    </div>
                    <div style="width: 100%; margin-top: 15%" id="long_button_text">
                        <br>
                        <div style="width: 100%; float: left">
                            <label class="mo_openid_fix_fontsize"><?php echo mo_sl('Enter text to show as logout link:');?></label>
                            <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" type="text" name="mo_openid_login_widget_customize_logout_text" value="<?php echo (get_option('mo_openid_login_widget_customize_logout_text')); ?>"  />
                        </div>
                    </div>
                    <br/>
                    <div style="margin-top: 8%; margin-bottom: 2%">
                        <b><input type="submit" name="submit" value="<?php echo mo_sl('Save');?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" /></b>
                    </div>
                </div>
            </div>
            <div style="display: inline-block;float:left; width: 42%">
            <center>
            <div style="border: 1px solid black; min-width: 200px; min-height: 200px; padding-top: 8%; padding-bottom: 5%">
                <b>Preview : </b><br/>
                <div style="padding-bottom: 1%; padding-top: 3%">
                    <?php
                    $app_pos=get_option('app_pos');
                    $app_pos=explode('#',$app_pos);
                    $count_app=0;
                    foreach ($app_pos as $active_app)
                    {
                        if(get_option('mo_openid_'.$active_app.'_enable')){
                            $class_app=$active_app;
                            $icon = $active_app;
                            if($active_app=='vkontakte') {
                                $class_app = 'vk';
                                $icon='vk';
                            }
                            elseif ($active_app=='salesforce') {
                                $class_app = 'vimeo';
                                $icon = 'cloud';
                            }
                            elseif ($active_app=='amazon') {
                                $class_app = 'soundcloud';
                            }
                            elseif ($active_app=='windowslive'){
                                $class_app='microsoft';
                                $icon='windows';
                            }
                            if($active_app=='disqus')
                                $app_img='disq';
                            else if($active_app=='kakao')
                                $app_img='kaka';
                            if($active_app=='facebook')
                            {
                                $class_app++;
                                ?>
                                <img class="mo_login_icon_preview" id="mo_login_icon_preview_facebook" src="<?php echo plugin_url.'/facebook.png'?>" />
                                <a id="mo_login_button_preview_facebook" class="btn btn-block btn-defaulttheme btn-social btn-facebook btn-custom-size"> <i class="mofa" style="border-right:none;"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top:12%;margin-left: 2%;" ><path fill="#fff" d="M22.688 0H1.323C.589 0 0 .589 0 1.322v21.356C0 23.41.59 24 1.323 24h11.505v-9.289H9.693V11.09h3.124V8.422c0-3.1 1.89-4.789 4.658-4.789 1.322 0 2.467.1 2.8.145v3.244h-1.922c-1.5 0-1.801.711-1.801 1.767V11.1h3.59l-.466 3.622h-3.113V24h6.114c.734 0 1.323-.589 1.323-1.322V1.322A1.302 1.302 0 0 0 22.688 0z"/></svg></i><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text'));?> Facebook</a>
                                <i class="mo_custom_login_icon_preview mofa mofa-facebook" id="mo_custom_login_icon_preview_facebook"  style="color:#ffffff;text-align:center;margin-top:5px;"></i>
                                <a id="mo_custom_login_button_preview_facebook"  class="btn btn-block btn-customtheme btn-social  btn-custom-size"> <i class="mofa mofa-facebook"></i><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text'));?> Facebook</a>
                                <?php
                            }
                            else if($active_app=='google'){
                                $count_app++;
                                ?>
                                <img class="mo_login_icon_preview" id="mo_login_icon_preview_google" src="<?php echo plugin_url.'/google.png'?>" />
                                <a style="background: rgb(255,255,255)!important; background:linear-gradient(90deg, rgba(255,255,255,1) 38px, rgb(79, 113, 232) 5%) !important;border-color: rgba(79, 113, 232, 1);border-bottom-width: thin;" id="mo_login_button_preview_google" class="btn btn-block btn-defaulttheme btn-social btn-google btn-custom-size"> <i class="mofa"style="border-right:none;padding-top:3% !important"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 70 70" style="padding-left: 8%;padding-top: 20%;" ><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg></i><?php
                                    ?> <span style="color:#ffffff;"><?php echo esc_html(get_option('mo_openid_login_button_customize_text'));?> Google</span></a>
                                <i class="mo_custom_login_icon_preview mofa mofa-google" id="mo_custom_login_icon_preview_google"  style="color:#ffffff;text-align:center;margin-top:5px;"></i>
                                <a id="mo_custom_login_button_preview_google" class="btn btn-block btn-customtheme btn-social   btn-custom-size"> <i class="mofa mofa-google"></i><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text'));?> Google</a>
                                <?php
                            }
                            else if($active_app=='disqus' || $active_app=='kakao'){
                                $count_app++;
                                ?>
                                <img class="mo_login_icon_preview" id="mo_login_icon_preview_<?php echo $active_app ?>" src="<?php echo plugin_url.'/'.$active_app.'.png'?>" />
                                <a id="mo_login_button_preview_<?php echo $active_app ?>" class="btn btn-block btn-defaulttheme btn-social btn-<?php echo $active_app ?> btn-custom-size"> <img class="mofa" src="<?php echo plugin_url.'/'.$app_img.'.png'?>"><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text'));?> <?php echo $active_app ?></a>
                                <i class="mo_custom_login_icon_preview mofa" id="mo_custom_login_icon_preview_<?php echo $active_app ?>" style="color:#ffffff;text-align:center;" ><img id="<?php echo $app_img ?>" src="<?php echo plugin_url.'/'.$app_img.'.png'?>"></i>
                                <a id="mo_custom_login_button_preview_<?php echo $active_app ?>" class="btn btn-block btn-customtheme btn-social  btn-custom-size"> <img class="mofa" src="<?php echo plugin_url.'/'.$app_img.'.png'?>"><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text')); ?> <?php echo $active_app ?></a>
                                <?php
                            }
                            else{
                                $count_app++;
                                ?>
                                <img class="mo_login_icon_preview" id="mo_login_icon_preview_<?php echo $active_app ?>" src="<?php echo plugin_url.'/'.$active_app.'.png'?>" />
                                <a id="mo_login_button_preview_<?php echo $active_app ?>" class="btn btn-block btn-defaulttheme btn-social btn-<?php echo $class_app ?> btn-custom-size"> <i class="mofa mofa-<?php echo $icon ?>"></i><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text'));?> <?php echo $active_app?></a>
                                <i class="mo_custom_login_icon_preview mofa mofa-<?php echo $icon ?>" id="mo_custom_login_icon_preview_<?php echo $active_app ?>"  style="color:#ffffff;text-align:center;margin-top:5px;"></i>
                                <a id="mo_custom_login_button_preview_<?php echo $active_app ?>" class="btn btn-block btn-customtheme btn-social   btn-custom-size"> <i class="mofa mofa-<?php echo $icon ?>"></i><?php
                                    echo esc_html(get_option('mo_openid_login_button_customize_text'));?> <?php echo $active_app ?></a>
                                <?php
                            }
                        }
                    }
                    if($count_app==0){
                        ?><p>No activated apps found.</p><?php
                    }
                    ?>
                </div>
            </div><br/>
                <div style="border: 1px solid"><br>
                    <b style="font-size: 17px;"><?php echo mo_sl('Custom CSS');?> <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'licensing_plans'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo mo_sl('PRO');?></a></b>
                        <textarea disabled type="text" id="mo_openid_custom_css" style="resize: vertical; width:400px; height:180px;  margin:5% auto;" rows="6" name="mo_openid_custom_css"></textarea><br/><b>Example CSS:</b>
                        <p>NOTE: Please keep the class name same as example CSS.</p>
                        <pre>
     .mo_login_button {
	 width:100%;
	 height:50px;
	 padding-top:15px;
	 padding-bottom:15px;
	 margin-bottom:-1px;
	 border-radius:4px;
	 background: #7272dc;
	 text-align:center;
	 font-size:16px;
	 color:#fff;
	 margin-bottom:5px;
 }
                            </pre>
                </div>
            </center>
            </div>
        </div>
    </form>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo mo_sl("Customize Login Icons"); ?>');
        window.onload=shape_change();
        function shape_change() {
            var y = document.getElementById('mo_openid_login_shape_longbutton').checked;
            if(y!=true) {
                jQuery('#long_button_size').hide();
                jQuery('#long_button_text').hide();
                jQuery('#other_button_size').show();
            }
            else {
                jQuery('#long_button_size').show();
                jQuery('#long_button_text').show();
                jQuery('#other_button_size').hide();
            }
        }

        var tempHorSize = '<?php echo esc_attr(get_option('mo_login_icon_custom_size')) ?>';
        var tempHorTheme = '<?php echo esc_attr(get_option('mo_openid_login_theme')) ?>';
        var tempHorCustomTheme = '<?php echo esc_attr(get_option('mo_openid_login_custom_theme')) ?>';
        var tempHorCustomColor = '<?php echo esc_attr(get_option('mo_login_icon_custom_color')) ?>';
        var tempHorSpace = '<?php echo esc_attr(get_option('mo_login_icon_space'))?>';
        var tempHorHeight = '<?php echo esc_attr(get_option('mo_login_icon_custom_height')) ?>';
        var tempHorBoundary='<?php echo esc_attr(get_option('mo_login_icon_custom_boundary'))?>';

        function moLoginSpaceValidate(e){
            var t=parseInt(e.value.trim());t>60?e.value=60:0>t&&(e.value=0)
        }

        function moLoginWidthValidate(e){
            var t=parseInt(e.value.trim());t>1000?e.value=1000:140>t&&(e.value=140)
        }
        function moLoginHeightValidate(e){
            var t=parseInt(e.value.trim());t>50?e.value=50:35>t&&(e.value=35)
        }
        function moLoginIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<60?r.value++:"subtract"==t&&r.value>20&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

        function moLoginSpaceIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<60?r.value++:"subtract"==t&&r.value>0&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

        function moLoginWidthIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<1000?r.value++:"subtract"==t&&r.value>140&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

        function moLoginHeightIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<50?r.value++:"subtract"==t&&r.value>35&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

        function moLoginBoundaryIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<25?r.value++:"subtract"==t&&r.value>0&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

        moLoginIncrement(document.getElementById('mo_login_size_plus'), "add", document.getElementById('mo_login_icon_size'), 300, 0.7);
        moLoginIncrement(document.getElementById('mo_login_size_minus'), "subtract", document.getElementById('mo_login_icon_size'), 300, 0.7);

        moLoginIncrement(document.getElementById('mo_login_size_plus'), "add", document.getElementById('mo_login_icon_size'), 300, 0.7);
        moLoginIncrement(document.getElementById('mo_login_size_minus'), "subtract", document.getElementById('mo_login_icon_size'), 300, 0.7);

        moLoginSpaceIncrement(document.getElementById('mo_login_space_plus'), "add", document.getElementById('mo_login_icon_space'), 300, 0.7);
        moLoginSpaceIncrement(document.getElementById('mo_login_space_minus'), "subtract", document.getElementById('mo_login_icon_space'), 300, 0.7);

        moLoginWidthIncrement(document.getElementById('mo_login_width_plus'), "add", document.getElementById('mo_login_icon_width'), 300, 0.7);
        moLoginWidthIncrement(document.getElementById('mo_login_width_minus'), "subtract", document.getElementById('mo_login_icon_width'), 300, 0.7);

        moLoginHeightIncrement(document.getElementById('mo_login_height_plus'), "add", document.getElementById('mo_login_icon_height'), 300, 0.7);
        moLoginHeightIncrement(document.getElementById('mo_login_height_minus'), "subtract", document.getElementById('mo_login_icon_height'), 300, 0.7);

        moLoginBoundaryIncrement(document.getElementById('mo_login_boundary_plus'), "add", document.getElementById('mo_login_icon_custom_boundary'), 300, 0.7);
        moLoginBoundaryIncrement(document.getElementById('mo_login_boundary_minus'), "subtract", document.getElementById('mo_login_icon_custom_boundary'), 300, 0.7);

        function setLoginTheme(){return jQuery('input[name=mo_openid_login_theme]:checked', '#form-apps').val();}
        function setLoginCustomTheme(){return jQuery('input[name=mo_openid_login_custom_theme]:checked', '#form-apps').val();}
        function setSizeOfIcons(){
            if((jQuery('input[name=mo_openid_login_theme]:checked', '#form-apps').val()) == 'longbutton'){
                return document.getElementById('mo_login_icon_width').value;
            }else{
                return document.getElementById('mo_login_icon_size').value;
            }
        }
        moLoginPreview(setSizeOfIcons(),tempHorTheme,tempHorCustomTheme,tempHorCustomColor,tempHorSpace,tempHorHeight,tempHorBoundary);

        function moLoginPreview(t,r,l,p,n,h,k){
            if(l == 'default'){
                if(r == 'longbutton'){
                    var a = "btn-defaulttheme";
                    jQuery("."+a).css("width",t+"px");
                    jQuery("."+a).each(function () {
                        jQuery(this).css("margin-top", "5px");
                        jQuery(this).css("padding-top",(h-29)+"px");
                        jQuery(this).css("padding-bottom",(h-29)+"px");
                        jQuery(this).css("margin-bottom",(n-5)+"px");
                        jQuery(this).css("border-radius",k+"px");
                    });
                    jQuery(".mofa").css("padding-top",(h-35)+"px");

                }else{
                    var a="mo_login_icon_preview";
                    jQuery("."+a).css("margin-left",(n-4)+"px");
                    if(r=="circle"){
                        jQuery("."+a).css({height:t,width:t});
                        jQuery("."+a).css("borderRadius","999px");
                    }else if(r=="oval"){
                        jQuery("."+a).css("borderRadius","5px");
                        jQuery("."+a).css({height:t,width:t});
                    }else if(r=="square"){
                        jQuery("."+a).css("borderRadius","0px");
                        jQuery("."+a).css({height:t,width:t});
                    }
                }
            }
            else if(l == 'custom'){
                if(r == 'longbutton'){
                    var a = "btn-customtheme";
                    jQuery("."+a).css("margin-top", "5px");
                    jQuery("."+a).css("width",(t)+"px");
                    jQuery("."+a).css("padding-top",(h-29)+"px");
                    jQuery("."+a).css("padding-bottom",(h-29)+"px");
                    jQuery(".mofa").css("padding-top",(h-35)+"px");
                    jQuery("."+a).css("margin-bottom",(n-5)+"px");
                    jQuery("."+a).css("background","#"+p);
                    jQuery("."+a).css("border-radius",k+"px");
                }else{
                    var a="mo_custom_login_icon_preview";
                    jQuery("."+a).css({height:t-8,width:t});
                    jQuery("."+a).css("padding-top","8px");
                    jQuery("."+a).css("margin-left",(n-4)+"px");

                    if(r=="circle"){
                        jQuery("."+a).css("borderRadius","999px");
                    }else if(r=="oval"){
                        jQuery("."+a).css("borderRadius","5px");
                    }else if(r=="square"){
                        jQuery("."+a).css("borderRadius","0px");
                    }
                    jQuery("."+a).css("background","#"+p);
                    jQuery("."+a).css("font-size",(t-16)+"px");
                    jQuery("#disq").css({height:t-21});
                    jQuery("#kaka").css({height:t-21});
                }
            }
            previewLoginIcons();
        }

        function checkLoginButton(){
            if(jQuery('input[name=mo_openid_login_theme]:checked', '#form-apps').val() == 'longbutton') {
                if(setLoginCustomTheme() == 'default'){
                    jQuery(".mo_login_icon_preview").hide();
                    jQuery(".mo_custom_login_icon_preview").hide();
                    jQuery(".btn-customtheme").hide();
                    jQuery(".btn-defaulttheme").show();
                }else if(setLoginCustomTheme() == 'custom'){
                    jQuery(".mo_login_icon_preview").hide();
                    jQuery(".mo_custom_login_icon_preview").hide();
                    jQuery(".btn-defaulttheme").hide();
                    jQuery(".btn-customtheme").show();
                }
            }
            else {
                if(setLoginCustomTheme() == 'default'){
                    jQuery(".mo_login_icon_preview").show();
                    jQuery(".btn-defaulttheme").hide();
                    jQuery(".btn-customtheme").hide();
                    jQuery(".mo_custom_login_icon_preview").hide();
                }else if(setLoginCustomTheme() == 'custom'){
                    jQuery(".mo_login_icon_preview").hide();
                    jQuery(".mo_custom_login_icon_preview").show();
                    jQuery(".btn-defaulttheme").hide();
                    jQuery(".btn-customtheme").hide();
                }
            }
            previewLoginIcons();
        }

        function previewLoginIcons() {
            var apps;
            apps='<?php echo esc_attr(get_option('app_pos')) ?>';
            apps=apps.split('#');
            for(i=0;i<apps.length;i++){
                if(jQuery('input[name=mo_openid_login_custom_theme]:checked', '#form-apps').val() == 'default')
                {
                    if(jQuery('input[name=mo_openid_login_theme]:checked', '#form-apps').val() =='longbutton')
                        jQuery("#mo_login_button_preview_"+apps[i]).show();
                    else
                        jQuery("#mo_login_icon_preview_"+apps[i]).show();
                }
                else if(jQuery('input[name=mo_openid_login_custom_theme]:checked', '#form-apps').val() == 'custom')
                {
                    if(jQuery('input[name=mo_openid_login_theme]:checked', '#form-apps').val() == 'longbutton')
                        jQuery("#mo_custom_login_button_preview_"+apps[i]).show();
                    else
                        jQuery("#mo_custom_login_icon_preview_"+apps[i]).show();
                }
            }
        }
        checkLoginButton();
    </script>
    <?php
}