<?php
if ( ! function_exists( 'blonwe_top_notification1' ) ) {
	function blonwe_top_notification1(){
		$topnotification1 = get_theme_mod('blonwe_top_notification1_toggle','0'); 
		if($topnotification1 == '1'){ ?>
			
			<div class="header-notify link-filled">
				<i class="<?php echo esc_attr(get_theme_mod('blonwe_top_notification1_icon')); ?>"></i>
				<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_top_notification1_content')); ?></p>
			</div><!-- header-notify -->
			
		<?php  }
	}
}