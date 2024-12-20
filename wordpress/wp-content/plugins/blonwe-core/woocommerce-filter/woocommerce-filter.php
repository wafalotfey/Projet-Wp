<?php

/*************************************************
## Blonwe Get options
*************************************************/
function blonwe_ft(){	
	$getft  = isset( $_GET['ft'] ) ? $_GET['ft'] : '';

	return esc_html($getft);
}

/*************************************************
## Scripts
*************************************************/
function blonwe_custom_scripts() {
	wp_register_style( 'klb-widget-product-categories',   plugins_url( 'widgets/product-categories/css/widget-product-categories.css', __FILE__ ), false, '1.0');
	wp_style_add_data( 'klb-widget-product-categories', 'rtl', 'replace' );	
	wp_register_script( 'klb-widget-product-categories',  plugins_url( 'widgets/product-categories/js/widget-product-categories.js', __FILE__ ), true );
	wp_register_style( 'klb-remove-filter',   plugins_url( 'grid-list/css/remove-filter.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_custom_scripts' );


/* Product Categories Widget */
require_once( __DIR__ . '/widgets/product-categories/widget-product-categories.php');

/* Product Status Widget */
require_once( __DIR__ . '/widgets/product-status/widget-product-status.php');

/* Grid List View */
require_once( __DIR__ . '/grid-list/grid-list-view.php' );

/* Mobile Filter */
require_once( __DIR__ . '/mobile-filter/mobile-filter.php' );

/* Load More */
require_once( __DIR__ . '/load-more/load-more.php' );

/* Product Data Tabs*/
require_once( __DIR__ . '/product-data/product-data-video.php' );

/* Image Zoom */
require_once( __DIR__ . '/image-zoom/image-zoom.php' );

/* Single Ajax */
require_once( __DIR__ . '/single-ajax/single-ajax.php' );

/* Notice Ajax */
if(get_theme_mod('blonwe_shop_notice_ajax_addtocart',0) == 1 || blonwe_ft() == 'notice_ajax'){
	require_once( __DIR__ . '/notice-ajax/notice-ajax.php' );
}

/* Recently Viewed */
if(get_theme_mod('blonwe_recently_viewed_products',0) == 1 && blonwe_ft() != 'recentfalse'){
require_once( __DIR__ . '/recently-viewed/recently-viewed.php' );
}

/* Min/Max Quantity */
if(get_theme_mod('blonwe_min_max_quantity',0) == 1){
	require_once( __DIR__ . '/minmax-quantity/minmax-quantity.php' );
}

/* Product360 View */
if(get_theme_mod('blonwe_shop_single_product360',0) == 1){
	require_once( __DIR__ . '/product360/product360.php' );
}

/* Side Cart */
if(get_theme_mod('blonwe_header_mini_cart_type') == 'sidecart' || blonwe_ft() == 'sidecart'){
	require_once( __DIR__ . '/side-cart/side-cart.php' );
}


/* Min Amount */
if(get_theme_mod('blonwe_min_order_amount_toggle',0) == 1){
	require_once( __DIR__ . '/min-amount/min-amount.php' );
}

/* Buy Now Single */
if(get_theme_mod('blonwe_shop_single_buy_now',0) == 1 || blonwe_ft() == 'buynow' || isset( $_REQUEST['blonwe-buy-now'])){
	require_once( __DIR__ . '/buy-now/buy-now.php' );
}

/* Registration Fields */
if(get_theme_mod('blonwe_registration_first_name') == 'visible' || get_theme_mod('blonwe_registration_last_name') == 'visible' || get_theme_mod('blonwe_registration_billing_company') == 'visible' || get_theme_mod('blonwe_registration_billing_phone') == 'visible'){
	require_once( __DIR__ . '/registration-fields/registration-fields.php' );
}

/* Attribute Swatches */
if(get_theme_mod('blonwe_attribute_swatches',0) == 1){
	require_once( __DIR__ . '/swatches/swatches.php' );
}

/* Free Shipping */
if(get_theme_mod('blonwe_free_shipping',0) == 1){
	require_once( __DIR__ . '/shipping-progress-bar/free-shipping.php' );
}

/* Attribute Swatches */
if(get_theme_mod('blonwe_attribute_swatches',0) == 1){
	require_once( __DIR__ . '/swatches/swatches.php' );
}

/* Remove All button */
if(get_theme_mod('blonwe_remove_all_button',0) == 1){
	require_once( __DIR__ . '/remove-all/remove-all.php' );
}

/* Back to top */
if(get_theme_mod('blonwe_scroll_to_top',0) == 1){
	require_once( __DIR__ . '/back-to-top/back-to-top.php' );
}

/* Single Sticky Titles */
if(get_theme_mod('blonwe_single_sticky_titles',0) == 1 || blonwe_ft() == 'stickytitles'){
	require_once( __DIR__ . '/single-sticky-titles/single-sticky-titles.php' );
}

/* Sticky Single Cart */
if(get_theme_mod('blonwe_single_sticky_cart',0) == 1 || blonwe_ft() == 'stickycart'){
	require_once( __DIR__ . '/sticky-single-cart/sticky-single-cart.php' );
}

/* Single Gallery */
require_once( __DIR__ . '/single-gallery/single-gallery.php' );

/* Ajax Login */
if(get_theme_mod('blonwe_ajax_login_form',0) == 1){
	require_once( __DIR__ . '/ajax-login/ajax-login.php' );
}

/* Ajax Search */
if(get_theme_mod('blonwe_ajax_search_form',0) == 1){
	require_once( __DIR__ . '/ajax-search/ajax-search.php' );
}

/* Product Badge */
if(get_theme_mod('blonwe_product_badge_tab', 0) == 1){
	require_once( __DIR__ . '/product-badge/product-badge.php' );
}

/* Wishlist */
if(get_theme_mod('blonwe_wishlist_button', 0) == 1){
	require_once( __DIR__ . '/wishlist/wishlist.php' );
}

/* Compare */
if(get_theme_mod('blonwe_compare_button', 0) == 1){
	require_once( __DIR__ . '/compare/compare.php' );
}

/* Comment Rating */
if(get_theme_mod('blonwe_comment_rating', 0) == 1){
	require_once( __DIR__ . '/comment-rating/comment-rating.php' );
}

if(get_theme_mod('blonwe_single_product_tab_type') == 'vertical_tab' || blonwe_ft() == 'vertical_tab' ||
get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab' || blonwe_ft() == 'accordion_tab' ||
get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab_content' || blonwe_ft() == 'accordion_tab_content'){
	require_once( __DIR__ . '/product-tab/product-tab.php' );
}

/* Product Box Variable */
if(get_theme_mod('blonwe_product_box_variable') == '1' || blonwe_ft() == 'box_variable' || isset( $_REQUEST['klb-product-box-variable'])){
	require_once( __DIR__ . '/product-box-variable/product-box-variable.php' );
}

/*************************************************
## Blonwe Stock Status
*************************************************/ 
function blonwe_stock_status(){
	$stock_status  = isset( $_GET['stock_status'] ) ? $_GET['stock_status'] : '';

	if($stock_status == 'instock'){
		return $stock_status;
	}
}

/*************************************************
## Blonwe on Sale
*************************************************/ 
function blonwe_on_sale(){
	$on_sale  = isset( $_GET['on_sale'] ) ? $_GET['on_sale'] : '';

	if($on_sale == 'onsale'){
		return $on_sale;
	}
}

/*************************************************
## Blonwe GET Cat URL
*************************************************/ 
function blonwe_get_cat_url($termid){
	global $wp;
	if ( '' === get_option( 'permalink_structure' ) ) {
		$link = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
	} else {
		$link = preg_replace( '%\/page/[0-9]+%', '', add_query_arg( null, null ) );
	}

	if(isset($_GET['filter_cat'])){
		$explode_old = explode(',',$_GET['filter_cat']);
		$explode_termid = explode(',',$termid);
		
		if(in_array($termid, $explode_old)){
			$data = array_diff( $explode_old, $explode_termid);
			$checkbox = 'checked';
		} else {
			$data = array_merge($explode_termid , $explode_old);
		}
	} else {
		$data = array($termid);
	}
	
	$dataimplode = implode(',',$data);
	
	if(empty($dataimplode)){
		$link = remove_query_arg('filter_cat',$link);
	} else {
		$link = add_query_arg('filter_cat',implode(',',$data),$link);
	}
	
	return $link;
}

/*************************************************
## Blonwe Remove Filter
*************************************************/ 
add_action('klb_before_products','blonwe_remove_klb_filter');
function blonwe_remove_klb_filter(){
	
	$output = '';

	wp_enqueue_style( 'klb-remove-filter');

	$_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
    $min_price = isset( $_GET['min_price'] ) ? wc_clean( $_GET['min_price'] ) : 0; 
    $max_price = isset( $_GET['max_price'] ) ? wc_clean( $_GET['max_price'] ) : 0; 

	if(! empty( $_chosen_attributes ) || isset($_GET['filter_cat']) || 0 < $min_price || 0 < $max_price || blonwe_stock_status() == 'instock' || blonwe_on_sale() == 'onsale'){

		global $wp;
	
		if ( '' === get_option( 'permalink_structure' ) ) {
			$baselink = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
		} else {
			$baselink = preg_replace( '%\/page/[0-9]+%', '', home_url( add_query_arg( null, null ) ) );
		}

		$output .= '<ul class="remove-filter">';
		
		$output .= '<li><a href="'.esc_url(remove_query_arg(array_keys($_GET))).'" class="remove-filter-element clear-all">'.esc_html__( 'Clear filters', 'blonwe-core' ).'</a></li>';

		if ( ! empty( $_chosen_attributes ) ) {
			foreach ( $_chosen_attributes as $taxonomy => $data ) {
				foreach ( $data['terms'] as $term_slug ) {
					$term = get_term_by( 'slug', $term_slug, $taxonomy );
					
					$filter_name    = 'filter_' . wc_attribute_taxonomy_slug( $taxonomy );
					$explode_old = explode(',',$_GET[$filter_name]);
					$explode_termid = explode(',',$term->slug);
					$klbdata = array_diff( $explode_old, $explode_termid);
					$klbdataimplode = implode(',',$klbdata);
					
					if(empty($klbdataimplode)){
						$link = remove_query_arg($filter_name);
					} else {
						$link = add_query_arg($filter_name,implode(',',$klbdata),$baselink );
					}

					$output .= '<li><a href="'.esc_url($link).'" class="remove-filter-element attributes">'.esc_html($term->name).'</a></li>';

				}
			}
		}

		if(blonwe_stock_status() == 'instock'){
		$output .= '<li><a href="'.esc_url(remove_query_arg('stock_status')).'" class="remove-filter-element stock_status">'.esc_html__('In Stock','blonwe-core').'</a></li>';
		}
		
		if(blonwe_on_sale() == 'onsale'){
		$output .= '<li><a href="'.esc_url(remove_query_arg('on_sale')).'" class="remove-filter-element on_sale">'.esc_html__('On Sale','blonwe-core').'</a></li>';
		}

		if($min_price){
		$output .= '<li><a href="'.esc_url(remove_query_arg('min_price')).'" class="remove-filter-element min_price">' . sprintf( __( 'Min %s', 'woocommerce' ), wc_price( $min_price ) ) . '</a></li>';
		}
		
		if($max_price){
		$output .= '<li><a href="'.esc_url(remove_query_arg('max_price')).'" class="remove-filter-element max_price">' . sprintf( __( 'Max %s', 'woocommerce' ), wc_price( $max_price ) ) . '</a></li>';
		}
		
		if(isset($_GET['filter_cat'])){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => false,
				'parent'    => 0,
				'include' 	=> explode(',',$_GET['filter_cat']),
			) );
			
			foreach ( $terms as $term ) {
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				$output .= '<li><a href="'.esc_url( blonwe_get_cat_url($term->term_id) ).'" class="remove-filter-element product_cat" id="'.esc_attr($term->term_id).'">'.esc_html($term->name).'</a></li>';
				if($term_children){
					foreach($term_children as $child){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						if(in_array($childterm->term_id, explode(',',$_GET['filter_cat']))){ 
							$output .= '<li><a href="'.esc_url( blonwe_get_cat_url($childterm->term_id) ).'" class="remove-filter-element product_cat" id="'.esc_attr($childterm->term_id).'">'.esc_html($childterm->name).'</a></li>';
						}
					}
				}
			}
		
		}
		
		$output .= '</ul>';
	}
	
	echo $output;
}

