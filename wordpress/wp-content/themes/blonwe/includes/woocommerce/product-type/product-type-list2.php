<?php
/*----------------------------
  Product Type List 2
 ----------------------------*/
if(!function_exists('blonwe_product_type_list2')){ 
	function blonwe_product_type_list2(){
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

		$managestock = $product->managing_stock();
		$stock_quantity = $product->get_stock_quantity();
		$stock_format = esc_html__('Only %s left in stock','blonwe');
		$stock_poor = '';
		if($managestock && $stock_quantity < 10) {
			$stock_poor .= '<div class="product-inventory color-red">'.sprintf($stock_format, $stock_quantity).'</div>';
		}

		$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';

			$output .= '<div class="product-wrapper style-2 with-content-fade product-type-list2">';
			$output .= '<div class="product-inner">';
			$output .= '<div class="thumbnail-wrapper entry-media">';
			$output .= '<div class="thumbnail-badges">';
			$output .= blonwe_sale_percentage();
			$output .= '</div><!-- thumbnail-badges -->';
			
			$output .= '<a class="product-thumbnail" href="'.get_permalink().'">';
			$output .= blonwe_product_image();
			$output .= '</a>';
		
			$output .= '</div><!-- thumbnail-wrapper -->';
			$output .= '<div class="content-wrapper">';
			$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
			if($ratingcount){	
				$output .= '<div class="product-rating">';
				$output .= $rating;
				$output .= '<div class="rating-count">';
				$output .= '<span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe'), $ratingcount).'</span>';
				$output .= '</div><!-- rating-count -->';
				$output .= '</div><!-- product-rating -->';
					
			} 
			$output .= '<span class="price">';
			$output .= $price;
			$output .= '</span>';
			if($short_desc){
				$output .= '<div class="product-details">';
				$output .= $short_desc;
				$output .= '</div><!-- product-details -->';
			}
			$output .= '</div><!-- content-wrapper -->';
			$output .= '</div><!-- product-inner -->';
			$output .= '<div class="product-footer">';
			$output .= '<div class="product-footer-details">';
			$output .= '<div class="product-buttons success-button">';
				
				ob_start();
				do_action('blonwe_wishlist_action');
				$output .= ob_get_clean();
				
				ob_start();
				woocommerce_template_loop_add_to_cart();
				$output .= ob_get_clean();;
				
				ob_start();
				do_action('blonwe_compare_action');
				$output .= ob_get_clean();
			  
			$output .= '</div><!-- product-buttons -->';
			$output .= '</div><!-- product-footer-details -->';
			$output .= '</div><!-- product-footer -->';
			$output .= '</div><!-- product-wrapper -->';
			$output .= '<div class="product-content-fade"></div>';
		
		return $output;
	}
}