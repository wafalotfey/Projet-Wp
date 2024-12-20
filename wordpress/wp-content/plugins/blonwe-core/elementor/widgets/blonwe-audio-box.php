<?php

namespace Elementor;

class Blonwe_Audio_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-audio-box';
    }
    public function get_title() {
        return esc_html__('Audio Box (K)', 'blonwe-core');
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultbg = plugins_url( 'images/book-custom-image-3.jpg', __DIR__ );
		
		$repeater = new Repeater();
		$repeater->add_control( 'audio',
            [
                'label' => esc_html__( 'Audio', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
				'media_type' => 'video',
            ]
        );
		
		$repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
		$repeater->add_control( 'title',
            [
                'label' => esc_html__( 'Item Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Atomic Habits - An Easy & Proven Way to Build Good Habits & Break Bad Ones',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
		$repeater->add_control( 'audio_time',
            [
                'label' => esc_html__( 'Audio Time', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '03:25',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
		$this->add_control( 'audio_items',
            [
                'label' => esc_html__( 'Audio Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => ['url' => $defaultbg],
                        'title' => 'Atomic Habits - An Easy & Proven Way to Build Good Habits & Break Bad Ones',
                        'audio_time' => '03:25',
                    ],
                    [
                        'image' => ['url' => $defaultbg],
                        'title' => 'Atomic Habits - An Easy & Proven Way to Build Good Habits & Break Bad Ones',
						'audio_time' => '01:25',
                    ],
					[
                        'image' => ['url' => $defaultbg],
                        'title' => 'Atomic Habits - An Easy & Proven Way to Build Good Habits & Break Bad Ones',
                        'audio_time' => '03:25',
                    ],
					[
                        'image' => ['url' => $defaultbg],
                        'title' => 'Atomic Habits - An Easy & Proven Way to Build Good Habits & Break Bad Ones',
                        'audio_time' => '01:25',
                    ],
                ]
            ]
        );
        
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		wp_enqueue_style( 'mediaelementplayer');
		wp_enqueue_script( 'mediaelement-and-player');
		
		echo '<div class="audio-content klb-audio-player playlist">';
		
		$count = 1;
		
		foreach ( $settings['audio_items'] as $item ) {
			if($count == 1){
				echo '<audio src="'.esc_url($item['audio']['url']).'" class="klb-player white"></audio>';
			}
			
			$count++;
		}
		
		echo '<div class="audio-playlist">';
		echo '<ul>';
		
		foreach ( $settings['audio_items'] as $item ) {
			
			echo '<li data-audio="'.esc_url($item['audio']['url']).'">';
			echo '<div class="audio-cover">';
			echo '<img src="'.esc_url($item['image']['url']).'">';
			echo '</div>';
			echo '<div class="audio-detail">';
			echo '<h3 class="audio-title">'.esc_html($item['title']).'</h3>';
			echo '<span class="audio-time">'.esc_html($item['audio_time']).'</span>';
			echo '</div>';
			echo '</li>';
			
		}
		
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		
	}

}
