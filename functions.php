<?php
function my_theme_enqueue_styles() {
    $parent_style = 'wp-bootstrap-4'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}

function  animation_scripts() {
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/build/bundle.js',  true); }

//custom woocommerce modifs

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'animation_scripts' );

include (dirname( __FILE__ ) . '/woocommerce/custom_woocommerce.php');
include get_theme_file_path() . '/remove_cart.php';


//function create_post_type() {
    //register_post_type( 'Test',
      //array(
        //'labels' => array(
          //'name' => __( 'client' ),
          //'singular_name' => __( 'Client' )
        //),
      //'public' => true,
      //'has_archive' => true,
    //)
  //);
//}
//add_action( 'init', 'create_post_type' );

//flush_rewrite_rules( false );
//


acf_add_options_page(array(
    'page_title'    => 'Page Accueil',
    'menu_title'    => 'Accueil',
    'menu_slug'     => 'theme-general-settings',
    'icon_url'      => 'dashicons-images-alt2',
));