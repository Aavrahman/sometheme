            <div class="container__section">

                <h4>Archive template</h4>
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                ?>
                        <article class="card mb=3">
                            <div class="card-body">
                                <h2> <?php the_title(); ?> </h2>
                                <?php the_post_thumbnail('medium'); ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-success"> Gher artikl </a>
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

            </div>