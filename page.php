    <?php get_header() ?>

    <main>
        <section class="page-wrap">
            <div class="container">

                <h1>page.php</h1>

                <?php get_template_part('includes/section', 'content'); ?>

                <?php // if(is_active_sidebar("articles")): ?>

                <aside>
                    <?php // get_sidebar(); ?>
                    <?php dynamic_sidebar("articles"); ?>
                </aside>

                <?php // endif; ?>

            </div>
        </section>
    </main>

    <?php get_footer() ?>