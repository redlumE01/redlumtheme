<?php

add_action( 'admin_menu', 'redlum_starter_add_admin_menu' );
add_action( 'admin_init', 'redlum_starter_settings_init' );

// Options Class

class option {

    public function getWidgetCount($int,$words) {

        $widgetCount = get_option( 'redlum_starter_settings' )['redlum_starter_select_widgets_count'];

        if ($int === true) {
            $widgetCount = intval(get_option('redlum_starter_settings' )['redlum_starter_select_widgets_count']);
        }

        if ($words === true) {
            $string = array('one','two','three','four');
            $widgetCount = $string[intval($widgetCount) - 1];
        }

        return $widgetCount;
    }

    public function getWPCustomize() {

        $wpCustomize = get_option( 'redlum_starter_settings' )['redlum_starter_disable_wpcustomizer'];

        return $wpCustomize;
    }

}

function redlum_starter_add_admin_menu(  ) {
    add_menu_page(
        'Template settings',
        'Template settings',
        'manage_options',
        'redlum_starter_settings',
        'redlum_starter_options_page'
        );
    }
function redlum_starter_settings_init(  ) {

    register_setting( 'optionPage', 'redlum_starter_settings' );

    add_settings_section(
        'redlum_starter_optionPage_section',
        '',
        'redlum_starter_settings_section_callback',
        'optionPage'
    );

    add_settings_field(
        'redlum_starter_select_widgets_count',
        __( 'Number of footer widgets:', 'redlum' ),
        'redlum_starter_select_widgets_count_render',
        'optionPage',
        'redlum_starter_optionPage_section'
    );

    add_settings_field(
        'redlum_starter_disable_wpcustomizer',
        __( 'Disable wordpress customizer', 'redlum' ),
        'redlum_starter_disable_wp_custom_render',
        'optionPage',
        'redlum_starter_optionPage_section'
    );

//
//    add_settings_field(
//        'redlum_starter_checkbox_field_2',
//        __( 'Settings field description', 'redlum' ),
//        'redlum_starter_checkbox_field_2_render',
//        'optionPage',
//        'redlum_starter_optionPage_section'
//    );
//
//    add_settings_field(
//        'redlum_starter_radio_field_3',
//        __( 'Settings field description', 'redlum' ),
//        'redlum_starter_radio_field_3_render',
//        'optionPage',
//        'redlum_starter_optionPage_section'
//    );
}
function redlum_starter_text_field_0_render(  ) {

    $options = get_option( 'redlum_starter_settings' );
    ?>
    <input type='text' name='redlum_starter_settings[redlum_starter_text_field_0]' value='<?php echo $options['redlum_starter_text_field_0']; ?>'>
    <?php

}

function redlum_starter_select_widgets_count_render() {

    $options = get_option( 'redlum_starter_settings' );
    ?>

    <select name='redlum_starter_settings[redlum_starter_select_widgets_count]'>
        <option value='1' <?php selected( $options['redlum_starter_select_widgets_count'], 1 ); ?>>1</option>
        <option value='2' <?php selected( $options['redlum_starter_select_widgets_count'], 2 ); ?>>2</option>
        <option value='3' <?php selected( $options['redlum_starter_select_widgets_count'], 3 ); ?>>3</option>
        <option value='4' <?php selected( $options['redlum_starter_select_widgets_count'], 4 ); ?>>4</option>
    </select>

    <?php

}
function redlum_starter_disable_wp_custom_render() {

    $options = get_option( 'redlum_starter_settings' );
    ?>
    <input type='checkbox' name='redlum_starter_settings[redlum_starter_disable_wpcustomizer]' <?php checked( $options['redlum_starter_disable_wpcustomizer'], 1 ); ?> value='1'>
    <?php

}

function test_render(  ) {

    $options = get_option( 'redlum_starter_settings' );
    ?>
    <input type='radio' name='redlum_starter_settings[redlum_starter_radio_field_3]' <?php checked( $options['redlum_starter_radio_field_3'], 1 ); ?> value='1'>
    <?php

}


function redlum_starter_settings_section_callback(  ) {

    echo __( 'Use the options below to fit your needs', 'redlum' );

}


function redlum_starter_options_page(  ) {

    ?>
    <form action='options.php' method='post'>

        <h2>Template settings</h2>

        <?php
            settings_fields( 'optionPage' );
            do_settings_sections( 'optionPage' );
            submit_button();
        ?>

    </form>
    <?php

}