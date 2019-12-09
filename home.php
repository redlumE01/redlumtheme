<?php  get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>

        <section class="grid standard postlist">
            <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/post' );
                endwhile;
            ?>
        </section>

    <?php endif; ?>

    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>

</main>

<?php get_footer(); ?>
