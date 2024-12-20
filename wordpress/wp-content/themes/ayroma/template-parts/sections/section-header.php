<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif; ?>
<header id="header-section" class="header header-three wow fadeInDown slow">
	<!--===// Start: Header Top
		=================================-->
	<?php $ayroma_hs_hdr_social	= get_theme_mod( 'hs_hdr_social','1');
	if($ayroma_hs_hdr_social=='1'  || is_active_sidebar( 'aromatic-header-above-widget' )):
	?>	
		<div id="top-header" class="header-top d-none d-lg-block">
			<div class="header-widget">
				<div class="container py-4">
					<div class="row align-items-center justify-content-between">
						<div class="col-6 col-xl-5">
							<?php do_action('aromatic_hdr_social2'); ?>
						</div>
						<div class="col-6 col-xl-5 text-right">
							<div class="widget widget-right justify-content-lg-end">
								<?php
									$ayroma_above_widget = 'aromatic-header-above-widget';
									if ( is_active_sidebar( $ayroma_above_widget ) ){ 
											dynamic_sidebar( 'aromatic-header-above-widget' );
									}elseif ( current_user_can( 'edit_theme_options' ) ) {
										$ayroma_sidebar_name = aromatic_get_sidebar_name_by_id( $ayroma_above_widget );
										?>
										<div class="widget widget_none">
											<p>
												<?php if ( is_customize_preview() ) { ?>
													<a href="JavaScript:Void(0);" class="" data-sidebar-id="<?php echo esc_attr( $ayroma_above_widget ); ?>">
												<?php } else { ?>
													<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
												<?php } ?>
													<?php esc_html_e( 'Add widget here.', 'ayroma' ); ?>
												</a>
											</p>
										</div>
										<?php
									} 
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<!--===// End: Header Top
		=================================-->
	<!--===// Start: Header Above
			=================================-->
	<div id="above-header" class="header-above-info d-none d-lg-block">
		<div class="header-widget">
			<div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-2 col-lg-auto">
						<div class="logo justify-content-lg-start">
							<?php do_action('aromatic_logo'); ?>
						</div>
					</div>
					<div class="col-2 col-lg-auto text-center">
						<?php do_action('aromatic_hdr_support'); ?>
					</div>
					<div class="col-4 col-lg-auto text-right">
						<nav class="customer-area">
							<?php do_action('aromatic_hdr_login'); ?>
							<?php do_action('aromatic_hdr_account'); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===// End: Header Above
   =================================-->
	<div class="navigation-middle d-none d-block">
		<div class="container">
			<div class="row navigation-middle-row">
				<div class="col-lg-3 col-12 text-lg-left text-center my-auto mb-lg-auto mb-2">
					<div class="logo">
						<?php do_action('aromatic_logo'); ?>
					</div>
				</div>
				<div class="col-lg-6 col-12 text-center my-auto mb-lg-auto mb-2">
				</div>
				<div class="col-lg-3 col-12 text-lg-right text-center my-auto mb-lg-auto mb-2">
				</div>
			</div>
		</div>
	</div>
	<div class="navigator-wrapper">
		<!--===// Start: Mobile Toggle
	   =================================-->
		<div class="theme-mobile-nav sticky-nav d-block d-lg-none <?php echo esc_attr(aromatic_sticky_menu()); ?>">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="theme-mobile-menu">
							<div class="menu-toggle-wrap">
								<div class="hamburger hamburger-menu">
									<button type="button" class="toggle-lines menu-toggle"
										id="mob-toggle-lines">
										<div class="top-bun"></div>
										<div class="meat"></div>
										<div class="bottom-bun"></div>
									</button>
								</div>
							</div>
							<div class="mobile-logo">
								<div class="logo">
									<?php do_action('aromatic_logo'); ?>
								</div>
							</div>
							<div id="mobile-m" class="mobile-menu">
								<button type="button" class="header-close-menu close-style"></button>
								<?php do_action('aromatic_hdr_mobile_browse_cat')?>
								<?php do_action('aromatic_main_nav'); ?>
							</div>
							<div class="mobile-menu-right">
								<ul class="header-wrap-right">
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===// End: Mobile Toggle
	   =================================-->
		<!--===// Start: Navigation
	   =================================-->
		<div class="nav-area d-lg-block d-none">
			<div class="navbar-area sticky-nav <?php echo esc_attr(aromatic_sticky_menu()); ?>">
				<div class="container overflow-unset">
					<div class="row align-items-center">
						<div class="col-6 col-xl-5">
							<div class="theme-menu">
								<nav class="menubar">
									<?php do_action('aromatic_main_nav'); ?>
								</nav>
							</div>
						</div>
						<div class="col-4 col-xl-5">
							<?php do_action('aromatic_hdr_product_search'); ?>
						</div>
						<div class="col-2">
							<div class="menu-right">
								<div class="main-menu-right">
									<ul class="menu-right-list">
										<?php 
											do_action('aromatic_hdr_cart');
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===// End:  Navigation
	   =================================-->
	</div>
</header>