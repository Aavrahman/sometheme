                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                ?>
                    <article class="card mb=3">
                        <div class="card-body">

                            <section class="row">
                                <?php if(has_post_thumbnail()): ?>
                                <div class="col-lg-3">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                                <?php endif; ?>

                                <div class="col-lg-9">
                                    <p> Iffghed ass n <?php echo get_the_date('d/m/Y h:i:s'); ?> </p>
                                    <?php the_content(); ?>
                                    <?php // the_author(); 
                                    ?>
                                    <?php $fname = get_the_author_meta('first_name'); ?>
                                    <?php $lname = get_the_author_meta('last_name'); ?>
                                    <p> Yura-t-id <?php echo $fname . ' ' . $lname; ?> </p>
                                </div>
                            </section>
    
                        </div>
                    </article>

                        <section>
                            <?php
                            $categories = get_the_category();
                            foreach ($categories as $category):
                            ?>
                                <a href="<?php echo get_category_link($category->term_id); ?>" class="badge badge-primary">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php
                            endforeach;
                            ?>
                            <?php
                            comments_template();
                            ?>
                        </section>
                    <?php
                    endwhile;
                else:
                    ?>
                    <p> Il n'y a pas d'articles </p>
                <?php
                endif;
                ?>