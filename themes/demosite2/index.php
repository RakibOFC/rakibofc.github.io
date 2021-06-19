<?php get_header(); ?>
<section>
    <div id="bcImage">
        <div id="menuUp">
            <?php
            $args = array(
                'theme_location' => 'topmenu'
            );
            wp_nav_menu($args);
            ?>
        </div>

        <div id="menuDown">
            <?php
            $args = array(
                'theme_location' => 'bottom'
            );
            wp_nav_menu($args);
            ?>
        </div>

        <div id="searchBox">
            <?php get_search_form(); ?>
        </div>

    </div>
</section>

<content>
    <div id="main_content">

        <?php get_sidebar(); ?>

        <div id="content">
            <article>

                <?php

                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <div class="post_meta">
                            Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a') ?> | Posted In: <?php the_category(', '); ?> | <?php comments_popup_link('No Comment', '1 Comment', '% Comments', 'my_comments', 'Comment Off') ?>
                        </div>

                        <p><?php the_content(); ?></p>
                <?php endwhile;
                endif;

                ?>

            </article>

            <?php if (function_exists("pagination")) {
                pagination($additional_loop->max_num_pages);
            } ?>

        </div>
    </div>
</content>

<footer>
    <div id="footer">

        <?php get_template_part('footer-widget'); ?>

        <div id="copyright">
            <p>Copyright: &copy RakibOFC, All Rights Reserved</p>
        </div>
    </div>
</footer>
</div>

<!--Call Latest jQuery and all other Scripts-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var s = $("#menuUp");
        var pos = s.position();
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top) {
                s.addClass("stick");
            } else {
                s.removeClass("stick");
            }
        });
    });
</script>
<?php wp_footer(); ?>
</body>

</html>