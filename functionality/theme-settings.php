<?php

class Redlum_Customize {

    public static function register ( $wp_customize ) {

        // Define color section

        $wp_customize->add_section( 'color_options',
            array(
                'title'       => __( 'Template Colors', 'redlumtheme' ), //Visible title of section
                'capability'  => 'edit_theme_options', //Capability needed to tweak
                'description' => __('Allows you to customize certain template colors.', 'redlumtheme'), //Descriptive tooltip
                'priority'   => 1,
            )
        );

        // Body color

        $wp_customize->add_setting( 'body_color',
            array(
                'default'    => '#FFFFFF',
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'body_color',
            array(
                'label'      => __( 'Background body color', 'redlumtheme' ),
                'settings'   => 'body_color',
                'section'    => 'color_options',
            )
        ) );

        // Header options

        for( $i = 1; $i<7; $i++ ) {
            $wp_customize->add_setting( 'h'.$i.'color',
                array(
                    'default'    => '#35291f',
                    'type'       => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport'  => 'postMessage',
                )
            );

            $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize,
                'redlum_h"'.$i.'"color',
                array(
                    'label'      => __( 'Header '.$i.' color', 'redlumtheme' ),
                    'settings'   => 'h'.$i.'color',
                    'section'    => 'color_options',
                )
            ) );
        }


        $wp_customize->add_setting( 'link_textcolor',
            array(
                'default'    => '#2BA6CB',
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'mytheme_link_textcolor',
            array(
                'label'      => __( 'Link color', 'redlumtheme' ),
                'settings'   => 'link_textcolor',
                'priority'   => 10,
                'section'    => 'color_options',
            )
        ) );

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
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix.$mod.$postfix
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


