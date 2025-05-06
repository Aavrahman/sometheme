<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>
        <?php bloginfo('name'); ?> -
        <?php bloginfo('description'); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="container">
            <?php
            wp_nav_menu(array(
                'menu' => 'About us'
            ));  // Si un seul menu: wp_nav_menu(); -->
            ?>
        </div>
    </header>