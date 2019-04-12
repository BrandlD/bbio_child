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

//create custom product type
add_action( 'init', 'register_supplement_product_type' );
add_filter( 'product_type_selector', 'remove_product_types' );

function register_supplement_product_type() {
    class WC_Product_Supplement extends WC_Product_Simple {
        public function __construct( $product ) {
            $this->product_type = 'supplement';
            parent::__construct( $product ); } } }

function remove_product_types( $types ){
    unset( $types['external'] );
    unset( $types['variable'] );
    unset( $types['grouped'] );
    $types[ 'supplement' ] = "Supplement";
    return $types;
}

function simple_supplement_custom_js() {

        if ( 'product' != get_post_type() ) :
                    return;
            endif;

            ?><script type='text/javascript'>
        jQuery( document ).ready( function() {
            jQuery( '.product_data_tabs .general_tab' ).addClass( 'show_if_supplement' ).show();
            jQuery( '.options_group.pricing' ).addClass( 'show_if_supplement' ).show();
            jQuery( '.inventory_options' ).addClass( 'show_if_supplement' ).show();
        });
    </script><?php
}
add_action( 'admin_footer', 'simple_supplement_custom_js' );

//hiding from the admin-home page for a cleaner look

function remove_menus() {
    //remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'Jetpack' );                    //Jetpack*
    //remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
}
add_filter('acf/settings/show_admin', '__return_false');
add_action( 'admin_menu', 'remove_menus' );

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



//this is the custom vat function to add the infos
//
//
/**

* Add custom field to the checkout page

*/

add_action('woocommerce_after_order_notes', 'custom_checkout_field');

function custom_checkout_field($checkout)
{
echo '<div id="custom_checkout_field"><h2>' . __('Vous représentez une société') . '</h2>';

woocommerce_form_field('nom_soc', array(
  'type' => 'text',
  'class' => array( 'my-field-class form-row-wide' ) ,
  'placeholder' => __('Nom de votre société') ,
) , $checkout->get_value('nom_soc'));

woocommerce_form_field('num_tva', array(
  'type' => 'text',
  'class' => array( 'my-field-class form-row-wide' ) ,
  'placeholder' => __('Numéro de tva') ,
) , $checkout->get_value('num_tva'));

echo '</div>';

}



add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta');
function custom_checkout_field_update_order_meta($order_id) {

  if (!empty($_POST['nom_soc'])) {
    update_post_meta($order_id, 'nom_soc',sanitize_text_field($_POST['nom_soc'])); }
  if (!empty($_POST['num_tva'])) {
    update_post_meta($order_id, 'num_tva',sanitize_text_field($_POST['num_tva'])); }

}




//changing the order to have it reset (not in the db) every motnh
add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number' );

function change_woocommerce_order_number( $order_id ) {
            global $wpdb;

            $order = wc_get_order( $order_id );
            $order_dt = $order->get_date_created()->format ('ym');
            $date_created = $order->get_date_created()->format ( 'Y-m-d' );
            $query        = "SELECT ID FROM {$wpdb->prefix}posts WHERE post_date LIKE '%".$date_created."%' AND post_type='shop_order' ORDER BY ID ";
            $result       = $wpdb->get_results( $query );
            $count        = 0;

            foreach( $result as $index => $id ) {
                if( strval($order_id) == $id->ID ) {
                    $count = $index + 1;
                    break;
                }
            }

            $new_order_id = $order_dt . str_pad( strval($count),2,strval(0), STR_PAD_LEFT) ;
            return $new_order_id;
}
