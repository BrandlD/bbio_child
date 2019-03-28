<?php global $woocommerce; ?>
<div class="card custom-product-card " >

<?php $product = wc_get_product(get_the_id()); ?>

<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($product->ID), 'single-post-thumbnail' );?>

<img class="card-img-top" src="<?php  echo $image[0]; ?>" data-id="<?php echo $product->ID; ?>" >
<div class="card-body">
<h5 class="card-title"><?php the_title(); ?></h5>
<a href="<?php the_permalink(); ?>" class="btn btn-primary">Ajouter au panier</a>




<?php foreach ( $woocommerce->cart->get_cart() as $_cart_item_key => $_cart_item ) {
     if($_cart_item['product_id'] == get_the_id() ){
         $cart_item_key = $_cart_item_key;
         $cart_item = $_cart_item; } }
?>

<span class="input-number-decrement">
<a href="<?php echo home_url( $wp->request ) .'?add-to-cart='. get_the_id() . '&quantity=' . 1 ?>" class="link-unstyled">+</a>
</span>
<input class="input-number" type="text" value="<?php if ($cart_item ) { echo $cart_item['quantity'];} else { echo '0';} ?>" min="0" max="10">

<?php if ($cart_item_key) : ?>
<span class="input-number-increment">
    <a href="<?php echo home_url( $wp->request ) .'?add-to-cart='. get_the_id() . '&quantity=' . 1 ?>" class="link-unstyled">-</a>
</span>
<?php endif; ?>



                </div>


<?php
//$product_quantity = woocommerce_quantity_input( array(
    //'input_name'   => "cart[{$cart_item_key}][qty]",
    //'input_value'  => $cart_item['quantity'],
    //'max_value'    => -1,
    //'min_value'    => '0',
    //'product_name' => $product->get_name(),
//), $product, false );

    //echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.  ?>
</div>
