<?php

/**
 * GENERAL
*/

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

/**
 * HEADER
*/

/**
 * Agregar Logo en el Header
*/

function storefront_site_branding() {
	?>
		<div class='logo_header'>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="http://i2.wp.com/frio.ideapruebas.com/blog/wp-content/uploads/2016/10/logo.png" alt="Logo Header" />
			</a>
		</div>
	<?php
}

/**
 * Agregar Banner en el Header
*/

function banner_header() {
	?>
		<picture>
			<img src="http://i1.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/banner-header.png" alt="Banner Header" />
		</picture>
	<?php
}

/**
 * Agrega background shadow a  barra de busqueda
*/
function storefront_product_search() {
	if ( is_woocommerce_activated() ) { ?>
		<div class="site-search-container">
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
			<div class="site-search-shadow"></div>
		</div>
	<?php
	}
}

/**
 * Agregando Carrito de Compras en el Header
*/

function header_cart() {
	if ( is_woocommerce_activated() ) {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
	<ul class="site-header-cart menu">
		<li class="<?php echo esc_attr( $class ); ?>">
			<?php storefront_cart_link(); ?>
		</li>
		<li>
			<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		</li>
	</ul>
	<?php
	}
}

/**
 * Coll Full
 */
function coll_full_container() {
	?>
	 <div class="col-full">
	<?php
}

/**
 * Coll Full close
 */
function coll_full_container_close() {
	?>
		</div>
	<?php
}

/**
 * Header inner container
 */
function inner_container() {
	?>
	 <section class="inner_container">
	<?php
}

/**
 * Header inner container close
 */
function inner_container_close() {
	?>
	</section>
	<?php
}


/**
 * HOMEPAGE
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


/**
 * FOOTER
*/

function footer_content() {
get_template_part( 'templates/footer', 'content' );
}

function storefront_credit() {
	?>
	<div class="site-info">
		<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
		<?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
		<br /> <?php printf( esc_attr__( '%1$s designed by %2$s.', 'storefront' ), 'Storefront', '<a href="http://www.woothemes.com" title="Premium WordPress Themes & Plugins by WooThemes" rel="author">WooThemes</a>' ); ?>
		<?php } ?>
	</div><!-- .site-info -->
	<?php
}

/**
 * PAGES
*/

/**
 * Custom H1 Storefront Page Header
 */
function custom_storefront_page_header () {
	if (!is_page('Home')): ?>
	<header class="entry-header">
		<?php
			storefront_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->
	<?php endif;
}
 ?>
