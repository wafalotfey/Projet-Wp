<?php

function blonwe_home_slider2($settings){
	
	if ( $settings['slider_items'] ) {
		
		echo '<div class="klb-module module-slider">';
		echo '<div class="module-body klb-slider-wrapper">';
		echo '<div class="klb-loader-wrapper">';
		echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
		echo '</div>';  
		echo '<div class="klb-slider slider-style slider-spaced arrows-center arrows-style-1 arrows-white-border hidden-arrows dots-style-1" data-items="1" data-mobileitems="1" data-tabletitems="1" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true">';
			  
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
				echo '<div class="klb-banner for-slider inner-style '.esc_attr($colortype).' align-start justify-start space-60 w-60 custom-height" style="height: 680px">';
				echo '<div class="entry-wrapper">';
				echo '<div class="entry-inner">';
				echo '<div class="entry-heading">';
				echo '<h4 class="entry-subtitle">'.esc_html($item['slider_subtitle']).'</h4>';
				if($item['slider_offer']){
					echo '<div class="entry-discount background-red">'.esc_html($item['slider_offer']).'</div>';
				}
				echo '</div>';
				echo '<div class="entry-body">';
				echo '<h2 class="entry-title font-md-50 weight-500">'.esc_html($item['slider_title']).'</h2>';
				echo '<div class="entry-excerpt font-md-16 weight-300">';
				echo '<p>'.esc_html($item['slider_desc']).'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="entry-footer">';
				if($item['slider_btn_title']){
					echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn blue icon-right radius-rounded">'.esc_html($item['slider_btn_title']).'  <i class="klb-icon-right-arrow-large"></i></a>';
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '<div class="entry-media">';
				
				if($item['slider_video']['url']){
					echo '<video autoplay playsinline loop muted src="'.esc_url($item['slider_video']['url']).'"></video>';
					
				} else {
					echo '<img src="'.esc_url($item['slider_image']['url']).'" data-sizes="auto" />';
				}
				
				echo '</div>';
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" class="overlay-link"></a>';
				echo '</div>';
				echo '</div>';
			}
			
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	
}	

