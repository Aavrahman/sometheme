<?php
/*
Template Name: Kontakt
*/
?>


<?php get_header(); ?>

<main class="container">

    <section class="page-wrap">
        Template n Kontakt
        <?php get_template_part("includes/form", "suter"); ?>
    </section>

    <?php if (is_active_sidebar("articles")): ?>
        <div class="row">
            <div clas="col-lg-6">
                <h1>about-u s.php.php</h1>
                <?php dynamic_sidebar("articles"); ?>
            </div>
            <div clas="col-lg-6">
                <h1p>Ghef Tiwura template</h1>
                    <?php dynamic_sidebar("articles"); ?>
            <?php else: ?>
                <p>No sidebar available for this post / page !</p>
            </div>
        </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>