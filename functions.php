<?php

// includes
require "functionality/theme-options.php";

require "functionality/theme-settings.php";

require "functionality/shortcodes.php";
require "functionality/custom_walkers.php";
require "functionality/register_widgets.php";

// the bundle
function redlum_scripts_and_styling() {

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            wp_enqueue_script(
                'bundle',
                get_stylesheet_directory_uri() . '/dist/index.js',
                array('jquery'),
                filemtime(get_stylesheet_directory() . '/dist/index.js'),
                false
            );
        }
}

add_action( 'wp_enqueue_scripts', 'redlum_scripts_and_styling', 999 );

// register logo

function redlum_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'redlum_custom_logo_setup' );

// register menus

function redlum_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'mobile-menu' => __( 'Mobile Menu' )
    )
  );
}

add_action( 'init', 'redlum_register_menus' );

// permit certain mimes types

function redlum_custom_upload_mimes($mimes = array()) {
  $mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_action('upload_mimes', 'redlum_custom_upload_mimes');

// Add post thumbnails
add_theme_support( 'post-thumbnails' );

// Add image sizes

function redlum_theme_images_setup() {
    add_image_size( 'fullscreen-size', 1640, 923, array( 'center', 'center' ) );
    add_image_size( 'postgrid_thumb', 390, 260, array( 'center', 'center' ) );
}

add_action( 'after_setup_theme', 'redlum_theme_images_setup' );