<?php

namespace Elementor;

class Blonwe_Image_Points_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-image-points';
    }
    public function get_title() {
        return esc_html__('Image Points (K)', 'blonwe-core');
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

		$defaultimage = plugins_url( 'images/glasses-product-tick.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Premium Blue Light Glasses',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
	
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Etiam eget faucibus turpis, sit amet viverras eros. Maecenas eget vehicula nisl. Quisque imperdiet iaculis dignissim. In hac habitasse platea dictumst.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'point_position_left',
			[
				'label' => esc_html__( 'Point Position Left', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 61,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$repeater->add_control(
			'point_position_top',
			[
				'label' => esc_html__( 'Point Position Top', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 57,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
        $repeater->add_control( 'point_title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Transparent Lens',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$repeater->add_control( 'point_title_position',
			[
				'label' => esc_html__( 'Point Title Position', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'top'	  => esc_html__( 'Top', 'blonwe-core' ),
					'bottom'  => esc_html__( 'Bottom', 'blonwe-core' ),
					'left'	  => esc_html__( 'Left', 'blonwe-core' ),
					'right'	  => esc_html__( 'Right', 'blonwe-core' ),
				],
			]
		);
		
		
        $this->add_control( 'image_point_items',
            [
                'label' => esc_html__( 'Points', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'point_position_left' => '61%',
						'point_position_top' => '57%',
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
		
		$this->add_responsive_control( 'custom_title_text_alignment',
            [
                'label' => esc_html__( 'Alignment Text', 'blonwe-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .text-block, {{WRAPPER}} klb-text-block' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'blonwe-core' ),
                        'icon' => 'eicon-text-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'blonwe-core' ),
                        'icon' => 'eicon-text-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'blonwe-core' ),
                        'icon' => 'eicon-text-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'title_size',
            [
                'label' => esc_html__( 'Title Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-title' => 'font-size: {{SIZE}}px !important;' ],
            ]
        );
		
		$this->add_responsive_control( 'title_weight',
            [
                'label' => esc_html__( 'Title Weight', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-title' => 'font-weight: {{SIZE}} !important;' ],
            ]
        );
		
		$this->add_control( 'title_color',
			[
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-title:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-title',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_responsive_control( 'subtitle_size',
            [
                'label' => esc_html__( 'Subtitle Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-subtitle ' => 'font-size: {{SIZE}}px !important;' ],
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_responsive_control( 'subtitle_weight',
            [
                'label' => esc_html__( 'Subtitle Weight', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-subtitle ' => 'font-weight: {{SIZE}} !important;' ],
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_control( 'subtitle_color',
			[
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}} !important;'],
			   'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
			]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
			[
               'label' => esc_html__( 'Subtitle Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
			]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-subtitle ' => 'opacity: {{VALUE}} ;'],
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle ',
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-subtitle',
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
				
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_responsive_control( 'desc_size',
            [
                'label' => esc_html__( 'Description Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-description p' => 'font-size: {{SIZE}}px !important;' ],
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_responsive_control( 'desc_weight',
            [
                'label' => esc_html__( 'Description Weight', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-description p' => 'font-weight: {{SIZE}} !important;' ],
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_control( 'desc_color',
			[
               'label' => esc_html__( 'Description Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
			]
        );
		
		$this->add_control( 'desc_hvrcolor',
			[
               'label' => esc_html__( 'Description Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-description p:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
			]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-description p ' => 'opacity: {{VALUE}} ;'],
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description p',
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-description p',
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';

		echo '<div class="klb-module product-tick">';
		echo '<div class="module-header default extra-space centered">';
		echo '<div class="module-header-inner">';
		echo '<div class="column order-1 order-sm-1">';
		echo '<h3 class="entry-title default-size font-md-32">'.esc_html($settings['title']).'</h3>';
		echo '</div>';
		echo '</div>';
		echo '<div class="entry-excerpt">';
		echo '<p>'.esc_html($settings['desc']).'</p>';
		echo '</div>';
		echo '</div>';
		
		if ( $settings['image_point_items'] ) {			
			echo '<div class="module-body">';
			echo '<div class="entry-media">';
			
				foreach($settings['image_point_items'] as $point){
					
					$titleposition= '';
					
					if($point['point_title_position'] == 'top'){
						$titleposition .= 'top';
					} elseif($point['point_title_position'] == 'bottom'){
						$titleposition .= 'bottom';
					} elseif($point['point_title_position'] == 'left'){
						$titleposition .= 'left';
					} else {
						$titleposition .= 'right';
					}
			
					echo '<div class="ring elementor-repeater-item-'.esc_attr($point['_id']).'">';
					echo '<div class="ringring"></div>';
					echo '<button class="unset circle" data-bs-toggle="tooltip" data-bs-title="'.esc_attr($point['point_title']).'" data-bs-custom-class="ring-tooltip" data-bs-placement="'.esc_attr($titleposition).'"></button>';
					echo '</div><!-- ring -->';
				}
				
			echo '<img src="'.esc_url($settings['image']['url']).'">';
			echo '</div>';
			echo '</div>';
		}
		echo '</div><!-- product-tick -->';
		
	}

}
