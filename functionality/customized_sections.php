<?php

$wp_customize->add_section('element_color_options',array(
    'title'=>'Site element colors',
    'priority'=>1,
    'panel'=>'color_panel',
));

$wp_customize->add_section('text_color_options',array(
    'title'=>'Text colors',
    'priority'=>2,
    'panel'=>'color_panel',
));

$wp_customize->add_section('footer_color_options',array(
    'title'=>'Footer colors',
    'priority'=>2,
    'panel'=>'color_panel',
));

$wp_customize->add_section('link_color_options',array(
    'title'=>'Link element colors',
    'priority'=>3,
    'panel'=>'color_panel',
));

$wp_customize->add_section( 'color_options',
    array(
        'title'       => __( 'Template Colors (old)', 'redlumtheme' ),
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize certain template colors.', 'redlumtheme'),
        'priority'   => 1,
    )
);