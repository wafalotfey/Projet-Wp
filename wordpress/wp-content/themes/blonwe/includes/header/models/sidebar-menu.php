<?php
if ( ! function_exists( 'blonwe_sidebar_menu' ) ) {
	function blonwe_sidebar_menu(){
	?>
		<?php $sidebarmenu = get_theme_mod('blonwe_header_sidebar','0'); ?>
		<?php if($sidebarmenu == '1'){ ?>
		<div class="dropdown-categories dropdown">
			<a href="#" class="dropdown-toggle gray">
				<div class="dropdown-menu-icon">
					<i class="klb-icon-menu-thin"></i>
				</div><!-- dropdown-menu-icon -->
				<span class="dropdown-menu-text"><?php esc_html_e('Browse Categories','blonwe'); ?></span>
			</a>
			
			<?php if(blonwe_page_settings('enable_sidebar_collapse') == 'yes'){ ?>
				<?php $menu_collapse = 'collapse show'; ?>
			<?php } else { ?>
				<?php $menu_collapse = is_front_page() && !get_theme_mod('blonwe_header_sidebar_collapse') ? 'collapse show' : 'collapse'; ?>
			<?php } ?>
			
			<?php if( get_theme_mod( 'blonwe_header_sidebar_type' ) == 'type3') { ?>
				<?php $sidebar_type = 'style-2 primary-border colored-icons'; ?>			
			<?php } elseif( get_theme_mod( 'blonwe_header_sidebar_type' ) == 'type2') { ?>	
				<?php $sidebar_type = 'style-1 colored-icons'; ?>
			<?php } else { ?>
				<?php $sidebar_type = 'style-2'; ?>
			<?php } ?>
			
			<div class="dropdown-menu <?php echo esc_attr($sidebar_type); ?> <?php echo esc_attr($menu_collapse); ?>">
				<?php
				wp_nav_menu(array(
				'theme_location' => 'sidebar-menu',
				'container' => '',
				'fallback_cb' => 'show_top_menu',
				'menu_id' => 'category-menu',
				'menu_class' => '',
				'echo' => true,
				"walker" => '',
				'depth' => 0 
				));
				?>            
			</div><!-- dropdown-menu -->
		</div><!-- dropdown-categories -->
				
				
		<?php  }
	}
}