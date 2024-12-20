<?php

/*************************************************
## Woocommerce 
*************************************************/

/*************************************************
## Blonwe Product Box
*************************************************/
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type1.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type2.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type3.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type4.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type5.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type6.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type7.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type8.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type9.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type10.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type11.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type12.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type13.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type-header.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type-list.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type-list2.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type-list3.php';
require_once get_template_directory() . '/includes/woocommerce/product-type/product-type-list-view.php';
require_once get_template_directory() . '/includes/woocommerce/single-type/single-type.php';
require_once get_template_directory() . '/includes/woocommerce/add-to-cart.php';

/*************************************************
## Blonwe Image
*************************************************/
function blonwe_product_image(){
	global $product;

	$size = get_theme_mod( 'blonwe_product_image_size', array( 'width' => '', 'height' => '') );

	if($size['width'] && $size['height']){
		$image = $product->get_image(array( $size['width'], $size['height'] ), array('class' => 'wp-post-image'));
	} else {
		$image = $product->get_image('woocommerce_thumbnail',array('class' => 'wp-post-image'));
	}

	return $image;

}

/*************************************************
## Blonwe Second Image
*************************************************/
function blonwe_product_second_image(){
	global $product;
	
	$product_image_ids = $product->get_gallery_image_ids();
	$size = get_theme_mod( 'blonwe_product_image_size', array( 'width' => '', 'height' => '') );

	if(get_theme_mod('blonwe_product_box_gallery') == 'type4' || blonwe_ft() == 'productbox_zoom'){
		echo '<div class="product-box-image-zoom">';
		echo '<a class="product-zoom" href="'.get_permalink().'">';
		echo blonwe_product_image();
		echo '</a>';
		echo '</div>';
	} elseif($product_image_ids && get_theme_mod('blonwe_product_box_gallery') == 'type2' || blonwe_ft() == 'productbox_flip'){
		echo '<a href="'.get_permalink().'" class="product-thumbnail">';
		echo '<div class="product-second-image">';
		
		$gallery_count = 1;	
		foreach( $product_image_ids as $product_image_id ){
			if($gallery_count == 1){	
				if($size['width'] && $size['height']){
					echo wp_get_attachment_image($product_image_id, array( $size['width'], $size['height'] ));
				} else {
					echo  wp_get_attachment_image($product_image_id, 'full');
				}
			}	
			$gallery_count++;
		}		
	
		echo '</div><!-- product-second-image -->';
		echo blonwe_product_image();
		echo '</a>';
	} elseif($product_image_ids && get_theme_mod('blonwe_product_box_gallery') == 'type3' || blonwe_ft() == 'productbox_slider'){
		
		wp_enqueue_script( 'blonwe-hoverslider');
		
		echo '<a href="'.get_permalink().'" class="product-thumbnail product-hover-gallery">';
		echo '<div class="product-main-image">';
		echo blonwe_product_image();
		echo '</div>';
		
		echo '<div class="product-thumbnail-gallery">';
		
		echo '<div class="gallery-item gallery-image">';
		echo blonwe_product_image();
		echo '</div>';

		foreach( $product_image_ids as $product_image_id ){
			echo '<div class="gallery-item gallery-image">';
				if($size['width'] && $size['height']){
					echo wp_get_attachment_image($product_image_id, array( $size['width'], $size['height'] ));
				} else {
					echo  wp_get_attachment_image($product_image_id, 'full');
				}
			echo '</div>';
		}
		echo '</div>';
		echo '</a>';
	} else {
		if(get_theme_mod('blonwe_product_box_variable') == '1' || blonwe_ft() == 'box_variable' || isset( $_REQUEST['klb-product-box-variable'])){
			echo '<div class="images">';
			echo '<div class="woocommerce-product-gallery__image">';
			echo '<a href="'.get_permalink().'"></a>';
			echo '<a href="'.get_permalink().'" class="product-thumbnail product-hover-gallery">';
			echo blonwe_product_image();
			echo '</a>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<a href="'.get_permalink().'" class="product-thumbnail product-hover-gallery">';
			echo blonwe_product_image();
			echo '</a>';
		}
	}
}

