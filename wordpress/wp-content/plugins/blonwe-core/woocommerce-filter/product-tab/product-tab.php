<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_product_tab_scripts() {
	wp_register_script( 'klb-product-tab',   plugins_url( 'js/product-tab.js', __FILE__ ), false, '1.0');
	wp_register_style( 'klb-product-tab',   plugins_url( 'css/product-tab.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_product_tab_scripts' );

/*************************************************
## Accordion Tab
*************************************************/
if(get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab' || blonwe_ft() == 'accordion_tab' || 
get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab_content' || blonwe_ft() == 'accordion_tab_content'){
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	if(get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab_content' || blonwe_ft() == 'accordion_tab_content'){
		// add_action( 'woocommerce_after_add_to_cart_form', 'blonwe_product_accordion_tab', 40);
		add_action( 'woocommerce_single_product_summary', 'blonwe_product_accordion_tab', 35);
	} else {
		add_action( 'woocommerce_after_single_product_summary', 'blonwe_product_accordion_tab', 10);
	}
	function blonwe_product_accordion_tab(){
		$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

		wp_enqueue_style( 'klb-product-tab');
		wp_enqueue_script( 'klb-product-tab');
		wp_enqueue_script( 'jquery-ui-accordion');

		if ( ! empty( $product_tabs ) ) : ?>

			<div class="product-accordion-tab">
				<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
					<div class="accordion-item">
						<div class="accordion-tab-title" id="tab-title-<?php echo esc_attr( $key ); ?>" >
							<a href="#tab-<?php echo esc_attr( $key ); ?>">
								<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
							</a>
						</div>
						<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
							<?php
							if ( isset( $product_tab['callback'] ) ) {
								call_user_func( $product_tab['callback'], $key, $product_tab );
							}
							?>
						</div>
					</div>
				<?php endforeach; ?>
				

			</div>
			
			<?php do_action( 'woocommerce_product_after_tabs' ); ?>

		<?php endif;
	}
}

/*************************************************
## Vertical Tab
*************************************************/
if(get_theme_mod('blonwe_single_product_tab_type') == 'vertical_tab' || blonwe_ft() == 'vertical_tab'){
	add_action( 'woocommerce_after_single_product_summary', 'blonwe_product_vertical_tab', 10);
	function blonwe_product_vertical_tab(){
		wp_enqueue_style( 'klb-product-tab');
	}
}

/*************************************************
## Single Product Classes
*************************************************/
function blonwe_single_product_tab_post_class( $classes, $product ) {
    global $woocommerce_loop;
    
    if ( ! is_product() ) return $classes;

    if ( $woocommerce_loop['name'] == 'related' ) return $classes;

	if(get_theme_mod('blonwe_single_product_tab_type') == 'vertical_tab' || blonwe_ft() == 'vertical_tab'){
		$classes[] = 'klb-product-vertical-tab';
	} elseif(get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab' || blonwe_ft() == 'accordion_tab'){
		$classes[] = 'klb-product-accordion-tab';
	} elseif(get_theme_mod('blonwe_single_product_tab_type') == 'accordion_tab_content' || blonwe_ft() == 'accordion_tab_content'){
		$classes[] = 'klb-product-accordion-tab klb-product-accordion-tab-content';
	}
    
    return $classes;
}
add_filter( 'woocommerce_post_class', 'blonwe_single_product_tab_post_class', 10, 2 );
