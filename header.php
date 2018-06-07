<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo get_the_title(); echo ' | ';  bloginfo( 'name' ); ?></title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>

</head>

<header class="clearfloat header">
	<?php if ( function_exists( 'redlum_custom_logo_setup' ) ) {the_custom_logo();} ?>

	<?php
		if ( has_nav_menu( 'header-menu' ) ) {
			wp_nav_menu( array('theme_location'=>'header-menu', 'container' => 'nav', 'menu_class' => 'nobullets headmenu01'));
		}
	?>

<svg class="mobile_menu" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">><g><g id="Navicon" transform="translate(330.000000, 232.000000)"><polygon class="hamburger" id="Fill-19" points="-321.8,-219 -274.3,-219 -274.3,-212.7 -321.8,-212.7 "/><polygon class="hamburger" id="Fill-20" points="-321.8,-203.2 -274.3,-203.2 -274.3,-196.8 -321.8,-196.8 "/><polygon class="hamburger" id="Fill-21" points="-321.8,-187.3 -274.3,-187.3 -274.3,-181 -321.8,-181 "/></g></g></svg>
<svg class='mobile_close' enable-background='new 0 0 100 100' viewBox='0 0 100 100' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><polygon class="" fill='#000000' points='77.6,21.1 49.6,49.2 21.5,21.1 19.6,23 47.6,51.1 19.6,79.2 21.5,81.1 49.6,53 77.6,81.1 79.6,79.2  51.5,51.1 79.6,23 '/></svg>
</header>

<?php
	if ( has_nav_menu( 'mobile-menu' ) ) {
		//wp_nav_menu( array('theme_location'=>'mobile-menu', 'container' => 'nav', 'menu_class' => 'nobullets mobmenu'));

		wp_nav_menu(array('walker' => new Nav_Mobile01_Walker(), 'container'=>'nav', 'menu_class' => 'nobullets mobmenu', 'theme_location'=>'mobile-menu', 'fallback_cb'=>false ));
	}
?>

<body>
