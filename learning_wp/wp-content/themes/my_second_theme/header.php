<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>

        <?php if (is_single() || is_page()) {

            wp_title('', true);
        } elseif (is_front_page()) {

            bloginfo('description');
        } else {

            bloginfo('description');
        } ?> | <?php bloginfo('name'); ?>

    </title>
    <?php wp_head(); ?>

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico" />

</head>

<body <?php body_class(); ?>>

    <div class="main_wrap header_bg">
        <div class="wrap">
            <header>
                <div id="header">
                    <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
                    <p><?php bloginfo('description'); ?></p>
                </div>
            </header>
        </div>
    </div>