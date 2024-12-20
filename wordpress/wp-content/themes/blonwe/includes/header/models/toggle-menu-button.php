<?php

if ( ! function_exists( 'blonwe_toggle_menu_button' ) ) {
	function blonwe_toggle_menu_button($buttonclass = ''){
		$togglemenubutton = get_theme_mod('blonwe_toggle_menu_button','0');
		if($togglemenubutton == 1){
		?>	
			<div class="header-action toggle-button custom-toggle <?php echo esc_attr($buttonclass); ?>">
			  <a href="#" class="action-link">
				<div class="action-icon">
				  <i class="klb-icon-menu"></i>
				</div><!-- action-icon -->
				<div class="action-text">
				  <p><?php esc_html_e('Menu','blonwe'); ?></p>
				</div><!-- action-text -->
			  </a>
			</div><!-- custom-toggle -->
	
	<?php  }
	}
}
