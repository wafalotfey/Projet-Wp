<?php
/*************************************************
* Mobile Filter
*************************************************/
add_action('wp_footer', 'blonwe_mobile_filter'); 
function blonwe_mobile_filter() { 

	$mobilebottommenu = get_theme_mod('blonwe_mobile_bottom_menu','0');
	if($mobilebottommenu == '1'){

?>

	<?php $edittoggle = get_theme_mod('blonwe_mobile_bottom_menu_edit_toggle','0'); ?>
	<?php if($edittoggle == '1'){ ?>
		<div class="klb-mobile-bottom hide-desktop">
			<nav class="mobile-menu">
				<ul>
					<?php $editrepeater = get_theme_mod('blonwe_mobile_bottom_menu_edit'); ?>
					
					<?php foreach($editrepeater as $e){ ?>
						<?php if($e['mobile_menu_type'] == 'filter'){ ?>
							<?php if(is_shop()){ ?>
								<li>
									<a href="#" class="filter-button">
										<i class="klb-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
										<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
									</a>
								</li>
							<?php } ?>
						<?php } elseif($e['mobile_menu_type'] == 'search'){ ?>
							<li>
								<a href="#" class="search">
									<i class="klb-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
								</a>
							</li>
						<?php } elseif($e['mobile_menu_type'] == 'category'){ ?>
							<?php if(!is_shop()){ ?>
							<li>
								<a href="#" class="categories">
									<i class="klb-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
								</a>
							</li>
							<?php } ?>
						<?php } else { ?>
							<li>
								<a href="<?php echo esc_url($e['mobile_menu_url']); ?>" class="user">
									<i class="klb-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
								</a>
							</li>
						<?php } ?>
					<?php } ?>
				
				</ul>
			</nav>
		</div>
	<?php } else { ?>
		<div class="klb-mobile-bottom hide-desktop">
			<nav class="mobile-menu">
				<ul>
					<li>
						<?php if(!is_shop()){ ?>
							<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="store">
								<i class="klb-icon-small-shop-thin"></i>
								<span><?php esc_html_e('Store','blonwe-core'); ?></span>
							</a>
						<?php } else { ?>
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" class="store">
								<i class="klb-icon-home-simple-thin"></i>
								<span><?php esc_html_e('Home','blonwe-core'); ?></span>
							</a>
						<?php } ?>
					</li>

					<?php if(is_shop()){ ?>
						<li>
							<a href="#" class="filter-button">
								<i class="klb-icon-filter-thin"></i>
								<span><?php esc_html_e('Filter', 'blonwe-core'); ?></span>
							</a>
						</li>
					<?php } ?>
					
					<li>
						<a href="#" class="search">
							<i class="klb-icon-search-feather-thin"></i>
							<span><?php esc_html_e('Search','blonwe-core'); ?></span>
						</a>
					</li>
					
					<?php if ( class_exists( 'KlbWishlist' ) ) { ?>	
						<li>
							<a href="<?php echo KlbWishlist::get_url(); ?>" class="wishlist">
								<i class="klb-icon-heart-outline-thin"></i>
								<span><?php esc_html_e('Wishlist','blonwe-core'); ?></span>
							</a>
						</li>
					<?php } ?>
					
					
					<li>
						<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="user">
							<i class="klb-icon-profile-circled-thin"></i>
							<span><?php esc_html_e('Account','blonwe-core'); ?></span>
						</a>
					</li>

					<?php $sidebarmenu = get_theme_mod('blonwe_header_sidebar','0'); ?>
					<?php if($sidebarmenu == '1'){ ?>
						<?php if(!is_shop()){ ?>
							<li>
								<a href="#" class="categories">
									<i class="klb-icon-view-type-list-thin"></i>
									<span><?php esc_html_e('Categories','blonwe-core'); ?></span>
								</a>
							</li>
						<?php } ?>
					<?php } ?>

				</ul>
			</nav><!-- mobile-menu -->
		</div><!-- mobile-bottom-menu -->

	<?php } ?>
	
<?php }

    
}