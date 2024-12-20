<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_side_cart_scripts() {
	wp_enqueue_style( 'klb-side-cart',   plugins_url( 'css/side-cart.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'klb-side-cart',   plugins_url( 'js/side-cart.js', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'klb-side-cart-quantity',   plugins_url( 'js/side-cart-quantity.js', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_side_cart_scripts' );

if ( ! function_exists( 'blonwe_side_cart' ) ) {
	function blonwe_side_cart(){
		?>
			<div class="cart-widget-side">
				<div class="site-scroll">
					<div class="cart-side-header">
						<div class="cart-side-title"><?php esc_html_e('Shopping Cart', 'blonwe-core'); ?></div>
						<div class="cart-side-close"><i class="klb-icon-xmark-thin"></i></div>
					</div><!-- cart-side-header -->
					<div class="cart-side-body">
						<div class="fl-mini-cart-content">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</div><!-- cart-side-body -->
				</div><!-- site-scroll -->
			</div><!-- cart-widget-side -->
			
			<div class="cart-side-overlay"></div>
		<?php 
	}
}
add_action('wp_footer', 'blonwe_side_cart');

/*************************************************
## Add Quantity Field
*************************************************/ 
add_filter( 'woocommerce_widget_cart_item_quantity', 'klb_add_minicart_quantity_fields', 10, 3 );
function klb_add_minicart_quantity_fields( $html, $cart_item, $cart_item_key ) {
	$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
	$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
	$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

	$product = $cart_item['data'];

	return  woocommerce_quantity_input(
				array(
					'input_name'   => $cart_item_key,
					'input_value'  => $cart_item['quantity'],
					'max_value'    => $product->get_stock_quantity(),
					'min_value'    => '0',
				),
				$cart_item['data'],
				false
			) . $product_price;
}


/*************************************************
## Quantity Button CallBack
*************************************************/ 

add_action( 'wp_ajax_nopriv_sidecart_quantity_button', 'blonwe_sidecart_quantity_button_callback' );
add_action( 'wp_ajax_sidecart_quantity_button', 'blonwe_sidecart_quantity_button_callback' );
function blonwe_sidecart_quantity_button_callback() {


	$id = intval( $_POST['id'] );
	$quantity = intval( $_POST['quantity'] );
	$quantity = intval( $_POST['quantity'] );
	$product    = isset( $_POST['id'] ) ? wc_get_product( absint( $_POST['id'] ) ) : false;
	$name = $_POST['name'];

	WC()->cart->set_quantity( $name, $quantity); // Change quantity


	wp_die();

}