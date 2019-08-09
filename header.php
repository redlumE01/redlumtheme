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

<header class="header ">

	<?php
        if (function_exists( 'redlum_custom_logo_setup') && the_custom_logo() !== null ){
            the_custom_logo();
        }
    ?>

	<?php
		if ( has_nav_menu( 'header-menu' ) ) {
			wp_nav_menu( array('theme_location'=>'header-menu', 'container' => 'nav', 'menu_class' => 'nobullets headmenu01'));
		}
	?>

    <?php if ( has_nav_menu( 'mobile-menu' ) ) {  ?>
        <div class="mobile_menu">

            <div class="mobile_btn">
                <span>Menu</span>
                <svg class="mobile_menu" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">><g><g id="Navicon" transform="translate(330.000000, 232.000000)"><polygon class="hamburger" id="Fill-19" points="-321.8,-219 -274.3,-219 -274.3,-212.7 -321.8,-212.7 "/><polygon class="hamburger" id="Fill-20" points="-321.8,-203.2 -274.3,-203.2 -274.3,-196.8 -321.8,-196.8 "/><polygon class="hamburger" id="Fill-21" points="-321.8,-187.3 -274.3,-187.3 -274.3,-181 -321.8,-181 "/></g></g></svg>
                <svg class='mobile_close' x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><g><line fill="none" x1="2.929" y1="17.071" x2="17.071" y2="2.929"/></g><g><line fill="none" x1="2.929" y1="2.929" x2="17.071" y2="17.071"/></g></svg>
            </div>

            <?php

                wp_nav_menu(array(
                    'walker' => new Nav_Mobile01_Walker(),
                    'container'=>'nav',
                    'menu_class' => 'nobullets mobmenu',
                    'theme_location'=>'mobile-menu',
                    'fallback_cb'=>false )
                );
            ?>
        </div>
        <?php

        }
    ?>



</header>

<body <?php body_class(); ?>>
