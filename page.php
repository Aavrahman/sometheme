    <?php get_header() ?>

    <main class="container">

        <section class="page-wrap">
            <h1>page.php</h1>
            <?php get_template_part('includes/section', 'pages'); ?>

            <?php if (is_active_sidebar("articles")): ?>
            <aside>
            <?php // get_sidebar(); ?>
                <?php dynamic_sidebar("articles"); ?>
            </aside>
            <?php else: ?>
                <p>No sidebar available for this page / post !</p>
            <?php endif; ?>
        </section>

    </main>

    <?php get_footer() ?>