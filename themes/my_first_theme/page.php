<?php get_header(); ?>

<div class="content_wrapper">

    <div class="left_content">

        <?php

        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article>
                    <h2><?php the_title(); ?></h2>

                    <a href="<?php the_permalink(); ?>">
                        <div class="featured_image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </a>
                    <p> <?php the_content(); ?></p>
                </article>
        <?php endwhile;
        else :
            echo "No post Found!";
        endif;
        ?>
    </div>

    <?php get_sidebar(); ?>

    <br class="clear" />

</div>

<?php get_footer(); ?>