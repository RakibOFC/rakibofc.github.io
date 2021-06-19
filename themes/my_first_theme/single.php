<?php get_header(); ?>

<div class="content_wrapper">

    <div class="left_content">

        <?php

        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article>
                    <h2> <?php the_title(); ?></h2>

                    <div class="post_meta">
                        Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a') ?> | Posted In: <?php the_category(', ') ?>
                    </div>
                    <p> <?php the_content(); ?></p>
                    <?php comments_template(); ?>
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