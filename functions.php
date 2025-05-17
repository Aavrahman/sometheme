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


add_theme_support('menus');
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
    //  add_theme_support('widgets');
        add_theme_support('post-thumbnails', array('post', 'page', 'custom-post-type') );
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
add_action('wp_footer', 'scripts_footer');
// add_action('wp_enqueue_scripts', 'the_styles');



/***************************************************************************** */

// BOOTSTRAP

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
function idles_taxonomy() {
    $args = array(
        'labels' => array(
            'name' => 'Idles',
            'singular_name'    => 'Idles',
            'plural_name'      => 'Idlisen', // libellé affiché dans le menu
            'search_items'     => 'Afed asafar idles',
            'all_items'        => 'Ihricen akk n yedles',
            'edit_item'        => 'Edit asafar n idles',
            'update_item'      => 'Veddel asafar n idles',
            'add_new_item'     => 'Rnud asafar n idles',
            'new_item_name'    => 'Aru isem n usafar n idles',
            'menu_name'        => 'Idles',
            'set_featured_image' => 'Set Featured_image',
            'use_featured_image' => 'Use_featured_image',
            'set_featured_image' => 'Featured image',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'hierarchical' => true, // True makes it for Categories, False for Tags
        'show_admin_column' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy("idles", 'post', $args);
}
add_action('init', 'idles_taxonomy');


// CUSTOM POST TYPES
function tutlayt_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Tutlayt', // To display in WP backend
            'singular_name' => 'Tutlayt',
            'menu_name' => 'Tutlayin', // libellé affiché dans le menu
            'all_items' => 'Tutlayin n Tmazgha',
            'view_item' => 'Wali tutlayt',
            'add_new_item' => 'Rnud tutlayt',
            'add_new' => 'Rnud',
            'edit_item' => 'Edit tutlayt',
            'update_item' => 'Veddel tutlayt',
            'search_items' => 'Huf tutlayt',
            'not_found' => 'Urd nuf-ara',
            'not_found_in_trash' => 'Urd nuf-ara deg texnanset',
            'set_featured_image' => 'Rnud tawlaft n weskan',
            'use_featured_image' => 'Veddel tawlaft n weskan',
            'set_featured_image' => 'Sag tawlaft n weskan',
        ),
        'hierarchical' => false,        // true makes it for 'pages', false or desactivated for 'articles'
        'public' => true,
        'menu_icon' => 'dashicons-format-status', // Find an icon in google -> 'wordpress dashicons'
        'has_archive' => true, // Définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'support' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
    //    'rewrite' => array('slug' => 'Tutlayt'),
        'description' => 'Kulletch ghef tutlayin timazighin',
        'show-ui' => true,
        'show_in_rest' => true,
    );
    register_post_type("tutlayt", $args);
}
add_action('init', 'tutlayt_post_type');