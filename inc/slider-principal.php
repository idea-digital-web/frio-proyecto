<?php 
if ( ! function_exists( 'slider_principal' ) ) {
	function slider_principal() {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		if ( is_plugin_active( 'revslider/revslider.php' ) ) {
			putRevSlider("principal", "homepage");
		} else {
			if (is_front_page() || is_home()) {
				get_template_part( 'templates/banner', 'principal' );
			}
		}
	}
}

 ?>