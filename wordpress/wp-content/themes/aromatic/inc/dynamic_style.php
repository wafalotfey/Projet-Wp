<?php
if( ! function_exists( 'aromatic_dynamic_style' ) ):
    function aromatic_dynamic_style() {
		$output_css = '';
		
		 /**
		 *  Breadcrumb Style
		 */
		$breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img',esc_url(get_template_directory_uri() .'/assets/images/shop/breadcrumb-leaf.png')); 
		$breadcrumb_bg_img_opacity	= get_theme_mod('breadcrumb_bg_img_opacity','1');
		$breadcrumb_overlay_color	= get_theme_mod('breadcrumb_overlay_color','#f8f8f8');
		list($br, $bg, $bb) = sscanf($breadcrumb_overlay_color, "#%02x%02x%02x");
		
		if($breadcrumb_bg_img !== '') { 
			$output_css .=".breadcrumb-area {
					background-color: rgba($br $bg $bb / " .esc_attr($breadcrumb_bg_img_opacity). ");
				}\n";
		}
		
		 if ( !function_exists( 'ecommerce_companion_activate' ) ) : 
			$output_css .=".theme-mobile-menu .menu-primary {
					margin-top: 60px;
				}\n";
		 endif;
		
        wp_add_inline_style( 'aromatic-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'aromatic_dynamic_style' );