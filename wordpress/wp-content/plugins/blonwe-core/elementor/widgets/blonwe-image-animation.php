<?php

namespace Elementor;

class Blonwe_Image_Animation_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-image-animation';
    }
    public function get_title() {
        return esc_html__('Image Animation (K)', 'blonwe-core');
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

		$defaultimage = plugins_url( 'images/organic-custom-image-5.png', __DIR__ );
		$defaultimage2 = plugins_url( 'images/organic-custom-image-6.png', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$repeater = new Repeater();
		$repeater->add_control( 'animation_image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage2],
            ]
        );
		
		$repeater->add_control(
			'animation_image_left',
			[
				'label' => esc_html__( 'Image Left', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} ' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$repeater->add_control(
			'animation_image_right',
			[
				'label' => esc_html__( 'Image Right', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} ' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$repeater->add_control(
			'animation_image_top',
			[
				'label' => esc_html__( 'Image Top', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$repeater->add_control(
			'animation_image_bottom',
			[
				'label' => esc_html__( 'Image Bottom', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px'
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$repeater->add_control( 'animation_type',
			[
				'label' => esc_html__( 'Animation Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'   => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'   => esc_html__( 'Type 3', 'blonwe-core' ),
				],
			]
		);
		
		$repeater->add_responsive_control( 'width',
            [
                'label' => esc_html__( 'Width', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} {{CURRENT_ITEM}}' => 'width: {{SIZE}}px ;' ],
            ]
        );
		
		$this->add_control( 'animation_image_items',
            [
                'label' => esc_html__( 'Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'animation_image_left' => '-10px',
						'animation_image_right' => '',
						'animation_image_top' => '-50px',
						'animation_image_bottom' => '',
                    ],

                ]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		 /*****   START CONTROLS SECTION   ******/
		$this->start_controls_section('blonwe_styling',
            [
                'label' => esc_html__( ' Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}}  .entry-media img',
			]
		);
		
		$this->add_responsive_control( 'img_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .entry-media img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		echo '<div class="z-2">';
		
		if ( $settings['animation_image_items'] ) {	
			foreach($settings['animation_image_items'] as $item){
				
				$animationtype= '';
					
				if($item['animation_type'] == 'type3'){
					$animationtype .= '';
				} elseif($item['animation_type'] == 'type2'){
					$animationtype .= 'animation-float-bob-x';
				} else {
					$animationtype .= 'animation-float-bob-y';
				}

				echo '<div class="entry-decorative '.esc_attr($animationtype).' elementor-repeater-item-'.esc_attr($item['_id']).'">';
				echo '<img src="'.esc_url($item['animation_image']['url']).'">';
				echo '</div><!-- entry-decorative -->';
			}        
        }   
		
		echo '<div class="entry-media">';
		echo '<img src="'.esc_url($settings['image']['url']).'">';
		echo '</div>';
		echo '</div>';
		
	}

}
