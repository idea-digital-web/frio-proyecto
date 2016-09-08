<?php 

function custom_storefront_template_hook() {
/**
 * General
 *
 * @see  storefront_header_widget_region()
 * @see  storefront_get_sidebar()
 */
	remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
	remove_action( 'storefront_before_content', 'storefront_header_widget_region', 10 );

/**
 * Header
 *
 * @see  storefront_skip_links()
 * @see  storefront_secondary_navigation()
 * @see  storefront_site_branding()
 * @see  storefront_primary_navigation()
 */
	add_action( 'storefront_header', 'storefront_secondary_navigation_wrapper', 22 );
	add_action( 'storefront_header', 'banner_header', 25 );
	add_action( 'storefront_header', 'header_cart', 35 );
	add_action( 'storefront_header', 'storefront_secondary_navigation_wrapper_close', 41 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60);

/**
 * Footer
 *
 * @see  storefront_footer_widgets()
 * @see  storefront_credit()
 */
	remove_action( 'storefront_footer', 'storefront_credit', 20);

/**
 * Homepage
 *
 * @see  storefront_homepage_content()
 * @see  storefront_product_categories()
 * @see  storefront_recent_products()
 * @see  storefront_featured_products()
 * @see  storefront_popular_products()
 * @see  storefront_on_sale_products()
 * @see  storefront_best_selling_products()
 */

	remove_action( 'homepage', 'storefront_homepage_content', 10 );
	remove_action( 'homepage', 'storefront_product_categories', 20 );
	remove_action( 'homepage', 'storefront_featured_products', 40 );
	remove_action( 'homepage', 'storefront_popular_products', 50 );

/**
 * Layout
 *
 * @see  storefront_before_content()
 * @see  storefront_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  storefront_shop_messages()
 */
	remove_action( 'storefront_content_top', 'woocommerce_breadcrumb', 10 );
/**
 * After Single Products Summary Div.
 *
 * @see woocommerce_output_product_data_tabs()
 * @see woocommerce_upsell_display()
 * @see woocommerce_output_related_products()
 */
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10);
}
add_action( 'init', 'custom_storefront_template_hook' );