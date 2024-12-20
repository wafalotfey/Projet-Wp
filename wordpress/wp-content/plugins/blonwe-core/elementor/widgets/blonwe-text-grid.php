<?php

namespace Elementor;

class Blonwe_Text_Grid_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-text-grid';
    }
    public function get_title() {
        return esc_html__('Text Grid (K)', 'blonwe-core');
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
		
		$this->add_control( 'grid_type',
			[
				'label' => esc_html__( 'Text Grid Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
				],
			]
		);

		$defaultimage = plugins_url( 'images/banner-55.jpg', __DIR__ );
		$defaultimage2 = plugins_url( 'images/banner-55.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$this->add_control( 'dark_image',
            [
                'label' => esc_html__( 'Dark Mode Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage2],
				'condition' => ['grid_type' => ['type2']]
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Skincare made with the world finest',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Perfect Skincare',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
				'condition' => ['grid_type' => ['select-type', 'type1']]
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Balance, purify, and heal your skin with Monastery. Ingredients of the highest quality.',
                'description'=> 'Add a description.',
				'label_block' => true,
				'condition' => ['grid_type' => ['select-type', 'type1']]
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		if($settings['grid_type'] == 'type2'){
			echo '<div class="klb-press-comment">  ';   
			echo '<div class="press-box">';
			echo '<div class="press-logo">';
			echo '<img src="'.esc_url($settings['image']['url']).'" class="dark" alt="Allure">';
			echo '<img src="'.esc_url($settings['dark_image']['url']).'" class="light" alt="Allure">';
			echo '</div>';
			echo '<div class="press-comment">';
			echo '<p>'.esc_html($settings['title']).'</p>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link">'.esc_html($settings['btn_title']).'</a>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="klb-banner-box" style="background-color: #f3f2ed;">';
			echo '<div class="column">';
			echo '<div class="banner-box-image">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '</div>';
			echo '<div class="column">';
			echo '<div class="banner-box-content">';
			echo '<div class="text-inner">';
			echo '<h5 class="entry-subtitle">'.esc_html($settings['subtitle']).'</h5>';
			echo '<h2 class="entry-title font-md-56 weight-400">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn black outline">'.esc_html($settings['btn_title']).'</a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';	
		}
	}

}
