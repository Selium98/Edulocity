<?php
function mo_openid_configure_recaptcha(){
    ?>
    <form>
        <table style="padding: 2%" width="100%">
            <tr>
                <td>
                    <label class="mo_openid_checkbox_container_disable"><?php echo mo_sl('Enable reCAPTCHA');?>
                        <input  type="checkbox"/>
                        <span class="mo_openid_checkbox_checkmark_disable"></span>
                    </label>
                    <div>
                        <p class="mo_openid_note_style"><b><?php echo mo_sl('Prerequisite');?></b>: <?php echo mo_sl('Before you can use reCAPTCHA, you need to register your domain/website.');?> <a><b><?php echo mo_sl('Click here');?></b></a>.</p>
                        <p><?php echo mo_sl('Enter Site key and Secret key that you get after registration.');?></p>
                        <table style="width: 100%;">
                            <tr>
                                <td colspan="2" style="width:30%"><?php echo mo_sl('Select type of reCAPTCHA ');?>:

                                    <label class="mo-openid-radio-container_disable"><?php echo mo_sl('reCAPTCHA v3');?>
                                        <input type="checkbox"  />
                                        <span class="mo-openid-radio-checkmark_disable"></span>
                                    </label>



                                    <label class="mo-openid-radio-container_disable"><?php echo mo_sl('reCAPTCHA v2');?>
                                        <input type="radio"  />
                                        <span class="mo-openid-radio-checkmark_disable"></span>
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <td style="width:15%"><?php echo mo_sl('Site key');?>  : </td>
                                <td style="width:85%"><input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" type="text" placeholder="site key" disabled/></td>
                            </tr>
                            <tr>
                                <td><?php echo mo_sl('Secret key');?> : </td>
                                <td><input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" type="text" disabled/></td>
                            </tr>
                            <tr id="mo_limit_recaptcha_for">
                                <td colspan="2" style="vertical-align:top;"><br><b><?php echo mo_sl('Enable reCAPTCHA for ');?>:</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="mo_openid_checkbox_container_disable"><?php echo mo_sl('WordPress Login form');?>
                                        <input  type="checkbox"/>
                                        <span class="mo_openid_checkbox_checkmark_disable"></span>
                                    </label>


                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <label class="mo_openid_checkbox_container_disable"><?php echo mo_sl('WordPress Registration form');?>
                                        <input  type="checkbox"/>
                                        <span class="mo_openid_checkbox_checkmark_disable"></span>
                                    </label>


                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input disabled type="button" value="<?php echo mo_sl('Save Settings');?>" class="button button-primary button-large" />
                    <input disabled id="mo_limit_recaptcha_test" type="button" value="<?php echo mo_sl('Test reCAPTCHA Configuration');?>" class="button button-primary button-large" />
                </td>
            </tr>
        </table>
        <script>
            //to set heading name
            jQuery('#mo_openid_page_heading').text('<?php echo mo_sl('Configure reCAPTCHA Settings');?>');
            var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'licensing_plans'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
            jQuery("#mo_openid_page_heading").append(temp);
            var win_height = jQuery('#mo_openid_menu_height').height();
            //win_height=win_height+18;
            jQuery(".mo_container").css({height:win_height});
        </script>

    </form>

    <?php
}