<?php global $woocommerce; ?>
<?php $product = wc_get_product(get_the_id()); ?>
<?php foreach ( $woocommerce->cart->get_cart() as $_cart_item_key => $_cart_item ) {
if($_cart_item['product_id'] == get_the_id() ){
  $cart_item_key = $_cart_item_key;
  $cart_item = $_cart_item; } }
?>



<!-- definition of the card -->
<div class="card custom-product-card" id="card-<?php echo get_the_id(); ?>" >


<!-- definition of the img -->
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($product->ID), 'single-post-thumbnail' );?>
<a href="<?php echo the_permalink(); ?>" class="link-unstyled"> <img class="card-img-top" src="<?php  echo $image[0]; ?>" data-id="<?php echo $product->ID; ?>" > </a>



<!-- definition of the body -->
<div class="card-body">
<button
        data-action="add"
        data-url="<?php echo admin_url('admin-ajax.php'); ?>"
        data-item="<?php echo get_the_id() ?>"
        href="<?php the_permalink(); ?>" class="qty-btn">



<!-- definition of the btn content -->
<div class="button-content child">

<!-- definition of the txt -->
<p class="text-button child">Ajouter au panier</p>

<div class="quantity-picker"> <!-- definition of the txt -->
<div class="quantity-number">
<?php if ($cart_item ) { echo $cart_item['quantity'];} else { echo '0';} ?>
</div>


<div class="quantity-buttons"> <!-- start of buttons -->


<span data-item="<?php echo get_the_id() ?>"
      data-url="<?php echo admin_url('admin-ajax.php'); ?>"
      data-action="add" class="qty-btn">
 <!-- plus sign qty -->
<a href="#!" class="link-unstyled child" >+</a>
</span> <!-- plus sign qty -->



<?php if ($cart_item_key) : ?> <!-- less sign qty -->
<span data-item="<?php echo get_the_id() ?>"
      data-url="<?php echo admin_url('admin-ajax.php'); ?>"
      data-action="remove" class="qty-btn " >

<a href="#!" class="child link-unstyled">-</a>
</span>
<?php else  : ?>
<span class="text-muted">-</span>
<?php endif; ?> <!-- less sign qty -->


</div>
<!-- end of span -->
</div>



<!-- end of a tag -->
</div>
</button>


<div class="overlay__inner">
<div class="overlay__content"><span class="spinner"></span></div>
</div> <!-- end of the overlay  -->


</div> <!-- end of the card  -->


</div>
