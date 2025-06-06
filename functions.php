<?php

/* //////////////////// BOOTSTRAP /////////////////// */
// BOOTSTRAP: Load CSS
/*
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all'); // 'false' for version
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main'); // Override the bootsrap rules
}
add_action('wp_enqueue_scripts', 'load_css');

// BOOTSTRAP: Load JS
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_style('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');
*/

function style_sheet()
{
    wp_enqueue_style('style', get_stylesheet_uri());  //BOOTSTRAP IS NOW IMPORTED BY THE CSS FILE
}
add_action('wp_enqueue_scripts', 'style_sheet');


/*  DESACTIVATED BECAUSE OF THE USE BOOTSTRAP HERE BELLOW
function the_styles()  {
    wp_enqueue_style('init', get_stylesheet_uri());
}   */

/* //////////////////// THEME OPTIONS /////////////////// */

// Gestion thumbnails
add_theme_support("post-thumbnails");
set_post_thumbnail_size(450, 300, true); // TO SETUP THUMBNAILS SIZE

// Eentregistrament des menus
add_theme_support('menus');
register_nav_menus(
    array(
        'menu_principal' => 'Menu principal',
        'the_footer_menu' => 'The Footer',
        'mobile_menu' => 'Mobile menu',
        '404' => 'Error messages',
        'about_us' => 'About us' 
    )
);

// Entegistrament widgets
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


/* //////////////////// TAXONOMY  & CUSTOM POST TYPE /////////////////// */

// Custom post type : Page
function tutlayt_page_type()
{
    $args = array(
        'labels' => array(
            'menu_name' => 'Tutlayin pages', // libellé affiché dans le menu
            'name' => 'Tutlayt', // To display in WP backend
            'singular_name' => 'Tutlayt',
            'all_items' => 'Tutlayin pages',
            'view_item' => 'Wali tutlayt pages',
            'add_new_item' => 'Rnud tutlayt page',
            'add_new' => 'Rnud tutlayt page',
            'edit_item' => 'Edit tutlayt page',
            'update_item' => 'Veddel tutlayt page',
            'search_items' => 'Huf tutlayt page',
            'not_found' => 'Urd nuf-ara tutlayt page',
            'not_found_in_trash' => 'Urd nuf-ara deg texnanset',
            'set_featured_image' => 'Rnud tawlaft n weskan',
            'use_featured_image' => 'Veddel tawlaft n weskan',
            'set_featured_image' => 'Rnud tawlaft taweskant',
        ),
        'public' => true,
        'hierarchical' => true,        // true makes it for 'pages', false or desactivated for 'articles'
        'menu_icon' => 'dashicons-format-status', // Find an icon in google -> 'wordpress dashicons'
        'has_archive' => true, // Définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports' => array('title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'),
        'description' => 'Kulletch ghef tutlayin timazighin',
        'show-ui' => true,          /*
        'rewrite' => array('slug' => 'Tutlayt'),
        'show_in_rest' => true,     */
    );
    register_post_type("tutlayt_page", $args);
}
add_action('init', 'tutlayt_page_type');

// Custom post type : Post
function tutlayt_post_type()
{
    $args = array(
        'labels' => array(
            'menu_name' => 'Tutlayin posts', // libellé affiché dans le menu
            'name' => 'Tutlayt-post', // To display in WP backend
            'singular_name' => 'Tutlayt-post',
            'all_items' => 'Tutlayin posts',
            'view_item' => 'Wali tutlayt post',
            'add_new_item' => 'Rnud tutlayt post',
            'add_new' => 'Rnud post',
            'edit_item' => 'Edit tutlayt post',
            'update_item' => 'Veddel tutlayt post',
            'search_items' => 'Huf tutlayt post',
            'not_found' => 'Urd nuf-ara tutlayt post',
            'not_found_in_trash' => 'Urd nuf-ara deg texnanset',
            'set_featured_image' => 'Rnud tawlaft n weskan',
            'use_featured_image' => 'Veddel tawlaft n weskan',
            'set_featured_image' => 'Rnud tawlaft taweskant',
        ),
        'public' => true,
        'hierarchical' => false,        // true makes it for 'pages', false or desactivated for 'articles'
        'menu_icon' => 'dashicons-buddicons-pm', // Find an icon in google -> 'wordpress dashicons'
        'has_archive' => true, // Définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    //    'supports' => array('thumbnail', 'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'custom-fields', 'post-formats'),
        'supports' => array('thumbnail', 'title', 'editor', 'comments', 'revisions', 'author', 'excerpt', 'custom-fields', 'post-formats'),
        'description' => 'Kulletch ghef tutlayin timazighin - post',
        'rewrite' => array('slug' => 'Tutlayt'),
        'show-ui' => true,
   //     'taxonomies' => array('category'),
    //  'show_in_rest' => true,
    );
    register_post_type("tutlayt_post", $args);
}
add_action('init', 'tutlayt_post_type');

