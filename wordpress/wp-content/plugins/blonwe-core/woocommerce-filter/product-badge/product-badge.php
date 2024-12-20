<?php

/*************************************************
## Admin Scripts
*************************************************/
function blonwe_product_badge_admin_styles() {
	wp_enqueue_style( 'klb-product-badge',   plugins_url( 'css/admin/product-badge.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'klb-product-badge',   plugins_url( 'js/admin/product-badge.js', __FILE__ ), false, '1.0');
}
add_action('admin_enqueue_scripts', 'blonwe_product_badge_admin_styles');

/*************************************************
## Scripts
*************************************************/
function blonwe_product_badge_styles() {
	wp_enqueue_style( 'klb-product-badge',   plugins_url( 'css/product-badge.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_product_badge_styles' );


add_filter('woocommerce_product_data_tabs', function($tabs) {
	$tabs['klb_badge_data'] = [
		'label' => esc_html__('Badge', 'blonwe-core'),
		'target' => 'klb_product_badge_tab',
		'priority' => 65
	];
	return $tabs;
});

add_action('woocommerce_product_data_panels', function() {
	?><div id="klb_product_badge_tab" class="panel woocommerce_options_panel hidden"><?php
 
    global $product_object;
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_badge_text',
		'label' => esc_html__('Badge Text', 'blonwe-core'),
		'desc_tip'    => true,
		'description' => esc_html__( 'Badge Text.', 'blonwe-core' ),
	]);
	
	woocommerce_wp_select([
		'id'          => '_klb_product_badge_type', 
		'label'       => esc_html__( 'Badge Type', 'blonwe-core' ), 
		'desc_tip'    => true,
		'description' => esc_html__( 'Choose a badge type.', 'blonwe-core' ),
		'options' => array(
			'style-1'   => esc_html__( 'Style 1', 'blonwe-core' ),
			'style-2'   => esc_html__( 'Style 2', 'blonwe-core' ),
			'style-3'   => esc_html__( 'Style 3', 'blonwe-core' ),
		)
	]);

	woocommerce_wp_text_input([
		'id' => '_klb_product_badge_bg_color',
		'label' => esc_html__('Badge BG Color', 'blonwe-core'),
		'class' => 'blonwe-color-field',
	]);
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_badge_text_color',
		'label' => esc_html__('Badge Text Color', 'blonwe-core'),
		'class' => 'blonwe-color-field',
	]);
	
	woocommerce_wp_checkbox([
		'id' => '_klb_product_percentage_check',
		'label' => esc_html__('Hide Percentage', 'blonwe-core'),
		'description' => esc_html__( 'Enable this to hide the percentage label.', 'blonwe-core' ),
	]);
	
	echo '<div class="percentage_fields">';
	
	woocommerce_wp_select([
		'id'          => '_klb_product_percentage_type', 
		'label'       => esc_html__( 'Percentage Type', 'blonwe-core' ), 
		'desc_tip'    => true,
		'description' => esc_html__( 'If the product is on sale.', 'blonwe-core' ),
		'options' => array(
			'style-1'   => esc_html__( 'Style 1', 'blonwe-core' ),
			'style-2'   => esc_html__( 'Style 2', 'blonwe-core' ),
			'style-3'   => esc_html__( 'Style 3', 'blonwe-core' ),
		)
	]);
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_percentage_bg_color',
		'label' => esc_html__('Percentage BG Color', 'blonwe-core'),
		'class' => 'blonwe-color-field',
	]);
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_percentage_text_color',
		'label' => esc_html__('Percentage Text Color', 'blonwe-core'),
		'class' => 'blonwe-color-field',
	]);
	echo '</div>';
 
	?></div><?php
});

add_action('woocommerce_process_product_meta', function($post_id) {
	$product = wc_get_product($post_id);
	
	$product->update_meta_data('_klb_product_percentage_check', sanitize_text_field($_POST['_klb_product_percentage_check']));
	$product->update_meta_data('_klb_product_percentage_type', sanitize_text_field($_POST['_klb_product_percentage_type']));
	$product->update_meta_data('_klb_product_percentage_bg_color', sanitize_text_field($_POST['_klb_product_percentage_bg_color']));
	$product->update_meta_data('_klb_product_percentage_text_color', sanitize_text_field($_POST['_klb_product_percentage_text_color']));
	$product->update_meta_data('_klb_product_badge_text', sanitize_text_field($_POST['_klb_product_badge_text']));
	$product->update_meta_data('_klb_product_badge_type', sanitize_text_field($_POST['_klb_product_badge_type']));
	$product->update_meta_data('_klb_product_badge_bg_color', sanitize_text_field($_POST['_klb_product_badge_bg_color']));
	$product->update_meta_data('_klb_product_badge_text_color', sanitize_text_field($_POST['_klb_product_badge_text_color']));
 
	$product->save();
});



