<?php
/**
 * INSERTAR ARCHIVO CSS STOREFRONT, 
 * Y ARCHIVOS CSS Y JS COMO THEME CHILD

 * get_template_directory_uri will look up parent theme location
 * get_stylesheet_directory_uri will look up child theme location
 * https://ithemes.com/2015/02/17/adding-scripts-wordpress-right-way/
 * http://themes.simplethemes.com/skeleton/tutorials/
 * how-to-add-custom-css-and-javascript-using-a-child-theme/
*/

// Scripts

// Agregar Vendors JS
function add_vendors_js(){
        wp_enqueue_script('sticky', '//cdn.jsdelivr.net/stickynavbar.js/1.3.0/jquery.stickyNavbar.min.js', array(), '1', true );
        wp_enqueue_script('easing', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array(), '1', true );
        wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', array(), '1' );
        // wp_enqueue_script('flexslider', get_stylesheet_directory_uri(). '/js/vendors/jquery.flexslider.js', array(), '1', true );
        // wp_enqueue_script('tipsy', get_stylesheet_directory_uri(). '/js/vendors/jquery.tipsy.js', array(), '1', true );
}
add_action('wp_enqueue_scripts', 'add_vendors_js', 11);

// Agregar Mis Scripts
function my_scripts(){
        wp_enqueue_script('myScript', get_stylesheet_directory_uri(). '/js/main.min.js', array(), '1', true );
        // wp_enqueue_script('components', get_stylesheet_directory_uri(). '/js/components.js', array(), '1', true );
}
add_action('wp_enqueue_scripts', 'my_scripts', 11);


// FUENTES Y ESTILOS:

// Agregar Mis Estilos (ya lo está agregando el tema padre)
// function my_stylesheet() {
//     wp_enqueue_style( 'myStyle', get_stylesheet_directory_uri().'/style.css', array('theme'), '1.0', 'screen, projection'); 
// }
// add_action( 'wp_enqueue_scripts', 'my_stylesheet' );

// Agregar Fonts 
function add_fonts() {
	wp_enqueue_style( 'asap', '//fonts.googleapis.com/css?family=Asap:400,400i,700,700i&subset=latin-ext', array( 'storefront-style' ) );
}
add_action( 'wp_enqueue_scripts', 'add_fonts' );

// Agregar Vendors CSS 
function add_vendors_css() {
	wp_enqueue_style('animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array('storefront-style'));
}
add_action( 'wp_enqueue_scripts', 'add_vendors_css' );