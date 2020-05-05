<style>

.wp_rls_heading{
	font-size: 23px;
    font-weight: 400;
    padding: 9px 15px 4px 0;
    line-height: 29px;
    float:left;
    width: auto;
    height: 0px;
}
.wp_rls_heading2{
	font-size: 23px;
    font-weight: 400;
    padding: 0px 0px 4px 0;
    line-height: 29px;
    margin-left: -120px;
}
#slr_slider_preview_box{
	width:620px;
	height: 360px;
	margin-left: 20%;
	background-color: gray;
}
.wp_rls_add_new_button{

	margin-top: 29px;
	margin-left: 0px;
    padding: 4px 8px;
    position: relative;
    top: -3px;
    text-decoration: none;
    border: none;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    background: #e0e0e0;
    text-shadow: none;
    font-weight: 600;
    font-size: 13px;
    color: #0073aa;
    -webkit-transition-property: border,background,color;
    transition-property: border,background,color;
    -webkit-transition-duration: .05s;
    transition-duration: .05s;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
}
#wp_rls_slider_preview{
	text-align: center;
}
.wp_rls_add_new_button:hover{
	background-color:#0073aa;
	cursor: pointer;
	color:white;
}
.wp_rls_heading_div{
	display: block;
    width: 100%;
    height: 50px;
 



}
#rls_sliders_table .header{
	height: 28px;
    position: relative;
    line-height: 28px;
    border-radius: 3px 3px 0 0;
    font: normal normal bold 12px/29px Arial, serif;
    background: #F1F1F1;
}
.wp_rls_delete_img{
	width: 12px;

}
.wp_rls_edit_img{
	width: 24px;

}
.wp_rls_preview_img{
	width: 18px;

}
#rls_sliders_table{
	width: 97%;
 
    border-spacing: 0px;
}
table a:link {
	
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin-top:20px;
	border:#ccc 1px solid;
	width: 90%;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:15px 25px 15px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child{
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child{
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr{
	text-align: center;
	padding-left:20px;
}
table tr td:first-child{
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table tr td {
	padding:12px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr .wp_rls_chkcx_width{
	width:23px;
}
table tr .wp_rls_slides_width{
	width:40px;
}
table tr .wp_rls_options_width{
	width:50px;
}
table tr.even td{
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
	border-bottom:0;
}
table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td{
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

.slidertitle_link a strong{
	color: #000;
}

#sliders_page_cont *{
	font-family: "Open Sans";
}
</style>
<div id="sliders_page_cont">
	<div id="wp_rls_heading_div" class="wp_rls_heading_div">
	<h1 id="wp_rls_heading" class="wp_rls_heading">Sliders</h1>
	<input id="wp_rls_add_new_button" class="wp_rls_add_new_button" type="button" value="Add New" onclick="window.location = '<?php echo admin_url('admin.php?page=wprls_add_slider&new_post=1') ?>'">
	</div>

	<div>
	<hr>
	<table border="0" id="rls_sliders_table">
		
		<tr>
			<th>Name</th>
			<th>Slides</th>
			<th>Shortcode</th>
			<th>Created</th>
			<th>Options</th>
		</tr>

		<?php $sliders = wprls_get_sliders(); $even_odd = true; ?>
			
		<?php foreach ( $sliders as $slider  ): ?>

			<tr class='<?php if ( $even_odd ) echo 'even'; else echo 'odd';  ?>'>
				
				<td><a class="slidertitle_link" href="<?php echo admin_url('admin.php?page=wprls_add_slider&action=edit_slider&post_id=' . $slider->ID ) ?>"><strong><?php echo get_the_title( $slider->ID ) ?></strong></a></td>
				
				<td class="wp_rls_slides_width"><?php echo wprls_get_slides_count( $slider->ID ) ?></td>
				<td id="wprlsshortcodecopy">[rlslider id=<?php echo $slider->ID ?>]</td>
				<td><?php echo get_the_date( 'l, F j, Y', $slider->ID  ); ?></td>
				<td class="wp_rls_options_width">
				<a id="slr_edit_slider" href="#">
					<img alt="Edit" onclick="window.location='<?php echo admin_url('admin.php?page=wprls_add_slider&action=edit_slider&post_id=' . $slider->ID ) ?>'" class="wp_rls_edit_img" src="<?php echo  plugins_url( 'images/wp_rls_edit_slider_img.png', dirname( dirname( __FILE__ ) ) ) ?>" />
				</a>/ 
				<a id="slr_delete_slider" href="#">
					
					<img alt="Delete" class="wp_rls_delete_img" data-id="<?php echo intval($slider->ID) ?>" src="<?php echo  plugins_url( 'images/wp_rls_delete_slider_img.png', dirname( dirname( __FILE__ ) ) ) ?>" />
				</a>
				
				</td>
			</tr>

		<?php if ( $even_odd ) $even_odd = false; else $even_odd = true; 
		endforeach; ?>

		<?php if ( ! $sliders ) : ?>

			<div id="noSlidesMessage" style="text-align: center">
				<h3>
					No sliders. Click the + <a href="<?php echo admin_url('admin.php?page=wprls_add_slider&new_post=1') ?>">Add New</a> to create your first slider.
				</h3>
			</div>

		<?php endif; ?>
	
	</table>
</div>

</div>
<br />
<p class="description">*Enter the shortcode in your post or page content editor to display the slider.</p>

<script>
jQuery('.wp_rls_delete_img').click(function() {

		id = jQuery(this).data('id');

		url = '<?php echo admin_url() ?>' + 'admin.php?page=wprls_sliders_page&action=delete_slider&post_id=' + id;

		if ( confirm( 'Are you sure you want to remove this slider ? ' ) ) {

			window.location = url;
		
		}


	});
</script>