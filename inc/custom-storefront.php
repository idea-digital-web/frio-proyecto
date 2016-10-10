<?php
/**
 * AGREGAR MONEDA: Bolívares Débiles (Bs.)
 */

// add_filter( 'woocommerce_currencies', 'add_my_currency' );
// function add_my_currency( $currencies ) {
//      $currencies['ABC'] = __( 'Bolívares Débiles', 'woocommerce' );
//      return $currencies;
// }

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'VEF': $currency_symbol = 'Bs.'; break;
     }
     return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

/**
 * CUSTOM FIELDS BILLING
 * https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 * https://surpriseazwebservices.com/edit-woocommerce-checkout-fields/
*/
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);

	$fields['billing']['billing_state']['label'] = 'Estado';
	$fields['billing']['billing_city']['label'] = 'Ciudad';

return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

/**
* FILTER TRANSLATIONS, to replace some WooCommerce text with our own
* @param string $translation the translated text
* @param string $text the text before translation
* @param string $domain the gettext domain for translation
* @return string
*/
function wpse_77783_woo_bacs_ibn($translation, $text, $domain) {
    if ($domain == 'woocommerce') {
        switch ($text) {
            case 'IBAN':
                $translation = 'RIF';
                break;

            case 'BIC / Swift':
                $translation = 'EMAIL';
                break;
        }
    }

    return $translation;
}

add_filter('gettext', 'wpse_77783_woo_bacs_ibn', 10, 3);

/** LOAD PRETTY PHOTO for the whole site */

function frontend_scripts_include_lightbox() {
  global $woocommerce;
  $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
  $lightbox_en = get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;

  if ( $lightbox_en ) {
    wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_script( 'prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
  }
}
add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );

/* add rel prettyphoto to all images */
function autoadd_rel_prettyPhoto($content) {
 global $post;
 $pattern = "/(<a(?![^>]*?data-rel=['\"]prettyPhoto.*)[^>]*?href=['\"][^'\"]+?\.(?:bmp|gif|jpg|jpeg|png)['\"][^\>]*)>/i";
 $replacement = '$1 data-rel="prettyPhoto['.$post->ID.']">';
 $content = preg_replace($pattern, $replacement, $content);
 return $content;
}
add_filter("the_content","autoadd_rel_prettyPhoto");
