<h4>template part : taqvaylit-section</h4>

<?php
if (have_posts()):
    while (have_posts()):
        the_post();
?>

        <article class="card mb=3">
            <div class="card-body">

                <h1> <?php the_title(); ?> </h1>

                <section class="row">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="col-lg-6">
                            <img src="<?php the_post_thumbnail_url("medium"); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">

                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
                                    <?php if(get_post_meta($post->ID, 'Region', true)): ?>
                                        <li> <p> Tama: <?php echo get_post_meta($post->ID, 'Region', true); ?> </p> </li>
                                    <?php endif; ?>
                                    <?php if(get_post_meta($post->ID, 'Number', true)): ?>
                                        <li> <p> Anect: <?php echo get_post_meta($post->ID, 'Number', true); ?> </p> </li>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    <?php
                    else:
                    ?>
                        <h3> No thumbnails here </h3>
                    <?php endif; ?>

                    <div class="col-lg-6">

                        <p> Iffghed ass n <?php echo get_the_date('d/m/Y h:i:s'); ?> </p>

                        <?php the_content(); ?>

                        <?php comments_template(); ?>

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
            $tags = get_the_tags();
            if ($tags) :
                foreach ($tags as $tag):
            ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge badge-secondary">
                        <?php echo $tag->name; ?>
                    </a>
                <?php
                endforeach;
            else: ?>
                <p> No tags for <b><?php the_title(); ?> </b> </p>
            <?php
            endif;
            ?>

            <?php
            $categories = get_the_category();
            if ($categories):
                echo ("Catégories : ");
                foreach ($categories as $category):
            ?>
                    <a href="<?php echo get_category_link($category->term_id); ?>" class="badge badge-primary">
                        <?php // echo $category->name; 
                        ?>
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