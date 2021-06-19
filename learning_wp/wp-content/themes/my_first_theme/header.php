<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

        <?php

        if (is_single() || is_page()) {

            wp_title('', true);
        } elseif (is_front_page()) {

            bloginfo('description');
        } else {

            bloginfo('description');
        } ?> | <?php bloginfo('name');

                ?>
    </title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <div class="container">

        <header class="main-header">

            <h1>
                <a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?> </a>
            </h1>

            <h3>
                <?php bloginfo('description'); ?>
            </h3>

            <?php get_search_form(); ?>

            <nav class="main-menu">

                <div class="menu">
                    <?php
                    $args = array(
                        'theme_location' => 'header'
                    );
                    wp_nav_menu($args); ?>
                </div>

            </nav>

        </header>