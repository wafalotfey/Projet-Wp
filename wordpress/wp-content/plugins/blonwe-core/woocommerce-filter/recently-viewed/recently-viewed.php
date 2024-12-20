<?php

/*************************************************
## Recently Viewed Products Always
*************************************************/ 
function blonwe_track_product_view() {
	if ( ! is_singular( 'product' )) {
		return;
	}

	global $post;

	if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) ) { // @codingStandardsIgnoreLine.
		$viewed_products = array();
	} else {
		$viewed_products = wp_parse_id_list( (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) ); // @codingStandardsIgnoreLine.
	}

	// Unset if already in viewed products list.
	$keys = array_flip( $viewed_products );

	if ( isset( $keys[ $post->ID ] ) ) {
		unset( $viewed_products[ $keys[ $post->ID ] ] );
	}

	$viewed_products[] = $post->ID;

	if ( count( $viewed_products ) > 15 ) {
		array_shift( $viewed_products );
	}

	// Store for session only.
	wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}

remove_action( 'template_redirect', 'wc_track_product_view', 20 );
add_action( 'template_redirect', 'blonwe_track_product_view', 20 );

/*************************************************
## Add Class in Body
*************************************************/ 

function blonwe_recently_body_classes( $classes ) {
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array(); // @codingStandardsIgnoreLine
	$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );
	
	if ( is_product() && !empty( $viewed_products) && is_woocommerce()) {
		$classes[] = 'recently-viewed';
	}
	
	return $classes;
}
add_filter( 'body_class', 'blonwe_recently_body_classes' );


/*************************************************
## Recently Viewed Products Loop
*************************************************/ 
function blonwe_recently_viewed_product_loop(){
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array(); // @codingStandardsIgnoreLine
	$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

	if ( empty( $viewed_products) || !is_woocommerce()) {
		return;
	}
	
	$column = get_theme_mod('blonwe_recently_viewed_products_column', 4);

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $column,
		'post__in'       => $viewed_products,
		'orderby'        => 'post__in',
		'post_status'    => 'publish',
	);
	
	$loop = new WP_Query( $args );
	
	echo '<div class="container">';
	echo '<div class="klb-module recently-viewed mt-20 d-mt-30">';
	echo '<div class="module-header">';
	echo '<div class="module-header-inner">';
	echo '<div class="column order-1">';
	echo '<h3 class="entry-title">'.esc_html__('Recently viewed items','blonwe-core').'</h3>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '<div class="module-body">';
    echo '<div class="products grid-column  mobile-grid-2 column-'.esc_attr($column).'">';
	
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
	} else {
		echo esc_html__( 'No products found', 'blonwe-core');
	}
	
	echo '</div>';       
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	
	wp_reset_postdata();	
}
add_action('get_footer','blonwe_recently_viewed_product_loop');

/*************************************************
## Recently Viewed Products Loop For Product Info
*************************************************/ 
function blonwe_recently_viewed_product_loop_product_info(){
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array(); // @codingStandardsIgnoreLine
	$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

	if ( empty( $viewed_products) || !is_woocommerce()) {
		return;
	}
	
	$column = get_theme_mod('blonwe_recently_viewed_products_column', 4);

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $column,
		'post__in'       => $viewed_products,
		'orderby'        => 'post__in',
		'post_status'    => 'publish',
	);
	
	$loop = new WP_Query( $args );


	echo '<div class="widget">';
	echo '<h4 class="widget-title">'.esc_html__('Recently Viewed', 'blonwe-core').'</h4>';
	echo '<ul class="products list-style small-list-style">';
	
	if ( $loop->have_posts() ) {
		
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product;
			global $post;
			global $woocommerce;
			
			$id = get_the_ID();
			$allproduct = wc_get_product( get_the_ID() );
	
			$price = $allproduct->get_price_html();
			$att=get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $att, 'full' );
			$image_src = $image_src[0];
			
			echo '<li class="product">';
			echo '<div class="product-inner">';
			echo '<div class="thumbnail-wrapper">';
			echo '<a href="'.get_permalink().'">';	  
			echo '<img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'">';
			echo '</a>';
			echo '</div><!-- thumbnail-wrapper -->';
			echo '<div class="content-wrapper">';
			echo '<span class="price">';
			echo $price;
			echo '</span><!-- price -->';
			echo '<h4 class="product_title entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
			echo '</div><!-- content-wrapper -->';
			echo '</div><!-- product-inner -->';
			echo '</li>';				  
			
			
		endwhile;
	} else {
		echo esc_html__( 'No products found', 'blonwe-core');
	}
	
	echo '</ul>';
	echo '</div>';

	
	wp_reset_postdata();	
}

add_action('blonwe_single_recent_views','blonwe_recently_viewed_product_loop_product_info');