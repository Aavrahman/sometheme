<?php get_header("about"); ?>

<main class="container">
    <section class="page-wrap">

        <h1> Nom de la catég orie: <?php echo single_cat_title(); ?> </h1> <!-- DISPLAYS THE TITLE OF THE CATEGORY -->

        <?php // get_template_part('includes/taqvaylit', 'archive'); ?>

        <?php get_template_part('includes/section', 'taqvaylit'); ?>

        <?php previous_posts_link(); // Added in'section-archive.php' template part 
        ?>
        <?php next_posts_link(); // Added in'section-archive.php' template part 
        ?>

        <!-- OR: the code down -->
        <?php /*
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        )); */
        ?>

    </section>
    <?php if (is_active_sidebar("articles")): ?>
        <aside>
            <?php dynamic_sidebar('articles'); ?>
        </aside>
    <?php else: ?>
        <p>No sidebar !</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>