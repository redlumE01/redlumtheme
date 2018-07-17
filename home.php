<?php  get_header(); ?>

<main id="main" class="site-main" role="main">
	<article>
			<?php  echo do_shortcode( '[restApiPostLoader numberofposts="3"  usefilter=""]' ); ?>
	</article>
</main>

<?php get_footer(); ?>