/*************************************************
## Sale Percentage
*************************************************/
function blonwe_sale_percentage(){
	global $product;

	$output = '';
	
	if(get_theme_mod('blonwe_product_badge_tab', 0) == 1){
		
		$product = wc_get_product(get_the_ID());
		$badgetext = $product->get_meta('_klb_product_badge_text');
		$badgetype = $product->get_meta('_klb_product_badge_type');
		$badgebg = $product->get_meta('_klb_product_badge_bg_color');
		$badgecolor = $product->get_meta('_klb_product_badge_text_color');
		$percentagecheck = $product->get_meta('_klb_product_percentage_check');
		$percentagetype = $product->get_meta('_klb_product_percentage_type');
		$percentagebg = $product->get_meta('_klb_product_percentage_bg_color');
		$percentagecolor = $product->get_meta('_klb_product_percentage_text_color');

		$badgecss = '';
		if($badgebg || $badgecolor){
			$badgecss .= 'style="';
			if($badgebg){
				$badgecss .= 'background-color: '.esc_attr($badgebg).';';
			}
			if($badgecolor){
				$badgecss .= 'color: '.esc_attr($badgecolor).';';
			}
			$badgecss .= '"';
		}
		
		$percentagecss = '';
		if($percentagebg || $percentagecolor){
			$percentagecss .= 'style="';
			if($percentagebg){
				$percentagecss .= 'background-color: '.esc_attr($percentagebg).';';
			}
			if($percentagecolor){
				$percentagecss .= 'color: '.esc_attr($percentagecolor).';';
			}
			$percentagecss .= '"';
		}
		
		if ( $product->is_on_sale() || $badgetext ){
			$output .= '<div class="thumbnail-badges product-badges">';
			
			if($badgetext){
				$output .= '<span class="badge '.esc_attr($badgetype).'" '.$badgecss.'>'.esc_html($badgetext).'</span>';
			}
			
			if ( !$percentagecheck && $product->is_on_sale() && $product->is_type( 'variable' ) && $product->get_variation_regular_price( 'min' ) > 0) {
				$percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
				$output .= '<span class="badge '.esc_attr($percentagetype).' sale" '.$percentagecss.'>'.$percentage.'%</span>';
			} elseif( !$percentagecheck && $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
				$percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
				$output .= '<span class="badge '.esc_attr($percentagetype).' sale" '.$percentagecss.'>'.$percentage.'%</span>';
			}
			
			
			
			$output .= '</div>';
		}
	}

	return $output;

}

/*************************************************
## Single Product Stock
*************************************************/
function blonwe_single_product_stock(){
	global $product;
	
	?>
	<div class="product-inventory-wrapper">
		<?php echo wc_get_stock_html( $product ); ?>
	</div>
	
	<?php
}
add_action( 'woocommerce_single_product_summary', 'blonwe_single_product_stock',12);

/*************************************************
## Vendor Name
*************************************************/
function blonwe_vendor_name(){
	if (function_exists('get_mvx_vendor_settings')) {
		global $post;
		$vendor = get_mvx_product_vendors($post->ID);
		if (isset($vendor->page_title)) {
			$store_name = $vendor->page_title;
			
			return '<div class="product-vendor"><span>'.esc_html__('Store:', 'blonwe').'</span><a href="'.esc_url($vendor->permalink).'"> '.esc_html($store_name).'</a></div>';
		}
	}elseif(class_exists('WeDevs_Dokan')){
		// Get the author ID (the vendor ID)
		$vendor_id = get_post_field( 'post_author', get_the_id() );

		$store_info  = dokan_get_store_info( $vendor_id ); // Get the store data
		$store_name  = $store_info['store_name'];          // Get the store name
		$store_url   = dokan_get_store_url( $vendor_id );  // Get the store URL

		if (isset($store_name)) {
			return '<div class="product-vendor"><span>'.esc_html__('Store:', 'blonwe').'</span><a href="'.esc_url($store_url).'"> '.esc_html($store_name).'</a></div>';
		}
	}
}

