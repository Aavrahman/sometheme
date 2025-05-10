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

// OR

function widget_1() {
    register_sidebar( array(
        'name'      => 'Sidebar',
        'id' => 'sidebar',
        'description' => __('Présenter un widget via une fonction', 'textdomain'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'widget_1');