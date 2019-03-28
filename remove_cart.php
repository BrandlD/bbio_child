<?php
/*
 *
 *  @package custom_ajaxtheme
 *
 *          ========================
 *                  AJAX FUNCTIONS
 *                      ========================
 */
add_action( 'wp_ajax_nopriv_add_remove', 'add_remove' );
add_action( 'wp_ajax_add_remove', 'add_remove' );

function add_remove() {
  global $woocommerce ;
  $cart = $woocommerce->instance()->cart;
  $id = $_POST['theid'];
  $action = $_POST['spec_action'];
  $product = wc_get_product(get_the_id());
  $actual = 0 ;
  foreach ( $woocommerce->cart->get_cart() as $_cart_item_key => $_cart_item ) {
    if($_cart_item['product_id'] == $id ){
      $cart_item_key = $_cart_item_key;
      $cart_item = $_cart_item;
      $actual  =  $cart_item['quantity'];
      break;
      }
    }

  if ($action == "remove" ) {
      if ($actual > 0) {
        $cart->set_quantity($cart_item_key, $actual-1 )  ;
        echo 'removed';
      } else {
        echo 'notInCart';
      }
  } else  {
    $cart->add_to_cart( $id,  1 );
  }

  //echo $cart_item ;
  die();
}
