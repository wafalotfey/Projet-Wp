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
		
		  <div id="newsletter-popup" class="klb-site-newsletter" style="opacity:0;" data-expires="<?php echo esc_attr(get_theme_mod('blonwe_newsletter_popup_expire_date')); ?>">
			<div class="newsletter-wrapper">
			<?php if (get_theme_mod( 'blonwe_newsletter_image' )) { ?>
				<div class="newsletter-image">
					<img src="<?php echo plugins_url( 'img/colored-border.png', __FILE__ ); ?>" class="colored-border">
					<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_newsletter_image' )) ); ?>">
				</div>
			<?php } ?>
			  <div class="newsletter-inner">

				<div class="newsletter-close">
				  <svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
					<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
				  </svg>
				</div><!-- newsletter-close -->

				<h5 class="entry-title"><?php echo esc_html(get_theme_mod('blonwe_newsletter_popup_title')); ?></h5>

				<div class="entry-desc">
				  <p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_newsletter_popup_subtitle')); ?></p>
				</div><!-- entry-desc -->

				<div class="klb-site-newsletter-form">
					<?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('blonwe_newsletter_popup_formid').'"]'); ?>
				</div>
				
				<p>
					<label class="form-checkbox privacy_policy">
						<input type="checkbox" name="dontshow" class="dontshow" value="1">
						<span><?php esc_html_e('Don\'t show this popup again.','blonwe-core'); ?></span>
					</label>
				</p>


			  </div><!-- newsletter-inner -->
			  <div class="newsletter-popup-overlay"></div>
			</div><!-- newsletter-wrapper -->
			
		  </div><!-- klb-site-newsletter -->

		<?php
	}
}