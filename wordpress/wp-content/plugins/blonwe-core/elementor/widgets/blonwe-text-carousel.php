<?php

namespace Elementor;

class Blonwe_Text_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-text-carousel';
    }
    public function get_title() {
        return esc_html__('Text Carousel (K)', 'blonwe-core');
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'2' 	  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
					'5'		  => esc_html__( '5 Columns', 'blonwe-core' ),
					'6'		  => esc_html__( '6 Columns', 'blonwe-core' ),
					'7'		  => esc_html__( '7 Columns', 'blonwe-core' ),
					'8'		  => esc_html__( '8 Columns', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'1' 	  => esc_html__( '1 Column', 'blonwe-core' ),
					'2'		  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
				],
			]
		);
		
        $this->add_control( 'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'blonwe-core' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1200',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );
		
		$repeater = new Repeater();
		$repeater->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '0-18 <span>months</span>',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );

        $repeater->add_control( 'link',
            [
                'label' => esc_html__( 'Image Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
		$repeater->add_control( 'bg_color',
           [
               'label' => esc_html__( 'Background Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '#fa8904',
               'selectors' => ['{{WRAPPER}} .category-thumbnail svg' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'carousel_items',
            [
                'label' => esc_html__( 'Text Carousel Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'title' => '0-18 <span>months</span>',
						'link' => '#',
						'bg_color' => '#fa8904',
                    ],
                    [
						'title' => '18-36 <span>months</span>',
						'link' => '#',
						'bg_color' => '#00729d',
                    ],
                    [
						'title' => '3-5 <span>years</span>',
						'link' => '#',
						'bg_color' => '#eb395d',
                    ],
                    [
						'title' => '6-8 <span>years</span>',
						'link' => '#',
						'bg_color' => '#03944b',
                    ],
                    [
						'title' => '9-11 <span>years</span>',
						'link' => '#',
						'bg_color' => '#fcb106',
                    ],
                    [
						'title' => '+11 <span>years</span>',
						'link' => '#',
						'bg_color' => '#62b7bc',
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
		
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if ( $settings['carousel_items'] ) {
			
			echo '<div class="klb-module klb-categories-wrapper">';
			echo '<div class="klb-slider-wrapper">';
			echo '<div class="klb-loader-wrapper">';
			echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
			echo '</div>';
			echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-25" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="4" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
			
			foreach ( $settings['carousel_items'] as $item ) {
				$target = $item['link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="slider-item">';
				echo '<div class="klb-category-block style-9 small entry-media">';
				echo '<div class="category-thumbnail entry-media">';
				echo '<svg xmlns="http://www.w3.org/2000/svg" width="260" height="260" viewBox="0 0 260 260" style="color: '.esc_attr($item['bg_color']).';">';
				echo '<path fill="currentColor" d="M235.7,149.9c1.4,1.1,2.6,2.1,3.8,3.2c4.4,4.2,6.7,9.4,8.2,15.2c2.9,11.2,1.8,21.8-4.9,31.6c-5.8,8.5-13.8,13.3-23.8,14.4
								c-5.3,0.6-10.7,0.2-16,0c-1.8-0.1-1.7,0.7-1.8,2c-0.4,4.9-0.5,10-1.7,14.8c-3.6,15.5-14.3,23.9-29.3,27.1c-12.8,2.7-23.3-2-32-11.3
								c-0.9-1-1.9-2-2.8-3.1c-0.8-1-1.6-2-2.5-3.1c-1.4,2.1-2.5,4-3.9,5.7c-6.4,7.9-14.9,11.9-24.9,13.3c-22.1,3.1-40.7-15.9-40.2-37.1
								c0.1-4.7,0-4.8-4.5-3.9c-7.6,1.4-15.1,1.9-22.4-1c-13.2-5.3-20.7-15.5-23.6-29c-2-9.2,1.3-17.4,6-25.1c1.3-2.2,3-4.2,4.5-6.4
								c0.9-1.2,1.3-2.2-0.6-3c-11.8-4.9-19.2-13.8-22.3-26c-5.2-20.2,8.5-41.1,29-44.9c0.5-0.1,1-0.3,1.6-0.4c3.6-0.6,3.6-0.6,2.2-4.2
								c-3.2-8.4-5.1-17-2.9-26.1c3.2-13.4,17.3-25.8,31-27.5c8.7-1,16.3,1.6,23.5,6c2.8,1.7,3.1,1.7,4-1.4c1.9-6.8,4.7-13.1,9.6-18.4
								c6.3-6.9,14.4-10,23.4-10.9c9.5-1,18.6,0.6,27.1,5.2c8.9,4.8,13.5,12.7,15.8,22.1c0.6,2.7,1.1,2.9,3.6,1.5c5.2-3,10.5-5.7,16.4-7.1
								c7.8-1.8,15.1-0.5,21.8,3.7c10.3,6.5,17.8,15.3,19.7,27.8c1.1,7.3-0.6,14.2-3.6,20.8c-1.2,2.6-1,2.8,1.8,3.2
								c12,1.9,22.7,6.5,29.1,17.6c5.9,10.3,8,21.2,3.4,32.6c-2.7,6.6-7.6,11.5-13,15.8C241.7,145.7,238.8,147.6,235.7,149.9z"/>';
				echo '</svg>';
				echo '</div>';
				echo '<div class="category-detail">';
				echo '<h4 class="entry-title">'.blonwe_sanitize_data($item['title']).'</h4>';
				echo '</div>';
				echo '<a href="'.esc_url($item['link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
				echo '</div>';
				echo '</div>';
				
            }     
         
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
		}	
		
	}

}
