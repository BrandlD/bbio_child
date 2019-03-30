<div id="checkout-cart">
<div class="center-flex">
    <?php
            global $woocommerce;
            foreach ( $woocommerce->cart->get_cart() as $product ) {
                $cart_checkout_id = $product['data']->get_id();
                set_query_var( 'cart_checkout_id', $cart_checkout_id );
                wc_get_template_part('custom-product-card');
            }
    ?>
</div>
</div>