if ( class_exists( 'woocommerce' ) ) {
add_theme_support( 'woocommerce' );
add_image_size('blonwe-woo-product', 450, 450, true);

// Remove woocommerce defauly styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


// hide default shop title
if(!function_exists('blonwe_override_page_title')){
	add_filter('woocommerce_show_page_title', 'blonwe_override_page_title');
		function blonwe_override_page_title() {
		return false;
	}
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); /*remove result count above products*/
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);

add_action( 'woocommerce_before_shop_loop_item', 'blonwe_shop_box', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ); /*remove breadcrumb*/



remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'blonwe_related_products', 20);
function blonwe_related_products(){
	$related_column = get_theme_mod('blonwe_shop_related_post_column') ? get_theme_mod('blonwe_shop_related_post_column') : '4';
    woocommerce_related_products( array('posts_per_page' => $related_column, 'columns' => $related_column));
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 20);
add_filter( 'woocommerce_cross_sells_columns', 'blonwe_change_cross_sells_columns' );
function blonwe_change_cross_sells_columns( $columns ) {
	return 4;
}

/*************************************************
## Blonwe Quickview
*************************************************/
function blonwe_quickview($type){
	global $product;
	
	$output = '';
	
	$quickview = get_theme_mod( 'blonwe_quick_view_button', '0' );
	
	if($quickview == '1'){
		if($type == 'quickview_type2'){	
			$output .= '<a data-product_id="'.$product->get_id().'" class="button success outline quickview-button">'.esc_html__('Quick Shop','blonwe').'</a>';
		} else {
			$output .= '<a data-product_id="'.$product->get_id().'" class="quickview-button"><i class="klb-icon-expand-thin"></i></a>';
		}	
	}	
	
	

	return $output;
}

/*************************************************
## Shipping Class Name
*************************************************/
function blonwe_shipping_class_name($stockprogressbar = '', $stockstatus = '', $shippingclass = '') {
	if($shippingclass != 'true'){
		return;
	}
	
	if(is_product()){
		return;
	}

	global $product;
	if($product){
		$class_id = $product->get_shipping_class_id();
		if ( $class_id ) {
			$term = get_term_by( 'id', $class_id, 'product_shipping_class' );
			
			if ( $term && ! is_wp_error( $term ) ) {
				if(get_theme_mod('blonwe_product_box_shipping_class_type') == 'bordered'){
					echo '<div class="product-delivery-time fast-shipping"><i class="klb-icon-box-iso-thin"></i> '.esc_html($term->name).'</div>';
				} else {
					echo '<div class="product-delivery-time">'.esc_html($term->name).'</div>';
				}
			}
			

		}
	}
}
add_action('blonwe_product_box_footer', 'blonwe_shipping_class_name', 10, 3);


/*************************************************
## Stock Status with Poor
*************************************************/
function blonwe_poor_stock_status($stockprogressbar = '', $stockstatus = ''){
	if($stockstatus != 'true'){
		return;
	}
	
	global $product;
	
	$output = '';
	
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	
	$managestock = $product->managing_stock();
	$stock_quantity = $product->get_stock_quantity();
	$stock_format = esc_html__('Only %s left in stock','blonwe');

	if(get_theme_mod('blonwe_product_box_poor_stock') == '1' && $managestock && $stock_quantity < 10) {
		if($stock_quantity < 1){
			$output .= '<div class="product-inventory outof-stock">'.$stock_text['availability'].'</div>';		
		} else {
			$output .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}
	} else {
		if($stock_status == 'instock' && $stock_text['availability']){
			$output .= '<div class="product-inventory color-green in-stock"> '.$stock_text['availability'].'</div>';
		} elseif($stock_text['availability']) {
			$output .= '<div class="product-inventory outof-stock">'.$stock_text['availability'].'</div>';
		}
	}
	
	echo blonwe_sanitize_data($output);
}
add_action('blonwe_product_box_footer', 'blonwe_poor_stock_status', 15, 2);