/*************************************************
## Blonwe Product Query
*************************************************/ 
function blonwe_product_query( $q ){
	if(blonwe_stock_status() == 'instock'){
		$q->set( 'meta_query', array (
			array(
				'meta_key' 	=> '_stock_status',
				'value' 	=> 'instock',
			)
		));
	}
	
	if(blonwe_on_sale() == 'onsale'){
		$q->set ( 'post__in', wc_get_product_ids_on_sale() );
	}

}
add_action( 'woocommerce_product_query', 'blonwe_product_query', 10, 2 );


/*************************************************
## Blonwe Product Tax Query
*************************************************/ 
function blonwe_woocommerce_product_query_tax_query( $tax_query, $instance ) {
	
	if(taxonomy_exists('location')){
		if(blonwe_location() != 'all'){
			$tax_query[] = array(
				'taxonomy' => 'location',
				'field' 	=> 'slug',
				'terms' 	=> blonwe_location(),
			);
		}
	}
	
	if(isset($_GET['filter_cat'])){
		if(!empty($_GET['filter_cat'])){
			$tax_query[] = array(
				'taxonomy' => 'product_cat',
				'field' 	=> 'id',
				'terms' 	=> explode(',',$_GET['filter_cat']),
			);
		}
	}
			
	if(isset($_GET['featured'])){
		if(!empty($_GET['featured'])){
			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field' 	=> 'name',
				'terms'    => array( 'featured' ),
				'operator' => 'IN',
			);
		}
	}
	
    return $tax_query; 
}
add_filter( 'woocommerce_product_query_tax_query', 'blonwe_woocommerce_product_query_tax_query', 10, 2 );

