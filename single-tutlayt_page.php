<?php get_header(); ?>

<main class="container">

    <section class="page-wrap">
        <h1>template : single-tutlayt_page.php</h1>

        <?php get_template_part('includes/section', 'taqvaylit'); ?>

        <?php wp_link_pages(); ?>
    </section>

    <?php if (is_active_sidebar("articles")): ?>
        <aside>
            <?php dynamic_sidebar("articles"); ?>
        </aside>
    <?php else: ?>
        <p> Pas de sidebar !</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>