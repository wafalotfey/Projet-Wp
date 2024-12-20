<?php
/*----------------------------
  Product Type List
 ----------------------------*/
if(!function_exists('blonwe_product_type_list')){ 
	function blonwe_product_type_list(){
		global $product;
		global $post;
		global $woocommerce;
		
		$output = '';
		
		$id = get_the_ID();
		$allproduct = wc_get_product( get_the_ID() );

		$cart_url = wc_get_cart_url();
		$price = $allproduct->get_price_html();
		$weight = $product->get_weight();
		$stock_status = $product->get_stock_status();
		$stock_text = $product->get_availability();
		$short_desc = $product->get_short_description();
		$rating = wc_get_rating_html($product->get_average_rating());
		$ratingcount = $product->get_review_count();
		$wishlist = get_theme_mod( 'blonwe_wishlist_button', '0' );
		$compare = get_theme_mod( 'blonwe_compare_button', '0' );
		$quickview = get_theme_mod( 'blonwe_quick_view_button', '0' );

		if( $product->is_type('variable') ) {
			$variation_ids = $product->get_visible_children();

			if($variation_ids[0]){
				$variation = wc_get_product( $variation_ids[0] );

				$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
			} else {
				$sale_price_dates_to = '';
			}
		} else {
			$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		}
		
		$managestock = $product->managing_stock();
		$stock_quantity = $product->get_stock_quantity();
		$stock_format = esc_html__('Only %s left in stock','blonwe');
		$stock_poor = '';
		if($managestock && $stock_quantity < 10) {
			$stock_poor .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}

		$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';

			$output .= '<div class="product-wrapper style-2 product-type-list">';
			$output .= '<div class="product-inner">';
			$output .= '<div class="thumbnail-wrapper entry-media">';
			
			$output .= '<a class="product-thumbnail" href="'.get_permalink().'">';
			$output .= blonwe_product_image();
			$output .= '</a>';
			
			$output .= '</div>';
			$output .= '<div class="content-wrapper">';
			if($ratingcount){
			  $output .= '<div class="product-rating">';
				$output .= $rating;
				$output .= '<div class="rating-count"> <span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe'), $ratingcount).'</span></div>';
				$output .= '</div>';
			}
			$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
			$output .= '<span class="price">';
			$output .= $price;
			$output .= '</span>';                  
			$output .= '</div>';
			$output .= '</div>';

			if($sale_price_dates_to){
				$output .= '<div class="product-countdown">';
				$output .= '<div class="klb-countdown-wrapper">';
				$output .= '<div class="klb-countdown filled size-xs" data-date="'.esc_attr($sale_price_dates_to).'">';
				$output .= '<div class="count-item">';
				$output .= '<div class="count days"></div>';
				$output .= '</div>';
				$output .= '<span class="sep-h">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count hours"></div>';
				$output .= '</div>';
				$output .= '<span class="sep-m">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count minutes"></div>';
				$output .= '</div>';
				$output .= '<span class="sep-s">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count second"></div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<p>'.esc_html__('Remains until the end of the offer','blonwe').'</p>';
				$output .= '</div>';
			}
				  
			$output .= '</div>';
		
		return $output;
	}
}