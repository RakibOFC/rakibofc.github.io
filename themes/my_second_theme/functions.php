<?php

function calling_resources(){

    //Calling Styles
    wp_enqueue_style('style', get_stylesheet_uri(), '', '1.0');
    wp_enqueue_style('default', get_template_directory_uri() . '/themes/default/default.css', '', '1.0');
    wp_enqueue_style('light', get_template_directory_uri() . '/themes/light/light.css', '', '1.0');
    wp_enqueue_style('dark', get_template_directory_uri() . '/themes/dark/dark.css', '', '1.0');
    wp_enqueue_style('bar', get_template_directory_uri() . '/themes/bar/bar.css', '', '1.0');
    wp_enqueue_style('slider', get_template_directory_uri() . '/css/nivo-slider.css', '', '1.0');

    wp_enqueue_script('js1', get_template_directory_uri() . '/js/jquery-1.9.0.min.js', '', '1.0');
    wp_enqueue_script('js2', get_template_directory_uri() . '/js/jquery.nivo.slider.js', '', '1.0');
}
add_action('wp_enqueue_scripts', 'calling_resources');

function theme_setup(){

    register_nav_menus( array(
        'mainmenu' => __('Primary Menu')
    ));

    //Thumbnails Image
    add_theme_support('post-thumbnails');

    //Slider
    register_post_type('customslider', array(
        'labels' => array(
            'name' => 'Slider',
            'add_new_item' => 'Add New Slider',
        ),
        'public' => true,
        'supports' => array(
            'title', 'thumbnail'
        ),
    ));
}

add_action( 'after_setup_theme', 'theme_setup' );

// Excerpt Function
function excerpt($num)
{
    $limit = $num + 1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . " <a href='" . get_permalink($post->ID) . " ' class='readmore'>[...]</a>";
    echo $excerpt;
}

// Siderbar Register
function widgetInit(){

    register_sidebar(array(
        'name' => 'First Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<aside id="main_sidebar">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}
add_action( 'widgets_init', 'widgetInit');

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