/*************************************************
## Blonwe Current Page URL
*************************************************/ 
add_filter( 'woocommerce_widget_get_current_page_url', 'blonwe_current_page_url', 10, 2 );
function blonwe_current_page_url( $link, $that ){
	if ( isset( $_GET['filter_cat'] ) ) {
		$link = add_query_arg( 'filter_cat', wc_clean( wp_unslash( $_GET['filter_cat'] ) ), $link );
	}

	if ( isset( $_GET['shop_view'] ) ) {
		$link = add_query_arg( 'shop_view', wc_clean( wp_unslash( $_GET['shop_view'] ) ), $link );
	}

	if ( isset( $_GET['on_sale'] ) ) {
		$link = add_query_arg( 'on_sale', wc_clean( wp_unslash( $_GET['on_sale'] ) ), $link );
	}
	
	if ( isset( $_GET['stock_status'] ) ) {
		$link = add_query_arg( 'stock_status', wc_clean( wp_unslash( $_GET['stock_status'] ) ), $link );
	}

	if ( isset( $_GET['ft'] ) ) {
		$link = add_query_arg( 'ft', wc_clean( wp_unslash( $_GET['ft'] ) ), $link );
	}

	if ( isset( $_GET['column'] ) ) {
		$link = add_query_arg( 'column', wc_clean( wp_unslash( $_GET['column'] ) ), $link );
	}

	if ( isset( $_GET['perpage'] ) ) {
		$link = add_query_arg( 'perpage', wc_clean( wp_unslash( $_GET['perpage'] ) ), $link );
	}
	
	return $link;
}

