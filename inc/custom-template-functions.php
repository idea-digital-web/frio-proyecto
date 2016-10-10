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
				?>
				<section class="rotate">
					<div class="flexslider flexslider__principal">
						<ul class="slides">
							<li>
								<a href="#">
									<img src="http://i0.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/banner-principal-1.png" alt="Slider Principal" />
								</a>
							</li>
							<li>
								<a href="#">
									<img src="http://i2.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/banner-principal-2.png" alt="Slider Principal" />
								</a>
							</li>
							<li>
								<a href="#">
									<img src="http://i0.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/banner-principal-3.png" alt="Slider Principal" />
								</a>
							</li>
						</ul>
					</div>
				</section>
				<?php
			}
		}
	}
}

/**
 * HEADER
*/

// Agregar Nav Top
function nav_top_login(){
	?>
	<nav class="site-header_nav">
		<div class="site-header_nav--item site-header_nav--contact">
			<i class="fa fa-phone">
			</i>
			<span>
				<?php get_template_part( 'templates/add', 'phone'); ?> /
				<?php get_template_part( 'templates/add', 'mobile'); ?>
			</span>
		</div>
		<div class="site-header_nav--item site-header_nav--contact">
			<i class="fa fa-envelope-o">
			</i>
			<span><?php bloginfo('admin_email'); ?></span>
		</div>
		<div class="site-header_nav--item site-header_nav--welcome">
				<?php if ( is_user_logged_in() ) {?>
				<?php global $current_user; wp_get_current_user(); if ($current_user->user_firstname == true): ?>
				¡Bienvenido <?php echo ''. $current_user->user_firstname .'!'; else: ?>
				¡Bienvenido!<?php endif?>
			<nav class="site-header_nav--welcome--dropdown">
				<button id="menuDropdown">
					<span><i class="fa fa-th-list" aria-hidden="true"></i>
	</span>
					<!-- <i class="fa fa-chevron-down" aria-hidden="true" id="caretDown"></i>
					<i class="fa fa-chevron-up hide" aria-hidden="true" id="caretUp"></i> -->
				</button>
				<ul id="menuDropdownUl" class="hide dropdown-menu fadeIn">
					<?php if (current_user_can('administrator') || current_user_can('shop_manager')): ?>
					<li><a id="itemPanel" href="<?php home_url();?>/puedes-entrar-por-aqui"><i class="fa fa-tachometer" aria-hidden="true"></i>Escritorio</a></li>
					<?php endif ?>
					<li><a  id="itemPedidos" href="<?php home_url();?>/mi-cuenta/orders/"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Pedidos</a></li>
					<li><a  id="itemEditar" href="<?php home_url();?>/mi-cuenta/edit-account/"><i class="fa fa-user" aria-hidden="true"></i>Editar</a></li>
					<li><a  id="itemEditar" href="<?php home_url();?>/mi-cuenta/edit-address/"><i class="fa fa-home" aria-hidden="true"></i>Direcciones</a></li>
					<li><a  id="itemCerrar" href="<?php home_url();?>/mi-cuenta/customer-logout/" ><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
				</ul>
			</nav>
			<?php } else {?>
			<div class="site-header_nav--login">
				<a href="<?php home_url();?>/mi-cuenta" title="">
					<i class="fa fa-sign-in"></i>Iniciar Sesión / Registrarse
				</a>
			</div>
			<?php };?>
		</div>
		<div class="site-header_nav--item site-header_nav--social">
			<a href="<?php get_template_part( 'templates/add', 'facebook'); ?>" target="_blank"><i class="fa fa-facebook-official"></i></a>
			<!-- <a href="<?php get_template_part( 'templates/add', 'twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
			<a href="<?php get_template_part( 'templates/add', 'instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a> -->
		</div>
	</nav>
	<?php
}

/** Agregar Logo en el Header */

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

