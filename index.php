    <?php get_header() ?>

    <h1> <?php bloginfo("name"); ?> </h1>
    <h2>index.php </h2>

    <main>
        <section class="page-wrap">
            <div class="container">
                <div class="container__section">

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
                </div>
            </div>
        </section>

        <?php
        if (is_active_sidebar("articles")):
        ?>
            <aside>
                <?php // widget_1(); 
                ?>
                <?php dynamic_sidebar("articles"); ?>
            </aside>
        <?php
        endif;
        ?>

    </main>

    <?php get_footer() ?>