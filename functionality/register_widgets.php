<?php

function redlum_widgets_init() {
    $widgetCount = (int)get_option( 'redlum_starter_settings' )['redlum_starter_select_widgets_count'] + 1;
    for( $i = 1; $i < $widgetCount ; $i++ ) {
        register_sidebar( array(
            'name'          => 'Footer column '.$i.'',
            'id'            => 'footer_col_'.$i.'',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
    }
}

add_action( 'widgets_init', 'redlum_widgets_init' );
