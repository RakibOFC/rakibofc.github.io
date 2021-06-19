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

                            <p> <?php the_content(); ?></p>

                        </article>


                <?php endwhile;
                endif;
                ?>

            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>