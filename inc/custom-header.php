<?php 

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
				<img src="http://i2.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/logo-header.jpeg" alt="Logo Header" />
			</a>
		</div>
	<?php 
}

/**
Agregar Banner en el Header
*/

function banner_header() {
	?>
		<picture>
			<img src="http://i1.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/banner-header.png" alt="Banner Header" />
		</picture>
	<?php 
}

/**
Agrega background shadow a  barra de busqueda
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
	echo '<div class="col-full">';
}

/**
 * Coll Full close
 */
function coll_full_container_close() {
	echo '</div>';
}

/**
 * Header inner container
 */
function inner_container() {
	echo '<section class="inner_container">';
}

/**
 * Header inner container close
 */
function inner_container_close() {
	echo '</section>';
}


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