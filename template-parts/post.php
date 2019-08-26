<?php $categories = get_the_category(); ?>
<?php $tags = get_the_tags(); ?>

<article>
    <?php

        if ( has_post_thumbnail() ) {
            echo "<div style='background-image:url(".get_the_post_thumbnail_url('','postgrid_thumb').")'></div>";
        }

    ?>

    <h2><?php the_title(); ?></h2>

    <span>
        <?php echo get_the_date()?>
        <?php
            if (!empty($categories)){
                echo ' | <a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }
            if (!empty($tags)){
                echo ' | <a href="' . esc_url( get_tag_link( $tags[0]->term_id ) ) . '">' . esc_html( $tags[0]->name ) . '</a>';
            }
        ?>
    </span>

    <?php echo the_excerpt()?>
    <a href="<?php echo get_the_permalink(); ?>" target="_self"><?php _e( 'Read_more','redlumtheme' ); ?></a>

</article>