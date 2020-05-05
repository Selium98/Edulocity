<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_menu','wprlsi_submenu_add');

function wprlsi_submenu_add(){
	add_submenu_page( 'wprls_sliders_page', 'Dashboard', 'Dashboard', 'manage_options', 'wprls_dashboard', 'add_wprls_dashboard_menu' );
}

function add_wprls_dashboard_menu(){

$pba = 'page-builder-add';
  $pba_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $pba . '&TB_iframe=true&width=950&height=800' ) );

$cfb = 'contact-form-add';
  $cfb_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $cfb . '&TB_iframe=true&width=950&height=800' ) );

$tss = 'testimonial-add';
  $tss_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $tss . '&TB_iframe=true&width=950&height=800' ) );

$lss = 'mailchimp-subscribe-sm';
  $lss_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $lss . '&TB_iframe=true&width=950&height=800' ) );

?>
<div class="lpp_modal" id="pba_link">
  <div class="lpp_modal_wrapper">
  <p class="cls-link"><span class="dashicons dashicons-no-alt" style="color: #fff; font-size: 28px;" ></span></p>
  </div>
</div>



<div id="ulpb_dash_container">
	<h2 style="font-size:20px; font-weight: normal;">Layer Slider Dashboard</h2>

	<div class="tabs">
		<ul class="tab-links">
		    <li class="active"><a href="#tab1" class="tab_link">Welcome</a></li>
	  </ul>

		<div class="tab-content">
			<div id="tab1" class="tab active">
				<h2>Welcome to Layer Slider by Web Settler</h2>
				<p>Thank you for choosing the Layer Slider plugin and welcome to the community. Find some useful information below and learn how to create beautiful Sliders in minutes.</p>
				<br>
				<h3>Getting Started - Create Your First Slider</h3>
        <br>
        <a href="<?php echo admin_url('admin.php?page=wprls_add_slider'); ?>" target="_blank" style="font-size:14px; font-weight: bold;">Layer Slider - Add New Layer Slider</a>
        <p>Ready to start creating Sliders ? Jump into the Slider by clicking the Add new button under the Slider menu.</p>
        <br>
        <br>
        <br>
        <br>
        <div style="float: left; width: 100%;">
          <hr>
          <br>
            <div class="video-card">
	          <iframe width="350" height="300" src="https://www.youtube.com/embed/e2hnpm9RN74" frameborder="0" allowfullscreen></iframe>
	          <h3>Page Builder Plugin</h3>
	          <a href="<?php  echo $pba_install_link;?>" target='_blank'> <button class="install-btn" id="pba_link">Install Free</button>
	          <br>
	        </div>
	        <div class="video-card">
	          <iframe width="350" height="300" src="https://www.youtube.com/embed/CLzTCIKn85M" frameborder="0" allowfullscreen></iframe>
	          <h3>Form Builder Plugin</h3>
	          <a href="<?php  echo $cfb_install_link;?>" target='_blank'><button class="install-btn" id="cfb_link">Install Free</button></a>
	          <br>
	        </div>
	        <div class="video-card">
	          <img src="https://ps.w.org/testimonial-add/assets/icon-250x250.png" width="350" height="300">
	          <h3>Testimonials Plugin</h3>
	          <a href="<?php  echo $tss_install_link;?>" target='_blank'> <button class="install-btn" id="tss_link">Install Free</button> </a>
	          <br>
	        </div>
	        <div class="video-card">
	          <img src="https://ps.w.org/mailchimp-subscribe-sm/assets/icon-128x128.png" width="350" height="300">
	          <h3>Subscribe Form Plugin</h3>
	          <a href="<?php  echo $lss_install_link;?>" target='_blank'> <button class="install-btn" id="lss_link">Install Free</button></a>
	          <br>
	        </div>
		</div>
      </div>
      <div id="tab2" class="tab">

      </div>
      <div id="tabUpdates" class="tab">
      <h3>V. 3.9.5</h3>
        <li> MailChimp Integration Free for everyone.</li>
        <li> GetResponse Integration free for everyone.</li>
        <li> Unlimited subscribers for each subscribe form.</li>
        <br>
        <br>
        <hr>
        <h3>V. 3.9.1</h3>
        <li> Added popup feature for Sliders.</li>
        <li> Added subscribe form preview.</li>
        <li> Fixed desgin bug.</li>
        <br>
        <br>
        <hr>
      </div>
		</div>
	</div>
</div>

<style type="text/css">
	.tab_link{
  text-decoration:none;
}
.lpp_modal{
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.73);
  margin: 0 auto;
  z-index: 9999;
  display: none;
}
.lpp_modal_wrapper{
  margin:7% 20%; 
  width: 65%;
  min-height: 700px;
  background: rgba(0, 0, 0, 0.73);
  display: inline-block;
}

.cls-link{
    color: #e4e4e4;
    cursor: pointer;
    padding: 30px 40px;
    margin: -71px;
    float: right;
}
.tabs {
  width:auto;
  display:inline-block;
}
 
   
.tab-links:after {
  display:block;
  clear:both;
  content:'';
}

.video-card{
  display: inline-block;
  float: left;
  max-width:460px;
  background: #fff;
  border:1px solid #d3d3d3;
  text-align: center;
  margin-right: 15px;
  margin-bottom: 40px;
}

.install-btn{
    background: #2196F3;
    border: none;
    color: #fff;
    padding: 9px 20px;
    margin-bottom: 15px;
    cursor: pointer;
    font-size: 16px;
}

.tab-links li {
  margin:0px 5px;
  float:left;
  list-style:none;
}

.tab-links a {
  padding:9px 20px;
  display:inline-block;
  border-radius:7px 7px 0px 0px;
  background:#7fc9fb;
  font-size:16px;
  font-weight:600;
  color:#fff;
  transition:all linear 0.15s;
}
 
.tab-links a:hover {
background:#2fa8f9;
text-decoration:none;
}
 
li.active a, li.active a:hover {
  background:#fff;
  color:#2fa8f9;
}
 

.tab-content {
  border-radius:3px;
  box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
  background:#fff;
}
 
.tab {
	padding: 20px 40px;
  display:none;
  min-width: 60%;
  min-height: 600px
}
 
.tab.active {
  display:block;
}

body{
  background: #F3F6F8 !important;
}


</style>

<script type="text/javascript">
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });

/*
    jQuery('.install-btn').on('click', function(e){
      var currentClickedID = jQuery(this).attr('id');
      console.log(currentClickedID);
      jQuery('#'+currentClickedID).slideDown(500);
    });

    jQuery('.cls-link').on('click', function(){
      jQuery('.lpp_modal').slideUp(200);
    }); */
</script>
<?php 

}

?>