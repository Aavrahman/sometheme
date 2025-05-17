            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
            ?>

            <article class="card mb=3">
                <div class="card-body">
                    
                    <section class="row">
                        <?php if (has_post_thumbnail()): ?>
                        <div class="col-lg-3">
                            <img src="<?php the_post_thumbnail_url("medium"); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">
                        </div>
                        <?php endif; ?>
                    </section>

                    <div class="col-lg-9">

                        <p> Iffghed ass n <?php echo get_the_date('d/m/Y h:i:s'); ?> </p>

                        <?php the_content(); ?>

                        <?php // the_author(); ?>
                        <?php $fname = get_the_author_meta('first_name'); ?>
                        <?php $lname = get_the_author_meta('last_name'); ?>
                        <p> Yura-t-id <?php echo $fname . ' ' . $lname; ?> </p>
                    </div>
                </div>
            </article>

            <section>
            <?php
                $tags = get_the_tags();
                if($tags):
                    foreach ($tags as $tag):
            ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge badge-secondary">
                        <?php echo $tag->name; ?>
                    </a>
            <?php
                    endforeach;
                endif;
            ?>

            <?php
                $categories = get_the_category();
                if($categories):
                    echo ("Catégories : ");
                    foreach ($categories as $category):
            ?>
                    <a href="<?php echo get_category_link($category->term_id); ?>" class="badge badge-primary">
                <?php echo $category->name; ?>
                    </a>
            <?php
                    endforeach;
                endif;
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


                <?php wp_link_pages(); ?>