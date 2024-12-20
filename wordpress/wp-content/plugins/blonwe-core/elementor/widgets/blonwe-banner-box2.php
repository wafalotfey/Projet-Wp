<?php

namespace Elementor;

class Blonwe_Banner_Box2_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-banner-box2';
    }
    public function get_title() {
        return esc_html__('Banner Box 2 (K)', 'blonwe-core');
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
		
		$this->add_control( 'banner_type',
			[
				'label' => esc_html__( 'Banner Type', 'blonwe-core' ),
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
				],
			]
		);

		$defaultimage = plugins_url( 'images/banner-35.jpg', __DIR__ );
		
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
                'default' => 'Nam a elit at urna luctusemper',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Weekend Discount',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'subtitle_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'blue',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'blue' 	  	  => esc_html__( 'Blue ', 'blonwe-core' ),
					'green'	 	  => esc_html__( 'Green ', 'blonwe-core' ),
					'primary'	  => esc_html__( 'Primary ', 'blonwe-core' ),
					'black'	      => esc_html__( 'Black ', 'blonwe-core' ),
					'red'	  	  => esc_html__( 'Red ', 'blonwe-core' ),
					'white'	  	  => esc_html__( 'White ', 'blonwe-core' ),
					'yellow'	  => esc_html__( 'Yellow ', 'blonwe-core' ),
					'orange'	  => esc_html__( 'Orange ', 'blonwe-core' ),
				],
			]
		);
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Aenean iaculis nisl ante fringilla...',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'btn_type',
			[
				'label' => esc_html__( 'Button Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'	  => esc_html__( 'Type 3', 'blonwe-core' ),
					'type4'	  => esc_html__( 'Type 4', 'blonwe-core' ),
					'type5'	  => esc_html__( 'Type 5', 'blonwe-core' ),
				],
			]
		);
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
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
		
		$this->add_control( 'text_color',
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
		
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		 /*****   START CONTROLS SECTION   ******/
		$this->start_controls_section('blonwe_styling',
            [
                'label' => esc_html__( ' Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'banner_box_text_alignment',
            [
                'label' => esc_html__( 'Alignment Text', 'blonwe-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .klb-banner' => 'text-align: {{VALUE}};'],
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
		
		$this->add_responsive_control( 'banner_box_item_alignment',
            [
                'label' => esc_html__( 'Alignment Item', 'blonwe-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .entry-wrapper' => 'align-items: {{VALUE}};'],
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Top', 'blonwe-core' ),
                        'icon' => 'eicon-text-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'blonwe-core' ),
                        'icon' => 'eicon-text-align-center'
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Bottom', 'blonwe-core' ),
                        'icon' => 'eicon-text-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_responsive_control( 'width',
            [
                'label' => esc_html__( 'Width', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-inner' => 'width: {{SIZE}}% !important;' ],
            ]
        );
		
		$this->add_responsive_control( 'space',
            [
                'label' => esc_html__( 'Space', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-wrapper' => 'padding: {{SIZE}}px !important;' ],
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

                'selector' => '{{WRAPPER}} .entry-inner .klb-banner .entry-title',
				
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
		
		$this->add_responsive_control( 'subtitle_weight',
            [
                'label' => esc_html__( 'Subtitle Weight', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-subtitle' => 'font-weight: {{SIZE}} !important;' ],
            ]
        );
		
		$this->add_control( 'subtitles_color',
			[
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}} !important;']
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
		
		$this->add_responsive_control( 'desc_weight',
            [
                'label' => esc_html__( 'Description Weight', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-excerpt p' => 'font-weight: {{SIZE}} !important;' ],
            ]
        );
		
		$this->add_control( 'desc_color',
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
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'btn_size',
            [
                'label' => esc_html__( 'Button Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} a.btn' => 'font-size: {{SIZE}}px !important;' ],
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
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		if($settings['banner_type'] == 'type9'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-top justify-start space-50 w-60">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-42 weight-500 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			
		} elseif($settings['banner_type'] == 'type8'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-40 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-30 weight-400 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			  
		} elseif($settings['banner_type'] == 'type7'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-top justify-start space-60 w-70">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-46 weight-700">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div><!-- entry-excerpt -->';
			echo '</div><!-- entry-body -->';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right radius-rounded '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			  
		} elseif($settings['banner_type'] == 'type6'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-40 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-30 weight-700 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right radius-rounded '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			
		} elseif($settings['banner_type'] == 'type5'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="banner-area">';
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-top justify-start space-40 w-90">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-34 weight-500 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right radius-rounded '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div><!-- entry-media -->';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			echo '</div>';
					
		} elseif($settings['banner_type'] == 'type4'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-top justify-start space-40 w-70">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div><!-- entry-heading -->';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-42 weight-400 lh-1-1">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div><!-- entry-excerpt -->';
			echo '</div><!-- entry-body -->';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right radius-rounded '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div><!-- entry-footer -->';
			echo '</div><!-- entry-inner -->';
			echo '</div><!-- entry-wrapper -->';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div><!-- entry-media -->';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			
		} elseif($settings['banner_type'] == 'type3'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-40 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-30 weight-700 lh-1-1">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}					
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			  
		} elseif($settings['banner_type'] == 'type2'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-50 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div> ';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-sm-26 font-md-34 weight-700 lh-1-1">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div> ';
			echo '</div> ';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right radius-rounded '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>'; 
			echo '</div>'; 
			echo '</div>'; 
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div> ';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
		} else {
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'yellow'){
				$subtitlecolor .= 'yellow';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'black'){
				$subtitlecolor .= 'black';
			} elseif($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			$btntype= '';
			
			if($settings['btn_type'] == 'type5'){
				$btntype .= 'primary';
			} elseif($settings['btn_type'] == 'type4'){
				$btntype .= 'info';
			} elseif($settings['btn_type'] == 'type3'){
				$btntype .= 'link color-light';
			} elseif($settings['btn_type'] == 'type2'){	
				$btntype .= 'black radius-rounded';
			} else {
				$btntype .= 'yellow';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-40 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div> ';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-28 weight-600">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div> ';
			echo '</div>'; 
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn icon-right radius-rounded '.esc_attr($btntype).'">'.esc_html($settings['btn_title']).'<i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div> ';
			echo '</div>'; 
			echo '</div> ';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div> ';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div> ';
		}		
	}

}
