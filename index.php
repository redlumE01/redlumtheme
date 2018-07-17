<?php  get_header(); ?>

<main id="main" class="site-main" role="main">
	<article>
		<?php
			if (have_posts()) :
			   while (have_posts()) :
			      the_post();
			         the_content();
			   endwhile;
			endif;
		?>
	</article>
</main>

<?php get_footer(); ?>
