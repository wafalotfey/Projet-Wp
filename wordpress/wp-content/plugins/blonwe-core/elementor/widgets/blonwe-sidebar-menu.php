<?php

namespace Elementor;

class Blonwe_Sidebar_Menu_Widget extends Widget_Base {
	
    public function get_name() {
        return 'blonwe-sidebar-menu';
    }
    public function get_title() {
        return esc_html__('Sidebar Menu (K)', 'blonwe-core');
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'blonwe' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'blonwe-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';

		$output .= '<div class="klb-categories-list">';
			ob_start();
				wp_nav_menu(array(
				'theme_location' => 'sidebar-menu',
				'container' => '',
				'fallback_cb' => 'show_top_menu',
				'menu_id' => 'category-menu',
				'menu_class' => '',
				'echo' => true,
				"walker" => '',
				'depth' => 0 
				));
			$output .= ob_get_clean();
		$output .= '</div>';

		echo $output;
	}

}
