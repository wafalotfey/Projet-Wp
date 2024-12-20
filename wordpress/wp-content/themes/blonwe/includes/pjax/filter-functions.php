<?php
/*************************************************
## Pjax Helper Scripts
*************************************************/ 
function blonwe_pjax_helper_scripts() {
	wp_enqueue_script( 'pjax-helpers',		get_template_directory_uri() . '/includes/pjax/js/helpers.js',array('jquery'), '1.0', false );
}
add_action( 'wp_enqueue_scripts', 'blonwe_pjax_helper_scripts' );

if(get_theme_mod('blonwe_ajax_on_shop',0) == '1'){
	if ( class_exists( 'woocommerce' ) ) {
	/*************************************************
	## Body Class
	*************************************************/ 
	function blonwe_shop_body_class( $classes ) {
		if(is_shop() || is_product_category()){
			$classes[] = 'blonwe-ajax-shop-on';
		}
		return $classes;
	}
	add_filter('body_class', 'blonwe_shop_body_class');

	/*************************************************
	## Pjax Scripts
	*************************************************/ 
	function blonwe_pjax_scripts_styles() {
		if(is_shop() || is_product_category()){
			wp_enqueue_script( 'pjax', 								get_template_directory_uri() . '/includes/pjax/js/pjax.js',array('jquery'), '1.0', false );
			wp_enqueue_script( 'blonwe-sortByWidget', 				get_template_directory_uri() . '/includes/pjax/js/wc/sortByWidget.js',array('jquery'), '1.0', false );
			wp_enqueue_script( 'blonwe-perpage', 					get_template_directory_uri() . '/includes/pjax/js/wc/perpage.js',array('jquery'), '1.0', false );
			wp_enqueue_script( 'blonwe-woocommercePriceSlider', 	get_template_directory_uri() . '/includes/pjax/js/wc/woocommercePriceSlider.js',array('jquery'), '1.0', false );
			wp_enqueue_script( 'blonwe-AjaxFilter', 				get_template_directory_uri() . '/includes/pjax/js/AjaxFilter.js',array('jquery', 'pjax'), '1.0', true );

			wp_localize_script( 'blonwe-AjaxFilter', 'blonwe_settings', array(
				'cart_url'                => esc_url( wc_get_cart_url() ),
				'ajaxurl'                 => admin_url( 'admin-ajax.php' ),
				'ajax_scroll'             => 'yes',
				'ajax_scroll_class'       => '.site-content .products',
				'ajax_scroll_offset'      => 200,
				'infinit_scroll_offset'   => 300,
				'pjax_timeout'            => 5000,
			));
		}
	}
	add_action( 'wp_enqueue_scripts', 'blonwe_pjax_scripts_styles' );

	} // if class exist woocommerce

} //blonwe_ajax_shop_on