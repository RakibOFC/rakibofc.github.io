<?php
    /* Wordpress PHP Files-
          Invalid URL       (404.php)
          Archive           (archive.php)
          Footer            (footer.php)
          Functions Call    (functions.php)
          Header            (header.php)
          Index             (index.php)
          Page              (page.php)
          Screenshot        (screenshot.png)
          Search            (search.php)
          Searchform        (searchform.php)
          Sidebar           (sidebar.php)
          Single Post       (single.php)
          Css Style         (style.css)

    */

    /* header.php file by call <?php get_header(); ?> in index.php */
    /* HTML <head> */

    // HTML Language
    <html <?php language_attributes(); ?>>

    // Meta Charset
    <meta charset="<?php bloginfo('charset'); ?>">

    // Title
    <?php if (is_single() || is_page()) { wp_title('', true);} elseif (is_front_page()) { bloginfo('description'); } else { bloginfo('description'); } ?> | <?php bloginfo('name'); ?>

    // WP Header Function Support
    <?php wp_head(); ?>

    /* HTML </head> End*/

    /* HTML <body> */

    // Home URL
    <?php echo home_url(); ?>

    // Blog Name
    <?php bloginfo('name'); ?>

    // Blog Description
    <?php bloginfo('description'); ?>

    // Search Form
    <?php get_search_form(); ?>

    // Menu / Nav
    <?php $args = array('theme_location' => 'header'); wp_nav_menu($args); ?>
    /* End of header.php file */

    /* index.php file start */

    // All Post
    <?php

		if (have_posts()) :
			while (have_posts()) : the_post(); ?>
				<article>
					<h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>

					<a href="<?php the_permalink(); ?>">
						<div class="featured_image">
							<?php the_post_thumbnail(); ?>
						</div>
					</a>

					<div class="post_meta">
						Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a') ?> | Posted In: <?php the_category(', '); ?> | <?php comments_popup_link('No Comment', '1 Comment', '% Comments', 'my_comments', 'Comment Off') ?>
					</div>

					<p> <?php excerpt(30); /* Exception function must have functions.php file. */ ?></p>
				</article>
		<?php endwhile;
		else :
			echo "No post Found!";
		endif;

		?> // All Post end

    // Single Post / Content
    <?php the_content(); ?>

    /* sidebar.php file by call <?php get_sidebar(); ?> in index.php */

    // Multiple or One Sidebar
    <?php dynamic_sidebar('sidebar1'); ?> <br>
    <?php dynamic_sidebar('sidebar2'); ?> <br> /* ... */
    /* End of sidebar.php */

    /* Pagination, Location index.php, archive.php or etc */
    <?php if (function_exists("pagination")) {
  		pagination($additional_loop->max_num_pages);
  	} ?> /* End of Pagination */

    /* footer.php by call <?php get_footer(); ?> in index.php*/
    // WP Footer Function Support
    <?php wp_footer(); ?> /* End of footer.php */

    /* archive.php file start */
    // Archive Heading
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works.
    ?>

    <?php /* If this is a category archive */ if (is_category()) { ?>

        <?php _e('Archive For'); ?> '<?php echo single_cat_title(); ?>' <?php _e('Category'); ?>

    <?php /* If this is a tag archive */  } elseif (is_tag()) { ?>

        <?php _e('Archive For'); ?> <?php single_tag_title(); ?> <?php _e('Tag'); ?>

    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>

        <?php _e(' Archive For '); ?> <?php the_time('F jS, Y'); ?>

    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

        <?php _e('Archive For'); ?> <?php the_time('F, Y'); ?>

    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>

        <?php _e('Archive For'); ?> <?php the_time('Y'); ?>

    <?php /* If this is a search */ } elseif (is_search()) { ?>

        <?php _e('Search Results'); ?>

    <?php /* If this is an author archive */ } elseif (is_author()) { ?>

        <?php _e('Author Archive For'); ?> '<?php echo get_the_author(); ?>'
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

        <?php _e('Blog Archives'); ?>

    <?php } ?> // End of Archive Heading

    /* Functions.php file start */
        <?php

        function calling_resources(){

        	//Calling Styles
        	wp_enqueue_style('style' , get_stylesheet_uri(), '', '1.0.0' );
        	wp_enqueue_style('comment_style', get_template_directory_uri(). '/css/comments.css', '', '1.0.0');
        }
        add_action('wp_enqueue_scripts' , 'calling_resources');

        function theme_setup(){

        	//Register Nav
        	register_nav_menus(array(
        		'header' => __('Header Menu'),
        		'footer' => __('Footer Menu'),
        	));

        	//Thumbnails Image
        	add_theme_support('post-thumbnails');
        }
        add_action('after_setup_theme', 'theme_setup');


        //Sidebar Register
        function widgetInit(){

        	register_sidebar(array(
        		'name' => 'Primary Sidebar',
        		'id' => 'sidebar1',
        		'before_widget' => '<div class="sidebar">',
        		'after_widget' => '</div>',
        		'before_title' => '<h2>',
        		'after_title' => '</h2>',
        	));
        	register_sidebar(array(
        		'name' => 'Secondary Sidebar',
        		'id' => 'sidebar2',
        		'before_widget' => '<div class="sidebar">',
        		'after_widget' => '</div>',
        		'before_title' => '<h2>',
        		'after_title' => '</h2>',
        	));
        	register_sidebar(array(
        		'name' => 'Tertiary Sidebar',
        		'id' => 'sidebar3',
        		'before_widget' => '<div class="sidebar">',
        		'after_widget' => '</div>',
        		'before_title' => '<h2>',
        		'after_title' => '</h2>',
        	));
        }
        add_action( 'widgets_init', 'widgetInit');

        // Excerpt Function
        function excerpt($num)
        {
        	$limit = $num + 1;
        	$excerpt = explode(' ', get_the_excerpt(), $limit);
        	array_pop($excerpt);
        	$excerpt = implode(" ", $excerpt) . "<a href='" . get_permalink($post->ID) . " ' class='readmore'>... more</a>";
        	echo $excerpt;
        }


        /* Custom Pagination */
        function pagination($pages = '', $range = 4)
        {
        	$showitems = ($range * 2) + 1;
        	global $paged;
        	if (empty($paged)) $paged = 1;
        	if ($pages == '') {
        		global $wp_query;
        		$pages = $wp_query->max_num_pages;
        		if (!$pages) {
        			$pages = 1;
        		}
        	}
        	if (1 != $pages) {
        		echo "<div class=\"pagination\"><span>Page No- " . $paged . " of " . $pages . "</span>";

        		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
        			echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";

        		if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";

        		for ($i = 1; $i <= $pages; $i++) {
        			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        				echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
        			}
        		}
        		if ($paged < $pages && $showitems < $pages)
        			echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next Page &rsaquo;</a>";
        		if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>Last Page &raquo;</a>";
        		echo "</div>\n";
        	}
        }

        ?>
    /* Functions.php file end */

?>
