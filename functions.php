<?php
/* Gestion des images mises en avant
add_theme_support("post-thumbnails");
set_post_thumbnail_size(450, 300, true); // TO SETUP THUMBNAILS SIZE
////////////////////////////////////////////////////////////// */

// ENREGISTRER MENU  
/*
function enregistrer_menus() {
  //  register_nav_menu('menu_principal', 'Menu principal' ); // register_nav_menu('menu_principal', __('Menu principal') ); 
  //  register_nav_menu('the_footer_menu', 'The Footer' );    // register_nav_menu('the_footer_menu', __('The Footer') );
  //  register_nav_menu('404', '404' );
} */
//add_action('init', 'enregistrer_menus');


register_nav_menus(
    array(
        'menu_principal' => 'Menu principal',
        'the_footer_menu' => 'The Footer',
        '404' => 'Error messages',
        'about_us' => 'About us' 
    )
);

if (! function_exists('setup')):
    function setup() {
        //enregistrer_menus();
        add_theme_support('menus');
    //  add_theme_support('widgets');
        add_theme_support('post-thumbnails');
        add_image_size('small', 200, 150, true); // False = not hard cropped
        add_image_size('medium', 600, 400, true);
        add_image_size('large', 1000, 750, true);
    }
endif;

function scripts_footer()
{
    //    wp_enqueue_script('init', get_template_directory_uri().'/js/init.js', array('jquery'));
}

add_action('after_setup_theme', 'setup');
// add_action('wp_enqueue_scripts', 'the_styles');
add_action('wp_footer', 'scripts_footer');



/***************************************************************************** */

/*  DESACTIVATED BECAUSE OF THE USE BOOTSTRAP HERE BELLOW
function the_styles()  {
    wp_enqueue_style('init', get_stylesheet_uri());
}   */

// ADD CSS AND JS

function load_css() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' ); // 'false' for version
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main'); // Override the bootsrap rules
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js() {
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_style('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');
/***************************************************************************** */

// Widgets

add_theme_support('widgets');

function my_sidebars() {
    register_sidebar(array(
        'name' => 'Articles Sidebar',
        'id' => 'articles',
        'before_title' => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'description' => __('Widget latéral pour articles et pages', 'textdomain'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name' => 'Pied de page 1',
        'id' => 'pied1',
        'before_title' => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'description' => __('Widget 1 pour pied et page', 'textdomain'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name' => 'Pied de page 2',
        'id' => 'pied2',
        'before_title' => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'description' => __('Widget 2 pour pied et page', 'textdomain'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ));
}
add_action('widgets_init', 'my_sidebars');

/***************************************************************************** */

// TAXONOMY

function cars_taxonomy()
{
    $args = array(
        'labels' => array(          // Same as in cars_post_type() function
            'name' => 'Modele',    // To display in WP backend
            'singular_name'    => 'Modele',
            'plural_name'      => 'Modeles', // libellé affiché dans le menu
            'search_items'     => 'Rechercher une Voiture',
            'all_items'        => 'Toutes les voitures Vokswagen',
            'edit_item'        => 'Editer la Voiture',
            'update_item'      => 'Modifier la Voiture',
            'add_new_item'     => 'Ajouter une nouvelle Volks',
            'new_item_name'    => 'Ajouter une nouvelle voiture',
            'menu_name'        => 'Une VW', /*
            'not_found'        => 'Non trouvée',
            'not_found_in_trash' => 'Non trouvée dans la corbeille',
            'set_featured_image' => 'Set Featured_image',
            'use_featured_image' => 'Use_featured_image',
            'set_featured_image'    => 'Featured image',    */
        ),  // if 'labels are commented, WPBackend will displays 'Tags' or 'categories'
        'show_in_rest' => true,
        'public' => true,
        'hierarchical' => true, // True makes it for Categories, False for Tags
        'show_admin_column' => true,
    );
    register_taxonomy('Modeles', array('cars'), $args);  // array('cars') arg. refers to 'cars' of the register_post_type('cars', $args) function above
}
add_action('init', 'cars_taxonomy');

// CUSTOM POST TYPES

function cars_post_type() {
    $args = array(
        'label'               => 'Voitures VW',
        'labels' => array(
            'name' => 'Cars',       // To display in WP backend
            'singular_name' => 'Car',
            'menu_name'       => 'Voitures', // libellé affiché dans le menu
            'all_items'         => 'Toutes les voitures Vokswagen',
            'view_item'        => 'Voir les séries de Voitures',
            'add_new_item'     => 'Ajouter une nouvelle voiture Volkswagen',
            'add_new'          => 'Ajouter',
            'edit_item'        => 'Editer la Voiture',
            'update_item'      => 'Modifier la Voiture',
            'search_items'     => 'Rechercher une Voiture', /*
            'not_found'        => 'Non trouvée',
            'not_found_in_trash' => 'Non trouvée dans la corbeille',
            'set_featured_image' => 'Set Featured_image',
            'use_featured_image' => 'Use_featured_image',
            'set_featured_image'    => 'Featured image',    */
            'show_in_rest' => true,
        ),
        'hierarchical' => false,    // true makes it for 'pages', false or desactivated for 'articles'
        'public' => true,
        'menu_postion' => 1,
        'menu_icon' => 'dashicons-car', // Find an icon in google -> 'wordpress dashicons'
        'has_archive' => true,
        // Définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'support' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'rewrite' => array('slug' => 'cars'),

        'description'         => 'Tous sur les voitures Volkswagen',
        'show-ui'             => true,
    );
    register_post_type('cars', $args);
}
add_action('init', 'cars_post_type');
