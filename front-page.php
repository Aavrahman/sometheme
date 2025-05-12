    <?php get_header(); ?>

    <main class="container">
        <section class="page-wrap">

            <h1>Front-page.php</h1>

            <?php get_template_part('includes/section', 'pages'); ?>

        </section>

        <?php if (is_active_sidebar("articles")): ?>
        <aside>
            <?php dynamic_sidebar("articles"); ?>
        </aside>
        <?php else: ?>
            <p>No sidebar available !</p>
        <?php endif; ?>

    </main>

    <?php get_footer(); ?>