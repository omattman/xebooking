<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// Add readmore_script to server to fold text on profiles
function add_main_js() {
    wp_enqueue_script(
        'main-js',
        get_stylesheet_directory_uri() . '/js/main.js',
        array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'add_main_js' );


// Ignore styling of Easy Forms to style Opt-In forms
if( ! defined( YIKES_MAILCHIMP_EXCLUDE_STYLES ) ) {
   define( YIKES_MAILCHIMP_EXCLUDE_STYLES, true );
}


// END ENQUEUE PARENT ACTION
