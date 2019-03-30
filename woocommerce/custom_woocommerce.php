
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
