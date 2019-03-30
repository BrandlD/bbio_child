<?php get_header(); ?>
<?php global $woocommerce; global $wp;?>

<div id="custom-shop" class="container woocommerce">


<?php if ( woocommerce_product_loop() ) { ?>

    <div class="center-flex">
    <?php
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();
            wc_get_template_part('custom-product-card');
		}
	}
    ?>
    </div>
    <?php
	woocommerce_product_loop_end();
	do_action( 'woocommerce_after_shop_loop' );
    ?>


<?php } else { do_action( 'woocommerce_no_products_found' ); } ?>


<!-- end the container  -->
</div>

<?php do_action( 'woocommerce_after_main_content' ); ?>
<?php get_footer( 'shop' ); ?>


<?php
