        <section class="page-wrap">
            <div class="container">

        <?php
            if ( have_posts() ):
                while (have_posts()):
                    the_post();
        ?>
                <article>
                    <h1> <?php the_title(); ?> </h1>
                    <?php the_post_thumbnail('medium'); ?>
                    <?php the_content() ?>
                </article>
        <?php
                endwhile;
            else:
        ?>
                <p> Il n'y a pas d'articles </p>
        <?php
            endif;
        ?>
            </div>
        </section>