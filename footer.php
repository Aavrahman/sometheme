<footer>
    <?php wp_nav_menu(
        array(
            'theme_location' => 'the_footer_menu',
            'menu_id' => 'ftr_menu_id'
        )
    );  ?>

    <p>© 2025 Un Theme - Tous droits réservés </p>

    <div> <?php /* if(is_active_sidebar("articles")): */ dynamic_sidebar('Pied1'); //endif ?> </div>
    <div> <?php /* if(is_active_sidebar("articles")): */ dynamic_sidebar('Pied2'); //endif ?> </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>