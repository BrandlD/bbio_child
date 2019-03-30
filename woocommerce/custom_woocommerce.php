<?php
add_action( 'woocommerce_before_add_to_cart_form', 'add_button', 5 );
function add_button() {
    wc_get_template_part( './single_add_button' );
}



add_action( 'woocommerce_after_single_product', 'add_supplement', 5 );
function add_supplement() {
    wc_get_template_part( './single-upsale' );
    echo '<div id="overlay-general" >';
    echo '<div class="overlay__inner"><div class="overlay__content"><span class="spinner"></span></div> </div>';
    echo '</div>';
}


// this one is a code to have the cart and the checkout on the same page

add_action( 'woocommerce_before_checkout_form', 'bbloomer_cart_on_checkout_page_only', 5 );

function bbloomer_cart_on_checkout_page_only() {
if ( is_wc_endpoint_url( 'order-received' ) ) return;
    wc_get_template_part( './cart-page' );
	echo do_shortcode('[woocommerce_cart]');
}
?>
