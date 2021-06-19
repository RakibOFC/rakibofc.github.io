
<?php get_header(); 
/*
    Template Name: Full Width Template
*/
?>

<div class="content_wrapper">

    <div class="left_content full-width">

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

    <br class="clear" />

</div>

<?php get_footer(); ?>