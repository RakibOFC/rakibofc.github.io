<?php

function calling_resources(){

    //Calling Styles
    wp_enqueue_style('style', get_stylesheet_uri(), '', '1.0.0');
    wp_enqueue_style('comment_style', get_template_directory_uri() . '/css/comments.css', '', '1.0.0');
}
add_action( 'wp_enqueue_scripts', 'calling_resources');

function setup_theme(){

    //Register Nav Menu
    register_nav_menus( array(

        'topmenu' => __('Top Menu'),
        'bottom' => __('Bottom Menu')
    ) );
}
add_action('after_setup_theme', 'setup_theme');

// Sidebar Register
function widgetInit(){

    register_sidebar( array(
        'name' => 'Sidebar1',
        'id' => 'sidebar1',
        'before_widget' => '<div id="leftSideber">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );

    register_sidebar(array(
        'name' => 'Footer Left Wiget',
        'id' => 'ftr-left-wiget',
        'before_widget' => '<div id="categories">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => 'Footer Right Wiget',
        'id' => 'ftr-right-wiget',
        'before_widget' => '<div id="categories">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => 'Footer Middle Wiget',
        'id' => 'ftr-middle-wiget',
        'before_widget' => '<div id="categories">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action( 'widgets_init', 'widgetInit' );

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