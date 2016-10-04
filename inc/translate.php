<?php
/**
* filter translations, to replace some WooCommerce text with our own
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

 ?>
