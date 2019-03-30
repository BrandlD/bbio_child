
<?php
//add_action( 'woocommerce_before_add_to_cart_form', 'bbloomer_custom_action', 5 );
function bbloomer_custom_action() {
    wc_get_template_part( './single_add_button' );
}

?>
