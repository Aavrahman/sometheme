                <h4>section-archive template</h4>
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                ?>
                <article class="card mb=3">
                    <div class="card-body">
                        <h2> <?php echo the_title(); ?> </h2>

                    <section class="row">
                        <?php if (has_post_thumbnail()): // bellow,maybe: the_post_thumbnail('small/medium/lareg/...'); ?>
                        <div class="col-lg-3">
                            <img src="<?php the_post_thumbnail_url("medium"); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">
                        </div>
                        <?php endif; ?>

                        <div class="col-lg-9">
                        <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-success"> Gher artikl </a>
                        </div>
                    </section>

                    </div>
                </article>
                <?php
                    endwhile;
                else:
                ?>
                    <p> Il n'y a pas d'articles </p>
                <?php
                endif;
                ?>

                <?php // previous_posts_link(); ?>
                <?php // next_posts_link(); ?>