<?php 

function localhost(){
	return true;
}
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );

 ?>