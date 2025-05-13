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
        add_image_size('small', 200, 150, true);
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


// ADD CSS AND JS

/*  DESACTIVATED BECAUSE OF THE USE BOOTSTRAP HERE BELLOW
function the_styles()  {
    wp_enqueue_style('init', get_stylesheet_uri());
}   */

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

    register_sidebar(array(
        'name'      => 'Sidebar',
        'id' => 'sidebar',
        'before_title' => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'description' => __('Présenter un widget via une fonction', 'textdomain'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ));
}
add_action('widgets_init', 'my_sidebars');

/* OR REACTIVATE THE add_theme_support("widgets") ABOVE IN 'setup()' FUNCTION? AND ADD CODE BELLOW
register_sidebar(array(
    'name' => 'Sidebar Articles',
    'id' => 'articles',
    'description' => __('Widget latéral pour articles et pages', 'textdomain'),
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
));

register_sidebar(array(
    'name' => 'Pied de page 1',
    'id' => 'pied1',
    'description' => __('Widget 1 pour pied et page', 'textdomain'),
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
));

register_sidebar(array(
    'name' => 'Pied de page 2',
    'id' => 'pied2',
    'description' => __('Widget 2 pour pied et page', 'textdomain'),
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
));
/***************************************************************************** */

// CUSTOM POST TYPES

function cars_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Cars',       // To display in WP backend
            'singular_name' => 'Car',
        ),
        'hierarchical' => true,    // true makes it for 'pages', false or desactivated for 'articles'
        'public' => true,
        'menu_icon' => 'dashicons-car', // Find an icon in google -> 'wordpress dashicons'
        'has_archive' => true,
        'support' => array('title', 'editor', 'comments', 'thumbnail'),
        'rewrite' => array('slug' => 'cars'),
    );
    register_post_type('cars', $args);
}
add_action('init', 'cars_post_type');

// TAXONOMY

function cars_taxonomy() {
    $args = array(  /*
        'labels' => array(          // Same as in cars_post_type() function
            'name' => 'Modeles',    // To display in WP backend -- if 'labels commented, WPBackend displays 'Tags'/'c   ategories' 
            'singular_name' => 'Modele',
        ),  */
        'public' => true,
        'hierarchical' => false, //true -- True makes it for Categories, False for Tags 
    );
    register_taxonomy('Modeles', array('cars'), $args);  // array('cars') arg. refers to 'cars' of the register_post_type('cars', $args) function above
}
add_action('init', 'cars_taxonomy');
