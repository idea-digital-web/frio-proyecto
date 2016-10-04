<?php
/**
 * https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 * https://surpriseazwebservices.com/edit-woocommerce-checkout-fields/
*/
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);

	$fields['billing']['billing_state']['label'] = 'Estado';
	$fields['billing']['billing_city']['label'] = 'Ciudad';

return $fields;
}
 ?>
