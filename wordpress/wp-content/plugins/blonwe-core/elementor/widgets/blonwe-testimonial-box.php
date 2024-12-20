<?php

namespace Elementor;

class Blonwe_Testimonial_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-testimonial-box';
    }
    public function get_title() {
        return esc_html__('Testimonial Box (K)', 'blonwe-core');
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
		
		$this->add_control( 'rating_text',
            [
                'label' => esc_html__( 'Rating Text', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '4.5 (10.000+) Rating',
                'description'=> 'Add a rating text.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'comment',
            [
                'label' => esc_html__( 'Comment', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
                'description'=> 'Add a comment.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'name',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Petra van der Meer',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );


		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		
		echo '<div class="klb-comment-text">';
		echo '<div class="entry-rating">';
		echo '<div class="stars">';
		echo '<i class="klb-icon-star"></i>';
		echo '<i class="klb-icon-star"></i>';
		echo '<i class="klb-icon-star"></i>';
		echo '<i class="klb-icon-star"></i>';
		echo '<i class="klb-icon-star"></i>';
		echo '</div><!-- stars -->';
		echo '<span>'.esc_html($settings['rating_text']).'</span>';
		echo '</div><!-- entry-rating -->';
		echo '<div class="entry-comment color-dark-gray">';
		echo '<p>'.blonwe_sanitize_data($settings['comment']).'</p>';
		echo '</div><!-- entry-comment -->';
		echo '<h4 class="enty-author">'.esc_html($settings['name']).'</h4>';
		echo '</div>';
		
	}

}
