    <?php get_header(); ?>

    <main>
        <section class="page-wrap">
            <div class="container">

                <p> We are in 'blog' catégory. It displays the 'blog' category affiliated content. it uses the 'archive.php' template. </p>
                <?php get_template_part('includes/section', 'content'); ?>

            </div>
        </section>
    </main>

    <?php get_footer(); ?>