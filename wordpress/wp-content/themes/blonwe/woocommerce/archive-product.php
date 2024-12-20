<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */
 
wp_enqueue_script( 'theia-sticky-sidebar');
wp_enqueue_script( 'blonwe-stickysidebar');
wp_enqueue_script( 'blonwe-sidebarfilter');

defined( 'ABSPATH' ) || exit;

// Elementor `archive` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {

	if ( ! blonwe_is_pjax() ) {
	    get_header( 'shop' );
	}
	?>

	<?php blonwe_do_action( 'blonwe_before_main_shop'); ?>

	<?php if(get_theme_mod('blonwe_shop_banner_type') == 'type3') { ?>
		<?php get_template_part( 'includes/woocommerce/banner-type2' ); ?>
		
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			
			<?php if ( is_active_sidebar( 'shop-top-widget' ) ) { ?>
				<div class="woocommerce-page-header">
					<?php dynamic_sidebar( 'shop-top-widget' ); ?>
				</div>
			<?php } ?>
		</div>	
	<?php } elseif( get_theme_mod( 'blonwe_shop_banner_type' ) == 'type2') { ?>
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			
			<div class="woocommerce-page-header with-banner style-1">
				<?php get_template_part( 'includes/woocommerce/banner-type1' ); ?>
				
				<?php if ( is_active_sidebar( 'shop-top-widget' ) ) { ?>
					<?php dynamic_sidebar( 'shop-top-widget' ); ?>
				<?php } ?>
			</div>
		</div>	
	<?php } else { ?>
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			
			<div class="woocommerce-page-header style-1">
				<h1 class="woocommerce-page-title"><?php echo esc_html(get_theme_mod( 'blonwe_shop_banner_title' )); ?></h1>
				
				<?php if ( is_active_sidebar( 'shop-top-widget' ) ) { ?>
					<?php dynamic_sidebar( 'shop-top-widget' ); ?>
				<?php } ?>
			</div>
		</div>	
	<?php } ?>
		
	<div class="container">
		
		<?php do_action( 'woocommerce_before_main_content' ); ?>

		<?php
		/**
		 * Hook: woocommerce_shop_loop_header.
		 *
		 * @since 8.6.0
		 *
		 * @hooked woocommerce_product_taxonomy_archive_header - 10
		 */
		do_action( 'woocommerce_shop_loop_header' );
		?>
		
		
		<?php
			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );

		?>
				
		<?php if( get_theme_mod( 'blonwe_shop_layout' ) == 'full-width' || blonwe_get_option() == 'full-width') { ?>
			<div class="row shop-wrapper content-wrapper no-sidebar no-border">
				<div class="col col-12 col-lg-12 primary-column">
					<?php do_action('klb_before_products'); ?>
					
					<?php
					if ( woocommerce_product_loop() ) {
						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						do_action( 'woocommerce_after_shop_loop' );
					} else {
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
				<div id="sidebar" class="col col-12 col-lg-3 sidebar-column filtered-sidebar sticky hide-desktop">
					<div class="filter-sidebar-header">
						<h3 class="entry-title"><?php esc_html_e('Filter Products','blonwe'); ?></h3>
						<div class="site-close">
						  <svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
							<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
						  </svg>
						</div><!-- site-close -->       
					</div>
					<div class="site-scroll">
						<div class="filter-sidebar-body">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="mobile-filter-overlay"></div>
			</div>
		<?php } elseif( get_theme_mod( 'blonwe_shop_layout' ) == 'right-sidebar' || blonwe_get_option() == 'right-sidebar') { ?>
			<div class="row shop-wrapper content-wrapper sidebar-right">
				<div class="col col-12 col-lg-9 primary-column">
					<?php do_action('klb_before_products'); ?>
					
					<?php
					if ( woocommerce_product_loop() ) {
						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						do_action( 'woocommerce_after_shop_loop' );
					} else {
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
				<div id="sidebar" class="col col-12 col-lg-3 sidebar-column filtered-sidebar sticky">
					<div class="filter-sidebar-header">
						<h3 class="entry-title"><?php esc_html_e('Filter Products','blonwe'); ?></h3>
						<div class="site-close">
						  <svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
							<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
						  </svg>
						</div><!-- site-close -->       
					</div>
					<div class="site-scroll">
						<div class="filter-sidebar-body">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="mobile-filter-overlay"></div>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
				<div class="row shop-wrapper content-wrapper sidebar-left">
					
					<div class="col col-12 col-lg-9 primary-column">
						<?php do_action('klb_before_products'); ?>
					
						<?php
						if ( woocommerce_product_loop() ) {
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
					
					<div id="sidebar" class="col col-12 col-lg-3 sidebar-column filtered-sidebar sticky">
						<div class="filter-sidebar-header">
							<h3 class="entry-title"><?php esc_html_e('Filter Products','blonwe'); ?></h3>
							<div class="site-close">
							  <svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
								<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
							  </svg>
							</div><!-- site-close -->       
						</div>
						<div class="site-scroll">
							<div class="filter-sidebar-body">
								<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'shop-sidebar' ); ?>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div class="mobile-filter-overlay"></div>
				</div>
			<?php } else { ?>
				<div class="row shop-wrapper content-wrapper sidebar-left">
					<div class="col col-12 col-lg-12 primary-column">
						<?php do_action('klb_before_products'); ?>
						
						<?php
						if ( woocommerce_product_loop() ) {
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					
					</div>
					
					<div id="sidebar" class="col col-12 col-lg-3 sidebar-column filtered-sidebar sticky">
						<div class="filter-sidebar-header">
							<h3 class="entry-title"><?php esc_html_e('Filter Products','blonwe'); ?></h3>
							<div class="site-close">
							  <svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
								<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
							  </svg>
							</div><!-- site-close -->       
						</div>
						<div class="site-scroll">
							<div class="filter-sidebar-body">
								<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'shop-sidebar' ); ?>
								<?php } ?>
							</div>
						</div>
					</div>
		
					<div class="mobile-filter-overlay"></div>
					
				</div>
			<?php } ?>
		<?php } ?>
			
		<?php

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php blonwe_do_action( 'blonwe_after_main_shop'); ?>
	</div>

	<?php
		if ( ! blonwe_is_pjax() ) {
			get_footer( 'shop' );
		}
}