/*************************************************
## Blonwe Column options
*************************************************/
function blonwe_get_column_option(){	
	$getopt  = isset( $_GET['column'] ) ? $_GET['column'] : '';

	return esc_html($getopt);
}

if(blonwe_get_column_option()){
	add_filter('loop_shop_columns', 'loop_columns', 999);
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return blonwe_get_column_option(); // 3 products per row
		}
	}
}

/*************************************************
## Blonwe Perpage options
*************************************************/
function blonwe_get_perpage_option(){	
	$getopt  = isset( $_GET['perpage'] ) ? $_GET['perpage'] : '';

	return esc_html($getopt);
}

if(blonwe_get_perpage_option()){
	add_filter( 'loop_shop_per_page', 'blonwe_loop_shop_per_page', 20 );
	function blonwe_loop_shop_per_page( $cols ) {
	  $cols = blonwe_get_perpage_option();
	  return $cols;
	}
}

/*************************************************
## Order on WhatsApp
*************************************************/
if(get_theme_mod('blonwe_shop_single_orderonwhatsapp', 0) == 1 || blonwe_ft() == 'orderonwhatsapp'){
	add_action('woocommerce_single_product_summary', 'blonwe_order_on_whatsapp', 29);
	function blonwe_order_on_whatsapp(){
		$number = get_theme_mod('blonwe_shop_single_whatsapp_number');
		
		echo '<div class="orderon-whatsapp">';
		echo '<a href="https://wa.me/'.esc_attr($number).'?text='.get_the_title().' '.get_the_permalink().'" class="button button-primary" target="_blank">'.esc_html__('Order on WhatsApp','blonwe-core').'</a>';
		echo '</div>';
	}
}

