<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_newsletter_scripts() {
	wp_register_style( 'klb-newsletter',   plugins_url( 'css/newsletter.css', __FILE__ ), false, '1.0');
	wp_register_script( 'klb-newsletter',  plugins_url( 'js/newsletter.js', __FILE__ ), true );

}
add_action( 'wp_enqueue_scripts', 'blonwe_newsletter_scripts' );

add_action('wp_footer', 'blonwe_newsletter_filter'); 
function blonwe_newsletter_filter() { 

	if ( ! apply_filters( 'blonwe_newsletter_filter', true ) ) {
		return;
	}

	if(get_theme_mod('blonwe_newsletter_popup_toggle',0) == 1){
		wp_enqueue_script('jquery-cookie');
		wp_enqueue_script('klb-newsletter');
		wp_enqueue_style('klb-newsletter');

		$newsletter  = isset( $_COOKIE['newsletter-popup-visible'] ) ? $_COOKIE['newsletter-popup-visible'] : 'hide';
		
		if($newsletter == 'disable'){
			return;
		}

		?>
		
		<div id="newsletter-popup" class="klb-newsletter-popup" data-expires="<?php echo esc_attr(get_theme_mod('blonwe_newsletter_popup_expire_date')); ?>">
			<div class="newsletter-inner">
				<?php if (get_theme_mod( 'blonwe_newsletter_image' )) { ?>
					<div class="column image">
					  <div class="newsletter-image entry-media">
						<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_newsletter_image' )) ); ?>">
					  </div><!-- entry-media -->
					</div><!-- column -->
				<?php } ?>	
				<div class="column content">
					<div class="content-wrapper">
						<div class="newsletter-close">
						  <svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
							<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
						  </svg>
						</div><!-- newsletter-close -->
							
						<div class="newsletter-header">
						  <h3 class="entry-title"><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_newsletter_popup_title')); ?></h3>
						  <div class="entry-description">
							<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_newsletter_popup_subtitle')); ?></p>
						  </div><!-- entry-description -->
						</div><!-- newsletter-header -->
						<?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('blonwe_newsletter_popup_formid').'"]'); ?>
						
						<div class="button-row">
						  <a href="#" class="close-popup-button"><?php esc_html_e('No Thanks','blonwe-core'); ?></a>
						</div>
					</div><!-- content-wrapper -->
				</div><!-- column -->
			</div><!-- newsletter-inner -->
			<div class="newsletter-mask"></div>
		</div>

		<?php
	}
}