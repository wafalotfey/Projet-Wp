<?php 
/*************************************************
* Catalog Ordering
*************************************************/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); 
add_action( 'klb_catalog_ordering', 'woocommerce_catalog_ordering', 30 ); 

add_action( 'woocommerce_before_shop_loop', 'blonwe_catalog_ordering_start', 30 );
function blonwe_catalog_ordering_start(){
?>

	<div class="before-shop-loop">
		<div class="filter-button">
			<a href="#">
				<i class="klb-icon-filter"></i>
				<span><?php esc_html_e('Filter', 'blonwe-core'); ?></span>
			</a>
		</div>
		
		<?php if( get_theme_mod( 'blonwe_shop_layout' ) == 'full-width' || blonwe_get_option() == 'full-width') { ?>
              <div class="filters-wide-button dropdown hide-mobile">
                <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                  
                 <?php esc_html_e('Filter Products','blonwe-core'); ?>
                </a>
                <div class="filter-holder dropdown-menu">
                  <div class="filter-holder-inner">
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					<?php } ?>
                  </div><!-- filter-holder-wrapper -->
                </div><!-- filter-holder -->
              </div><!-- filter-wide-button -->
		<?php } ?>
		
		
		<?php add_action( 'blonwe_result_count', 'woocommerce_result_count', 20 ); ?>
		<?php do_action('blonwe_result_count'); ?>
		
		<!-- For get orderby from loop -->
		<?php do_action('klb_catalog_ordering'); ?>
				
		<!-- For perpage option-->
		<?php if(get_theme_mod('blonwe_perpage_view','0') == '1'){ ?>
			<?php $perpage = isset($_GET['perpage']) ? $_GET['perpage'] : ''; ?>
			<?php $defaultperpage = wc_get_default_products_per_row() * wc_get_default_product_rows_per_page(); ?>
			<?php $options = array($defaultperpage,$defaultperpage*2,$defaultperpage*3,$defaultperpage*4); ?>
			<div class="per-page-products hide-mobile">
				<span><?php esc_html_e('Show:','blonwe-core'); ?></span>
				<form class="woocommerce-ordering product-filter products-per-page" method="get">
					<?php if (blonwe_get_body_class('blonwe-ajax-shop-on')) { ?>
						<select name="perpage" class="perpage orderby filterSelect " data-class="select-filter-perpage">
					<?php } else { ?>
						<select name="perpage" class="perpage orderby filterSelect " data-class="select-filter-perpage" onchange="this.form.submit()">
					<?php } ?>
						<?php for( $i=0; $i<count($options); $i++ ) { ?>
						<option value="<?php echo esc_attr($options[$i]); ?>" <?php echo esc_attr($perpage == $options[$i] ? 'selected="selected"' : ''); ?>><?php echo esc_html($options[$i]); ?> <?php esc_html_e('Items','blonwe-core'); ?></option>
						<?php } ?>
					</select>
					<?php wc_query_string_form_fields( null, array( 'perpage', 'submit', 'paged', 'product-page' ) ); ?>
				</form>
			</div>

		<?php } ?>
		
		<?php if(get_theme_mod('blonwe_grid_list_view','0') == '1'){ ?>
			<div class="product-views-buttons hide-below-992">
				<?php if(blonwe_shop_view() == 'list_view') { ?>
					  <a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="grid-view" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Grid Products', 'blonwe-core'); ?>">
						<i class="klb-icon-view-type-grid-thin"></i>                     
					  </a>
				
					<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="list-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('List Products', 'blonwe-core'); ?>">
						<i class="klb-icon-view-type-list-thin"></i>                   
					</a>

				<?php } else { ?>
					  <a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="grid-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Grid Products', 'blonwe-core'); ?>">
						<i class="klb-icon-view-type-grid-thin"></i>                        
					  </a>
				
					<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="list-view" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('List Products', 'blonwe-core'); ?>">
						<i class="klb-icon-view-type-list-thin"></i>                     
					</a>

				<?php } ?>
			</div>
		<?php } ?>
		
	</div>
	
<?php

}