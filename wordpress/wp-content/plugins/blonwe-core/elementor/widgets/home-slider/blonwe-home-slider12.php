<?php
function blonwe_home_slider12($settings){
	
	if ( $settings['slider_items'] ) {
		echo '<div class="custom-background position-relative pt-40 pt-md-100 pb-40 pb-md-110">';
		echo '<div class="klb-slider-wrapper z-2">';
		echo '<div class="klb-loader-wrapper">';
		echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
		echo '</div>';      
		echo '<div class="klb-slider slider-style full-width arrows-center arrows-style-2 arrows-white-shadow hidden-arrows dots-style-1" data-items="1" data-mobileitems="1" data-tabletitems="1" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true">';
		
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
			echo '<div class="klb-banner grid-style image-right full-width '.esc_attr($colortype).' align-center justify-start">';
			echo '<div class="entry-media">';
			if($item['slider_video']['url']){
				echo '<video autoplay playsinline loop muted src="'.esc_url($item['slider_video']['url']).'"></video>';	
			} else {
				echo '<img src="'.esc_url($item['slider_image']['url']).'" data-sizes="auto" />';
			}
			echo '</div>';
			echo '<div class="entry-wrapper mt-10">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle badge background-primary-light rounded-5">'.esc_html($item['slider_subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-60 mb-md-20">'.esc_html($item['slider_title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 max-width-none">';
			echo '<p>'.blonwe_sanitize_data($item['slider_desc']).'</p>';
			echo '</div>';
			echo '</div>';
			if($item['slider_btn_title']){	
				echo '<div class="entry-footer mt-30">';
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" class="btn primary icon-right radius-rounded" '.esc_attr($target.$nofollow).'>'.esc_html($item['slider_btn_title']).'  <i class="klb-icon-right-arrow-large"></i></a>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
		}
		
		echo '</div>';
		echo '</div>';
		echo '<div class="custom-decorative position-absolute z-1" style="bottom: 0; left: 0; color: #FFF;">';
		echo '<svg xmlns="http://www.w3.org/2000/svg" width="2550" height="136.1" viewBox="0 0 2550 136.1" preserveAspectRatio="none">';
		echo '<path fill="currentColor" d="M0,136.1V77.6c39.3-8.8,56.8-10.8,54.4,3.9c14-3.7,20.4,5.1,22.3,9c-0.2-0.6-0.4-1.3-0.6-2.2
                c16.3,7.4,39-14.2,46.5,0.9c-22-3.6,36.7,10,41.2-2.5c15-21,32.6-24.6,56.5-7.1c10-13,57.5-1.9,54.6-14.2
                c15.6,2.4,45.1-0.8,93.1-0.5c38.1,7.3,60.6,0.1,92.1,0c17.4,0.8,35-16.6,52.4,0.3c17.4-6.1,36.3,9.7,48.4-8.5
                c4.7,3.7,3.5-8.3,8.9-10.9c13.3,3,51.8-0.2,67.7-3.3c37.7-7.6,75.3-2,113,0c18.6,9.3,37.3,9,55.9,0c24.8-4.3,48.6-17.7,73.3-4
                c22.5-16.8,40.5,12.7,59.4,3.8c10.2,7.4,22.5-13.5,33.5,7.8c22.9-6.2,37.3-7.2,57.5,5.4c12.8,8.8,15.8,20.5,33.6,8.9
                c15.1-11.9,22.6-14.7,34.8,8c6.2,6.5,10.3,12.6,17.8,7.5c17.5-1.7,53.3-0.8,71.5,0c30.1-22.5,60.1-3.2,90.2,0
                c23.1-30.6,46.2-9.7,69.3,0c11.4-7.7,29.6,7.6,40.2,0.5c12.6-19.4,6.5-16.9,17.3-7.3c16.3-9.4,32.2-0.7,52.6-18.2
                c17.8-6.8,31.3-8,50.3-4.8c24.3-0.3,44-0.4,67.5-7.7c19.7-17.4,33.7,6.6,48.2-8c7,8,12.5,2.1,19.8-10.5
                c21.4-26.5,45.1-3.3,73.7-19.3c41-16.4,80,17,120.5,4.3c16.8,9.1,40.4,6.3,55.1,1.7c19.4-10.5,34.4,16.7,52.2,24.4
                c18.7-13.5,35.7-0.3,56.7,8.2c23.7,9.5,29,23.8,44.7,20.3c18.8,25.1,55.2,7.6,81.4,6c38.6-8.4,72.6,23.1,109.7-3.7
                c21.7-0.8,29.7,19.3,49.2-5.4c21.3,1.9,39.1-9.4,55.4-2.9c27.6,6.9,21.6-0.5,35.2,3.7c12.9,4.6,31.8,17.8,45.5,4
                c25.4,11.3,70.9,20.2,68.9,16.3c24,5.4,36.7-12.2,47.2-18.2c-0.1-8.5,4.3-11.1,11.6-11.6v84.3H0z"/>';
		echo '</svg>';                     
		echo '</div>';
		echo '</div>';
		
	}  
}