<?php

function custom_storefront_template_hook() {

/** Head */

add_action( 'head_meta', 'add_meta_viewport', 10 );
add_action( 'head_meta', 'add_favicon', 20 );
add_action( 'head_meta', 'add_selectivzr', 30 );

/** After Head */
add_action( 'after_head', 'add_browsehappy', 10 );

/**
 * General
 *
 * @see  storefront_header_widget_region()
 * @see  storefront_get_sidebar()
 */
	remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
	remove_action( 'storefront_before_content', 'storefront_header_widget_region', 10 );
	add_action( 'storefront_before_content', 'slider_principal', 10 );

/**
 * Header
 *
 * @see  storefront_skip_links()
 * @see  storefront_secondary_navigation()
 * @see  storefront_site_branding()
 * @see  storefront_primary_navigation()
  * @see  storefront_product_search() ~> woocommerce
 * @see  storefront_header_cart()~> woocommerce
 */
	remove_action( 'storefront_header', 'storefront_product_search', 40 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60);
	remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
	add_action( 'storefront_header', 'nav_top_login', 18 );
	add_action( 'storefront_header', 'coll_full_container', 19 );
	add_action( 'storefront_header', 'inner_container', 21 );
	add_action( 'storefront_header', 'storefront_product_search', 25 );
	add_action( 'storefront_header', 'header_cart', 26 );
	// add_action( 'storefront_header', 'banner_header', 35 );
	add_action( 'storefront_header', 'inner_container_close', 36 );
	add_action( 'storefront_header', 'coll_full_container_close', 37 );
	add_action( 'storefront_header', 'storefront_secondary_navigation', 41 );

/**
 * Footer
 *
 * @see  storefront_footer_widgets()
 * @see  storefront_credit()
 */
	//remove_action( 'storefront_footer', 'storefront_footer_widgets', 10);
	add_action( 'storefront_footer', 'footer_content', 10);

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
	add_action( 'homepage', 'banners_content', 80 );
	add_action( 'homepage_after_content', 'add_google_maps', 90 );

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
 * Pages
 *
 * @see  storefront_page_header()
 * @see  storefront_page_content()
 * @see  storefront_init_structured_data()
 * @see  storefront_display_comments()
 */
remove_action( 'storefront_page', 'storefront_page_header', 10 );
add_action( 'storefront_page', 'custom_storefront_page_header', 10 );

/**
 * After Single Products Summary Div. (Pluggin Woocommerce)
 *
 * @see woocommerce_output_product_data_tabs()
 * @see woocommerce_upsell_display()
 * @see woocommerce_output_related_products()
 */
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10);
}
add_action( 'init', 'custom_storefront_template_hook' );
