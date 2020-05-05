<?php
/*
Plugin Name: Layer Slider
Plugin URI: http://web-settler.com/layer-slider-plugin/
Description: Create beautiful, responsive and modern sliders with Layers support.
Version: 1.1.4
Author: Web-Settler
Author URI: http://web-settler.com/layer-slider-plugin/
License: GPL v2
*/



include plugin_dir_path( __FILE__ ) . 'config.php';

include ROCKETLAYERSLIDER_PLUGIN_ADMIN_DIRECTORY . 'core_functions.php';
__load_wprls();
include 'dashboard.php';

register_activation_hook(__FILE__, 'wprls_plugin_activation');
add_action('admin_init', 'wprls_plugin_redirect_activation');

function wprls_plugin_activation() {
flush_rewrite_rules();
add_option('wprls_plugin_activation_check_option', true);
}

function wprls_plugin_redirect_activation() {
if (get_option('wprls_plugin_activation_check_option', false)) {
    delete_option('wprls_plugin_activation_check_option');
    if(!isset($_GET['activate-multi']))
    {
        wp_redirect("admin.php?page=wprls_dashboard");
        exit();
    }
 }
}