<?php

// includes
require "inc/options/theme-options.php";
require "inc/nav_menus/menu-class.php";
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


// register menus
function redlum_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'mobile-menu' => __( 'Mobile Menu' )
    )
  );
}

// permit svg types
function redlum_custom_upload_mimes($mimes = array()) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

// Gutenberg editor styling
function gutenberg_setup() {

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'dist/gutenberg.css' );

	// Disable Custom Colors (color wheel)
	//add_theme_support( 'disable-custom-colors');


	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'editor-font-sizes', array() );


//	add_theme_support( 'disable-drop-cap' );
//	add_theme_support( 'disable-custom-font-sizes' );

	// Add Custom color palette + needed to created in stylesheet also

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Blue', 'ea-starter' ),
			'slug'  => 'blue',
			'color'	=> '#59BACC',
		),
		array(
			'name'  => __( 'Green', 'ea-starter' ),
			'slug'  => 'green',
			'color' => '#58AD69',
		),
		array(
			'name'  => __( 'Orange', 'ea-starter' ),
			'slug'  => 'orange',
			'color' => '#FFBC49',
		),
		array(
			'name'	=> __( 'Red', 'ea-starter' ),
			'slug'	=> 'red',
			'color'	=> '#E2574C',
		)
	));

	// Responsive embeds (youtube, iframe)
	add_theme_support( 'responsive-embeds' );

}


// Theme images setup
function redlum_theme_images_setup() {
	add_image_size( 'fullscreen-size', 1640, 923, array( 'center', 'center' ) );
	add_image_size( 'postgrid_thumb', 520, 292, true  );
}

// Add all actions
add_action( 'wp_enqueue_scripts', 'redlum_scripts_and_styling', 999 );
add_action( 'after_setup_theme', 'redlum_custom_logo_setup' );
add_action( 'after_setup_theme', 'redlum_theme_images_setup' );
add_action( 'after_setup_theme', 'gutenberg_setup' );

add_action( 'init', 'redlum_register_menus' );
add_action(	'upload_mimes', 'redlum_custom_upload_mimes');


// Add post thumbnails
add_theme_support( 'post-thumbnails' );

// Gutenberg full width
add_theme_support( 'align-wide' );

// The excerpt length
function custom_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// The excerpt ending

function excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'excerpt_more' );

// Translation

load_theme_textdomain('redlumtheme', get_template_directory() . '/languages');

// Create image class for Lozad Lazy Loader

function add_lozad_class($content) {
	global $post;
	$imgClassPattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
	$imgClassReplace = '<img$1class="$2 lozad"$3>';
	$content = preg_replace($imgClassPattern, $imgClassReplace, $content);
	return $content;
}

add_filter('the_content', 'add_lozad_class');

function change_lozad_src($content) {
	global $post;
	$content=preg_replace('~<img[^>]*\K(?=src=)~i','data-',$content);
	$content=preg_replace('~<img[^>]*\K(?=srcset=)~i','data-',$content);
	return $content;
}

add_filter('the_content', 'change_lozad_src');

// Unregister overloaded widgets
function remove_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Media_Audio' );
	unregister_widget( 'WP_Widget_Media_Image' );
	unregister_widget( 'WP_Widget_Media_Video' );
	unregister_widget( 'WP_Widget_Media_Gallery' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}

add_action( 'widgets_init', 'remove_widgets' );

// Remove comments functionality
add_action('admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;

	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Disable support for comments and trackbacks in post types
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});




