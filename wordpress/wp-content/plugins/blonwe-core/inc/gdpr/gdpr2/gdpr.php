<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_gdpr_scripts() {
	wp_register_style( 'klb-gdpr',   plugins_url( 'css/gdpr.css', __FILE__ ), false, '1.0');
	wp_register_script( 'klb-gdpr',  plugins_url( 'js/gdpr.js', __FILE__ ), true );

}
add_action( 'wp_enqueue_scripts', 'blonwe_gdpr_scripts' );

/*************************************************
## GDPR COOKIE
*************************************************/ 
function blonwe_gdpr_cookie(){	
	$gdpr  = isset( $_COOKIE['cookie-popup-visible'] ) ? $_COOKIE['cookie-popup-visible'] : 'enable';
	if($gdpr){
		return $gdpr;
	}
}

/*************************************************
## GDPR WP_Footer
*************************************************/ 

add_action('wp_footer', 'blonwe_gdpr_filter'); 
function blonwe_gdpr_filter() { 

	if ( ! apply_filters( 'blonwe_gdpr_filter', true ) ) {
		return;
	}

	if(get_theme_mod('blonwe_gdpr_toggle',0) == 1 && blonwe_gdpr_cookie() == 'enable'){
		wp_enqueue_script('jquery-cookie');
		wp_enqueue_script('klb-gdpr');
		wp_enqueue_style('klb-gdpr');
		?>
		
		<div class="site-gdpr mobile-menu-active" data-expires="<?php echo esc_attr(get_theme_mod('blonwe_gdpr_expire_date')); ?>">
			<div class="gdpr-inner">
				<?php echo blonwe_sanitize_data(get_theme_mod('blonwe_gdpr_text')); ?>
				<div class="gdpr-button">
					<a href="#" class="btn danger"><?php echo esc_html(get_theme_mod('blonwe_gdpr_button_text')); ?></a>
				</div><!-- gdpr-button -->
			</div><!-- gdpr-inner -->
		</div>
		
		<?php
	}
}