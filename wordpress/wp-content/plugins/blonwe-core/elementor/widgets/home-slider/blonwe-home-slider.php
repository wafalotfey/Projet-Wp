<?php

namespace Elementor;

class Blonwe_Home_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'blonwe-home-slider';
    }
    public function get_title() {
        return esc_html__('Home Slider (K)','blonwe-core');
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
		
		$this->add_control( 'slider_type',
			[
				'label' => esc_html__( 'Slider Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'	  => esc_html__( 'Type 3', 'blonwe-core' ),
					'type4'	  => esc_html__( 'Type 4', 'blonwe-core' ),
					'type5'	  => esc_html__( 'Type 5', 'blonwe-core' ),
					'type6'	  => esc_html__( 'Type 6', 'blonwe-core' ),
					'type7'	  => esc_html__( 'Type 7', 'blonwe-core' ),
					'type8'	  => esc_html__( 'Type 8', 'blonwe-core' ),
					'type9'	  => esc_html__( 'Type 9', 'blonwe-core' ),
					'type10'  => esc_html__( 'Type 10', 'blonwe-core' ),
					'type11'  => esc_html__( 'Type 11', 'blonwe-core' ),
					'type12'  => esc_html__( 'Type 12', 'blonwe-core' ),
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
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1000',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );
		
		$defaultbg = plugins_url( '../images/slider-10.jpg', __DIR__ );
		
		$repeater = new Repeater();
		
		/*****  CONTROLS TABS START   ******/
		$repeater->start_controls_tabs( 'slider_image_tabs');
		$repeater->start_controls_tab( 'slider_image_tab',
			[ 'label'  => esc_html__( 'Image', 'blonwe-core' ) ]
		);
		
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
				'default' => ['url' => $defaultbg],
            ]
        );
		
		/*****   END CONTROLS TAB ******/
		$repeater->end_controls_tab();
		/*****  CONTROLS TAB START   ******/
        $repeater->start_controls_tab( 'slider_video_tab',
            [ 'label' => esc_html__( 'Video', 'blonwe-core' ) ]
        );
		
		$repeater->add_control( 'slider_video',
            [
                'label' => esc_html__( 'Video', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
				'media_type' => 'video',
            ]
        );
		
		$repeater->end_controls_tab();
        $repeater->end_controls_tabs();
		/*****   END CONTROLS TABS ******/
		
		$repeater->add_control( 'slider_second_image',
            [
                'label' => esc_html__( 'Second Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Item Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Vestibulum ante ipsum primis in',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Item Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Exclusive Offer',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'blonwe-core' )
            ]
        );
		
		$repeater->add_control( 'slider_offer',
            [
                'label' => esc_html__( 'Item Offer', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '-20% Off',
                'pleaceholder' => esc_html__( 'Add an offer for the item.', 'blonwe-core' )
            ]
        );
		
        $repeater->add_control( 'slider_desc',
            [
                'label' => esc_html__( 'Item Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Praesent efficitur neque in erat sagittis, et bibendum diam pellentesque neque eget....',
                'pleaceholder' => esc_html__( 'Enter item desc here.', 'blonwe-core' )
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' )
            ]
        );
		
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
		$repeater->add_control( 'slider_text_color',
			[
				'label' => esc_html__( 'Text Color', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dark',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'dark' 	  	  => esc_html__( 'Dark ', 'blonwe-core' ),
					'light'	 	  => esc_html__( 'Light ', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Vestibulum ante ipsum primis in',
                        'slider_subtitle' => 'Exclusive Offer',
                        'slider_offer' => '-20% Off',
                        'slider_desc' => 'Praesent efficitur neque in erat sagittis, et bibendum diam pellentesque neque eget....',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#',
						'slider_text_color' => 'dark',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Vestibulum ante ipsum primis in',
                        'slider_subtitle' => 'Exclusive Offer',
                        'slider_offer' => '-20% Off',
						'slider_desc' => 'Praesent efficitur neque in erat sagittis, et bibendum diam pellentesque neque eget....',
                        'slider_btn_title' => ' Shop Now ',
                        'slider_btn_link' => '#',
						'slider_text_color' => 'dark',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Vestibulum ante ipsum primis in',
                        'slider_subtitle' => 'Exclusive Offer',
                        'slider_offer' => '-20% Off',
						'slider_desc' => 'Praesent efficitur neque in erat sagittis, et bibendum diam pellentesque neque eget....',
                        'slider_btn_title' => ' Shop Now ',
                        'slider_btn_link' => '#',
						'slider_text_color' => 'dark',
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
		
		$this->add_responsive_control( 'home_slider_alignment',
            [
                'label' => esc_html__( 'Alignment', 'blonwe-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .klb-slider' => 'text-align: {{VALUE}};'],
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
		
		$this->add_responsive_control( 'height',
            [
                'label' => esc_html__( 'Height', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .klb-banner' => 'height: {{SIZE}}px !important;' ],
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
		
		$this->add_control( 'title_color',
			[
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}};']
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
				'separator' => 'before'
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
                'selectors' => [ '{{WRAPPER}} .entry-subtitle' => 'font-size: {{SIZE}}px !important;' ],
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-subtitle ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-subtitle',
				
            ]
        );
		
		$this->add_control( 'description_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
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
                'selectors' => [ '{{WRAPPER}} .entry-excerpt p' => 'font-size: {{SIZE}}px !important;' ],
            ]
        );
		
		$this->add_control( 'description_color',
			[
               'label' => esc_html__( 'Description Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-excerpt p' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'description_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-excerpt p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_text_shadow',
				'selector' => '{{WRAPPER}} .entry-excerpt p ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-excerpt p',
				
            ]
        );
		
		$this->add_control( 'price_text_heading',
            [
                'label' => esc_html__( 'PRICE TEXT', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'price_text_bg_color',
           [
               'label' => esc_html__( 'Price Text Background Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-discount ' => 'background-color: {{VALUE}} !important;']
           ]
        );
		
		$this->add_control( 'price_text_color',
           [
               'label' => esc_html__( 'Price Text Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-discount ' => 'color: {{VALUE}} !important;']
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'price_text_shadow',
				'selector' => '{{WRAPPER}} .entry-discount ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-discount',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} a.btn  '
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'blonwe-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'blonwe-core' ),
                'selector' => '{{WRAPPER}} a.btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'blonwe-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} a.btn',
            ]
        );
		

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		
		if($settings['slider_type'] == 'type12'){
			require_once( __DIR__ . '/blonwe-home-slider12.php' );
			echo blonwe_home_slider12($settings);
		} elseif($settings['slider_type'] == 'type11'){
			require_once( __DIR__ . '/blonwe-home-slider11.php' );
			echo blonwe_home_slider11($settings);
		} elseif($settings['slider_type'] == 'type10'){
			require_once( __DIR__ . '/blonwe-home-slider10.php' );
			echo blonwe_home_slider10($settings);
		} elseif($settings['slider_type'] == 'type9'){
			require_once( __DIR__ . '/blonwe-home-slider9.php' );
			echo blonwe_home_slider9($settings);
		} elseif($settings['slider_type'] == 'type8'){
			require_once( __DIR__ . '/blonwe-home-slider8.php' );
			echo blonwe_home_slider8($settings);
		} elseif($settings['slider_type'] == 'type7'){
			require_once( __DIR__ . '/blonwe-home-slider7.php' );
			echo blonwe_home_slider7($settings);	
		} elseif($settings['slider_type'] == 'type6'){
			require_once( __DIR__ . '/blonwe-home-slider6.php' );
			echo blonwe_home_slider6($settings);
		} elseif($settings['slider_type'] == 'type5'){
			require_once( __DIR__ . '/blonwe-home-slider5.php' );
			echo blonwe_home_slider5($settings);
		} elseif($settings['slider_type'] == 'type4'){	
			require_once( __DIR__ . '/blonwe-home-slider4.php' );
			echo blonwe_home_slider4($settings);
		} elseif($settings['slider_type'] == 'type3'){	
			require_once( __DIR__ . '/blonwe-home-slider3.php' );
			echo blonwe_home_slider3($settings);
		} elseif($settings['slider_type'] == 'type2'){	
			require_once( __DIR__ . '/blonwe-home-slider2.php' );
			echo blonwe_home_slider2($settings);
		} else {	
			require_once( __DIR__ . '/blonwe-home-slider1.php' );
			echo blonwe_home_slider1($settings);
		}
	}

}