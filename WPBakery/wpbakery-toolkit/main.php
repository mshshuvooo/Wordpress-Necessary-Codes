<?php
/*
Plugin Name:  THEMENAME Toolkit
Author: Shahadat Shuvo
Author URI: https://shuvombm.com
Description: This is the helper plugin of THEMENAME Theme. Don't delete this this plugin. 
Version: 1.0.0
*/
//Exit accessed directly
if(! defined('ABSPATH')){
	exit;
}
//Define
define('THEMENAME_ACC_URL', WP_PLUGIN_URL .'/'. plugin_basename(dirname(__FILE__)) .'/');
define('THEMENAME_ACC_PATH', plugin_dir_path(__FILE__) );
//Print shortcode in widgets
add_filter('widget_text', 'do_shortcode');
//Lodeing vc addons
require_once(THEMENAME_ACC_PATH. 'vc-addons/vc-blocks-load.php');
//Theme shortcode
//require_once(THEMENAME_ACC_PATH. 'theme-shortcodes/slide-shortcode.php');
//Shortcode depends on visual composer
include_once(ABSPATH. 'wp-admin/includes/plugin.php');
if(is_plugin_active('js_composer/js_composer.php')){
	//require_once(THEMENAME_ACC_PATH. 'theme-shortcodes/staff-shortcode.php');
}
//Registering THEMENAME toolkit files
function THEMENAME_toolkit_files(){
	wp_enqueue_style('owl-carousel', plugin_dir_url(__FILE__). '/assets/css/owl.carousel.css');
	wp_enqueue_style('toolkit-css', plugin_dir_url(__FILE__). '/assets/css/toolkit.css');
	wp_enqueue_script('owl-carousel', plugin_dir_url(__FILE__). '/assets/js/owl.carousel.min.js', array('jquery'), '3.7.0', true);
	wp_enqueue_script('isotope', plugin_dir_url(__FILE__). '/assets/js/isotope3.0.6.min.js', array('jquery'), '3.0.6', true);
	
}
add_action('wp_enqueue_scripts', 'THEMENAME_toolkit_files');