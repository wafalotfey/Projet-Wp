<aside class="site-drawer color-layout-white">
    <div class="site-scroll">
		<div class="drawer-row drawer-header">
			<div class="site-brand">
				<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
					<?php if (get_theme_mod( 'blonwe_logo' )) { ?>
						<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="dark-logo">
					<?php } elseif (get_theme_mod( 'blonwe_logo_text' )) { ?>
						<span class="brand-text"><?php echo esc_html(get_theme_mod( 'blonwe_logo_text' )); ?></span>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-electronic.png" width="156" height="35" alt="<?php bloginfo("name"); ?>" class="dark-logo">
					<?php } ?>
					
					
					<?php if (get_theme_mod( 'blonwe_logo_white' )) { ?>
						<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_logo_white' )) ); ?>" alt="<?php bloginfo("name"); ?>" class="light-logo">
					<?php } ?> 
				</a>
			</div><!-- site-brand -->
			<div class="site-close">
				<svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
					<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
				</svg>
			</div><!-- site-close -->    
		</div><!-- drawer-row -->
  
		<div class="drawer-row drawer-body">
			<h4 class="drawer-heading"><?php esc_html_e('Main Menu','blonwe'); ?></h4>
			<nav class="klb-menu-nav vertical drawer-menu drawer-primary">
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
			
			<?php $sidebarmenu = get_theme_mod('blonwe_header_sidebar','0'); ?>
				<?php if($sidebarmenu == '1'){ ?>
				<h4 class="drawer-heading"><?php esc_html_e('Browse Categories','blonwe'); ?></h4>
				<nav class="klb-menu-wrapper vertical drawer-menu drawer-category">
					<?php
					wp_nav_menu(array(
					'theme_location' => 'sidebar-menu',
					'container' => '',
					'fallback_cb' => 'show_top_menu',
					'menu_id' => '',
					'menu_class' => 'klb-menu ',
					'echo' => true,
					"walker" => '',
					'depth' => 0 
					));
					?>
				</nav><!-- klb-menu-wrapper -->
			<?php } ?>
			
			<?php $canvasbottommenu = get_theme_mod('blonwe_canvas_bottom_menu','0'); ?>
				<?php if($canvasbottommenu == '1'){ ?>
				<h4 class="drawer-heading"><?php echo esc_html(get_theme_mod( 'blonwe_canvas_bottom_menu_title' )); ?></h4>
				<nav class="klb-menu-wrapper vertical drawer-menu drawer-secondary">
				  <?php 
						 wp_nav_menu(array(
						 'theme_location' => 'canvas-bottom',
						 'container' => '',
						 'fallback_cb' => 'show_top_menu',
						 'menu_id' => '',
						 'menu_class' => 'klb-menu',
						 'echo' => true,
						 'depth' => 0 
						)); 
					?>
				</nav><!-- klb-menu-wrapper -->
			<?php } ?>
		
			<?php $menucontactbox = get_theme_mod('blonwe_canvas_menu_contact_box'); ?>
			<?php if($menucontactbox){ ?>
					<h4 class="drawer-heading"><?php echo esc_html(get_theme_mod( 'blonwe_canvas_menu_contact_title' )); ?></h4>
					<div class="drawer-contact">
					
					<?php foreach($menucontactbox as $contactbox){ ?>
						<div class="contact-item">
							<div class="contact-header">
							  <i class="<?php echo esc_attr($contactbox['menu_contact_box_icon']); ?>"></i>
							  <h4 class="contact-title"><?php echo blonwe_sanitize_data($contactbox['menu_contact_box_title']); ?></h4>
							</div><!-- contact-header -->
							<div class="contact-description">
							  <p><?php echo esc_html($contactbox['menu_contact_box_subtitle']); ?></p>
							</div><!-- contact-description -->
						</div><!-- contact-item -->
					<?php } ?> 
					
					</div><!-- drawer-contact -->
			<?php } ?>
			
		</div><!-- drawer-row -->
			
		<div class="drawer-row drawer-footer">
			<div class="site-copyright">
			  <?php if(get_theme_mod( 'blonwe_copyright' )){ ?>
					<p><?php echo blonwe_sanitize_data(get_theme_mod( 'blonwe_copyright' )); ?></p>
				<?php } else { ?>
					<p><?php esc_html_e('Copyright 2021.KlbTheme . All rights reserved','blonwe'); ?></p>
				<?php } ?>
			</div><!-- site-copyright -->    
		</div><!-- drawer-row -->
  
    </div><!-- site-scroll -->
</aside><!-- site-drawer --> 
  
