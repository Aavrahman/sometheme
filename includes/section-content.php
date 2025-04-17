<section>
<?php
    if ( have_posts() ):
        while (have_posts()):
            the_post();
?>
        <article>
            <h1> The section </h1>
            <h1> <?php the_title() ?> </h1>
            <?php the_post_thumbnail('medium'); ?>
            <?php the_content() ?>
        </article>
<?php
        endwhile;
    else:
    endif;
?>
</section>