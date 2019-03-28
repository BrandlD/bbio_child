<?php get_header(); ?>
<?php global $woocommerce; global $wp;?>

<div id="custom-shop" class="container woocommerce">



<div class="card-columns">
<?php
if ( woocommerce_product_loop() ) {

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();
            wc_get_template_part('custom-product-card');
		}
	}

    ?> </div> <?php
	woocommerce_product_loop_end();
	do_action( 'woocommerce_after_shop_loop' );

} else {

	do_action( 'woocommerce_no_products_found' );
    ?> </div> <?php
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */

?>


<!-- end the product layout  -->
<!-- end the container  -->
</div>
<?php
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */



get_footer( 'shop' );
?>


<?php
