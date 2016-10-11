<?php

/**
 * CUSTOM login
*/

/* Enque Stylesheet */
function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login.css" />';
}
add_action('login_head', 'my_custom_login');

/* Change the Login Logo URL */
function my_login_logo_url() {
	return get_bloginfo( 'url' );
}
function my_login_logo_url_title() {
	return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/* Oculta la barra de administración */

function my_function_admin_bar(){
return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

/**
 * CUSTOM EMAIL
*/

function new_mail_from($old) {
 return get_bloginfo('admin_email');
}
function new_mail_from_name($old) {
 return get_bloginfo( 'name' );
}
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

/**
 * CHANGE WP HEAD
 */
function change_wp_head(){
remove_action('wp_head', 'wp_generator');
}



 ?>