/*************************************************
## Move Review Tab outsite of tab
*************************************************/
if(get_theme_mod('blonwe_shop_single_review_tab_move', 0) == 1 || blonwe_ft() == 'movereviewtab'){
	add_action( 'woocommerce_after_single_product_summary', 'blonwe_move_review_tab', 5 );
	function blonwe_move_review_tab(){
	  comments_template();
	}

	add_filter( 'woocommerce_product_tabs', 'blonwe_remove_product_tabs', 98 );
	function blonwe_remove_product_tabs( $tabs ){
		unset( $tabs['reviews'] );

		return $tabs;
	}
}

/*************************************************
## Hide Other Shipping Methods if Free shipping is available
*************************************************/
function blonwe_hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
		// Only modify rates if free_shipping is available.
		if ( 'free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}
	if ( ! empty( $new_rates ) ) {
		//Save local pickup if it is available
		foreach ( $rates as $rate_id => $rate ) {
			if ('local_pickup' === $rate->method_id ) {
				$new_rates[ $rate_id ] = $rate;
				break;
			}
		}
		return $new_rates;
	}
	return $rates;
}
add_filter( 'woocommerce_package_rates', 'blonwe_hide_shipping_when_free_is_available', 10, 2 );

/*************************************************
## Redirect URL After Login
*************************************************/
add_filter('woocommerce_login_redirect', 'blonwe_myaccount_redirect_after_login');
function blonwe_myaccount_redirect_after_login($redirect_to) {
	if(get_theme_mod('blonwe_redirect_url_after_login')){
		return esc_url(get_theme_mod('blonwe_redirect_url_after_login'));
	} else {
		return wc_get_page_permalink( 'myaccount' );	
	}
}

