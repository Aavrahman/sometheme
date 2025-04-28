<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>
        <?php bloginfo('name'); ?> -
        <?php bloginfo('description'); ?>
    </title>
    <!-- <link rel="stylesheet" href="< ?php // echo get_stylesheet_uri(); ?>"> -->
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="container">
            <p> THIS IS SECONDARY HEADER </p>
            <?php
            wp_nav_menu(array(
                'menu' => 'Menu principal' /*
                'theme_location' => 'menu_prinicpal',
                'menu_id' => 'hdr_menu_id',
                'menu_class' => 'top-menu' */
            ));  // Si un seul menu: wp_nav_menu(); -->
            ?>
        </div>
    </header>