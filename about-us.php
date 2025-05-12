<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<main class="container">

    <section class="page-wrap">
        <div class="row">
            <div clas="col-lg-6">
                <h1>about-us.php</h1>
                <p>A gauche</p>
            </div>
            <div clas="col-lg-6">
                <h1>about-us.php</h1>
                <p>A droite</p>
                <?php get_template_part('includes/section', 'pages'); ?>
            </div>
        </div>
    </section>

    <?php if (is_active_sidebar("articles")): ?>
    <aside>
        <?php dynamic_sidebar('articles'); ?>
    </aside>
    <?php else: ?>
        Pas de sidebar
    <?php endif; ?>
    
</main>

<?php get_footer(); ?>