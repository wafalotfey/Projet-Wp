<?php
/*************************************************
## Tab View
*************************************************/ 

add_action( 'wp_ajax_nopriv_tab_view_list', 'blonwe_tab_view_list_callback' );
add_action( 'wp_ajax_tab_view_list', 'blonwe_tab_view_list_callback' );
function blonwe_tab_view_list_callback() {
	
	global $product;
	global $woocommerce;
	$catid = intval( $_POST['catid'] );
	$post_count = intval( $_POST['post_count'] );
	$producttype = $_POST['producttype'];
	$productclass = $_POST['productclass'];
	$best_selling = $_POST['best_selling'];
	$featured = $_POST['featured'];
	$on_sale = $_POST['on_sale'];
	
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
		
		$output .= '<div id="'.esc_attr($catid).'" class="'.esc_attr($productclass).'" data-producttype="'.esc_attr($producttype).'" data-perpage="'.esc_attr($post_count).'" data-best_selling="'.esc_attr($best_selling).'" data-featured="'.esc_attr($featured).'" data-onsale="'.esc_attr($on_sale).'">';
		
		$loop = new \WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					global $post;
					global $woocommerce;
			
					
					$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
						if($producttype == 'type2'){
							$output .= blonwe_product_type_list3();
						} else {
							$output .= blonwe_product_type_list2();
						}
					$output .= '</div>';
					
				endwhile;
			}
			wp_reset_postdata();
			
		$output .= '</div>';	
			
	 	$output_escaped = $output;
	 	echo $output_escaped;

	
		wp_die();
}