/*************************************************
## People Have this in their carts.
*************************************************/
function blonwe_people_added_in_cart(){
    global $wpdb, $product;
    $in_basket = 0;
    $wc_session_data = $wpdb->get_results( "SELECT session_key FROM {$wpdb->prefix}woocommerce_sessions" );
    $wc_session_keys = wp_list_pluck( $wc_session_data, 'session_key' );
    if( $wc_session_keys ) {
        foreach ( $wc_session_keys as $key => $_customer_id ) { 
            // if you want to skip current viewer cart item in counts or else can remove belows checking
            if( WC()->session->get_customer_id() == $_customer_id ) continue;
            
            $session_contents = WC()->session->get_session( $_customer_id, array() );
			if(isset($session_contents['cart'])){
				$cart_contents = maybe_unserialize( $session_contents['cart'] );
				if( $cart_contents ){
					foreach ( $cart_contents as $cart_key => $item ) {
						if( $item['product_id'] == $product->get_id() ) {
							$in_basket += 1;
						}
					}
				}
			}
        }
    }

    if( $in_basket ){
        echo '<div class="product-alert-message background-orange-light">';
        echo '<i class="klb-icon-shopping-cart-feather"></i>';               
        echo '<p>'.esc_html__('This product has been added to','blonwe').' <strong>'.sprintf( esc_html__( '%d  people\'s', 'blonwe' ), $in_basket ).'</strong>'.esc_html__('carts.','blonwe').'</p>';
        echo '</div>';
	}

}
add_action( 'woocommerce_single_product_summary', 'blonwe_people_added_in_cart', 28 );

/*************************************************
## Product SKU 
*************************************************/
function blonwe_product_sku($stockprogressbar = '', $stockstatus = '', $shippingclass = '', $countdown = '', $product_sku = ''){

	if($product_sku != 'true'){
		return;
	}
	
	global $product;

	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ){
		echo '<span class="sku_wrapper">'.esc_html__( 'SKU:', 'blonwe' ).'<span class="sku">'.esc_html($product->get_sku()).'</span></span>';
	}
}
add_action('blonwe_product_box_footer', 'blonwe_product_sku', 15, 5);


/*************************************************
## Product Attributes
*************************************************/
function blonwe_product_attributes($stockprogressbar = '', $stockstatus = '', $shippingclass = '', $countdown = '', $product_sku = '', $productattributes = ''){
	if($productattributes != 'true'){
		return;
	}
	
	global $product;
	
	echo '<div class="klb-product-attributes">';
	wc_display_product_attributes( $product );
	echo '</div>';
}
add_action('blonwe_product_box_footer', 'blonwe_product_attributes', 15, 6);

/*----------------------------
  Add my owns Product Box
 ----------------------------*/
