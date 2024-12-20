<?php
/*************************************************
## Scripts
*************************************************/
function blonwe_maintenance_scripts() {
	wp_register_style( 'klb-maintenance',    plugins_url( 'css/maintenance.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'blonwe_maintenance_scripts' );

function blonwe_maintenance_mode() {
	if (current_user_can('edit_themes') || is_user_logged_in()) {
		return;
	}
	
	// Disable Newsletter Popup
	add_filter( 'blonwe_newsletter_filter',  '__return_false' );

	// Get Maintenance CSS
	wp_enqueue_style('klb-maintenance');

	// Get WP Head
	wp_head();
	
	echo '<div class="site-coming-soon" style="background-image: url('.esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_maintenance_image' )) ).');">';
	echo '<div class="coming-soon-body">';
	echo '<div class="container">';
	echo '<div class="coming-soon-inner">';
	echo '<h1 class="entry-title font-42 font-md-54 weight-700 mb-20">'.esc_html(get_theme_mod('blonwe_maintenance_title','We Are Coming Soon')).'</h1>';
	echo '<div class="entry-description color-dark-gray font-14 font-md-18 weight-300">';
	echo '<p>'.esc_html(get_theme_mod('blonwe_maintenance_desc','Sed consectetur, dolor ut euismod imperdiet, ipsum massa fringilla odio, non laoreet nunc nisi pulvinar nulla. Maecenas egestas ex et mi viverra, vel vehicula sapien congue. In hac habitasse platea.')).'</p>';
	echo '</div><!-- entry-description -->';
	
	echo '<div class="klb-countdown-wrapper">';
	echo '<div class="klb-countdown" data-date="'.esc_attr(get_theme_mod( 'blonwe_maintenance_date' ) ).'">';
	echo '<div class="count-item">';
	echo '<div class="count days"></div>';
	echo '<div class="count-label">'.esc_html('d','blonwe-core').'</div>';
	echo '</div><!-- count-item -->';
	echo '<span class="sep-h">:</span>';
	echo '<div class="count-item">';
	echo '<div class="count hours"></div>';
	echo '<div class="count-label">'.esc_html('h','blonwe-core').'</div>';
	echo '</div><!-- count-item -->';
	echo '<span class="sep-m">:</span>';
	echo '<div class="count-item">';
	echo '<div class="count minutes"></div>';
	echo '<div class="count-label">'.esc_html('m','blonwe-core').'</div>';
	echo '</div><!-- count-item -->';
	echo '<span class="sep-s">:</span>';
	echo '<div class="count-item">';
	echo '<div class="count second"></div>';
	echo '<div class="count-label">'.esc_html('s','blonwe-core').'</div>';
	echo '</div><!-- count-item -->';
	echo '</div><!-- klb-countdown -->';
	echo '</div><!-- klb-countdown-wrapper -->';
	
	echo '<div class="klb-coming-newsletter">';
	echo '<div class="newsletter-form">';
	echo do_shortcode('[mc4wp_form id="'.get_theme_mod('blonwe_maintenance_mailchimp_formid').'"]');
	echo '</div>';
	echo '</div>';
	echo '</div><!-- coming-soon-inner -->';
	echo '</div><!-- container -->';
	echo '</div><!-- coming-soon-body -->';
	echo '</div><!-- site-coming-soon -->';

	// Get WP Footer
	wp_footer();
	
	wp_die();
	
}
add_action('get_header', 'blonwe_maintenance_mode');