<?php
/*************************************************
## Single Product Header
*************************************************/
function blonwe_single_product_header_top(){
	global $product;
	
	?>
	<div class="column product-header">
		<?php do_action('blonwe_single_title'); ?>
			
		<div class="product-meta top">
			<?php do_action('blonwe_single_rating'); ?>   
          
			<?php if(blonwe_vendor_name()){ ?>
				<?php echo blonwe_vendor_name(); ?>
			<?php } ?>
		</div><!-- product-meta -->
	</div>

	<?php
}

function blonwe_single_product_header_side(){
	global $product;
	
	?>
		<?php do_action('blonwe_single_title'); ?>
		
		<div class="product-meta top">
			<?php do_action('blonwe_single_rating'); ?>    
			
			<?php if(blonwe_vendor_name()){ ?>
				<?php echo blonwe_vendor_name(); ?>
			<?php } ?>        
		</div><!-- product-meta -->
	<?php
}

if(get_theme_mod('blonwe_single_type') == 'type2' || get_theme_mod('blonwe_single_type') == 'type3' || get_theme_mod('blonwe_single_type') == 'type4' || blonwe_get_option() == 'type2' || blonwe_get_option() == 'type3' || blonwe_get_option() == 'type4'){
	add_action('blonwe_single_header_top','blonwe_single_product_header_top');
} else {
	add_action('blonwe_single_header_side','blonwe_single_product_header_side');
}

//Remove Single Title
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
add_action( 'blonwe_single_title', 'woocommerce_template_single_title',5);

//Remove Single Rating
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating',10);
add_action( 'blonwe_single_rating', 'woocommerce_template_single_rating',10);

/*************************************************
## Single Product Side Inner
*************************************************/
function blonwe_single_product_side_inner(){
	global $product;
	
	?>
	
	<div class="product-detail-side">
		<?php if(get_theme_mod('blonwe_single_type') == 'type4'){ ?>
		
			<?php do_action('blonwe_single_recent_views'); ?>
			
			<div class="widget text_widget">
				<div class="widget-body">
				  <div class="text-widget">
						<a href="<?php echo esc_url(get_theme_mod( 'blonwe_shop_single_banner_image_url' )); ?>"><img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_shop_single_banner_image' )) ); ?>"></a>
				  </div>
				</div>
			</div>
			
		<?php } elseif(get_theme_mod('blonwe_single_type') == 'type3'){ ?>	
		
			<div class="detail-side-inner">
				<?php do_action('blonwe_single_price'); ?>
			
				<?php do_action('blonwe_single_add_to_cart'); ?>
			</div><!-- detail-side-inner -->
			
				<?php do_action('blonwe_single_wishlist'); ?>
				
		<?php }	?>	
	</div>

	<?php
}

if(get_theme_mod('blonwe_single_type') == 'type4'){
	add_action('blonwe_single_side_inner','blonwe_single_product_side_inner');
	
	//Remove Single Price
	remove_action( 'get_footer', 'blonwe_recently_viewed_product_loop');
	if(function_exists('blonwe_recently_viewed_product_loop_product_info')){
		add_action('blonwe_single_recent_views','blonwe_recently_viewed_product_loop_product_info');
	}
	
} elseif(get_theme_mod('blonwe_single_type') == 'type3'){
	add_action('blonwe_single_side_inner','blonwe_single_product_side_inner');
	
	//Remove Single Price
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
	add_action( 'blonwe_single_price', 'woocommerce_template_single_price',10);

	//Remove Single Add To Cart
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30);
	add_action( 'blonwe_single_add_to_cart', 'woocommerce_template_single_add_to_cart',30);	
	
}	