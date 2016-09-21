<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">

 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- <title><?php bloginfo('name');?> | <?php bloginfo('description');?><?php wp_title( '|', true, 'left' ); ?></title> -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Viewport -->
<?php get_template_part( 'templates/meta-viewport'); ?>
<!-- End Viewport -->

<!-- Favicon -->
<?php get_template_part( 'templates/favicon'); ?>
<!-- End Favicon -->

<!-- Selectivzr -->
<?php get_template_part( 'templates/selectivzr'); ?>
<!-- End Selectivzr -->

<!-- Inyección de enlaces con wp_head -->
<?php wp_head(); ?>
<!-- Fin inyección de enlaces con wp_head -->

</head>

<!-- Google Analitics -->
<!-- <?php include_once('templates/analyticstracking.php') ?> -->

<!-- Browse Happy -->
<?php get_template_part( 'templates/browsehappy' ); ?>

<div id="page" class="hfeed site">
	<?php
	do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" style="<?php storefront_header_styles(); ?>">
	<?php get_template_part( 'templates/nav', 'login' ); ?>

		
		<!-- <div class="col-full"> -->

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_skip_links                       - 0
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_site_branding                    - 20
			 * @hoohed storefront_secondary_navigation_wrapper, 22
			 * @hooked storefront_product_search                   - 30
			 * @hooked storefront_secondary_navigation             - 40
			 * @hoohed storefront_secondary_navigation_wrapper_close, 41
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_header_cart                      - 60
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			do_action( 'storefront_header' ); ?>

		<!-- </div> -->
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
