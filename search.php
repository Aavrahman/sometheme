    <?php get_header(); ?>

    <main class="container">
        <section class="page-wrap">
            <h1><?php bloginfo('name'); ?> </h1>

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

    <?php get_footer(); ?>