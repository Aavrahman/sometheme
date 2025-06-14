    <?php get_header(); ?>

    <main class="container">

        <section class="row">

            <div class="col-lg-3">
                <?php if (is_active_sidebar("articles")): ?>
                    <?php dynamic_sidebar('articles'); ?>
                <?php endif; ?>
            </div>

            <div class="col-lg-9">
                <h1> Nom de la catégorie: <?php echo single_cat_title(); ?> </h1> <!-- DISPLAYS THE TITLE OF THE CATEGORY -->

                <?php get_template_part('includes/section', 'archive'); ?>

                <?php
                    global $wp_query;
                    $big = 999999999;
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages
                    ));
                ?>

                <!-- OR: the code bellow -->
                <?php // previous_posts_link(); // Added in'section-archive.php' template part ?>
                <?php // next_posts_link(); // Added in'section-archive.php' template part ?>
            </div>

        </section>

    </main>

    <?php get_footer(); ?>