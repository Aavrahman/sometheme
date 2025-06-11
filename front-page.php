    <?php get_header(); ?>

    <main class="container">
        <section class="page-wrap">

            <h4>Front-page.php</h4>

            <h1> <?php the_title(); ?> </h1>

            <?php get_template_part('includes/section', 'pages'); ?>

            <?php // get_search_form(); ?>

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