function blonwe_shop_box () {
	
	$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';
	$stockprogressbar = get_theme_mod('blonwe_product_box_stock_progress_bar') == 1 || blonwe_ft() == 'progressbar' ? 'true' : '';
	$stockstatus = get_theme_mod('blonwe_product_box_stock_status') == 1 || blonwe_ft() == 'stock_status' ? 'true' : '';
	$shippingclass = get_theme_mod('blonwe_product_box_shipping_class') == 1 || blonwe_ft() == 'box_shipping' ? 'true' : '';
	$countdown = get_theme_mod('blonwe_product_box_countdown') == 1 || blonwe_ft() == 'box_countdown' ? 'true' : '';
	$product_sku = get_theme_mod('blonwe_product_box_sku') == 1 || blonwe_ft() == 'box_sku' ? 'true' : '';
	$productattributes = get_theme_mod('blonwe_product_box_attributes') == 1 || blonwe_ft() == 'product_attributes' ? 'true' : '';

	if(blonwe_shop_view() == 'list_view' || $postview == 'list_view') {
		echo blonwe_list_view();
	} else if(get_theme_mod('blonwe_product_box_type') == 'type13'){
		echo blonwe_product_type13($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type12'){
		echo blonwe_product_type12($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type11'){
		echo blonwe_product_type11($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type10'){
		echo blonwe_product_type10($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type9'){
		echo blonwe_product_type9($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type8'){
		echo blonwe_product_type8($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type7'){
		echo blonwe_product_type7($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type6'){
		echo blonwe_product_type6($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type5'){
		echo blonwe_product_type5($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type4'){
		echo blonwe_product_type4($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else if(get_theme_mod('blonwe_product_box_type') == 'type3'){
		echo blonwe_product_type3($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} elseif (get_theme_mod('blonwe_product_box_type') == 'type2'){
		echo blonwe_product_type2($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	} else {
		echo blonwe_product_type1($stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
	}
}

/*************************************************
## Woo Cart Ajax
*************************************************/ 
add_filter('woocommerce_add_to_cart_fragments', 'blonwe_header_add_to_cart_fragment');
function blonwe_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<div class="action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>
	

	<?php
	$fragments['div.cart-count'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div class="fl-mini-cart-content">
        <?php woocommerce_mini_cart(); ?>
    </div>

    <?php $fragments['div.fl-mini-cart-content'] = ob_get_clean();

    return $fragments;

} );

add_filter('woocommerce_add_to_cart_fragments', 'blonwe_header_add_to_cart_fragment_subtotal');
function blonwe_header_add_to_cart_fragment_subtotal( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
    <p class="cart-price price"><?php echo WC()->cart->get_cart_subtotal(); ?></p>

    <?php $fragments['.cart-price'] = ob_get_clean();

	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'blonwe_header_add_to_cart_fragment_cart_count_text');
function blonwe_header_add_to_cart_fragment_cart_count_text( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
    <div class="cart-count-text count-text"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>

    <?php $fragments['.cart-count-text'] = ob_get_clean();

	return $fragments;
}

/*************************************************
## Blonwe Woo Search Form
*************************************************/ 
add_filter( 'get_product_search_form' , 'blonwe_custom_product_searchform' );

function blonwe_custom_product_searchform( $form ) {

	$form = '<form class="product-search-form" action="' . esc_url( home_url( '/'  ) ) . '" role="search" method="get" id="searchform">
				<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','blonwe').'">
				<button type="submit"><i class="klb-right"></i></button>
                <input type="hidden" name="post_type" value="product" />
			</form>';

	return $form;
}

function blonwe_header_product_search() {
	$terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'hide_empty' => true,
		'parent'    => 0,
	) );

	$form = '';
	
	if(get_theme_mod('blonwe_header_search_type') == 'type6'){
		$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-form form-style-light search-type-6" role="search" method="get" id="searchform">';
		$form .= '<input class="form-control search-input variation-filled" type="search" name="s" value="' . get_search_query() . '" placeholder="'.esc_attr__('Search for products...','blonwe').'" autocomplete="off">';
		$form .= '<button type="submit" class="unset">';
		$form .= '<i class="klb-icon-search-feather"></i>';
		$form .= '</button>';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '</form>';
	} elseif(get_theme_mod('blonwe_header_search_type') == 'type5'){ 
		$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-form form-style-primary search-type-5" role="search" method="get" id="searchform">';
		$form .= '<input class="form-control search-input variation-filled" type="search" name="s" value="' . get_search_query() . '" placeholder="'.esc_attr__('Search for products...','blonwe').'" autocomplete="off">';
		$form .= '<button type="submit" class="unset">';
		$form .= '<i class="klb-icon-search-feather"></i>';
		$form .= '</button>';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '</form>';
	} elseif(get_theme_mod('blonwe_header_search_type') == 'type4'){ 
		$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-form form-style-gray search-type-4" role="search" method="get" id="searchform">';
		$form .= '<input class="form-control search-input variation-default" type="search" name="s" value="' . get_search_query() . '" placeholder="'.esc_attr__('Search for products...','blonwe').'" autocomplete="off">';
		$form .= '<button type="submit" class="btn primary">';
		$form .= '<i class="klb-icon-search-feather"></i>';
		$form .= '</button>';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '</form>';
	} elseif(get_theme_mod('blonwe_header_search_type') == 'type3'){ 
		$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-form form-style-gray search-type-3" role="search" method="get" id="searchform">';
		$form .= '<input class="form-control search-input variation-filled" type="search" name="s" value="' . get_search_query() . '" placeholder="'.esc_attr__('Search for products...','blonwe').'" autocomplete="off">';
		$form .= '<button type="submit" class="unset">';
		$form .= '<i class="klb-icon-search-feather"></i>';
		$form .= '</button>';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '</form>';
	} elseif(get_theme_mod('blonwe_header_search_type') == 'type2'){ 
		$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-form form-style-primary search-type-2" role="search" method="get" id="searchform">';
		$form .= '<input class="form-control search-input variation-filled" type="search" name="s" value="' . get_search_query() . '" placeholder="'.esc_attr__('Search for products...','blonwe').'" autocomplete="off">';
		$form .= '<button type="submit" class="unset">';
		$form .= '<i class="klb-icon-search-feather"></i>';
		$form .= '</button>';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '</form>';
	} else { 
		$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-form form-style-primary search-type-1" role="search" method="get" id="searchform">';
		$form .= '<div class="input-search-addon">';
		$form .= '<select class="form-select custom-width" name="product_cat" id="categories">';
		$form .= '<option class="select-value" value="" selected="selected">'.esc_html__('All','blonwe').'</option>';
		foreach ( $terms as $term ) {
			if($term->count >= 1){
				$form .= '<option value="'.esc_attr($term->slug).'">'.esc_html($term->name).'</option>';
			}
		}
		$form .= '</select>';
		$form .= '</div><!-- input-search-addon -->';
		$form .= '<input type="search" value="' . get_search_query() . '" class="form-control search-input variation-filled" name="s" placeholder="'.esc_attr__('Search for products...','blonwe').'" autocomplete="off" >';
		$form .= '<button type="submit" class="unset">';
		$form .= '<i class="klb-icon-search-feather"></i>';
		$form .= '</button>';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '</form>';
	}
	
	if(function_exists('blonwe_get_most_popular_keywords') && blonwe_get_most_popular_keywords()){
		$form .= '<div class="header-search-results">';
		$form .= '<span class="search-results-heading">'.esc_html__('Trending:', 'blonwe').'</span>';
		$form .= blonwe_get_most_popular_keywords('tag-style', 8);
		$form .= '</div>';
	}
		
	return $form;
	
}

/*************************************************
## Blonwe Gallery Thumbnail Size
*************************************************/ 
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 90,
        'height' => 54,
        'crop' => 0,
    );
} );


/*************************************************
## Quick View Scripts
*************************************************/ 
function blonwe_quick_view_scripts() {
  	wp_enqueue_script( 'blonwe-quick-ajax', get_template_directory_uri() . '/assets/js/custom/quick_ajax.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'blonwe-tab-ajax', get_template_directory_uri() . '/assets/js/custom/tab-ajax.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'blonwe-quick-ajax', 'MyAjax', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
	));
	if(get_theme_mod('blonwe_quantity_box',0) == 1){
  		wp_enqueue_script( 'blonwe-quantity_button', get_template_directory_uri() . '/assets/js/custom/cartquantity_ajax.js', array('jquery'), '1.0.0', true );

		if(function_exists('blonwe_ft')){
			wp_localize_script( 'blonwe-quantity_button', 'quantity', array(
				'notice' => (blonwe_ft() == 'notice_ajax') ? 1 : get_theme_mod('blonwe_shop_notice_ajax_addtocart'),
			));
		}
	}
  	wp_enqueue_script( 'blonwe-variationform', get_template_directory_uri() . '/assets/js/custom/variationform.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'wc-add-to-cart-variation' );
}
add_action( 'wp_enqueue_scripts', 'blonwe_quick_view_scripts' );

/*************************************************
## Quick View CallBack
*************************************************/
add_action( 'wp_ajax_nopriv_quick_view', 'blonwe_quick_view_callback' );
add_action( 'wp_ajax_quick_view', 'blonwe_quick_view_callback' );
function blonwe_quick_view_callback() {

	$id = intval( $_POST['id'] );
	$loop = new WP_Query( array(
		'post_type' => 'product',
		'p' => $id,
	  )
	);
	
	while ( $loop->have_posts() ) : $loop->the_post(); 
	$product = new WC_Product(get_the_ID());
	
	$rating = wc_get_rating_html($product->get_average_rating());
	$price = $product->get_price_html();
	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();
	$product_image_ids = $product->get_gallery_attachment_ids();

	$output = '';
	
		$output .= '<div class="quickview-product klb-quickview-product product white-popup ">';
		$output .= '<div class="quickview-product-wrapper">';
		$output .= '<article class="product single-product">';
		$output .= '<div class="single-product-wrapper style-2">';
	
		$output .= '<div class="column product-header">';
		
			ob_start();
			woocommerce_template_single_title();
			$output .= ob_get_clean();
			
			$output .= '<div class="product-meta top">';
			
				ob_start();
				woocommerce_template_single_rating();
				$output .= ob_get_clean();	
				
				if(blonwe_vendor_name()){
					$output .= blonwe_vendor_name();
				}
				
			$output .= '</div>';
		$output .= '</div>';
		
		if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
			$att=get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $att, 'full' );
			$image_src = $image_src[0];
			
			$output .= '<div class="column product-gallery">';
			$output .= '<div class="woocommerce-product-gallery">';
			$output .= '<figure class="woocommerce-product-gallery__wrapper">';
			$output .= '<div class="woocommerce-product-gallery__image">';
			$output .= '<img src="'.esc_url($image_src).'">';
			$output .= '</div>';
			$output .= '</figure>';
			$output .= '</div><!-- woocommerce-product-gallery -->';
			$output .= '</div><!-- column -->';
		}
			
		$output .= '<div class="column product-detail">';
		
			ob_start();
			woocommerce_template_single_price();
			$output .= ob_get_clean();
			
			ob_start();
			woocommerce_template_single_excerpt();
			$output .= ob_get_clean();
			
			ob_start();
			woocommerce_template_single_add_to_cart();
			$output .= ob_get_clean();
			
			ob_start();
			do_action('blonwe_wishlist_action');
			$output .= ob_get_clean();
			
			ob_start();
			woocommerce_template_single_meta();
			$output .= ob_get_clean();

			ob_start();
			blonwe_social_share();
			$output .= ob_get_clean();
			
		$output .= '</div><!-- column -->';
			
		$output .= '</div><!-- single-product-wrapper -->';
		$output .= '</article>';
		$output .= '</div><!-- quickview-product-wrapper -->';
		$output .= '</div>';

		endwhile; 
		wp_reset_postdata();

	 	$output_escaped = $output;
	 	echo $output_escaped;
		
		wp_die();
}


/*************************************************
## Blonwe Filter by Attribute
*************************************************/ 
function blonwe_woocommerce_layered_nav_term_html( $term_html, $term, $link, $count ) { 

	$attribute_label_name = wc_attribute_label($term->taxonomy);;
	$attribute_id = wc_attribute_taxonomy_id_by_name($attribute_label_name);
	$attr  = wc_get_attribute($attribute_id);
	$array = json_decode(json_encode($attr), true);

	if($array['type'] == 'color'){
		$color = get_term_meta( $term->term_id, 'product_attribute_color', true );
		$term_html = '<div class="type-color"><span class="color-box" style="background-color:'.esc_attr($color).';"></span>'.$term_html.'</div>';
	}
	
	if($array['type'] == 'button'){
		$term_html = '<div class="type-button"><span class="button-box"></span>'.$term_html.'</div>';
	}

    return $term_html; 
}; 
         
add_filter( 'woocommerce_layered_nav_term_html', 'blonwe_woocommerce_layered_nav_term_html', 10, 4 ); 


/*************************************************
## Shop Width Body Classes
*************************************************/
function blonwe_body_classes( $classes ) {

	if( get_theme_mod('blonwe_shop_width') == 'wide' || blonwe_get_option() == 'wide' && is_shop()) { 
		$classes[] = 'shop-wide';
	}elseif( is_product() && get_theme_mod('blonwe_single_full_width') == 1 || blonwe_get_option() == 'wide') { 
		$classes[] = 'shop-wide';
	} else {
		$classes[] = '';
	}
	
	return $classes;
}
add_filter( 'body_class', 'blonwe_body_classes' );

/*************************************************
## Stock Availability Translation
*************************************************/ 
if(get_theme_mod('blonwe_stock_quantity',0) != 1){
add_filter( 'woocommerce_get_availability', 'blonwe_custom_get_availability', 1, 2);
function blonwe_custom_get_availability( $availability, $_product ) {
    
    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = esc_html__('In Stock', 'blonwe');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = esc_html__('Out of stock', 'blonwe');
    }
    return $availability;
}
}

/*************************************************
## Archive Description After Content
*************************************************/
if(get_theme_mod('blonwe_category_description_after_content',0) == 1){
	remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
	add_action('blonwe_after_main_shop', 'woocommerce_taxonomy_archive_description', 5);
	add_action('blonwe_after_main_shop', 'woocommerce_product_archive_description', 5);
}

/*************************************************
## Catalog Mode - Disable Add to cart Button
*************************************************/
if(get_theme_mod('blonwe_catalog_mode', 0) == 1 || blonwe_get_option() == 'catalogmode'){ 
	add_filter( 'woocommerce_loop_add_to_cart_link', 'blonwe_remove_add_to_cart_buttons', 1 );
	function blonwe_remove_add_to_cart_buttons() {
		return false;
	}
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
}

/*************************************************
## Related Products with Tags
*************************************************/
if(get_theme_mod('blonwe_related_by_tags',0) == 1){
	add_filter( 'woocommerce_product_related_posts_relate_by_category', '__return_false' );
}

/*************************************************
## Product Specification Tab
*************************************************/ 
add_filter( 'woocommerce_product_tabs', 'blonwe_product_specification_tab' );
function blonwe_product_specification_tab( $tabs ) {
	$specification = get_post_meta( get_the_ID(), 'klb_product_specification', true );
	
	// Adds the new tab
	if($specification){
		$tabs['specification'] = array(
			'title' 	=> esc_html__( 'Specification', 'blonwe' ),
			'priority' 	=> 15,
			'callback' 	=> 'blonwe_product_specification_tab_content'
		);
	}
	
	return $tabs;
}
function blonwe_product_specification_tab_content() {
	$specification = get_post_meta( get_the_ID(), 'klb_product_specification', true );
	echo '<div class="specification-content">'.blonwe_sanitize_data($specification).'</div>';
}

} // is woocommerce activated

?>