// Banner Content
function banners_content(){
	?>
	<div class="content-area__slides">
	  <div>
	    <img src="http://i2.wp.com/frio.ideapruebas.com/blog/wp-content/uploads/2016/10/minibanner-1.jpg" alt="Slider Content" />
	  </div>
	  <div>
	    <a href="http://frio.ideapruebas.com/servicios/">
	      <img src="http://i0.wp.com/frio.ideapruebas.com/blog/wp-content/uploads/2016/10/minibanner-2.jpg" alt="Slider Content" />
	    </a>
	  </div>
	  <div>
	    <img src="http://i2.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/banner-content-3.png" alt="Slider Content" />
	  </div>
	</div>
	<?php
}

/**
 * HOMEPAGE AFTER CONTENT
 */
 function add_google_maps(){
	 if (is_front_page() || is_home() || is_page_template( 'template-homepage.php' ) || is_page( 'contactanos' ))
	 	?>
		<iframe src="https://www.google.com/maps/d/embed?mid=13874Zt7-yIDIoR0CK2QtycNCsAk"
			width="100%"
			height="480"
			style="margin-bottom: -5px;">
		</iframe>
		<?php
 }

/**
 * FOOTER
*/

function footer_content() {
?>
<div class="site-footer__container">
	<div class="site-footer__item">
		<h2 class="us">
		Nosotros
		</h2>
		<picture>
			<img src="http://i2.wp.com/frio.ideapruebas.com/blog/wp-content/uploads/2016/10/logo.png" alt="Logo Footer" />
		</picture>
		<p><?php bloginfo('description'); ?></p>
		<span class="cards">
			<i class="fa fa-cc-visa fa-3x"></i>
			<i class="fa fa-cc-mastercard fa-3x"></i>
		</span>
	</div>
	<div class="site-footer__item">
		<h2 class="categories">Categorías</h2>
		<?php wp_nav_menu(
				array(
				'theme_location' => 'primary',
				'container' => 'nav',
				'link_before'	=> '<i class="fa fa-angle-right"></i> ',
				'container_class' => 'site-footer__item--nav',
				'menu_class' => 'site-footer__item--nav-categories',
				'depth' => 1
				)
			);
		?>
	</div>
	<div class="site-footer__item">
		<h2 class="contact-us">
		Contáctenos
		</h2>
		<div class="site-footer__item--contact">
			<i class="fa fa-phone"></i>
			<span><?php get_template_part( 'templates/add', 'phone'); ?></span>
		</div>
		<div class="site-footer__item--contact">
			<i class="fa fa-mobile"></i>
			<span><?php get_template_part( 'templates/add', 'mobile'); ?></span>
		</div>
		<div class="site-footer__item--contact">
			<i class="fa fa-whatsapp" aria-hidden="true"></i>
			<span><?php get_template_part( 'templates/add', 'whatsapp'); ?></span>
		</div>
		<div class="site-footer__item--contact">
			<i class="fa fa-envelope"></i>
			<span>Correos:</span>
			<!-- <span class="email"><?php bloginfo('admin_email'); ?></span> -->
			<span><?php get_template_part( 'templates/add', 'email'); ?></span>
		</div>
	<!-- 	<div class="site-footer__item--contact">
			Somos tienda virtual con entregas previo acuerdo.
		</div> -->
	</div>
	<div class="site-footer__item">
	<!-- 	<h2 class="form">
		Mensaje Directo
		</h2> -->
		<h2 class="form"></h2>
		<?php get_template_part( 'templates/footer', 'formcraft'); ?>
	</div>
</div>
<?php
}

function storefront_credit() {
	?>
	<div class="site-info">
		<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_template_part( 'templates/add', 'razonsocial' ) . ' ' . date( 'Y' ) ) ); ?>
		<?php if ( apply_filters( 'storefront_credit_link', true ) ) {
			printf( esc_attr__( '%1$s por %2$s', 'storefront' ), '| Desarrollado', '<a href="http://www.ideadigital.com.ve/" title="IdeaPro" rel="author" target="_blank">IdeaPro</a>' );
		} ?>
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
