<?php wp_head(); ?>

<?php  get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post();
		the_content();
		endwhile;
	?>
</main>

<?php get_footer(); ?>

<?php wp_footer(); ?>
