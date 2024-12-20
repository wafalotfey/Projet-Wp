<?php
if ( ! function_exists( 'blonwe_search_holder' ) ) {
	function blonwe_search_holder(){
		$headersearch = get_theme_mod('blonwe_header_search','0');
		if($headersearch == 1){
		
		?>
			<div class="klb-mobile-search">
				<div class="site-scroll">
					<div class="mobile-search-header">
						<p><?php esc_html_e('Type a few things below to search', 'blonwe'); ?></p>
						<form action="<?php echo esc_url( home_url( '/'  ) ); ?>" class="search-form form-style-primary" role="search" method="get">
							<input class="form-control search-input" type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e('Search for products...', 'blonwe'); ?>" autocomplete="off">
							<button type="submit" class="unset">
								<i class="klb-icon-search-feather"></i>
							</button>
							<input type="hidden" name="post_type" value="product" />
						</form><!-- search-form -->
					</div><!-- mobile-search-header -->
					<div class="mobile-search-body">
					
						<?php $total_products = wp_count_posts( 'product' ); ?>
						<?php $total_count = $total_products->publish; ?>
						<?php $total_format = esc_html__('Out of a total of %s products:','blonwe'); ?>
			
						<div class="searh-caption">
							<p><?php echo sprintf($total_format, $total_count); ?></p>
						</div><!-- searh-caption -->
						<div class="search-results">
							<?php if(function_exists('blonwe_get_most_popular_keywords') && blonwe_get_most_popular_keywords()){ ?>
								<div class="search-result-keywords">
									<span class="search-results-heading"><?php esc_html_e('Trending:', 'blonwe'); ?></span>
									<?php echo blonwe_get_most_popular_keywords('tag-style', 8); ?>
								</div><!-- search-result-keywords -->
							<?php } ?>
						</div><!-- search-results -->
					</div><!-- mobile-search-body -->
				</div><!-- site-scroll -->
			</div><!-- klb-mobile-search -->
			
		<?php  }
	}
}
add_action('wp_footer', 'blonwe_search_holder');