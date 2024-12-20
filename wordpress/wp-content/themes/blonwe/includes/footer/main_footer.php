<?php

/*************************************************
## Main Footer Function
*************************************************/

add_action('blonwe_main_footer','blonwe_main_footer_function',20);

if ( ! function_exists( 'blonwe_main_footer_function' ) ) {
	function blonwe_main_footer_function(){
		
		if(blonwe_page_settings('page_footer_type') == 'type2') {
			
			get_template_part( 'includes/footer/footer-type2' );
			
		} elseif(blonwe_page_settings('page_footer_type') == 'type1') {
			
			get_template_part( 'includes/footer/footer-type1' );
			
		} elseif(get_theme_mod('blonwe_footer_type') == 'type2'){
			
			get_template_part( 'includes/footer/footer-type2' );
			
		} else {
			
			get_template_part( 'includes/footer/footer-type1' );
			
		}
		
	}
}