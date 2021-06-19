<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <title><?php if (is_single() || is_page()) {
                wp_title('', true);
            } elseif (is_front_page()) {
                bloginfo('description');
            } else {
                bloginfo('description');
            } ?> | <?php bloginfo('name'); ?>
    </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="container_full">
        <header>
            <div id="header">
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
                <p><?php bloginfo('description'); ?></p>
            </div>
        </header>