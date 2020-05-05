<?php
function mo_openid_gdpr()
{
    if(mo_openid_restrict_user())
        $disable="disabled";
    else
        $disable="";
    ?>
    <form id="gdpr" name="gdpr" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_enable_gdpr" />
        <input type="hidden" name="mo_openid_enable_gdpr_nonce" value="<?php echo wp_create_nonce( 'mo-openid-enable-gdpr-nonce' ); ?>"/>
        <div class="mo_openid_table_layout">
            <label class=" mo_openid_note_style" style="font-size:small;padding:22px;"><?php echo mo_sl('If GDPR check is enabled, users will be asked to give consent before using Social Login. Users who will not give consent will not be able to log in. This setting stands true only when users are registering using Social Login. This will not interfere with users registering through the regular WordPress');?>.<br><br>(<?php echo mo_sl('Click');?> <a target="_blank" href="<?php echo add_query_arg( array('tab' => 'privacy_policy'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo mo_sl( 'here');?> </a> <?php echo mo_sl("to read miniOrange Social Login Privacy Policy. Please update your website's privacy policy accordingly and enter the URL to your privacy policy below.");?></label>
            <br/>
            <label class="mo_openid_checkbox_container"><?php echo mo_sl('Take consent from users');?>
                <input style="padding-left: 15px" type="checkbox" id="mo_openid_gdpr_consent_" name="mo_openid_gdpr_consent_enable" value="1"
                    <?php checked( get_option('mo_openid_gdpr_consent_enable') == 1 );?> />
                <br>
                <?php if($disable){ ?>
                    <span class="mo_openid_checkbox_checkmark_disable"></span>
                <?php } else { ?>
                    <span class="mo_openid_checkbox_checkmark"></span>
                <?php } ?>
            </label>
            <label style="font-size: 12px"><?php echo mo_sl('Enter the Consent message:');?> </label><br/>
            <input type="text" <?php echo $disable?> class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 50%" name="mo_openid_gdpr_consent_message" value="<?php echo esc_textarea(get_option('mo_openid_gdpr_consent_message'))?>"/>
            <br><br>
            <label style="font-size: 12px"> <?php echo mo_sl('Enter the text to be displayed for the Privacy Policy URL');?> :</label><br/>
            <input type="text" <?php echo $disable?> class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 50%" name="mo_openid_privacy_policy_text" value="<?php echo esc_attr(get_option('mo_openid_privacy_policy_text'))?>" />
            <br><br>
            <label style="font-size: 12px"><?php echo mo_sl('Enter Privacy Policy URL');?>: </label><br/>
            <input type="text" <?php echo $disable?> class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 50%" name="mo_openid_privacy_policy_url" value="<?php echo esc_url(get_option('mo_openid_privacy_policy_url'))?>" />
            <br/><br/><b><input type="submit" <?php echo $disable?> name="submit" value="<?php echo mo_sl('Save');?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" /></b>
        </div>
    </form>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo mo_sl('GDPR Settings');?>');
        var win_height = jQuery('#mo_openid_menu_height').height();
        //win_height=win_height+18;
        jQuery(".mo_container").css({height:win_height});
        jQuery.ajax({
            url: "<?php echo admin_url("admin-ajax.php");?>", //the page containing php script
            method: "POST", //request type,
            dataType: 'json',
            data: {
                action: 'mo_check_restrict_user',
            },
            success: function (result) {
                if (result.status=='true') {
                    var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'licensing_plans'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
                    jQuery("#mo_openid_page_heading").append(temp);
                }
                else {
                    var temp = jQuery("");
                    jQuery("#mo_openid_page_heading").append(temp);
                }
            }
        });
    </script>
    <?php
}