<?php
/*************************************************
## Tab View
*************************************************/ 

add_action( 'wp_ajax_nopriv_tab_view_grid', 'blonwe_tab_view_grid_callback' );
add_action( 'wp_ajax_tab_view_grid', 'blonwe_tab_view_grid_callback' );
function blonwe_tab_view_grid_callback() {
	
	global $product;
	global $woocommerce;
	$catid = intval( $_POST['catid'] );
	$post_count = intval( $_POST['post_count'] );
	$best_selling = $_POST['best_selling'];
	$featured = $_POST['featured'];
	$on_sale = $_POST['on_sale'];
	$stockprogressbar = $_POST['stockprogressbar'];
	$stockstatus = $_POST['stockstatus'];
	$shippingclass = $_POST['shippingclass'];
	$countdown = $_POST['countdown'];
	
	$output = '';		

	$args = array(
		'post_type' => 'product',
		'posts_per_page'         => $post_count,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish',
	);

	$args['tax_query'][] = array(
		'taxonomy' 	=> 'product_cat',
		'field' 	=> 'term_id',
		'terms' 	=> $catid,
	);
	
	if($best_selling == 'true'){
		$args['meta_key'] = 'total_sales';
		$args['orderby'] = 'meta_value_num';
	}

	if($featured == 'true'){
		$args['tax_query'] = array( array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => array( 'featured' ),
				'operator' => 'IN',
		) );
	}
	
	if($on_sale == 'true'){
		$args['post__in'] = wc_get_product_ids_on_sale();
    }
	
    query_posts( $loop );
		
		$loop = new \WP_Query( $args );
			
			
			$counter = '1';
			$number = '1';
			
			if ( $loop->have_posts() ) { while ( $loop->have_posts() ) : $loop->the_post() ;
					global $product;
					global $post;
					global $woocommerce;

					$je = (($counter-1)/4);

					
					if (is_int($je)) {
						if($counter == 1){
							$output .= '<div class="module-column"><div class="grid-products"><div class="products">';
						}
						
						$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
						$output .= blonwe_product_type4($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						$output .= '</div>';
						
						if($counter != 1){
							$output .= '</div></div></div><div class="module-column"><div class="list-products"><div class="products list-style">';
						}

					} else {
						if($number == 1){
							$output .= '</div></div></div><div class="module-column"><div class="list-products"><div class="products list-style">';
						}
						
						$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
						$output .= blonwe_product_type_list();
						$output .= '</div>';

						if($number % 3 == 0){
							$output .= '</div></div></div><div class="module-column "><div class="grid-products"><div class="products">';
						}

						$number++;
					}

					
					$counter++;
					
				endwhile;
			}
			wp_reset_postdata();
			$output .= '</div>';
			
	 	$output_escaped = $output;
	 	echo $output_escaped;

	
		wp_die();
}