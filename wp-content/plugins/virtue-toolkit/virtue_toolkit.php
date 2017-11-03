<?php

/*
Plugin Name: Kadence Toolkit
Description: Custom Portfolio and Shortcode functionality for free Kadence WordPress themes
Version: 4.5
Author: Kadence Themes
Author URI: https://kadencethemes.com/
License: GPLv2 or later
*/

function virtue_toolkit_activation() {
	flush_rewrite_rules();
	get_option('kadence_toolkit_flushpermalinks', '1');
}
register_activation_hook(__FILE__, 'virtue_toolkit_activation');

function virtue_toolkit_deactivation() {
}
register_deactivation_hook(__FILE__, 'virtue_toolkit_deactivation');

add_filter( 'kadence_theme_options_args', 'virtue_toolkit_redux_args_new');
function virtue_toolkit_redux_args_new( $args ) {
    $args['customizer_only'] = false;
    $args['save_defaults'] = true;
    return $args;
}

if(!defined('VIRTUE_TOOLKIT_PATH')){
	define('VIRTUE_TOOLKIT_PATH', realpath(plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR );
}
if(!defined('VIRTUE_TOOLKIT_URL')){
	define('VIRTUE_TOOLKIT_URL', plugin_dir_url(__FILE__) );
}

require_once('kadence_image_processing.php');
require_once('post-types.php');
require_once('gallery.php');
require_once('author_box.php');
require_once('shortcodes.php');
require_once('shortcode_ajax.php');
require_once('pagetemplater.php');
require_once('metaboxes.php');
require_once('welcome.php');

function virtue_toolkit_textdomain() {
  load_plugin_textdomain( 'virtue-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action( 'plugins_loaded', 'virtue_toolkit_textdomain' );


function virtue_toolkit_admin_scripts() {
  wp_register_style('virtue_toolkit_adminstyles', VIRTUE_TOOLKIT_URL . '/assets/toolkit_admin.css', false, 23);
  wp_enqueue_style('virtue_toolkit_adminstyles');

}

add_action('admin_enqueue_scripts', 'virtue_toolkit_admin_scripts');

function virtue_toolkit_flushpermalinks() {
	$hasflushed = get_option('kadence_toolkit_flushpermalinks', '0');
	if($hasflushed != '1') {
		flush_rewrite_rules();
		update_option('kadence_toolkit_flushpermalinks', '1');
	}
}
add_action('init', 'virtue_toolkit_flushpermalinks');


add_action( 'after_setup_theme', 'virtue_toolkit_add_in_slider_sections', 1);
function virtue_toolkit_add_in_slider_sections() {
	$the_theme = wp_get_theme();
	// Ascend only 
	if( $the_theme->get( 'Name' ) == 'Ascend' || $the_theme->get( 'Template') == 'ascend' ) {

	    if ( ! class_exists( 'Redux' ) ) {
	        return;
	    }
	    if(ReduxFramework::$_version <= '3.5.6') {
	        return;
	    }

	    $options_slug = 'ascend';
	    $home_header = Redux::getField($options_slug, 'home_header');
	    if(is_array($home_header)){
	    	$hextras = array('basic' => __('Basic Slider', 'ascend'), 'basic_post_carousel' => __('Post Carousel', 'ascend'));
	    	$home_header['options'] = array_merge($hextras, $home_header['options']);
	    }
	    Redux::setField($options_slug, $home_header);
	}
}