/*************************************************
## Single Product Stock Progress Bar
*************************************************/
if(get_theme_mod('blonwe_shop_single_stock_progress_bar', 0) == 1 || blonwe_ft() == 'progressbar'){
	add_action( 'woocommerce_single_product_summary', 'blonwe_product_stock_progress_bar', 25 );
}

/*************************************************
## Product Stock Progress Bar
*************************************************/
function blonwe_product_stock_progress_bar(){
	global $product;
	$managestock = $product->managing_stock();
	$total_sales = $product->get_total_sales();
	$stock_quantity = $product->get_stock_quantity();
		
	$output = '';

	if($managestock && $stock_quantity > 0) {
		$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100));
	}

	if($managestock && $stock_quantity > 0) {
		$output .= '<div class="product-progress-wrapper">';
		$output .= '<h4 class="entry-title">'.esc_html__('Products are almost sold out','blonwe-core').'</h4>';
		$output .= '<div class="product-progress">';
		$output .= '<div class="product-progressbar style-1 size-8">';
		$output .= '<span class="progressbar" style="width: '.$progress_percentage.'%"></span>';
		$output .= '</div><!-- product-progressbar -->';
		$output .= '<div class="product-progress-detail">';
		$output .= '<div class="product-pcs">'.esc_html__('the available products :','blonwe-core').' <span>'.esc_html($stock_quantity).'</span></div>';
		$output .= '</div><!-- product-progress-detail -->';
		$output .= '</div><!-- product-progress -->';
		$output .= '</div>';
		
	}
	
	echo $output;
	
}

add_action( 'blonwe_product_box_footer', 'blonwe_product_box_stock_progress_bar', 5, 1);
function blonwe_product_box_stock_progress_bar($stockprogressbar){
	
	if($stockprogressbar != 'true'){
		return;
	}
	
	global $product;
	$managestock = $product->managing_stock();
	$total_sales = $product->get_total_sales();
	$stock_quantity = $product->get_stock_quantity();
		
	$output = '';

	if($managestock && $stock_quantity > 0) {
		$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100));
	}

	if($managestock && $stock_quantity > 0) {
		$output .= '<div class="product-progress">';
		$output .= '<div class="product-progressbar style-1 size-6">';
		$output .= '<span class="progressbar" style="width: '.$progress_percentage.'%"></span>';
		$output .= '</div><!-- product-progressbar -->';
		$output .= '<div class="product-progress-detail">';
		$output .= '<div class="product-stock">';
		$output .= '<div class="available">'.esc_html__('Available:', 'blonwe-core').'<strong>'.esc_html($stock_quantity).'</strong></div>';
		$output .= '<div class="sold">'.esc_html('Sold:', 'blonwe-core').' <strong>'.esc_html($total_sales).'</strong></div>';
		$output .= '</div><!-- product-stock -->';
		$output .= '</div><!-- product-progress-detail -->';
		$output .= '<p>'.esc_html__('Time remaining until the end of the offer.','blonwe-core').'</p>';
		$output .= '</div><!-- product-progress -->';
	}
	
	echo $output;
	
}


