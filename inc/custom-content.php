<?php 
/**
 * CONTENT
 * Establecemos la cantidad de productos y columnas a mostrar
 * Customizamos subtítulos a las secciones de Homepage Template
 */

// Editamos cantidad y columnas de productos
function products_columns( $args ) {
	$args['limit'] = 12; // limit ~> Cantidad total de productos a mostrar
	$args['columns'] = 4; // columns ~> Cantidad de columnas de productos a mostrar
	$args['orderby'] = 'date'; // Ordenamos por fecha
	$args['order'] = 'desc'; // Ordenamos de manera descendente
	return $args;
}
add_filter( 'storefront_product_categories_args', 'products_columns' );
add_filter( 'storefront_recent_products_args', 'products_columns' );
add_filter( 'storefront_on_sale_products_args', 'products_columns' );
add_filter( 'storefront_best_selling_products_args', 'products_columns' );
add_filter( 'storefront_popular_products_args', 'products_columns' );
add_filter( 'storefront_featured_products_args', 'products_columns' );

// Editamos los títulos de las secciones
function recent_products_title( $args ) {
	$args['title'] = 'Los más recientes'; // title ~> Título de la sección
	return $args;
}
add_filter( 'storefront_recent_products_args', 'recent_products_title' );

function on_sale_products_title( $args ) {
	$args['title'] = 'Ofertas'; // title ~> Título de la sección
	return $args;
}
add_filter( 'storefront_on_sale_products_args', 'on_sale_products_title' );

function best_selling_products_title( $args ) {
	$args['title'] = 'Los más vendidos'; // title ~> Título de la sección
	return $args;
}
add_filter( 'storefront_best_selling_products_args', 'best_selling_products_title' );

function popular_products_title( $args ) {
	$args['title'] = 'Los más populares'; // title ~> Título de la sección
	return $args;
}
add_filter( 'storefront_popular_products_args', 'popular_products_title' );