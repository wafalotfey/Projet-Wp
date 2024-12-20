<?php
/*************************************************
## Scripts
*************************************************/
function blonwe_sticky_single_cart_scripts() {
	wp_register_script( 'klb-sticky-single-cart',   plugins_url( 'js/sticky-single-cart.js', __FILE__ ), false, '1.0');
	wp_register_style( 'klb-sticky-single-cart',   plugins_url( 'css/sticky-single-cart.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_sticky_single_cart_scripts' );


/*************************************************
## Sticky add to cart Function
*************************************************/

if ( ! function_exists( 'blonwe_sticky_single_cart' ) ) {
    function blonwe_sticky_single_cart()
    {
        global $product;
		
		if ( !is_product() || $product->is_type( 'grouped' ) || '0' == blonwe_ft( 'blonwe_sticky_single_cart', '1' ) ) {
            return;
        }
		
		wp_enqueue_script( 'klb-sticky-single-cart');
		wp_enqueue_style( 'klb-sticky-single-cart');
	
        ?>
		
		<div class="single-product-sticky">
			<div class="container">
				<article class="product">
					<div class="product-inner">
					
						<div class="content-wrapper">
							<h4 class="product_title entry-title"><?php echo get_the_title( $product->get_id() ); ?></h4>
							<div class="product-meta">
								<div class="product-rating">
								  <?php woocommerce_template_loop_rating(); ?>
								</div><!-- product-rating --> 
							</div>
							
						</div><!-- content-wrapper -->
						
						<div class="product-price">
						  <?php woocommerce_template_loop_price(); ?>
						</div><!-- product-price -->
						
						<?php if ( $product->is_type( 'simple' ) ) : ?>
							<?php woocommerce_simple_add_to_cart(); ?>
						<?php else : ?>
							<a href="#" class="sticky_add_to_cart single_add_to_cart_button button alt">
								<?php echo true == $product->is_type( 'variable' ) ? esc_html__( 'Select options', 'blonwe-core' ) : $product->single_add_to_cart_text(); ?>
							</a>	
						<?php endif; ?>
						
					</div><!-- product-inner -->
				</article>
			</div><!-- container -->
        </div>
        <?php
    }
}
add_action( 'blonwe_before_main_footer', 'blonwe_sticky_single_cart', 10 );