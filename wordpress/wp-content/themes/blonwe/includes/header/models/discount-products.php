<?php
if ( ! function_exists( 'blonwe_discount_products' ) ) {
	function blonwe_discount_products(){
	?>	
	
	<?php $discount_products = get_theme_mod('blonwe_header_products_tab','0'); ?>
		<?php if($discount_products == '1'){ ?>
		<div class="custom-button custom-button-menu">
			<a href="#" class="has-dropdown"><i class="klb-ecommerce-icon-discount-bold"></i><?php echo esc_html(get_theme_mod('blonwe_header_products_button_title')); ?></a>
			<div class="sub-menu mega-menu">
				<div class="container">
					<div class="mega-header">
						<h3 class="entry-title"><?php echo esc_html(get_theme_mod('blonwe_header_products_tab_title')); ?></h3>
						<div class="entry-description">
							<p><?php echo esc_html(get_theme_mod('blonwe_header_products_tab_subtitle')); ?></p>
						</div><!-- entry-description -->
					</div>
					
						<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => get_theme_mod('blonwe_header_products_tab_post_count','6'),
								'order'          => 'DESC',
								'post_status'    => 'publish',
							);

							$args['klb_special_query'] = true;

							if(get_theme_mod('blonwe_header_products_tab_best_selling') == '1'){
								$args['meta_key'] = 'total_sales';
								$args['orderby'] = 'meta_value_num';
							}

							if(get_theme_mod('blonwe_header_products_tab_featured') == '1'){
								$args['tax_query'] = array( array(
									'taxonomy' => 'product_visibility',
									'field'    => 'name',
									'terms'    => array( 'featured' ),
										'operator' => 'IN',
								) );
							}
							
							if(get_theme_mod('blonwe_header_products_tab_on_sale') == '1'){
								$args['klb_on_sale_products'] = true;
							}

							$loop = new \WP_Query( $args );
						?>
					
					<div class="products">
					
						<?php 					
							if ( $loop->have_posts() ) {
								while ( $loop->have_posts() ) : $loop->the_post();
									global $product;
									global $post;
									global $woocommerce;
						?>
							
							
							<?php echo blonwe_product_type_header(); ?>
							
						
						<?php 
								endwhile;
							}
							wp_reset_postdata();
						?>
						
					</div>
				</div>
			</div>	
		</div>	
		
	<?php } 

	}
}