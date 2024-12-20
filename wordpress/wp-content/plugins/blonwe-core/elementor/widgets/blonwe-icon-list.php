<?php

namespace Elementor;

class Blonwe_Icon_List_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-icon-list';
    }
    public function get_title() {
        return esc_html__('Icon List (K)', 'blonwe-core');
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
		
		$repeater = new Repeater();
		$repeater->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'blonwe-core' ),
				'label_off' => esc_html__( 'No', 'blonwe-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'blonwe-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $repeater->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klb-ecommerce-icon-badge',
                'description'=> 'You can add icon code. for example: fal fa-ship',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );

        $repeater->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'blonwe-core' ),
                'default' => 'Installments Without Card',
            ]
        );
		
        $this->add_control( 'icon_items',
            [
                'label' => esc_html__( 'Icon Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'custom_icon' => 'klb-ecommerce-icon-badge',
                        'desc' => 'Installments Without Card',
                    ],
                    [
						'custom_icon' => 'klb-delivery-icon-box-small-thin',
                        'desc' => 'Free pickup in stores',
                    ],
                    [
						'custom_icon' => 'klb-delivery-icon-truck-thin',
                        'desc' => 'Free delivery from €35',
                    ],
					[
						'custom_icon' => 'klb-delivery-icon-map-location',
                        'desc' => 'Track your order',
                    ],
					[
						'custom_icon' => 'klb-ecommerce-icon-like',
                        'desc' => '100% Customer satisfaction rate',
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
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
		
		$this->add_responsive_control( 'icon_right',
            [
                'label' => esc_html__( 'Icon Right', 'blonwe-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .klb-iconlist .icon' => 'margin-right: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'blonwe-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .klb-iconlist .icon' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_bg_color',
           [
               'label' => esc_html__( 'Icon Background Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-iconlist .icon' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_color',
           [
               'label' => esc_html__( 'Icon Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '#228BE6',
               'selectors' => ['{{WRAPPER}}  .klb-iconlist .icon' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-iconlist .icon:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'icon_text_shadow',
				'selector' => '{{WRAPPER}} .klb-iconlist .icon',
			]
		);
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .klb-iconlist .icon' => 'opacity: {{VALUE}};'],
				
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-iconlist .text p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-iconlist .text p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .klb-iconlist .text p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .klb-iconlist .text p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klb-iconlist .text p',
				
            ]
        );
		
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if ( $settings['icon_items'] ) {
			echo '<div class="klb-iconlist">';
			echo '<ul>';
			
				foreach($settings['icon_items'] as $item){
					echo '<li>';
					echo '<div class="icon">';
					if($item['switcher_icon'] == 'yes'){
						echo '<i class="'.esc_attr($item['custom_icon']).'"></i>';
					} else {
						Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'false' ] );						
					}  
					echo '</div>';
					echo '<div class="text">';
					echo '<p>'.blonwe_sanitize_data($item['desc']).'</p>';
					echo '</div>';
					echo '</li>';
				}
				
			echo '</ul>';
			echo '</div>';
		}
		
	}

}
