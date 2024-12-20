<?php

namespace Elementor;

class Blonwe_Home_Image_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-home-image';
    }
    public function get_title() {
        return esc_html__('Home Image (K)', 'blonwe-core');
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
		
		$this->add_control( 'image_type',
			[
				'label' => esc_html__( 'Image Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'	  => esc_html__( 'Type 3', 'blonwe-core' ),
				],
			]
		);
		
		$defaultimage = plugins_url( 'images/medical-hero-image.jpg', __DIR__ );
		$defaultimage2 = plugins_url( 'images/decorative-star.png', __DIR__ );
		$defaultimage3 = plugins_url( 'images/baby-banner-background.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$this->add_control( 'decorative_image',
            [
                'label' => esc_html__( 'Decorative Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage2],
				'condition' => ['image_type' => 'type3']
            ]
        );
		
		$this->add_control( 'bg_image',
            [
                'label' => esc_html__( 'Background Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage3],
				'condition' => ['image_type' => 'type3']
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Interdum et malesu fames ac ante primis in faucibus',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Morbilus Tristique',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'In hac habitasse platea dictumst. Pellentesque viverra sem nec orci lacinia, in bibendum urna mollis.
				Quisque nunc lacus, varius vel leo a, pretium lobortis metus. Vivamus consectetur consequat justo.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );

		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop The Collection ',
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
                'selectors' => ['{{WRAPPER}} .klb-text-block' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'title_color',
			[
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}} !important;']
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
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}} !important;']
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
		
		$this->add_control( 'description_color',
			[
               'label' => esc_html__( 'Description Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}} !important;']
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
                'selectors' => ['{{WRAPPER}} .entry-description p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description p ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-description p',
				
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
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} a.btn '
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

		$this->start_controls_tabs('btn_tabs');
        $this->start_controls_tab( 'btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'blonwe-core' ) ]
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
                'selectors' => ['{{WRAPPER}} a.btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
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
       
		$this->end_controls_tab(); //btn_normal_tab
		
        $this->start_controls_tab('btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'blonwe-core' ) ]
        );
       
	    $this->add_control( 'btn_hvrcolor',
            [
                'label' => esc_html__( 'Color', 'blonwe-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'blonwe-core' ),
                'selector' => '{{WRAPPER}} a.btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'blonwe-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} a.btn:hover',
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab
		
        $this->end_controls_tabs(); //btn_tabs
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';		
		
		if($settings['image_type'] == 'type3'){
			
			echo '<div class="custom-background custom-image padding-fix relative overflow theme-radius" style="background-image: url('.esc_url($settings['bg_image']['url']).');">';
			echo '<div class="row align-items-center justify-content-between">';
			echo '<div class="col col-md-6">';
			echo '<div class="text-block text-center max-420">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle font-14 color-orange">'.blonwe_sanitize_data($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-sm-30 font-md-40 weight-700 lh-1-1 color-black">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400 color-black">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn primary icon-right radius-rounded">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col col-md-6 mt-30 mt-md-0 relative">';
			echo '<div class="entry-decorative animation-float-bob-y" style="left: -30px; bottom: -20px;">';
			echo '<img src="'.esc_url($settings['decorative_image']['url']).'" alt="">';			
			echo '</div>';
			echo '<div class="entry-media relative overflow theme-radius">';
			echo '<img src="'.esc_url($settings['image']['url']).'">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['image_type'] == 'type2'){
			echo '<div class="custom-background pt-40 pt-md-60" style="background-color: #f9f5ec;">';
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<div class="col col-12 col-md-4 align-self-center pb-30 pb-md-60">';
			echo '<div class="klb-text-block max-text-block">';
			echo '<h5 class="entry-subtitle badge font-13 background-orange mb-20">'.blonwe_sanitize_data($settings['subtitle']).'</h5>';
			echo '<h3 class="entry-title font-26 font-md-50 weight-600 mb-20 color-black">'.blonwe_sanitize_data($settings['title']).'</h3>';
			echo '<div class="entry-description font-14 font-md-16 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn primary icon-right radius-rounded mt-20">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col col-12 col-md-8 align-self-end">';
			echo '<img src="'.esc_url($settings['image']['url']).'" alt="">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="custom-background background-cover" style="background-image: url('.esc_url($settings['image']['url']).'); background-size: cover;">';
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<div class="col col-12 col-md-6">';
			echo '<div class="klb-text-block pt-60 pt-md-110 pb-60 pb-md-110">';
			echo '<h5 class="entry-subtitle font-14 color-blue mb-20">'.blonwe_sanitize_data($settings['subtitle']).'</h5>';
			echo '<h3 class="entry-title font-34 font-md-60 weight-700 color-black mb-20">'.blonwe_sanitize_data($settings['title']).'</h3>';
			echo '<div class="entry-description font-14 font-md-18 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn primary icon-right radius-rounded mt-20">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';     
			echo '</div>';
			echo '</div>';
			
		}
	}

}
