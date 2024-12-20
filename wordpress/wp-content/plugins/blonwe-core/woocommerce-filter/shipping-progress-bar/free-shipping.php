<?php
/*************************************************
## Free shipping progress bar.
*************************************************/
function blonwe_shipping_progress_bar() {
		
		$total           = WC()->cart->get_displayed_subtotal();
		$limit           = get_theme_mod( 'shipping_progress_bar_amount' );
		$percent         = 100;


		if ( $total < $limit ) {
			$percent = floor( ( $total / $limit ) * 100 );
			$message = str_replace( '[remainder]', wc_price( $limit - $total ), get_theme_mod( 'shipping_progress_bar_message_initial' ) );
			$class = 'warning';
		} else {
			$message = get_theme_mod( 'shipping_progress_bar_message_success' );
			$class = 'success';
		}
		
	?>	
		<div class="klb-free-shipping <?php echo esc_attr($class); ?>">
			<p class="shipping-notice"><i class="klb-icon-bookmark-empty-thin"></i><?php echo wp_kses( $message, 'post' ); ?></p>
			<div class="shipping-progress"> <span style="width: <?php echo esc_attr( $percent ); ?>%"></span></div>
		</div>
			
	<?php
}
	
if(get_theme_mod( 'shipping_progress_bar_location_card_page',0) == '1'){
	add_action( 'woocommerce_before_cart_table',  'blonwe_shipping_progress_bar' );
}

if(get_theme_mod( 'shipping_progress_bar_location_mini_cart',0) == '1'){
	add_action( 'woocommerce_widget_shopping_cart_before_buttons', 'blonwe_shipping_progress_bar' );
}

if(get_theme_mod( 'shipping_progress_bar_location_checkout',0) == '1'){
	add_action( 'woocommerce_checkout_billing', 'blonwe_shipping_progress_bar' );
}
