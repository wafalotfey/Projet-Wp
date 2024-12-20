<?php
function blonwe_home_slider11($settings){
	
	if ( $settings['slider_items'] ) {
		
		echo '<div class="klb-module module-slider">';
		echo '<div class="module-body klb-slider-wrapper">';
		echo '<div class="klb-loader-wrapper">';
		echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
		echo '</div>';   
		echo '<div class="klb-slider slider-style slider-spaced arrows-center arrows-style-2 arrows-white-border hidden-arrows dots-style-1" data-items="1" data-mobileitems="1" data-tabletitems="1" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true">';
		
		foreach ( $settings['slider_items'] as $item ) {	
			$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';	
		
			$colortype= '';
			
			if($item['slider_text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			echo '<div class="slider-item">';
			echo '<div class="klb-banner for-slider inner-style '.esc_attr($colortype).' align-center space-60 w-60">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle badge background-red">'.esc_html($item['slider_subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title weight-700 font-md-60">'.blonwe_sanitize_data($item['slider_title']).'</h2>';
			echo '<div class="entry-excerpt font-md-18 weight-300 not-opacity large">';
			echo '<p>'.blonwe_sanitize_data($item['slider_desc']).'</p>';
			echo '</div>';
			echo '</div>';
			if($item['slider_btn_title']){	
				echo '<div class="entry-footer">';
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" class="btn primary radius-rounded icon-right" '.esc_attr($target.$nofollow).'>'.esc_html($item['slider_btn_title']).'  <i class="klb-icon-right-arrow-large"></i></a>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			
			if($item['slider_video']['url']){
				echo '<video autoplay playsinline loop muted src="'.esc_url($item['slider_video']['url']).'"></video>';	
			} else {
				echo '<img src="'.esc_url($item['slider_image']['url']).'" data-sizes="auto" />';
			}
			
			echo '</div>';
			echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			echo '</div>';
        }
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}  
}