<?php 
// LOAD PRETTY PHOTO for the whole site

add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );

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

/* add rel prettyphoto to all images */
function autoadd_rel_prettyPhoto($content) {
 global $post;
 $pattern = "/(<a(?![^>]*?data-rel=['\"]prettyPhoto.*)[^>]*?href=['\"][^'\"]+?\.(?:bmp|gif|jpg|jpeg|png)['\"][^\>]*)>/i";
 $replacement = '$1 data-rel="prettyPhoto['.$post->ID.']">';
 $content = preg_replace($pattern, $replacement, $content);
 return $content;
}
add_filter("the_content","autoadd_rel_prettyPhoto")





















 ?>