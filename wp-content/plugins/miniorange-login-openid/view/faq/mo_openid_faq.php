<?php

function mo_openid_faq(){ ?>
    <div class="mo_openid_table_layout">
        <table width="100%" style="padding-left: 20px">
            <tbody>
                <tr>
                    <td>
                        <p><?php echo mo_sl('If you are unable to open any section, press CTRL + F5 to clear cache');?>.<p>
                        <h3><a  id="openid_question_plugin" class="mo_openid_title_panel" onclick="show_faq_options(this.id)"><span class="dashicons dashicons-arrow-right"></span><?php echo mo_sl('Site Issue');?></a></h3>
                        <div class="mo_openid_help_desc" hidden="" id="openid_question_plugin_desc">
                            <h4><a  id="openid_question14"><?php echo mo_sl('I installed the plugin and my website stopped working. How can I recover my site?');?></a></h4>
                            <div  id="openid_question14_desc">
                               <?php echo mo_sl( 'There must have been a server error on your website. To get your website back online:');?><br/>
                                <ol>
                                    <li><?php echo mo_sl('Open FTP access and look for plugins folder under wp-content.');?></li>
                                    <li><?php echo mo_sl('Change the extension folder name miniorange-login-openid to miniorange-login-openid');?></li>
                                    <li><?php echo mo_sl('Check your website. It must have started working');?>.</li>
                                    <li><?php echo mo_sl('Change the folder name back to miniorange-login-openid.');?></li>
                                </ol>
                            </div>
                           <?php echo mo_sl( 'For any further queries, please submit a query on right hand side in our');?> <b><?php echo mo_sl('Support Section');?></b>.
                        </div>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3><a  id="openid_question_email" class="mo_openid_title_panel" onclick="show_faq_options1(this.id)"><span class="dashicons dashicons-arrow-right"></span><?php echo mo_sl('Change email');?> </a></h3>
                        <div class="mo_openid_help_desc" hidden="" id="openid_question_email_desc">
                            <h4><a  id="openid_question20"><?php echo mo_sl('I want to change the email address with which I access my account. How can I do that?');?></a></h4>
                            <div  id="openid_question20_desc">
                                <?php echo mo_sl('You will have to register in miniOrange again with your new email id.');?>
                                <?php echo mo_sl('Please deactivate and activate the plugin by going to');?> <strong><?php echo mo_sl('Plugins -> Installed Plugins');?></strong> <?php echo mo_sl('and then go to the Social Login Plugin to register again. This will enable you to access miniOrange dashboard with new email address.');?></div><br/>
                            <?php echo mo_sl('For any further queries, please submit a query on right hand side in our');?> <b><?php echo mo_sl('Support Section');?></b>.
                        </div>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3><a id="openid_question_curl" class="mo_openid_title_panel" onclick="show_faq_options2(this.id)"><span class="dashicons dashicons-arrow-right"></span><?php echo mo_sl( 'cURL');?> </a></h3>
                        <div class="mo_openid_help_desc" hidden="" id="openid_question_curl_desc">
                            <h4><a  id="openid_question1"  ><?php echo mo_sl('How to enable PHP cURL extension? (Pre-requisite)');?></a></h4>
                            <div  id="openid_question1_desc">
                                <?php echo mo_sl('cURL is enabled by default but in case you have disabled it, follow the steps to enable it');?>
                                <ol>
                                    <li><?php echo mo_sl("Open php.ini(it's usually in /etc/ or in php folder on the server).")?></li>
                                    <li><?php echo mo_sl('Search for extension=php_curl.dll. Uncomment it by removing the semi-colon( ; ) in front of it.');?></li>
                                    <li><?php echo mo_sl('Restart the Apache Server.');?></li>
                                </ol>
                                <?php echo mo_sl('For any further queries, please submit a query on right hand side in our');?> <b><?php echo mo_sl('Support Section');?></b>.
                            </div>
                            <hr>
                            <h4><a  id="openid_question9"  ><?php echo mo_sl('I am getting error - curl_setopt(): CURLOPT_FOLLOWLOCATION cannot be activated when an open_basedir is set');?></a></h4>
                            <div   id="openid_question9_desc">
                                <?php echo mo_sl("Just setsafe_mode = Off in your php.ini file (it's usually in /etc/ on the server). If that's already off, then look around for the open_basedir in the php.ini file, and change it to open_basedir = .");?>
                            </div>
                        </div>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3><a  id="openid_question_otp" class="mo_openid_title_panel"  onclick="show_faq_options3(this.id)"> <span class="dashicons dashicons-arrow-right"></span><?php echo mo_sl('OTP and Forgot Password');?> </a></h3>
                        <div class="mo_openid_help_desc" hidden="" id="openid_question_otp_desc">
                            <h4><a  id="openid_question7"  ><?php echo mo_sl('I did not recieve OTP. What should I do?');?></a></h4>
                            <div  id="openid_question7_desc">
                                <?php echo mo_sl("The OTP is sent as an email to your email address with which you have registered with miniOrange. If you can't see the email from miniOrange in your mails, please make sure to check your SPAM folder.");?> <br/><br/><?php echo mo_sl("If you don't see an email even in SPAM folder, please verify your account using your mobile number. You will get an OTP on your mobile number which you need to enter on the page. If none of the above works, please contact us using the Support form on the right.");?>
                            </div>
                            <hr>
                            <h4><a  id="openid_question8"  ><?php echo mo_sl('After entering OTP, I get Invalid OTP. What should I do?');?></a></h4>
                            <div  id="openid_question8_desc">
                               <?php echo mo_sl( 'Use the ');?><b><?php echo mo_sl('Resend OTP');?></b> <?php echo mo_sl('option to get an additional OTP. Plese make sure you did not enter the first OTP you recieved if you selected');?> <b><?php echo mo_sl('Resend OTP');?></b> <?php echo mo_sl('option to get an additional OTP. Enter the latest OTP since the previous ones expire once you click on Resend OTP.');?> <br/><br/><?php echo mo_sl('If OTP sent on your email address are not working, please verify your account using your mobile number. You will get an OTP on your mobile number which you need to enter on the page. If none of the above works, please contact us using the Support form on the right.');?>
                            </div>
                            <hr>
                            <h4><a  id="openid_question5" ><?php echo mo_sl('I forgot the password of my miniOrange account. How can I reset it?');?></a></h4>
                            <div  id="openid_question5_desc">
                                <?php echo mo_sl('There are two cases according to the page you see');?> -<br><br/>
                                1. <b><?php echo mo_sl('Login with miniOrange');?></b> <?php echo mo_sl('screen: You should click on');?> <b><?php echo mo_sl('forgot password');?></b> <?php echo mo_sl('link. You will get your new password on your email address which you have registered with miniOrange . Now you can login with the new password');?>.<br><br/>
                                2. <b><?php echo mo_sl('Register with miniOrange');?></b> <?php echo mo_sl('screen: Enter your email ID and any random password in ');?><b><?php echo mo_sl('password');?></b><?php echo mo_sl( 'and');?> <b><?php echo mo_sl('confirm password');?></b> <?php echo mo_sl('input box. This will redirect you to');?> <b><?php echo mo_sl('Login with miniOrange');?></b> <?php echo mo_sl('screen. Now follow first step');?>.
                            </div>
                        </div>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3><a  id="openid_question_login" class="mo_openid_title_panel" onclick="show_faq_options4(this.id)"><span class="dashicons dashicons-arrow-right"></span><?php echo mo_sl('Social login');?> </a></h3>
                        <div class="mo_openid_help_desc" hidden="" id="openid_question_login_desc">
                            <h4><a id="openid_question2"  ><?php echo mo_sl('How to add login icons to frontend login page?');?></a></h4>
                            <div id="openid_question2_desc">
                                <?php echo mo_sl("You can add social login icons to frontend login page using our shortcode [miniorange_social_login]. Refer to 'Shortcode' tab to add customizations to Shortcode.");?>
                            </div>
                            <hr>
                            <h4><a id="openid_question4"  ><?php echo mo_sl('How can I put social login icons on a page without using widgets?');?></a></h4>
                            <div id="openid_question4_desc">
                                <?php echo mo_sl("You can add social login icons to any page or custom login page using 'social login shortcode' [miniorange_social_login]. Refer to 'Shortcode' tab to add customizations to Shortcode.");?>
                            </div>
                            <hr>
                            <h4><a  id="openid_question12" ><?php echo mo_sl('Social Login icons are not added to login/registration form.');?></a></h4>
                            <div  id="openid_question12_desc">
                                <?php echo mo_sl("Your login/registration form may not be wordpress's default login/registration form. In this case you can add social login icons to custom login/registration form using 'social login shortcode' [miniorange_social_login]. Refer to 'Shortcode' tab to add customizations to Shortcode.");?>
                            </div>
                            <hr>
                            <h4><a  id="openid_question3"  ><?php echo mo_sl('How can I redirect to my blog page after login?');?></a></h4>
                            <div  id="openid_question3_desc">
                                <?php echo mo_sl('You can select one of the options from');?> <b><?php echo mo_sl('Redirect URL after login');?></b> <?php echo mo_sl('of');?> <b><?php echo mo_sl('Display Option');?></b><?php echo mo_sl(' section under');?> <b><?php echo mo_sl('Social Login');?></b><?php echo mo_sl( 'tab.');?> <br>
                                1. <?php echo mo_sl('Same page where user logged in');?> <br>
                                2. <?php echo mo_sl('Homepage');?> <br>
                                3. <?php echo mo_sl('Account Dsahboard');?> <br>
                                4. <?php echo mo_Sl('Custom URL - Example:');?> https://www.example.com <br>
                            </div>
                            <hr>
                            <h4><a  id="openid_question11"  ><?php echo mo_sl('After logout I am redirected to blank page');?></a></h4>
                            <div  id="openid_question11_desc">
                                <?php echo mo_sl('Your theme and Social Login plugin may conflict during logout. To resolve it you need to uncheck');?> <b><?php echo mo_sl('Enable Logout Redirection');?></b><?php mo_sl( 'checkbox under');?> <b><?php echo mo_sl('Display Option');?></b> <?php echo mo_sl('of');?> <b><?php echo mo_sl('Social Login');?></b> <?php echo mo_sl('tab');?>.
                            </div>
                            <hr>
                            <h4><a  id="openid_question5"  ><?php echo mo_sl('My users get the following message -"Registration has been disabled for this site. Please contact your administrator." What should I do?');?></a></h4>
                            <div  id="openid_question5_desc">
                                <?php echo mo_sl('This means you must have unchecked the check-box of auto-register in the Social Login tab. Please check it. This will allow new users to be able to register to your site.');?>
                            </div>
                            <hr>
                            <h4><a  id="openid_question7"  ><?php echo mo_sl('Why do my users get a message that it is not secure to proceed?');?></a></h4>
                            <div  id="openid_question7_desc"><?php echo mo_sl("Your website must be starting with http://. Now generally that's not an issue but our service uses https://( s stands for secure). You get a warning from the browser that the information is being passed insecurely. This happens after you log in to social media application and are coming back to your website. The warning is triggered from the browser since the data passes from https:// to http://, i.e. from a secure site to non-secure site.<br><br>We make sure that the information(email, name, username) getting passed from social media application to your website is encrypted with a key which is unique to you. So, even if the there is a warning of sending information without security, that information is encrypted.");?> <br><br>
                                <strong><?php echo mo_sl('To remove this warning, you can add an SSL certificate to your website to change it to https OR use your own');?> <a href="admin.php?page=mo_openid_settings&tab=custom_app"></strong><?php echo mo_sl('Custom App');?></a>
                            </div>
                            <hr>
                            <h4><a  id="openid_question1"  ><?php echo mo_sl('My users get the following message -"There was an error in registration. Please contact your administrator." What should I do?');?></a></h4>
                            <div  id="openid_question1_desc">
                                <?php echo mo_sl('This message is thrown by WordPress when there is an error in user-registration');?>. <br><br>
                                1. <?php echo mo_sl('To see the actual error thrown by WordPress, go to \wordpress\wp-content\plugins\miniorange-login-openid\class-mo-openid-login-widget.php file');?><br>
                                2. <?php echo mo_sl('Search for the line');?> :<br/><code> //print_r($user_id); </code> <br>
                                3. <?php echo mo_sl('Change it to');?><br/> <code>print_r($user_id); </code><br>
                                4. <?php echo mo_sl('Save the file and try logging again. Please send us the error you see while logging in through the support forum to your right.');?>
                            </div>
                            <h4><a  id="openid_question6"  ><?php echo mo_sl('How do I centre the social login icons?');?></a></h4>
                            <div  id="openid_question6_desc">
                                1.<?php echo mo_sl('If you are making changes to a PHP file');?>.<br/><br/>
                                <?php echo mo_sl('Go to the PHP file which invokes your page/post and insert the following html snippet. Also, increase the margin-left value as per your requirement. Save the file.');?> <br>
                                <code>&ltdiv style="margin-left:100px;"&gt <br>&lt?php echo apply_shortcode('[miniorange_social_login]')?&gt <br>
                                    &lt/div&gt </code><br/><br/>
                                2.<?php echo mo_sl('If you are making changes to an HTML file.');?><br/><br/>
                                <?php echo mo_sl('Go to the HTML file which invokes your page/post and insert the following html snippet. Also, increase the margin-left value as per your requirement. Save the file.');?> <br>
                                <code>&ltdiv style="margin-left:100px;"&gt <br>[miniorange_social_login]')<br>
                                    &lt/div&gt </code>
                            </div>
                        </div>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3><a  id="openid_question_sharing" class="mo_openid_title_panel" onclick="show_faq_options5(this.id)"><span class="dashicons dashicons-arrow-right"></span><?php echo mo_sl('Social Sharing');?></a></h3>
                        <div class="mo_openid_help_desc" hidden="" id="openid_question_sharing_desc">
                            <h4><a id="openid_question6"  ><?php echo mo_sl('Is it possible to show sharing icons below the post content?');?></a></h4>
                            <div id="openid_question6_desc">
                                <?php echo mo_sl('You can put social sharing icons before the content, after the content or both before and after the content.');?><?php echo mo_sl( 'Go to');?> <b><?php echo mo_sl('Sharing tab');?></b> , <?php echo mo_sl('check');?> <b><?php echo mo_sl('Blog post');?></b> <?php echo mo_sl('checkbox and select one of three(before, after, both) options available. Save settings');?>.
                            </div>
                            <hr>
                            <h4><a id="openid_question10" ><?php echo mo_sl('Why is sharing with some applications not working?');?></a></h4>
                            <div id="openid_question10_desc">
                                <?php echo mo_sl('This issue arises if your website is not publicly hosted. Facebook, for example looks for the URL to generate its preview for sharing. That does not work on localhost or any privately hosted URL.');?>
                            </div>
                            <hr>
                            <h4><a id="openid_question13" ><?php echo mo_sl('Facebook sharing is showing the wrong image. How do I change the image?');?></a></h4>
                            <div id="openid_question13_desc">
                                <?php echo mo_sl('The image is selected by Facebook and it is a part of Facebook sharing feature. We provide Facebook with webpage URL. It generates the entire preview of webpage using that URL.');?><br/><br/>
                               <?php echo mo_sl('To set an image for the page, set it as a meta tag in');?> <head> <?php echo mo_sl('of your webpage.');?><br/>
                                    <b>< meta property="og:image" content="http://example.com/image.jpg" ></b><br/><br/>
                                   <?php echo mo_sl( "You can further debug the issue with Facebook's tool");?> - <a href="https://developers.facebook.com/tools/debug/og/object">https://developers.facebook.com/tools/debug/og/object</a>
                                    <br/><br/>
                                    <?php echo mo_sl('If the problem still persists, please contact us using the Support form on the right.');?>
                            </div>
                            <hr>
                            <h4><a id="openid_question21" ><?php echo mo_sl('There is no option of Instagram in Social Sharing. Why?');?></a></h4>
                            <div id="openid_question21_desc">
                                <?php echo mo_sl('Instagram has made a conscious effort to not allow sharing from external sources to fight spam and low quality photos.');?>
                                <?php echo mo_sl("At this point of time, uploading via Instagram's API from external sources is not possible");?>.<br><br>
                                <a href='https://help.instagram.com/158826297591430' target='_blank'>https://help.instagram.com/158826297591430</a>
                            </div>
                            <hr>
                            <h4><a id="openid_question18" ><?php echo mo_sl('Email share is not working. Why?');?></a></h4>
                            <div id="openid_question18_desc">
                               <?php echo mo_sl('Email share in the plugin is enabled through');?> <b><?php echo mo_sl('mailto');?></b>. <?php echo mo_sl('mailto is generally configured through desktop or browser so if it is not working, mailto is not setup or improperly configured');?>.<br><br>
                                <?php echo mo_sl("To set it up properly, search for mailto settings followed by your Operating System's name where you have your browser installed.");?>
                            </div>
                            <hr>
                            <h4><a id="openid_question19" ><?php echo mo_sl('I cannot see some icons in preview or on blog even though I have selected them in the plugin settings.');?></a></h4>
                            <div id="openid_question19_desc">
                                <?php echo mo_sl('Please check if you have an Adblock extension installed on your browser where you are checking the plugin. If you do, the Adblock extension will have a setting to block Social buttons. Uncheck this option.');?>
                                <br/><br/>
                                <?php echo mo_sl("If you don't have Adblock installed and still face this issue, please contact us using the Support form on the right or mail us at info@xecurify.com.");?>
                            </div>
                        </div>
                        <hr>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo mo_sl("Frequently Asked Questions");?>');

        function show_faq_options(click_id){
            var span = jQuery('#' + click_id).find('span').attr('class');
            if (span.includes('dashicons-arrow-right')){
                jQuery('#openid_question_plugin').find('span').removeClass( "dashicons-arrow-right" );
                jQuery('#openid_question_plugin').find('span').addClass( "dashicons-arrow-down" );
            }
            else if(span.includes('dashicons-arrow-down')) {
                jQuery('#openid_question_plugin').find('span').removeClass( "dashicons-arrow-down" );
                jQuery('#openid_question_plugin').find('span').addClass( "dashicons-arrow-right" );
            }
        }
        function show_faq_options1(click_id){
            var span = jQuery('#' + click_id).find('span').attr('class');
            if (span.includes('dashicons-arrow-right')){
                jQuery('#openid_question_email').find('span').removeClass( "dashicons-arrow-right" );
                jQuery('#openid_question_email').find('span').addClass( "dashicons-arrow-down" );
            }
            else if(span.includes('dashicons-arrow-down')) {
                jQuery('#openid_question_email').find('span').removeClass( "dashicons-arrow-down" );
                jQuery('#openid_question_email').find('span').addClass( "dashicons-arrow-right" );
            }
        }
        function show_faq_options2(click_id){
            var span = jQuery('#' + click_id).find('span').attr('class');
            if (span.includes('dashicons-arrow-right')){
                jQuery('#openid_question_curl').find('span').removeClass( "dashicons-arrow-right" );
                jQuery('#openid_question_curl').find('span').addClass( "dashicons-arrow-down" );
            }
            else if(span.includes('dashicons-arrow-down')) {
                jQuery('#openid_question_curl').find('span').removeClass( "dashicons-arrow-down" );
                jQuery('#openid_question_curl').find('span').addClass( "dashicons-arrow-right" );
            }
        }
        function show_faq_options3(click_id){
            var span = jQuery('#' + click_id).find('span').attr('class');
            if (span.includes('dashicons-arrow-right')){
                jQuery('#openid_question_otp').find('span').removeClass( "dashicons-arrow-right" );
                jQuery('#openid_question_otp').find('span').addClass( "dashicons-arrow-down" );
            }
            else if(span.includes('dashicons-arrow-down')) {
                jQuery('#openid_question_otp').find('span').removeClass( "dashicons-arrow-down" );
                jQuery('#openid_question_otp').find('span').addClass( "dashicons-arrow-right" );
            }
        }
        function show_faq_options4(click_id){
            var span = jQuery('#' + click_id).find('span').attr('class');
            if (span.includes('dashicons-arrow-right')){
                jQuery('#openid_question_login').find('span').removeClass( "dashicons-arrow-right" );
                jQuery('#openid_question_login').find('span').addClass( "dashicons-arrow-down" );
            }
            else if(span.includes('dashicons-arrow-down')) {
                jQuery('#openid_question_login').find('span').removeClass( "dashicons-arrow-down" );
                jQuery('#openid_question_login').find('span').addClass( "dashicons-arrow-right" );
            }
        }
        function show_faq_options5(click_id){
            var span = jQuery('#' + click_id).find('span').attr('class');
            if (span.includes('dashicons-arrow-right')){
                jQuery('#openid_question_sharing').find('span').removeClass( "dashicons-arrow-right" );
                jQuery('#openid_question_sharing').find('span').addClass( "dashicons-arrow-down" );
            }
            else if(span.includes('dashicons-arrow-down')) {
                jQuery('#openid_question_sharing').find('span').removeClass( "dashicons-arrow-down" );
                jQuery('#openid_question_sharing').find('span').addClass( "dashicons-arrow-right" );
            }
        }
    </script>
    <div style="min-height:50px;"></div>
    <?php
}
