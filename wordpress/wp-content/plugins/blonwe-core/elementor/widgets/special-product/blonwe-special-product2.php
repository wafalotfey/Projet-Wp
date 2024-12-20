<?php

	function blonwe_special_product2($settings, $args){

		$output = '';

		$output .= '<div class="klb-module module-hot-product">';
		$output .= '<div class="hot-product-title">';
		$output .= '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
		$output .= '</div><!-- hot-product-title -->';
		$output .= '<div class="module-body products large-list">';
		
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
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
				$stock_format = esc_html__('Only %s left in stock','blonwe-core');
				$stock_poor = '';
				if($managestock && $stock_quantity < 10) {
					$stock_poor .= '<div class="product-message color-danger">'.sprintf($stock_format, $stock_quantity).'</div>';
				}
				
				$total_sales = $product->get_total_sales();
				$total_stock = $total_sales + $stock_quantity;
				
				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}

				$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';
				
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				$output .= '<div class="product-wrapper style-2">';
				$output .= '<div class="product-inner">';
				$output .= '<div class="thumbnail-wrapper entry-media">';
					$output .= blonwe_sale_percentage();
					ob_start();
					$output .= blonwe_product_second_image();
					$output .= ob_get_clean();
				$output .= '<div class="thumbnail-buttons">';
				
					ob_start();
					do_action('blonwe_wishlist_action');
					$output .= ob_get_clean();
					
				$output .= '</div><!-- thumbnail-buttons -->';
				$output .= '</div><!-- thumbnail-wrapper -->';
				$output .= '<div class="content-wrapper">';
				
				if(blonwe_vendor_name()){
					$output .= '<div class="product-content-switcher">';
					$output .= '<div class="switcher-wrapper">';
					$output .= blonwe_vendor_name();      
					
					if($ratingcount){	
						$output .= '<div class="product-rating">';
						$output .= $rating;
						$output .= '<div class="rating-count">';
						$output .= '<span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe-core'), $ratingcount).'</span>';
						$output .= '</div><!-- rating-count -->';
						$output .= '</div><!-- product-rating -->';   
					}
					$output .= '</div><!-- switcher-wrapper -->';
					$output .= '</div><!-- product-content-switcher -->';
				} else {
					if($ratingcount){	
						$output .= '<div class="product-rating">';
						$output .= $rating;
						$output .= '<div class="rating-count">';
						$output .= '<span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe-core'), $ratingcount).'</span>';
						$output .= '</div><!-- rating-count -->';
						$output .= '</div><!-- product-rating -->';   
					}
				}
				
				$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				
				if($weight){
					$output .= '<div class="product-meta">';
					$output .= '<div class="product-unit">'.$weight.' '.get_option('woocommerce_weight_unit').'</div>';
					$output .= '</div><!-- product-meta -->';
				}
				
				$output .= '<span class="price">';
				$output .= $price;
				$output .= '</span> ';    
				
				if($managestock && $stock_quantity > 0) {
					
					$output .= '<div class="product-progress">';
					$output .= '<div class="product-progressbar style-1 size-8">';
					$output .= '<span class="progressbar" style="width: '.$progress_percentage.'%"></span>';
					$output .= '</div><!-- product-progressbar -->';
					$output .= '<div class="product-progress-detail">';
					$output .= '<div class="product-stock">';
					$output .= '<div class="available">'.esc_html__('Available:','blonwe-core').' <strong>'.esc_html($stock_quantity).'</strong></div>';
					$output .= '<div class="sold">'.esc_html__('Sold:','blonwe-core').' <strong>'.esc_html($total_sales).'</strong></div>';
					$output .= '</div><!-- product-stock -->';
					$output .= '</div><!-- product-progress-detail -->';
					$output .= '</div><!-- product-progress -->';
				
				}
				
				$output .= '</div><!-- content-wrapper -->';
				$output .= '</div><!-- product-inner -->';
				$output .= '</div><!-- product-wrapper -->';
				$output .= '</div><!-- product -->'; 
				
				endwhile;
			}
			wp_reset_postdata();	
			
		$output .= '</div><!-- module-body -->';
			
			if($sale_price_dates_to){
				
				$output .= '<div class="product-countdown">';
				$output .= '<div class="klb-countdown-wrapper">';
				$output .= '<div class="klb-countdown filled size-xs" data-date="'.esc_attr($sale_price_dates_to).'">';
				$output .= '<div class="count-item">';
				$output .= '<div class="count days"></div>';
				$output .= '</div><!-- count-item -->';
				$output .= '<span class="sep-h">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count hours"></div>';
				$output .= '</div><!-- count-item -->';
				$output .= '<span class="sep-m">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count minutes"></div>';
				$output .= '</div><!-- count-item -->';
				$output .= '<span class="sep-s">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count second"></div>';
				$output .= '</div><!-- count-item -->';
				$output .= '</div><!-- klb-countdown -->';
				$output .= '</div><!-- klb-countdown-wrapper -->';
				$output .= '<p>'.esc_html($settings['subtitle']).'</p>';
				$output .= '</div><!-- product-countdown -->';
			}
			
		$output .= '</div><!-- klb-module -->';
		
		
		return $output;
	}