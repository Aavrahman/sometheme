        <section class="page-wrap">
            <div class="container">
                <a href="<?php the_permalink(); ?>">
                    <h1> <?php the_title(); ?> </h1>
                    <?php the_post_thumbnail('medium'); ?>
                </a>
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                        if (have_posts()):
                            while (have_posts()):
                                the_post();
                        ?>

                                <?php the_content(); ?>

                                <p> Some stuff </p>

                        <?php
                            endwhile;
                        else:
                        endif;
                        ?>
                    </div>

                    <div class="col-lg-6">
                        <p>Some other stuff !</p>
                    </div>
                </div>
            </div> <!-- end of div class='row' -->
        </section>