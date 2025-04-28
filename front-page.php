    <?php get_header() ?>

    <h2> home.php</h2>

    <main>
        <section class="page-wrap">
            <div class="container">

                <?php
                if (have_posts()):
                    while (have_posts()) : the_post();
                ?>

                        <article class="articles">
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail("medium") ?>
                                <h2> <?php the_title() ?> </h2>
                            </a>

                            <h6> <?php the_category(); ?> </h6>

                            <?php the_excerpt() ?>

                            <a class="read" href="<?php the_permalink() ?>"> Gher artikl ... </a>
                        </article>

                <?php
                    endwhile;
                endif;
                ?>

            </div>
        </section>

        <?php // if(is_active_sidebar("articles")): ?>
        <aside>
            <?php //widget_1(); ?>
            <?php dynamic_sidebar("articles"); ?>
        </aside>
        <?php // endif; ?>

    </main>

    <?php get_footer(); ?>