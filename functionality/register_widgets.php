<?php

function redlum_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer column one',
		'id'            => 'footer_col_one',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	register_sidebar( array(
		'name'          => 'Footer column two',
		'id'            => 'footer_col_two',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	register_sidebar( array(
		'name'          => 'Footer column three',
		'id'            => 'footer_col_three',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	register_sidebar( array(
		'name'          => 'Footer column four',
		'id'            => 'footer_col_four',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
}

add_action( 'widgets_init', 'redlum_widgets_init' );
