<?php

class redlum_Customize {

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

    public static function header_output() { ?>
        <!--Customizer CSS-->
        <style type="text/css">
			<?php

				self::generate_css('body', 'background-color', 'body_color');
				self::generate_css('h1', 'color', 'h1color');
				self::generate_css('h2', 'color', 'h2color');
				self::generate_css('h3', 'color', 'h3color');
				self::generate_css('h4', 'color', 'h4color');
				self::generate_css('h5', 'color', 'h5color');
				self::generate_css('h6', 'color', 'h6color');
				self::generate_css('p', 'color', 'p_color');

				self::generate_css('.footer h1', 'color', 'footer_h1color');
				self::generate_css('.footer h2', 'color', 'footer_h2color');
				self::generate_css('.footer h3', 'color', 'footer_h3color');
				self::generate_css('.footer h4', 'color', 'footer_h4color');
				self::generate_css('.footer h5', 'color', 'footer_h5color');
				self::generate_css('.footer h6', 'color', 'footer_h6color');

				self::generate_css('.footer p', 'color', 'footer_p_color');

				self::generate_css('a', 'color', 'link_textcolor');

				self::generate_css('.header', 'background-color', 'header_desktop_color');
				self::generate_css('.footer', 'background-color', 'footer_color');

				self::generate_css('.nav .sub-menu li', 'background-color', 'header_submenu_color');
				self::generate_css('.header nav a', 'color', 'header_desktop_link_color');

				self::generate_css('.hamburger', 'fill', 'header_desktop_link_color');
				self::generate_css('.mobile_close', 'stroke', 'header_desktop_link_color');

				self::generate_css('.mobmenu', 'background-color', 'mobile_menu_color');
				self::generate_css('.mobmenu li ul li', 'background-color', 'mobile_menu_color_lvl1');
			?>

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

$option = new option();

if ($option::getWPCustomize() === '1') {
    add_action( 'customize_register' , array( 'redlum_Customize' , 'register' ) );
    add_action( 'wp_head' , array( 'redlum_Customize' , 'header_output' ) );
    add_action( 'customize_preview_init' , array( 'redlum_Customize' , 'live_preview' ) );
}
