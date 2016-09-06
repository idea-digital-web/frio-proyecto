<?php
/**
 * Agregar Moneda: Bolívares Débiles (Bs.)
 */

// add_filter( 'woocommerce_currencies', 'add_my_currency' );
// function add_my_currency( $currencies ) {
//      $currencies['ABC'] = __( 'Bolívares Débiles', 'woocommerce' );
//      return $currencies;
// }
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'VEF': $currency_symbol = 'Bs. '; break;
     }
     return $currency_symbol;
}