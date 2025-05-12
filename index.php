    <?php get_header() ?>

    <h1> <?php bloginfo("name"); ?> </h1>
    <h2>index.php </h2>

    <main class="container">

        <section class="page-wrap">
            <?php
                if (have_posts()):
                        while (have_posts()) : the_post();
                ?>

                <article class="articles">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('medium') ?>
                        <h2><?php the_title(); ?></h2>
                    </a>

                    <?php the_excerpt(); ?>

                    <a class="a-read" href=' <?php the_permalink(); ?>'> Gher artikl ... </a>
                </article>

            <?php
                    endwhile;
                endif;
            ?>
        </section>

        <?php if (is_active_sidebar("articles")): ?>
        <?php if(is_active_sidebar()): ?>
        <aside>
            <?php dynamic_sidebar("articles"); ?>
        </aside>
        <?php else: ?>
            <p>No sidebar available for this page / post !</p>
        <?php endif; ?>

    </main>

    <?php get_footer() ?>