<?php get_header() ?>

<main>
    <section>
        <?php while (have_posts()): the_post(); ?>
            <article>
                <h1> <?php the_title() ?> </h1>
                <?php the_post_thumbnail("medium"); ?>
                <?php the_content() ?>
            </article>
        <?php endwhile; ?>
    </section>

    <?php // if(is_active_sidebar("articles")): ?>
    <aside>
        <?php // get_sidebar(); ?>
        <?php dynamic_sidebar("articles"); ?>
    </aside>
    <?php // endif; ?>
</main>

<?php get_footer() ?>