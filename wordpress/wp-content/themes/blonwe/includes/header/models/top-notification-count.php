<div class="klb-count-notification top-notification font-13 min-992" style="background-image: url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_top_notification_count_date_image' )) ); ?>">
	<div class="container">
		<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_top_notification_count_text')); ?></p>
		<div class="klb-countdown-wrapper">
			<div class="klb-countdown filled radius" data-date="<?php echo esc_attr(get_theme_mod('blonwe_top_notification_count_date')); ?>" data-text="<?php esc_attr_e('Expired', 'blonwe'); ?>">
			  <div class="count-item">
				<div class="count days"><?php esc_html_e('00', 'blonwe'); ?></div>
				<div class="count-label"><?php esc_html_e('d', 'blonwe'); ?></div>
			  </div>
			  <span>:</span>
			  <div class="count-item">
				<div class="count hours"><?php esc_html_e('00', 'blonwe'); ?></div>
				<div class="count-label"><?php esc_html_e('h', 'blonwe'); ?></div>
			  </div>
			  <span>:</span>
			  <div class="count-item">
				<div class="count minutes"><?php esc_html_e('00', 'blonwe'); ?></div>
				<div class="count-label"><?php esc_html_e('m', 'blonwe'); ?></div>
			  </div>
			  <span>:</span>
			  <div class="count-item">
				<div class="count second"><?php esc_html_e('00', 'blonwe'); ?></div>
				<div class="count-label"><?php esc_html_e('s', 'blonwe'); ?></div>
			  </div>
			</div>
		</div>
	</div>
</div>
