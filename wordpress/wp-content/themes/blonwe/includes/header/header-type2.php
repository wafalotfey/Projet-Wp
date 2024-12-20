<?php if( blonwe_page_settings( 'header_transparent' ) == 'yes') { ?>	
	<?php $headertransparent = 'header-transparent-desktop'; ?>
<?php } else { ?>
	<?php $headertransparent = ''; ?>
<?php } ?>

<header id="masthead" class="site-header <?php echo esc_attr($headertransparent); ?> header-type2">
	<div class="header-desktop min-1200">
	
		<div class="header-row header-topbar color-scheme-light color-layout-custom dark-blue bordered-bottom border-light-15">
			<div class="container">
				<div class="header-inner d-flex">
				
					<div class="col d-inline-flex align-items-center col-auto">
						<?php if(get_theme_mod('blonwe_top_left_menu','0') == 1){ ?>
							<nav class="klb-menu-nav horizontal color-scheme-white border-gray sub-shadow-md triangle-enable">
							<?php 
								wp_nav_menu(array(
								'theme_location' => 'top-left-menu',
								'container' => '',
								'fallback_cb' => 'show_top_menu',
								'menu_id' => '',
								'menu_class' => 'klb-menu',
								'echo' => true,
								"walker" => '',
								'depth' => 0 
								));
							?>
						</nav><!-- klb-menu-nav -->
						<?php } ?>
					</div><!-- col -->
					
					<div class="col d-inline-flex align-items-center justify-content-end">
					
						<?php blonwe_top_notification1(); ?>
						
						<?php if(get_theme_mod('blonwe_top_right_menu','0') == 1){ ?>
							<nav class="klb-menu-nav horizontal color-scheme-white border-gray sub-shadow-md triangle-enable">
								<?php 
									wp_nav_menu(array(
									'theme_location' => 'top-right-menu',
									'container' => '',
									'fallback_cb' => 'show_top_menu',
									'menu_id' => '',
									'menu_class' => 'klb-menu',
									'echo' => true,
									"walker" => '',
									'depth' => 0 
									));
								?>
							</nav><!-- klb-menu-nav -->
						<?php } ?>
						
						<?php if(get_theme_mod('blonwe_dark_theme_toggle','0') == 1){ ?>
							<div class="theme-toggle">
								<a href="#" class="theme-mode-toggle">
									<div class="toggle-icon header-light-background"><i class="klb-icon-sun-light"></i></div>
									<div class="toggle-text">
									  <span class="dark-theme"><?php esc_html_e('Dark Theme','blonwe'); ?></span>
									  <span class="light-theme"><?php esc_html_e('Light Theme','blonwe'); ?></span>
									</div><!-- toggle-text -->
								</a>
							</div><!-- theme-toggle -->
						<?php } ?>
						
					</div><!-- col -->
					
				</div><!-- header-inner -->
			</div><!-- container -->
		</div><!-- header-row -->
	
		<div class="header-row header-main color-scheme-light color-layout-custom dark-blue">
			<div class="container">
				<div class="header-inner d-flex">
			  
					<div class="col d-inline-flex align-items-center col-auto">
						<div class="site-brand">
							<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 
						
							<?php if($elementor_page){ ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<?php if( isset(blonwe_page_settings('logo_light')['url']) && !empty(blonwe_page_settings('logo_light')['url']) ){ ?>
										<img src="<?php echo esc_url( blonwe_page_settings('logo_light')['url'] ); ?>" alt="<?php bloginfo("name"); ?>">
									<?php } elseif (get_theme_mod( 'blonwe_logo_white' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>">
									<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
									<?php } else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic-light.png" width="173" height="44" alt="<?php bloginfo("name"); ?>">
									<?php } ?>
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<?php if (get_theme_mod( 'blonwe_logo_white' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>">
									<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
									<?php } else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic-light.png" width="173" height="44" alt="<?php bloginfo("name"); ?>">
									<?php } ?>
								</a>
							<?php } ?>
						</div><!-- site-brand -->
					</div><!-- col -->
					
					<div class="col d-inline-flex align-items-center center">
					
						<?php if(get_theme_mod('blonwe_location_filter',0) == 1){ ?>
							<div class="header-action location-button row-style bordered">
								<a href="#" class="action-link">
									<div class="action-icon">
									  <i class="klb-ecommerce-icon-location"></i>
									</div>
									<div class="action-text">
										<span><?php esc_html_e('Deliver to','blonwe'); ?></span>
										<?php if(blonwe_location() == 'all'){ ?>
											<p><?php esc_html_e('Select Location','blonwe'); ?></p>
										<?php } else { ?>
											<p><?php echo esc_html(blonwe_location()); ?></p>
										<?php } ?>	
										
									</div>
								</a>
							</div>
						<?php } ?>
						
						<?php blonwe_toggle_menu_button(); ?>
						
						<?php blonwe_header_search_input(); ?>
					</div><!-- col -->
					
					<div class="col d-inline-flex align-items-center col-auto">
						<?php blonwe_account_icon(); ?>  
						
						<?php blonwe_wishlist_icon(); ?>

						<?php blonwe_compare_icon(); ?> 						
						
						<?php blonwe_cart_icon(); ?>         
					</div><!-- col -->
	
				</div><!-- header-inner -->
			</div><!-- container -->
			<?php if(get_theme_mod('blonwe_header_main_decorator','0') == 1){ ?>
				<div class="header-decorator">
					<svg version="1.1" id="decorator" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 669 3" preserveAspectRatio="none">
					  <style type="text/css">
						#decorator {width: 100%; height: 4px;}
					  </style>
					  <path fill="currentColor" d="M669,0l0,2.1c-0.1,0-0.3,0-0.4,0c-1.2,0-2.4,0.1-3.6,0.1c-1.2,0-2.3,0-3.5-0.1c-0.4,0-0.8,0-1.2,0
						c0,0-0.1,0-0.1,0C660,2,660,2,660,2c-1.3,0.3-2.8,0.2-4.3,0.2c-0.8,0-1.7-0.1-2.5,0c-2.8-0.3-5.6-0.2-8.2,0h-0.1l-0.3,0
						c-1.4,0.1-3,0.1-4.1-0.1c-2-0.3-4-0.2-5.9-0.1c-0.3,0-0.6,0-0.9,0.1c-1.1,0.1-2.2,0.1-3.2,0.2c-1,0-2.1,0.1-3.1,0.2
						c-2.4,0.1-4.6-0.1-6.9-0.3c-0.4,0-0.7-0.1-1.1-0.1c-1.2-0.2-2.5-0.3-3.8,0c-1.6-0.3-3-0.2-4.4,0.3c-0.1,0-0.3-0.1-0.4-0.2
						C610.5,2,610.3,2,610.1,2c-2.4-0.1-4.8-0.2-7.1-0.1c-0.6,0-1.2,0.1-1.7,0.2c-0.6,0.1-1.2,0.2-1.8,0.2c-0.7,0-1.4-0.1-2.1-0.2
						c-0.5-0.1-1-0.2-1.6-0.2c-0.4,0-0.8,0.1-1.4,0.2c-0.3,0-0.6,0.1-1,0.2c-0.5-0.2-1.1-0.3-1.7-0.5c-0.5-0.2-1.1-0.3-1.7-0.5
						c-0.7,0.2-0.5,0.5-0.3,0.7c0.3,0.3,0.6,0.7-1.2,0.9c0.1,0,0.2,0.1,0.4,0.1l0.4,0.1c1.1,0,2.2,0,3.3,0c1.1,0,2.2,0,3.3,0v0.1
						c-2.6,0-5.2,0.1-7.8,0.1c-0.3,0-0.6-0.1-0.9-0.2c-0.1,0-0.3-0.1-0.4-0.1c0.7,0,1-0.2,0.6-0.3c-0.2-0.1-0.6-0.2-1-0.3
						c-0.2-0.1-0.5-0.1-0.7-0.2c-1,0.4-2.2,0.4-3.4,0.1h0c-3.4-0.6-6.9-0.4-10.6,0c-0.1,0-0.2-0.1-0.3-0.1c-0.5-0.2-1.2-0.5-2.6-0.1
						c-0.4,0.1-1.2,0-2.1,0c-0.5,0-1-0.1-1.5-0.1c-1.3,0-2.6,0-3.9,0c-1.3,0-2.6,0-3.9,0c-0.9,0-1.8-0.1-2.6-0.1c-0.2,0-0.4,0-0.6,0
						c-0.5,0.1-0.7,0.2-0.8,0.4c-0.1,0.2-0.3,0.3-1.1,0.3c-0.7-0.1-1.3-0.3-1.8-0.6c-0.9,0-1.9-0.1-2.9-0.1c0,0.1,0.1,0.2,0.1,0.4
						l0.1,0.2l-0.6,0l-0.6,0c-0.6,0-1.3-0.1-1.9-0.1c0.4-0.1,0.6-0.2,1-0.3c-1.2-0.2-1.9,0-2.6,0.2c-0.1,0-0.2,0.1-0.4,0.1
						c-2-0.2-4.1-0.5-6.1-0.7h-2c-0.8,0.2-1.7,0.5-2.4,0.7c-1.3-0.1-2.5-0.2-3.8-0.4l-1.7-0.2c-0.3,0-0.7,0-1,0.1c-0.6,0-1.2,0.1-1.8,0
						c-2.4-0.2-3.3-0.3-6.1,0c-0.2,0-0.4,0-0.6-0.1c-0.2,0-0.4-0.1-0.5-0.1c-0.3,0-0.6,0.1-0.9,0.1c-0.2,0-0.5,0.1-0.9,0.1l-0.1,0
						c-1.1-0.2-2.5-0.4-4,0.1c-1.3-0.1-2.5-0.1-3.7,0c-0.8,0-1.6,0.1-2.5,0c-0.4,0-0.7,0-1.1,0c-1,0-2-0.1-3,0.1c-0.5,0.1-1,0-1.5-0.1
						c-0.5-0.1-0.9-0.2-1.5-0.1c-1.2,0-2.4,0.1-3.6,0.2c-2.1,0.2-4.2,0.4-6.3,0.1c-2-0.3-3.9-0.2-5.8-0.1c-0.2,0-0.5,0-0.7,0
						c-0.8,0-1.6,0.1-2.5,0.2c-0.4,0-0.8,0.1-1.3,0.1c-0.5-0.2-1-0.4-1.7-0.7c-0.4,0.4-0.8,0.7-1.1,1l-0.8,0.1c-0.6,0.1-1.2,0.1-1.8,0.2
						l-0.6-0.1l-0.6-0.1c-0.1,0-0.2-0.1-0.4-0.1C470,2,469.7,2,469.6,2c-1.6,0.3-2.4,0-3.3-0.6l-0.2,0.2c-0.2,0.2-0.3,0.3-0.3,0.4
						c-0.5,0-0.9,0-1.4,0.1c-1,0-2,0.1-3,0.1c-1.5,0-3-0.2-4.4-0.3c-0.2,0-0.3,0-0.5-0.1c-1.1-0.1-2-0.2-3.3-0.1
						c-0.7,0.1-1.4,0.1-2.2,0.1c-0.7,0-1.5,0-2.3,0c0.5,0.1,1,0.3,1.9,0.5l-4.2,0.1c-0.6-0.6-1.6-1-2.5-0.8c-0.1,0-0.2,0-0.3,0.1l-0.1,0
						l-0.2,0c-0.7,0.1-1.2,0.3,0.1,0.8c-0.4,0-0.9-0.1-1.2-0.1c-0.7-0.1-1.2-0.1-1.2-0.2c0-0.5-0.8-0.5-1.7-0.5c-0.2,0-0.3,0-0.5,0
						c-0.4,0-0.8,0-1.2,0c-1.5-0.1-2.9-0.1-4.4,0.1c-0.4,0.1-0.8,0-1.2,0c-0.2,0-0.4,0-0.7,0c-0.5,0-1,0-1.5-0.1
						c-1.2-0.1-2.3-0.1-3.4,0.2c-0.1,0-0.4,0-0.5,0c-1.6-0.2-3.2-0.2-4.7-0.1c-0.9,0-1.8,0.1-2.7,0.1c-1.1,0-2.1-0.1-3.2-0.2l-0.8-0.1
						c-2.3-0.2-4.3,0-6.1,0.7c-0.7-0.6-1.8-0.9-3.5-0.5c0,0,0.1,0.1,0.1,0.1c0,0.1,0.1,0.1,0.2,0.2c-0.3,0-0.6,0-0.9,0
						c-0.8,0-1.5,0-1.6-0.1c-0.6-0.5-1.3-0.4-2.1-0.2c-0.8,0.1-1.7,0.2-2.5,0.1c-3.5-0.3-3.6-0.3-5.8,0.9c0.1-0.4,0.2-0.6,0.4-1
						c-1.1,0-2.1,0-3.1,0.1c-2.7,0-5.3,0.1-8,0.2c-2.7,0.1-5.4,0.1-8.2,0.1c-1,0-2.1,0-3.1,0c0.2-0.1,0.3-0.2,0.4-0.3
						c0.1-0.1,0.2-0.2,0.4-0.3c-0.1,0-0.2,0-0.3,0c-0.1,0-0.2,0-0.2,0c-0.9,0.5-2.4,0.6-3.9,0.7c-0.3,0-0.6,0-0.8,0.1l0,0
						c-0.2-0.2-0.5-0.4-0.7-0.6c-0.9,0.1-2.8,0.1-4.3,0.1h-0.7c-0.7,0-1.2,0-1.3,0c-1.1-0.1-2.1,0-3.1,0.1c-1.2,0.1-2.4,0.3-3.8,0.1
						c-1.8-0.2-3.7-0.1-5.7,0c-0.4,0-0.7,0-1.1,0.1c-1.5,0.1-3,0-4.7-0.2c-0.9-0.1-1.7-0.1-2.6-0.2c0.4,0.2,0.7,0.4,0.7,0.6
						c-1-0.1-2-0.1-2.9-0.1c-0.1,0-0.2,0-0.3,0s-0.2,0-0.3,0c-0.6,0.1-1.2,0.3-1.7,0.5c-0.5,0.2-2.4,0.2-3.4,0.1c-1.3-0.2-1-0.6-0.1-1.2
						c-0.9,0-1.8,0.1-2.6,0.2c-1.7,0.1-3.3,0.2-4.7,0.2l-0.4,0c-2.2-0.1-4.4-0.3-6.4,0c-1.4,0.2-2.6,0-3.8-0.1c-1-0.1-2-0.2-3.1-0.1
						c-0.2,0-0.8,0-1.5,0h-0.5c-1.5,0-3.4,0-4.3-0.1c-0.1,0.1-0.2,0.2-0.3,0.3c-0.1,0.1-0.2,0.2-0.3,0.3c-0.3,0-0.6,0-0.8-0.1
						c-1.6-0.1-3.1-0.2-3.9-0.7c0,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.3,0c0.1,0.1,0.2,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.4,0.3c-1,0-2,0-2.9,0
						c-2.9,0-5.6,0-8.4-0.1c-2.6-0.1-5.3-0.2-8-0.2c-1,0-2.1,0-3.1-0.1c0.1,0.4,0.2,0.6,0.4,1c-2.2-1.2-2.3-1.2-5.6-0.9l-0.2,0
						c-0.7,0.1-1.4,0-2.1-0.1c-0.2,0-0.3,0-0.5-0.1c-0.8-0.1-1.4-0.2-2,0.2c-0.1,0.1-0.9,0.1-1.6,0.1c-0.3,0-0.6,0-0.9,0
						c0.1-0.1,0.2-0.2,0.2-0.2c0-0.1,0.1-0.1,0.1-0.1c-1.6-0.3-2.7-0.1-3.5,0.5c-1.8-0.7-3.8-0.9-6.1-0.7c-0.5,0-1.1,0.1-1.6,0.1
						c-0.8,0.1-1.6,0.1-2.4,0.2c-0.9,0-1.8,0-2.7-0.1c-1.6-0.1-3.2-0.1-4.7,0.1c-0.1,0-0.4,0-0.5,0c-1.1-0.3-2.3-0.2-3.4-0.2
						c-0.5,0-1,0.1-1.5,0.1c-0.2,0-0.4,0-0.6,0c-0.4,0-0.9,0-1.3,0c-1.5-0.2-2.9-0.1-4.4-0.1c-0.4,0-0.8,0-1.2,0l-0.3,0
						c-0.9,0-1.9,0-1.9,0.6c0,0-0.5,0.1-1.2,0.2c-0.4,0-0.8,0.1-1.2,0.1c1.5-0.6,0.5-0.8-0.2-0.9c-0.1,0-0.2,0-0.3-0.1
						c-0.9-0.2-1.9,0.2-2.5,0.8l-4.2-0.1c0.6-0.2,1-0.3,1.3-0.4l0.6-0.2c-0.8-0.1-1.5,0-2.3,0c-0.8,0-1.6,0-2.3-0.1
						c-1.3-0.1-2.3,0-3.3,0.1c-0.1,0-0.3,0-0.4,0c-1.4,0.2-2.9,0.3-4.4,0.3c-1,0-2,0-3-0.1c-0.4,0-0.9,0-1.4-0.1
						c-0.1-0.1-0.2-0.3-0.5-0.6C200,2,199.2,2.3,197.5,2c-0.1,0-0.3,0-0.5,0.1l-0.2,0.1c-0.1,0-0.2,0.1-0.3,0.1c-0.4,0.1-0.8,0.2-1.2,0.2
						c-0.5-0.1-0.9-0.1-1.4-0.2c-0.4,0-0.8-0.1-1.2-0.1c-0.3-0.3-0.7-0.6-1.1-1c-0.3,0.1-0.5,0.2-0.8,0.3c-0.3,0.1-0.6,0.3-0.9,0.4
						c-0.4,0-0.8-0.1-1.3-0.1c-0.8-0.1-1.6-0.2-2.5-0.2c-0.2,0-0.5,0-0.7,0c-1.9-0.1-3.8-0.2-5.8,0.1c-2.1,0.3-4.2,0.1-6.4-0.1
						c-1.2-0.1-2.4-0.2-3.6-0.2c-0.6,0-1.1,0.1-1.5,0.1c-0.5,0.1-1,0.2-1.5,0.1c-1-0.2-2-0.1-3-0.1c-0.4,0-0.7,0-1.1,0
						c-0.8,0-1.6,0-2.5,0c-1.2,0-2.5-0.1-3.7,0c-1.4-0.5-3-0.3-4-0.1l-0.1,0c-0.2,0-0.4-0.1-0.5-0.1c-0.5-0.1-0.9-0.2-1.2-0.2
						c-0.2,0-0.4,0-0.5,0.1c-0.2,0-0.4,0.1-0.6,0.1c-2.7-0.2-3.7-0.2-6.1,0c-0.5,0.1-1.2,0-1.8,0c-0.3,0-0.7,0-1-0.1
						c-0.6,0.1-1.2,0.1-1.8,0.2c-1.2,0.1-2.4,0.2-3.6,0.4c-0.7-0.2-1.5-0.5-2.4-0.7h-2c-2,0.2-4,0.4-6.1,0.7c-0.1,0-0.3-0.1-0.4-0.1
						c-0.6-0.2-1.4-0.4-2.6-0.2c0.4,0.1,0.6,0.2,1,0.3c-1.1,0.1-2.1,0.1-3.2,0.2l0.1-0.2c0.1-0.1,0.1-0.2,0.1-0.4c-1,0-2,0.1-2.9,0.1
						c-0.4,0.3-1,0.6-1.8,0.6c-0.7,0.1-0.9,0-1-0.2l-0.1-0.1c-0.1-0.1-0.3-0.3-0.8-0.4c-0.2,0-0.5,0-0.7,0c-0.8,0.1-1.6,0.1-2.5,0.1
						c-1.3,0-2.6,0-3.9,0s-2.6,0-3.9,0c-0.5,0-1.1,0.1-1.7,0.1c-0.8,0.1-1.6,0.1-2,0c-1.4-0.4-2-0.1-2.6,0.1c-0.1,0-0.2,0.1-0.3,0.1
						c-3.8-0.4-7.2-0.6-10.6,0h0c-1.2,0.2-2.4,0.3-3.4-0.1C81.3,1.9,81.1,2,80.9,2c-0.4,0.1-0.9,0.2-1.1,0.4c-0.3,0.2-0.1,0.3,0.6,0.3
						c-0.1,0-0.3,0.1-0.4,0.1C79.6,2.9,79.3,3,79,3c-2.6,0-5.2,0-7.8-0.1V2.9l1.6,0l1.6,0c1.1,0,2.2,0,3.3,0l0.4-0.1
						c0.1,0,0.3-0.1,0.4-0.1c-1.7-0.2-1.5-0.5-1.3-0.8l0.1-0.1c0.2-0.3,0.5-0.5-0.3-0.7c-1.3,0.4-2.4,0.8-3.4,1C73.3,2.1,73,2,72.7,2
						c-0.5-0.1-0.9-0.2-1.3-0.1c-0.6,0-1.1,0.1-1.6,0.2c-0.7,0.1-1.3,0.2-2,0.2c-0.6,0-1.2-0.1-1.8-0.2c-0.6-0.1-1.1-0.2-1.7-0.2
						c-2.4,0-4.8,0.1-7.1,0.1c-0.2,0-0.4,0.1-0.6,0.2c-0.1,0.1-0.2,0.1-0.4,0.2c-1.3-0.5-2.8-0.5-4.4-0.3c-1.3-0.3-2.6-0.2-3.8,0
						c-0.4,0.1-0.8,0.1-1.1,0.1c-2.3,0.2-4.5,0.4-6.9,0.3c-1-0.1-2.1-0.1-3.1-0.2c-1.1,0-2.2-0.1-3.2-0.2c-0.3,0-0.6,0-0.9-0.1
						c-1.9-0.1-3.9-0.2-5.9,0.1c-1.2,0.2-2.7,0.1-4.1,0.1l-0.3,0h-0.1c-2.6-0.3-5.4-0.3-8.2,0c-0.9,0-1.8,0-2.6,0C9.9,2.2,8.5,2.3,7.2,2
						c0,0,0,0-0.1,0C7.1,2,7,2,7,2c-0.4,0-0.8,0-1.2,0c-1.2,0-2.3,0.1-3.5,0.1c-0.7,0-1.5,0-2.2-0.1V0H669L669,0z M82.6,1.8
						c0.8,0.1,1.2,0.1,1.6,0.1C83.8,1.7,83.8,1.7,82.6,1.8z M582.1,1.9L582.1,1.9l0.2,0c0.3,0,0.7,0,1.3-0.1
						C582.6,1.7,582.5,1.7,582.1,1.9z M88.8,1h-1.5c0.9,0.5,1.1,0.5,2.3,0C89.3,1,89,1,88.8,1L88.8,1z M579,1h-1.5c-0.3,0-0.5,0-0.7,0
						C578,1.5,578.2,1.5,579,1z M598.9,1.1c-0.4,0-0.7,0-1.1,0c0,0,0,0,0,0.1c0,0,0,0,0,0.1c0.2,0,0.4,0,0.5,0c0.2,0,0.4,0,0.5,0
						C598.9,1.3,598.9,1.2,598.9,1.1C598.9,1.2,598.9,1.2,598.9,1.1L598.9,1.1z M67.4,1.1c0,0,0,0.1,0,0.1c0.2,0,0.4,0,0.5,0
						c0.2,0,0.4,0,0.5,0c0,0,0,0,0-0.1c0,0,0,0,0-0.1c-0.2,0-0.4,0-0.5,0C67.8,1.2,67.6,1.1,67.4,1.1L67.4,1.1z M576.5,1h-3.3
						c-0.4,0-0.8,0.1-1.3,0.1l-0.3,0c0.4,0,0.8,0,1.2,0.1c1.5,0.1,2.8,0.2,3.9-0.2C576.6,1,576.5,1,576.5,1L576.5,1z M93.1,1h-3.3
						c-0.1,0-0.1,0-0.2,0c1.2,0.4,2.4,0.3,3.9,0.2c0.4,0,0.7,0,1.1-0.1l-0.3,0C94,1.1,93.6,1,93.1,1L93.1,1z M351.9,1h-3.6
						C349.5,1.1,350.7,1.1,351.9,1z M318,1h-3.6C315.6,1.1,316.8,1.1,318,1z"/>
					</svg>
				</div><!-- header-decorator -->
			<?php } ?>	
		</div><!-- header-row -->
	
		<div class="header-row header-bottom color-scheme-light color-layout-custom dark-blue">
			<div class="container">
				<div class="header-inner d-flex">
					<div class="col d-inline-flex align-items-center">
					
						<nav class="klb-menu-nav horizontal primary-menu color-scheme-white border-gray sub-shadow-md triangle-enable">
							<?php 
							wp_nav_menu(array(
							'theme_location' => 'main-menu',
							'container' => '',
							'fallback_cb' => 'show_top_menu',
							'menu_id' => '',
							'menu_class' => 'klb-menu',
							'echo' => true,
							"walker" => '',
							'depth' => 0 
							));
							?>   
						</nav><!-- klb-menu-nav -->
						
						<?php blonwe_discount_products(); ?>
						
						<?php if(get_theme_mod('blonwe_help_center_button','0') == 1){ ?>
							<div class="custom-link help-center">
								<a href="<?php echo esc_url(get_theme_mod('blonwe_help_center_url')); ?>" class="help-center-color">
									<i class="<?php echo esc_attr(get_theme_mod('blonwe_help_center_icon')); ?>"></i>
									<span><?php echo esc_html(get_theme_mod('blonwe_help_center_title')); ?></span>
								</a>
							</div><!-- custom-link -->
						<?php } ?>
						
					</div><!-- col -->
				</div><!-- header-inner -->
			</div><!-- container -->
		</div><!-- header-row -->
	
	</div><!-- header-desktop -->
	<div class="header-mobile max-1200">
		<div class="header-row header-mobile-main color-scheme-light color-layout-custom dark-blue">
			<div class="container">
				<div class="header-inner d-flex">
				
					<div class="col d-inline-flex align-items-center col-auto">
						<div class="header-action toggle-button">
							<a href="#" class="action-link">
							  <div class="action-icon">
								<i class="klb-icon-menu"></i>
							  </div><!-- action-icon -->
							</a>
						</div><!-- header-action -->         
					</div><!-- col -->
					
					<div class="col d-inline-flex align-items-center justify-content-center">
						<div class="site-brand">
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
								<?php if (get_theme_mod( 'blonwe_logo_white' )) { ?>
									<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" >
								<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
									<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic-light.png" width="173" height="44" alt="<?php bloginfo("name"); ?>">
								<?php } ?>
							</a>
						</div><!-- site-brand -->
					</div><!-- col -->
					
					<div class="col d-inline-flex align-items-center col-auto">
						<?php blonwe_cart_icon(); ?>      
					</div><!-- col -->
					
				</div><!-- header-inner -->
			</div><!-- container -->
		</div><!-- header-row -->
	</div><!-- header-mobile -->
</header><!-- site-header --> 