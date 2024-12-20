<?php 
wp_enqueue_script( 'theia-sticky-sidebar');
wp_enqueue_script( 'blonwe-stickysidebar');
wp_enqueue_script( 'blonwe-sidebarfilter');
?>

<div id="dokan-secondary" class="dokan-store-sidebar" role="complementary">
    <?php if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_appearance', 'off' ) === 'off' ) { ?>

        <div class="dokan-widget-area widget-collapse">
			<div id="sidebar" class="sidebar-column filtered-sidebar sticky">
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
		
						<?php do_action( 'dokan_sidebar_store_before', $store_user->data, $store_info ); ?>
						<?php
						if ( ! dynamic_sidebar( 'sidebar-store' ) ) {
							$args = [
								'before_widget' => '<aside class="widget dokan-store-widget %s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>',
							];

							dokan_store_category_widget();

							if ( ! empty( $map_location ) ) {
								dokan_store_location_widget();
							}

							dokan_store_time_widget();
							dokan_store_contact_widget();
						}
						?>

						<?php do_action( 'dokan_sidebar_store_after', $store_user->data, $store_info ); ?>
						
			
					</div>
				</div>
			</div>
			
			<div class="mobile-filter-overlay"></div>
        </div>

    <?php } else { ?>
        <?php get_sidebar( 'store' ); ?>
    <?php } ?>

</div><!-- #secondary .widget-area -->
