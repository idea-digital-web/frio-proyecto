<?php 
 if (get_bloginfo( 'url' ) === "http://localhost/frio") {
	add_filter( 'auto_update_plugin', '__return_true' );
	add_filter( 'auto_update_theme', '__return_true' );
} else {
	add_filter('allow_minor_auto_core_updates', '__return_true');
	add_filter( 'auto_update_plugin', '__return_false' );
	add_filter( 'auto_update_theme', '__return_false' );
}
 ?>
