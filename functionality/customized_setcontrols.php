<?php

$wp_customize->add_setting( 'header_desktop_color',
    array(
        'default'    => '#696969',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'header_desktop_color',
    array(
        'label'      => __( 'Header color', 'redlumtheme' ),
        'settings'   => 'header_desktop_color',
        'section'    => 'element_color_options',
    )
));

$wp_customize->add_setting( 'header_submenu_color',
    array(
        'default'    => '#696969',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'header_submenu_color',
    array(
        'label'      => __( 'Submenu color', 'redlumtheme' ),
        'settings'   => 'header_submenu_color',
        'section'    => 'element_color_options',
    )
));

$wp_customize->add_setting( 'footer_color',
    array(
        'default'    => '#f0f0f0',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'footer_color',
    array(
        'label'      => __( 'Footer background color', 'redlumtheme' ),
        'settings'   => 'footer_color',
        'section'    => 'element_color_options',
    )
));

$wp_customize->add_setting( 'header_desktop_link_color',
    array(
        'default'    => '#ffffff',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'header_desktop_link_color',
    array(
        'label'      => __( 'Header Links color', 'redlumtheme' ),
        'settings'   => 'header_desktop_link_color',
        'section'    => 'element_color_options',
    )
));

// Body color

$wp_customize->add_setting( 'body_color',
    array(
        'default'    => '#FFFFFF',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'body_color',
    array(
        'label'      => __( 'Background body color', 'redlumtheme' ),
        'settings'   => 'body_color',
        'section'    => 'element_color_options',
    )
));

for( $i = 1; $i<7; $i++ ) {
    $wp_customize->add_setting( 'h'.$i.'color',
        array(
            'default'    => '#35291f',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'redlum_h"'.$i.'"color',
        array(
            'label'      => __( 'Header '.$i.' color', 'redlumtheme' ),
            'settings'   => 'h'.$i.'color',
            'section'    => 'text_color_options',
        )
    ));
}


$wp_customize->add_setting( 'link_textcolor',
    array(
        'default'    => '#757575',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'mytheme_link_textcolor',
    array(
        'label'      => __( 'Link color', 'redlumtheme' ),
        'settings'   => 'link_textcolor',
        'priority'   => 10,
        'section'    => 'link_color_options',
    )
) );
