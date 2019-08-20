<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<p>', '</p>' );
        ?>

        <section class="grid standard listedPosts">
            <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/post' );
                endwhile;
            ?>
        </section>

    <?php endif; ?>

    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>

</main>

<?php get_footer();