// Taxonomy: Category
function tutlayt_categories_taxonomy() {
    $args = array(
        'labels' => array(
            'menu_name'        => 'Tutlayt Kategoritin',
            'name' => 'Tutlayt kategori',
            'singular_name'    => 'Tutlayt kategori',
            'plural_name'      => 'Tutlayin kategoritin', // libellé affiché dans le menu
            'search_items'     => 'Afed kategori Tutlayt',
            'all_items'        => 'Tikatigoritin akk n Tutlayt',
            'edit_item'        => 'Edit kategori Tutlayt',
            'update_item'      => 'Veddel katigori Tutlayt',
            'add_new_item'     => 'Rnud kategori n Tutlayt',
            'new_item_name'    => 'Aru isem n katigori n Tutlayt',
            'set_featured_image' => 'Set Featured_image',
            'use_featured_image' => 'Use_featured_image',
            'set_featured_image' => 'Featured image',
        ),
        'public' => true,
        'hierarchical' => true, // True makes it for Categories, False for Tags
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'show_tagcloud' => true,
//        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
    );
    register_taxonomy("tutlayt_categories", array('tutlayt_page', ' tutlayt_post'), $args);
}
add_action('init', 'tutlayt_categories_taxonomy');

// Taxonomy: Tag
function tutlayt_tags_taxonomy()
{
    $args = array(
        'labels' => array(
            'menu_name'        => 'Tutlayt Tags',
            'name' => 'Tutlayt-tags',
            'singular_name'    => 'Tutlayt-tags',
            'plural_name'      => 'Tutlayin-tags', // libellé affiché dans le menu
            'search_items'     => 'Afed tags Tutlayt',
            'all_items'        => 'Tags akk n Tutlayt',
            'edit_item'        => 'Edit Tutlayt tag',
            'update_item'      => 'Veddel Tutlayt tag',
            'add_new_item'     => 'Rnud Tag n Tutlayt',
            'new_item_name'    => 'Isem amaynut n tag n Tutlayt',
            'set_featured_image' => 'Set Featured_image',
            'use_featured_image' => 'Use_featured_image',
            'set_featured_image' => 'Featured image',
        ),
        'public' => true,
        'hierarchical' => false, // True makes it for Categories, False for Tags
        'show_tagcloud' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
   //     'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
    );
    register_taxonomy("tutlayt-tag", array('tutlayt_page', 'tutlayt_post'), $args);
}
add_action('init', 'tutlayt_tags_taxonomy');


/* //////////////////// REGISTER BOOTSTRAP WALKER CLASS /////////////////// */

/** * Register Custom Navigation Walker  */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');


/* //////////////////// FORMS /////////////////// */
add_action("wp_ajax_enquire", "enquire_form");
add_action("wp_ajax_nopriv_enquire", "enquire_form");

function enquire_form() {

    if( !wp_verify_nonce($_POST['nonce'], 'ajax_nonce') )   // Check if the nonce ('ajax_nonce') dont' matches with that sent
    {
        wp_send_json_error('Nonce is incorrect !', 401);
        die();
    }

    $formdata = [];

    wp_parse_str($_POST['enquire'], $formdata);

    // admin address
    $admin_email = get_option('admin_email');

    //email headers:
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From:' . $admin_email;
    $headers[] = 'Replay-to:'.$formdata['email'];

    // Whom we are sending email to ?
    $send_to = $admin_email; 

    //Subject
    $subject = "Enquiry from : ". $formdata['fname'] .' '. $formdata['lname'];

    //Message
    $message = '';
    foreach($formdata as $index => $field)
    {
        $message .= '<strong>'. $index.'</strong>: '. $field .'<br />';
    }

    try {
        if(wp_mail($send_to, $subject, $message, $headers)) {
            wp_send_json_success('emial sent (:)');
        } else {

            wp_send_json_success('Email error');
        }
    } catch (Exception $e) {

        wp_send_json_error($e-getMessage());
    }

    wp_send_json_success($formdata['fname']);
}