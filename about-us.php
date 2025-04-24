<?php
/*
Template Name: Ghef tiwura
*/
?>

    <?php get_header(); ?>

    <main>
        <section class="page-wrap">
            <div class="container">

                <div class="row">
                    <div clas="col-lg-6">
                        <h>about-us.php</h1>
                        <p>A gauche</p>
                    </div>
                    <div clas="col-lg-6">
                        <h>about-us.php</h1>
                        <p>A droite</p>
                        <?php get_template_part('includes/section', 'content'); ?>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php get_footer(); ?>