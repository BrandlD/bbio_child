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
    'page_title'    => 'Page Contact',
    'menu_title'    => 'Page Contact',
    'menu_slug'     => 'theme-general-contact',
    'icon_url'      => 'dashicons-phone',
));

acf_add_options_page(array(
    'page_title'    => 'Page Accueil',
    'menu_title'    => 'Page Accueil',
    'menu_slug'     => 'theme-general-settings',
    'icon_url'      => 'dashicons-images-alt2',
));

//only show the single product I will change the product type after
//do it wit no overwriting
add_action( 'woocommerce_product_query', 'simple_products_query' );
function simple_products_query( $q ) {

   $taxonomy_query = $q->get('tax_query') ; //get current loop query

   //appends the grouped products condition
   $taxonomy_query['relation'] = 'AND';
   $taxonomy_query[] = array(
           'taxonomy' => 'product_type',
           'field' => 'slug',
           'terms' => 'simple');

   $q->set( 'tax_query', $taxonomy_query );
}


//add_action( 'init', 'register_supplement_product_type' );
//add_filter( 'product_type_selector', 'remove_product_types' );

//function register_supplement_product_type() {
    //class WC_Product_Supplement extends WC_Product {
        //public function __construct( $product ) {
            //$this->product_type = 'Supplement';
            //parent::__construct( $product ); } } }

//function remove_product_types( $types ){
	////unset( $types['grouped'] );
	//unset( $types['external'] );
	//unset( $types['variable'] );
    //$types[ 'simple' ] = __( 'Supplementaire', 'dm_product' );
    //$types[ 'grouped' ] = __( 'Panier', 'dm_product' );

	//return $types;
//}
//
//
//

//hiding from the admin-home page for a cleaner look

function remove_menus() {
    //remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'Jetpack' );                    //Jetpack*
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings
}
add_filter('acf/settings/show_admin', '__return_false');
add_action( 'admin_menu', 'remove_menus' );
