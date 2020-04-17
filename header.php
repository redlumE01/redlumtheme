<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo get_the_title(); echo ' | ';  bloginfo( 'name' ); ?></title>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.js" async></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>

<header class="header">

	<?php

        if (function_exists( 'redlum_custom_logo_setup') && the_custom_logo() !== null ){
            the_custom_logo();
        }

        echo Menu::renderWPmenu();

    ?>

</header>

<body <?php body_class(); ?>>
