<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_buy_now_scripts() {
	wp_register_script( 'klb-buy-now',   plugins_url( 'js/buy-now.js', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_buy_now_scripts' );

/*************************************************
## Buy Now Button For Single Product
*************************************************/
function blonwe_add_buy_now_button_single(){
	global $product;
	wp_enqueue_script( 'klb-buy-now');
    printf( '<button id="buynow" type="submit" name="blonwe-buy-now" value="%d" class="buy_now_button button">%s</button>', $product->get_ID(), esc_html__( 'Buy Now', 'blonwe-core' ) );
}
add_action( 'woocommerce_after_add_to_cart_button', 'blonwe_add_buy_now_button_single' );

/*************************************************
## Handle for click on buy now
*************************************************/
function blonwe_handle_buy_now(){
	if ( !isset( $_REQUEST['blonwe-buy-now'] ) ){
		return false;
	}

	WC()->cart->empty_cart();

	$product_id = absint( $_REQUEST['blonwe-buy-now'] );
    $quantity = absint( $_REQUEST['quantity'] );

	if ( isset( $_REQUEST['variation_id'] ) ) {

		$variations   = array();
		
		foreach ( $_REQUEST as $key => $value ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( 'attribute_' !== substr( $key, 0, 10 ) ) {
				continue;
			}

			$variations[ sanitize_title( wp_unslash( $key ) ) ] = wp_unslash( $value );
		}

		$variation_id = absint( $_REQUEST['variation_id'] );
		WC()->cart->add_to_cart( $product_id, 1, $variation_id, $variations );

	}else{
        WC()->cart->add_to_cart( $product_id, $quantity );
	}

	wp_safe_redirect( wc_get_checkout_url() );
	exit;
}
add_action( 'wp_loaded', 'blonwe_handle_buy_now' );