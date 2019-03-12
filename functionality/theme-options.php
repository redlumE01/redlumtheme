<?php

class Redlum_Customize {

    public static function register ( $wp_customize ) {

        // remove sections
        $wp_customize->remove_section('custom_css');

        // Panels
        require "customized_panels.php";

        // Element Sections
        require "customized_sections.php";

        // Controls & Settings
        require "customized_setcontrols.php";

    }

    public static function header_output() {
        ?>
        <!--Customizer CSS-->
        <style type="text/css">

            <?php self::generate_css('body', 'background-color', 'body_color'); ?>
            <?php self::generate_css('h1', 'color', 'h1color'); ?>
            <?php self::generate_css('h2', 'color', 'h2color'); ?>
            <?php self::generate_css('h3', 'color', 'h3color'); ?>
            <?php self::generate_css('h4', 'color', 'h4color'); ?>
            <?php self::generate_css('h5', 'color', 'h5color'); ?>
            <?php self::generate_css('h6', 'color', 'h6color'); ?>
            <?php self::generate_css('a', 'color', 'link_textcolor'); ?>

            <?php self::generate_css('.header', 'background-color', 'header_desktop_color'); ?>
            <?php self::generate_css('.footer', 'background-color', 'footer_color'); ?>

            <?php self::generate_css('.headmenu01 .sub-menu li', 'background-color', 'header_submenu_color'); ?>
            <?php self::generate_css('.header nav a', 'color', 'header_desktop_link_color'); ?>

            <?php self::generate_css('.hamburger', 'fill', 'header_desktop_link_color'); ?>
            <?php self::generate_css('.mobile_close', 'stroke', 'header_desktop_link_color'); ?>

            <?php self::generate_css('.mobmenu', 'background-color', 'mobile_menu_color'); ?>
            <?php self::generate_css('.mobmenu li ul li', 'background-color', 'mobile_menu_color_lvl1'); ?>

        </style>
        <!--/Customizer CSS-->
        <?php
    }

    public static function live_preview() {
        wp_enqueue_script(
            'mytheme-themecustomizer', // Give the script a unique ID
            get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
            array(  'jquery', 'customize-preview' ), // Define dependencies
            '', // Define a version (optional)
            true // Specify whether to put in footer (leave this true)
        );
    }

    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if ( ! empty( $mod ) ) {
            $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix.$mod.$postfix
            );
            if ( $echo ) {
                echo $return;
            }
        }
        return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Redlum_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Redlum_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Redlum_Customize' , 'live_preview' ) );


