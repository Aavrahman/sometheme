<?php get_header() ?>

<h1> <?php bloginfo("name"); ?> index.php </h1>

<main>
    <section>
    <?php
    if (have_posts()):
        while (have_posts()) : the_post();
    ?>

        <article class="articles">
            <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail('medium') ?> <!-- 300px, thumbnail, medium, medium_large, large, full 
        * Exploiter la découpe de la taille des image indiquée dans functions.php : the_post_thumbnail(array(width, height)) -->
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
    
    <?php // if(is_active_sidebar("articles")): ?>
    <aside>
        <?php // widget_1(); ?>
        <?php dynamic_sidebar("articles"); ?>
    </aside>
    <?php // endif; ?>
</main>

<?php get_footer() ?>