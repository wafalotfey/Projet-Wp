<?php
if(get_theme_mod('blonwe_single_image_zoom') == 1 || get_theme_mod('blonwe_product_box_gallery') == 'type4' || blonwe_ft() == 'productbox_zoom' || blonwe_ft() == 'imgzoom'){
	
	/*************************************************
	## Scripts
	*************************************************/
	function blonwe_image_zoom_scripts() {
		wp_register_style( 'klb-image-zoom',   plugins_url( 'css/image-zoom.css', __FILE__ ), false, '1.0');
		wp_register_script( 'jquery-zoom',   plugins_url( 'js/jquery.zoom.min.js', __FILE__ ), false, '1.0');
		wp_register_script( 'klb-image-zoom',   plugins_url( 'js/image-zoom.js', __FILE__ ), false, '1.0');
	}
	add_action( 'wp_enqueue_scripts', 'blonwe_image_zoom_scripts' );
	
	function klb_product_image_zoom(){
		wp_enqueue_style('klb-image-zoom');
		wp_enqueue_script('jquery-zoom');
		wp_enqueue_script('klb-image-zoom');
	}
}

if(get_theme_mod('blonwe_single_image_zoom') == 1 || blonwe_ft() == 'imgzoom'){
	
	add_action('woocommerce_product_thumbnails','klb_product_image_zoom',20);

	function blonwe_image_zoom_setup() {
		add_theme_support( 'wc-product-gallery-zoom' );
	}
	add_action( 'after_setup_theme', 'blonwe_image_zoom_setup' );
}


if(get_theme_mod('blonwe_product_box_gallery') == 'type4' || blonwe_ft() == 'productbox_zoom'){
	add_action('blonwe_after_product_box','klb_product_image_zoom',20);
}