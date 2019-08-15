<?php

// Load posts

function loadPosts(){
     if ( have_posts() ) : ?>
        <section class="grid standard listedPosts">
            <?php
                while ( have_posts() ) : the_post(); ?>
                    <?php $categories = get_the_category(); ?>
                    <article>
                        <?php

                            if ( has_post_thumbnail() ) {

                                $image_id = get_post_thumbnail_id(get_the_id());
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                $image_title = get_the_title($image_id);

//                                echo "<figure><img src='".get_the_post_thumbnail_url('','postgrid_thumb')."' alt='".$image_alt."' title='".$image_title."'  /></figure>";
                                echo "<div  style='background-image:url(".get_the_post_thumbnail_url('','postgrid_thumb').")'></div>";

                            }

                        ?>
                        <h2><?php the_title(); ?></h2>
                        <span><?php echo get_the_date()?> <?php if ( ! empty( $categories ) ) {echo ' | <a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';} ?> </span>

                        <?php echo the_excerpt()?>
                        <a href="<?php echo get_the_permalink(); ?>" target="_self">test</a>
                    </article>
                <?php endwhile;
            ?>
        </section>
        <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
        <?php
    endif;
}

add_shortcode( 'loadPosts', 'loadPosts' );
