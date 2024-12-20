<?php

if ( ! function_exists( 'blonwe_header_search_input' ) ) {
	function blonwe_header_search_input(){
		$headersearch = get_theme_mod('blonwe_header_search','0');
		if($headersearch == 1){
		?>
		
			<div class="header-search-form header-search-overlay">
				<?php echo blonwe_header_product_search(); ?>
			</div><!-- header-search-form -->
	<?php  }
	}
}