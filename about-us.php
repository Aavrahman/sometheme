<?php
/*
Template Name: Ghef tiwura
*/
?>

    <?php get_header(); ?>

    <main>

        <?php get_template_part('includes/section', 'content'); ?>

        <aside>
            <?php dynamic_sidebar("Articles"); ?>
        </aside>

    </main>

    <?php get_footer(); ?>