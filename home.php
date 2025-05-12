    <?php get_header() ?>

    <main class="container">

        <h1> <?php bloginfo("name"); ?> </h1>

        <h2>TEMPLATE: home.php</h2>

        <?php
        if (have_posts()):
            while (have_posts()) : the_post();
        ?>

        <article class="card mb=3">
            <div class="card-body">

                <a href="<?php the_permalink() ?>">
                    <h2> <?php the_title() ?> </h2>
                </a>

                <section class="row">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="col-lg-3">
                            <a href="<?php the_permalink() ?>">
                                <img src="<?php the_post_thumbnail_url("medium"); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-9">
                        <?php the_excerpt() ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-success"> Gher artikl </a>
                        <h6> <?php the_category(); ?> </h6>
                    </div>
                </section>

            </div>
        </article>

        <?php
            endwhile;
            previous_posts_link(); // Added in'section-archive.php' template part
            next_posts_link(); // Added in'section-archive.php' template part 
        endif;
        ?>

        <?php wp_link_pages(); ?>

        <?php if (is_active_sidebar("articles")): ?>
            <aside>
                <?php dynamic_sidebar("articles"); ?>
            </aside>
        <?php else: ?>
            <p>No sidebar available for this page / post !</p>
        <?php endif; ?>

    </main>

    <?php get_footer(); ?>