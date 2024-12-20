<?php
	
	function blonwe_special_product1($settings, $args){
		
		$output = '';
		
		$output .= '<div class="klb-module module-products-grid style-5">';
		$output .= '<div class="module-body grid-wrapper">';
		$output .= '<div class="module-column klb-special-product">';
		$output .= '<div class="featured-product">';
		$output .= '<div class="products">';
		

		
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
				$output .= '<div class="product-hot-header">';
				$output .= '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
				$output .= '<div class="entry-description">';
				$output .= '<p>'.esc_html($settings['subtitle']).'</p>';
				$output .= '</div>';
				
				if($sale_price_dates_to){
					$output .= '<div class="product-countdown">';
					$output .= '<div class="klb-countdown-wrapper">';
					$output .= '<div class="klb-countdown filled size-md" data-date="'.esc_attr($sale_price_dates_to).'">';
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
					$output .= '</div>';
				}	
				
				$output .= '</div>';
				$output .= '<div class="product-wrapper style-3">';
				$output .= '<div class="product-inner">';
				$output .= '<div class="thumbnail-wrapper entry-media">';
					ob_start();
					$output .= blonwe_product_second_image();
					$output .= ob_get_clean();
				$output .= '</div>';
				$output .= '<div class="content-wrapper">';
								
				if($ratingcount){	
					$output .= '<div class="product-rating">';
					  $output .= $rating;
					  $output .= '<div class="rating-count"> <span class="count-text">'.sprintf(_n('%d review', '%d reviews', $ratingcount, 'blonwe-core'), $ratingcount).'</span></div>';
					$output .= '</div>';
				}

				$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				$output .= '<span class="price">';
				$output .= $price;
				$output .= '</span>'; 
								
				if($managestock && $stock_quantity > 0) {
					$output .= '<div class="product-progress">';
					$output .= '<div class="product-progressbar style-1 size-8">';
					$output .= '<span class="progressbar" style="width: '.esc_attr($progress_percentage).'%"></span>';
					$output .= '</div>';
					$output .= '<div class="product-progress-detail">';
					$output .= '<div class="product-pcs">'.esc_html__('the available products :','blonwe-core').' <span>'.esc_html($stock_quantity).'</span></div>';
					$output .= '</div>';
					$output .= '</div>';
				}
				
				$output .= '</div>';

				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';				
				

			endwhile;
		}
		wp_reset_postdata();
		
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
	