<?php get_header(); ?>
<?php get_template_part('menu'); ?>

<div class="main_wrap content_bg">
    <div class="wrap">
        <div id="content_wrapper">
            <div id="content">

                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>

                        <article id="main_article_single">

                            <h2> <?php the_title(); ?> </h2>
                            
                            <div class="post_meta">
                                Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a') ?> | Posted In: <?php the_category(', '); ?>
                            </div>

                            <p> <?php the_content(); ?></p>

                        </article>


                <?php endwhile;
                endif;
                ?>

                <?php if (function_exists("pagination")) {
                    pagination($additional_loop->max_num_pages);
                } ?>

            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>