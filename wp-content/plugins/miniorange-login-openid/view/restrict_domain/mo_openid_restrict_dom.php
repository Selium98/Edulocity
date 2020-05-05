<?php
function mo_openid_restrict_domain()
{
?>
    <form>
    <div class="mo_openid_table_layout">
        <table style="width:100%">

       <div>

         <br>  <label style="cursor: context-menu" class="mo-openid-radio-container_disable"><?php echo mo_sl('Domain Restriction');?>
               <input type="radio"   />
               <span class="mo-openid-radio-checkmark_disable"></span>
           </label>

        </div>
        <br/><label style="cursor: auto"><?php echo mo_sl('Users with these domains will not be able to register');?>.</label>
        <textarea rows="4" cols="50" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 100%" disabled placeholder="Add domain names semicolon(;) separated e.g. gmail.com;yahoo.com;miniorange.com"/></textarea>
    </tr>
    </td><br>
            <tr>
                <br>
                    <div>
                        <label style="cursor: context-menu" class="mo-openid-radio-container_disable"><?php echo mo_sl('Allow Domain');?>
                            <input type="radio" />
                            <span class="mo-openid-radio-checkmark_disable"></span>
                        </label>
                    </div>
                    <br/><label style="cursor: auto"><?php echo mo_sl('Only users with these domains will be able to register');?>.</label>
                    <textarea rows="4" cols="50" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 100%" disabled placeholder="Add domain names semicolon(;) separated e.g. gmail.com;yahoo.com;miniorange.com"/></textarea>
                </td>
              </tr>
        <td><br /><b><input disabled type="submit" name="submit" value="<?php echo mo_sl('Save');?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" />
            </b>
        </td>
    </tr>
    </table>
    </div>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo mo_sl('Domain Restriction');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'licensing_plans'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);
        var win_height = jQuery('#mo_openid_menu_height').height();
        //win_height=win_height+18;
        jQuery(".mo_container").css({height:win_height});
    </script>

    <?php
}