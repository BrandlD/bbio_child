<?php

add_action( 'woocommerce_before_add_to_cart_form', 'add_button', 5 );
    function add_button() { wc_get_template_part( './single_add_button' );
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



 add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
 function override_billing_checkout_fields( $fields ) {

     $fields['billing']['billing_first_name']['placeholder'] = 'Prénom';
     $fields['billing']['billing_last_name']['placeholder'] = 'Nom';
     $fields['billing']['billing_company']['placeholder'] = 'Nom de la société (optionnel)';
     $fields['billing']['billing_postcode']['placeholder'] = 'Code postal';
     $fields['billing']['billing_phone']['placeholder'] = 'Téléphone';
     $fields['billing']['billing_city']['placeholder'] = 'Ville (optionnel)';
     $fields['billing']['billing_email']['placeholder'] = 'exemple@b-bio.com';


     $fields['shipping']['shipping_first_name']['placeholder'] = 'Prénom';
     $fields['shipping']['shipping_last_name']['placeholder'] = 'Nom';
     $fields['shipping']['shipping_company']['placeholder'] = 'Nom de la société (optionnel)';
     $fields['shipping']['shipping_postcode']['placeholder'] = 'Code postal';
     $fields['shipping']['shipping_phone']['placeholder'] = 'Téléphone';
     $fields['shipping']['shipping_city']['placeholder'] = 'Ville';

     return $fields;

}


?>
