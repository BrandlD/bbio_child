<?php global $woocommerce; ?>
<?php $product = wc_get_product(get_the_id()); ?>

<div id="supplement-upsale">
<h1>Envie de completer votre panier ?</h1>
<div class="center-flex supplement">
<?php
if ( $product->get_type() != 'supplement' ) {
$supp_args = array(
    'post_type' => 'product',
    'posts_per_page' => 8,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_type',
            'field'    => 'slug',
            'terms'    => 'simple',
        ),
    ),
);

$supp_loop = new WP_Query( $supp_args );
if ( $supp_loop->have_posts() ) {
    while ( $supp_loop->have_posts() ) : $supp_loop->the_post();
            wc_get_template_part('custom-product-card');
    endwhile;
}
wp_reset_postdata();}

?>
</div>
<!-- eventually showing the ingredients -->

<!-- always showing the crosssale -->
<h1>Vous aimerez peut-être</h1>
<div class="center-flex upsale">
<?php
$cat = $product->get_categories();
$rel_args = array(
    'post_type' => 'product',
    'posts_per_page' => 4,
    'post__not_in' => array( get_the_ID() ),
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $cat,
        ),
        array(
            'taxonomy' => 'product_type',
            'field'    => 'slug',
            'terms'    => 'simple',
        ),
    ),
);
$rel_loop = new WP_Query( $rel_args );
if ( $rel_loop->have_posts() ) {
    while ( $rel_loop->have_posts() ) : $rel_loop->the_post();
            wc_get_template_part('custom-product-card');
    endwhile;
}
wp_reset_postdata();
?>
</div>

</div>
<!-- always showing the crosssale -->
