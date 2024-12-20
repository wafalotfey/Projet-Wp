<?php if( blonwe_page_settings( 'header_transparent' ) == 'yes') { ?>	
	<?php $headertransparent = 'header-transparent-desktop'; ?>
<?php } else { ?>
	<?php $headertransparent = ''; ?>
<?php } ?>


<header id="masthead" class="site-header <?php echo esc_attr($headertransparent); ?> header-type3">
    <div class="header-desktop min-1200">
	
		<?php if(get_theme_mod('blonwe_top_left_menu','0') == 1 || get_theme_mod('blonwe_top_right_menu','0') == 1 || get_theme_mod('blonwe_dark_theme_toggle','0') == 1){ ?>
			<div class="header-row header-topbar color-scheme-light color-layout-black">
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
		<?php } ?>
		
        <div class="header-row header-main color-scheme-dark color-layout-white bordered-bottom border-theme-10">
			<div class="container">
				<div class="header-inner d-flex">
              
					<div class="col d-inline-flex align-items-center col-auto">
						<div class="site-brand">
						<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 
						
							<?php if($elementor_page){ ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<?php if(isset(blonwe_page_settings('logo')['url']) && !empty(blonwe_page_settings('logo')['url']) ){ ?>
										<img src="<?php echo esc_url( blonwe_page_settings('logo')['url'] ); ?>" alt="<?php bloginfo("name"); ?>">
									<?php } elseif (get_theme_mod( 'blonwe_logo' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="dark-logo">
									<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
									<?php } else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic.png" width="132" height="28" alt="<?php bloginfo("name"); ?>" class="dark-logo">
									<?php } ?>
									
									<?php if( isset(blonwe_page_settings('logo_light')['url']) && !empty(blonwe_page_settings('logo_light')['url']) ){ ?>
										<img src="<?php echo esc_url( blonwe_page_settings('logo_light')['url'] ); ?>" alt="<?php bloginfo("name"); ?>" class="light-logo">
									<?php } elseif (get_theme_mod( 'blonwe_logo_white' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="light-logo">
									<?php } ?>
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<?php if (get_theme_mod( 'blonwe_logo' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="dark-logo">
									<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
									<?php } else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic.png" width="132" height="28" alt="<?php bloginfo("name"); ?>" class="dark-logo">
									<?php } ?>
									
									
									<?php if (get_theme_mod( 'blonwe_logo_white' )) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="light-logo">
									<?php } ?>
								</a>
							<?php } ?>
							
						</div><!-- site-brand -->
					</div><!-- col -->
					<div class="col d-inline-flex align-items-center center">
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
					</div><!-- col -->
					<div class="col d-inline-flex align-items-center col-auto">
						<?php blonwe_header_search_input(); ?>
					
						<?php blonwe_account_icon(); ?>  
						
						<?php blonwe_wishlist_icon(); ?>  
						
						<?php blonwe_compare_icon(); ?> 
						
						<?php blonwe_cart_icon(); ?>         
						
					</div><!-- col -->
					
				</div><!-- header-inner -->
			</div><!-- container -->
        </div><!-- header-row -->
    
    </div><!-- header-desktop -->
    <div class="header-mobile max-1200">
        <div class="header-row header-mobile-main color-scheme-dark color-layout-white bordered-bottom border-theme-10">
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
								<?php if (get_theme_mod( 'blonwe_logo' )) { ?>
									<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="dark-logo">
								<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
									<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic.png" width="132" height="28" alt="<?php bloginfo("name"); ?>" class="dark-logo">
								<?php } ?>
								
								
								<?php if (get_theme_mod( 'blonwe_logo_white' )) { ?>
									<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="light-logo">
								<?php } ?>  
							</a>
						</div><!-- site-brand -->
					</div><!-- col -->
					<div class="col d-inline-flex align-items-center col-auto">
						<?php blonwe_cart_icon(); ?>      
					</div>
				</div>
			</div>
        </div>
    </div>
</header>