/*************************************************
## Product Box Time Countdown
*************************************************/
add_action( 'blonwe_product_box_footer', 'blonwe_product_box_time_countdown', 22, 4 );
function blonwe_product_box_time_countdown($stockprogressbar = '', $stockstatus = '', $shippingclass = '', $countdown = ''){
	if($countdown != 'true'){
		return;
	}
	
	$id = get_the_ID();
	global $product;

	if( $product->is_type('variable') ) {
		$variation_ids = $product->get_visible_children();

		if(isset($variation_ids[0])){
			$variation = wc_get_product( $variation_ids[0] );
	
			$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		} else {
			$sale_price_dates_to = '';
		}
	} else {
		$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
	}
		
	$output = '';

	if($sale_price_dates_to){
		global $product;
		$managestock = $product->managing_stock();
		$total_sales = $product->get_total_sales();
		$stock_quantity = $product->get_stock_quantity();
		
		$output .= '<div class="product-countdown">';
		$output .= '<div class="klb-countdown-wrapper">';
		$output .= '<div class="klb-countdown filled size-xs" data-date="'.esc_attr($sale_price_dates_to).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
		$output .= '<div class="count-item">';
		$output .= '<div class="count days">00</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '<span class="sep-h">:</span>';
		$output .= '<div class="count-item">';
		$output .= '<div class="count hours">00</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '<span class="sep-m">:</span>';
		$output .= '<div class="count-item">';
		$output .= '<div class="count minutes">00</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '<span class="sep-s">:</span>';
		$output .= '<div class="count-item">';
		$output .= '<div class="count second">00</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '</div><!-- klb-countdown -->';
		$output .= '</div><!-- klb-countdown-wrapper -->';
		$output .= '<p>'.esc_html__('Time remaining until the end of the offer.','blonwe-core').'</p>';
		$output .= '</div><!-- product-countdown -->';
		
	}
	
	echo $output;
}

/*************************************************
## Single Product Time Countdown
*************************************************/
if(get_theme_mod('blonwe_shop_single_time_countdown', 0) == 1 || blonwe_ft() == 'countdown'){
	add_action( 'woocommerce_single_product_summary', 'blonwe_product_time_countdown', 22 );
}

/*************************************************
## Product Time Countdown
*************************************************/
function blonwe_product_time_countdown(){		
	$id = get_the_ID();
	global $product;

	if( $product->is_type('variable') ) {
		$variation_ids = $product->get_visible_children();

		if(isset($variation_ids[0])){
			$variation = wc_get_product( $variation_ids[0] );
	
			$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		} else {
			$sale_price_dates_to = '';
		}
	} else {
		$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
	}
		
	$output = '';

	if($sale_price_dates_to){
		global $product;
		$managestock = $product->managing_stock();
		$total_sales = $product->get_total_sales();
		$stock_quantity = $product->get_stock_quantity();
		
		$output .= '<div class="product-countdown">';
		$output .= '<h4 class="entry-title">'.esc_html__('Time before the end of the campaign', 'blonwe-core').'</h4>';
		$output .= '<div class="klb-countdown-wrapper">';
		$output .= '<div class="klb-countdown filled red size-lg separate-second" data-date="'.esc_attr($sale_price_dates_to).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
		$output .= '<div class="count-item">';
		$output .= '<div class="count days"></div>';
		$output .= '<div class="count-label">'.esc_html__('d','blonwe-core').'</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '<span class="sep-h">:</span>';
		$output .= '<div class="count-item">';
		$output .= '<div class="count hours"></div>';
		$output .= '<div class="count-label">'.esc_html__('h','blonwe-core').'</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '<span class="sep-m">:</span>';
		$output .= '<div class="count-item">';
		$output .= '<div class="count minutes"></div>';
		$output .= '<div class="count-label">'.esc_html__('m','blonwe-core').'</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '<span class="sep-s">:</span>';
		$output .= '<div class="count-item">';
		$output .= '<div class="count second"></div>';
		$output .= '<div class="count-label">'.esc_html__('s','blonwe-core').'</div>';
		$output .= '</div><!-- count-item -->';
		$output .= '</div><!-- klb-countdown -->';
		$output .= '</div><!-- klb-countdown-wrapper -->';
		$output .= '<div class="countdown-description">';
		$output .= '<p>'.esc_html__('Remains until the end of the offer','blonwe-core').'</p>';
		$output .= '</div><!-- countdown-description -->';
		$output .= '</div>';
		
	}
	
	echo $output;
}

/*************************************************
## On Sale Products Query
*************************************************/ 
function blonwe_on_sale_products_query( $q ){
    if( isset( $q->query_vars['klb_on_sale_products'] )){

		$q->set ( 'post__in', wc_get_product_ids_on_sale() );
	}
}
add_action( 'pre_get_posts', 'blonwe_on_sale_products_query' );