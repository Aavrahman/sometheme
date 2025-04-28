    <?php get_header("customized") ?>

    <main>

        <h1>single.php</h1>

        <?php get_template_part('includes/section', 'content'); ?>

        <?php // if(is_active_sidebar("articles")): ?>
        <aside>
            <?php // get_sidebar(); ?>
            <?php dynamic_sidebar("articles"); ?>
        </aside>
        <?php // endif; ?>

    </main>

    <?php get_footer() ?>