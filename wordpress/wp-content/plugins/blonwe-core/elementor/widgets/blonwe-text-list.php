<?php

namespace Elementor;

class Blonwe_Text_List_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-text-list';
    }
    public function get_title() {
        return esc_html__('Text List (K)', 'blonwe-core');
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
		
		$this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Bread & Rolls',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
		$repeater = new Repeater();

        $repeater->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'White Sliced Bread',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
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
				'default' => [],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $repeater->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klb-ecommerce-icon-discount-bold',
                'description'=> 'You can add icon code. for example: klb-ecommerce-icon-discount-bold',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
		
		$repeater->add_control( 'menu_link',
            [
                'label' => esc_html__( 'Link', 'chakta' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'chakta' )
            ]
        );
		
		$this->add_control( 'menu_items',
            [
                'label' => esc_html__( 'Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [	
						'switcher_icon' => '',
						'custom_icon' => '',
                        'subtitle' => 'White Sliced Bread',
						'menu_link' => '#',

                    ],
                    [
						'switcher_icon' => '',
						'custom_icon' => '',
                        'subtitle' => 'White Bread',
						'menu_link' => '#',
                    ],
                    [
						'switcher_icon' => '',
						'custom_icon' => '',
                        'subtitle' => 'Buns & Rolls',
						'menu_link' => '#',
                    ],
					[
						'switcher_icon' => '',
						'custom_icon' => '',
                        'subtitle' => 'Sandwich Bread',
						'menu_link' => '#',
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
               'selectors' => ['{{WRAPPER}} .mega-grouped-items .mega-grouped-label' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .mega-grouped-items .mega-grouped-label:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .mega-grouped-items .mega-grouped-label ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .mega-grouped-items .mega-grouped-label',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .mega-grouped-items .mega-grouped-label',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'subtitle_color',
			[
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .sub-menu-list a' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
			[
               'label' => esc_html__( 'Subtitle Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .sub-menu-list a:hover' => 'color: {{VALUE}} !important;']
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
                'selectors' => ['{{WRAPPER}} .sub-menu-list a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .sub-menu-list a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .sub-menu-list a',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if ( $settings['menu_items'] ) {	
			echo '<div class="sub-menu mega-menu-wrapper width-large">';
			echo '<div class="mega-grouped-items mega-sub-list">';
			echo '<div class="mega-grouped-label">'.esc_html($settings['title']).'</div>';
			echo '<ul class="sub-menu-list">';
			
			foreach ( $settings['menu_items'] as $item ) {
				$target = $item['menu_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['menu_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<li>';
				if($item['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($item['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'false' ] );						
				}  
				echo '<a href="'.esc_url($item['menu_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($item['subtitle']).'</a>';
				echo '</li>';	
			}
			
			echo '</ul>';
			echo '</div>';
			echo '</div>';
			
		}
	}

}
