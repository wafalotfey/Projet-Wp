<?php
/*----------------------------
  Product Type 13
 ----------------------------*/
if(!function_exists('blonwe_product_type13')){ 
	function blonwe_product_type13($stockprogressbar = '', $stockstatus = '', $shippingclass = '', $countdown = '', $product_sku = '', $productattributes = ''){
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
		$ratingaverage  = $product->get_average_rating();


		$wishlist = get_theme_mod( 'blonwe_wishlist_button', '0' );
		$compare = get_theme_mod( 'blonwe_compare_button', '0' );
		$quickview = get_theme_mod( 'blonwe_quick_view_button', '0' );

		$managestock = $product->managing_stock();
		$stock_quantity = $product->get_stock_quantity();
		$stock_format = esc_html__('Only %s unit left','blonwe');
		$stock_poor = '';
		if($managestock && $stock_quantity < 10) {
			$stock_poor .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}
		
		$total_sales = $product->get_total_sales();
		$total_stock = $total_sales + $stock_quantity;
		
		if($managestock && $stock_quantity > 0) {
		$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
		}
		
		$gallery = get_theme_mod('blonwe_product_box_gallery') == 1 ? 'product-thumbnail' : '';
			
			$output .= '<div class="product-wrapper style-9 product-type-13">';
			$output .= '<div class="product-inner">';
			$output .= '<div class="thumbnail-wrapper entry-media">';
			
			ob_start();
			$output .= blonwe_product_second_image();
			$output .= ob_get_clean();
			
			$output .= '<div class="thumbnail-buttons">';
			
				ob_start();
				do_action('blonwe_wishlist_action');
				$output .= ob_get_clean();
				
				ob_start();
				do_action('blonwe_compare_action');
				$output .= ob_get_clean();
				
			$output .= '</div>';
			$output .= '</div>';

			ob_start();
			do_action('blonwe_after_shop_loop_item_image');
			$output .= ob_get_clean();

			$output .= '<div class="content-wrapper">';
			$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
			
			if($ratingcount){	
				$output .= '<div class="product-rating">';
				$output .= $rating;
				$output .= '<div class="rating-count">';
				$output .= '<span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe'), $ratingcount).'</span>';
				$output .= '</div>';
				$output .= '</div>';
			}
			
			$output .= '<span class="price">';
			$output .= $price;
			$output .= '</span>';                  
			
			$output .= blonwe_loop_add_to_cart($id,'product_type6');

			ob_start();
			do_action('blonwe_product_box_footer', $stockprogressbar, $stockstatus, $shippingclass, $countdown, $product_sku, $productattributes);
			$output .= ob_get_clean();

			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			
		return $output;
	}
}