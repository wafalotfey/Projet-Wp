<?php

namespace Elementor;

class Blonwe_Banner_Box3_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-banner-box3';
    }
    public function get_title() {
        return esc_html__('Banner Box 3 (K)', 'blonwe-core');
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
				],
			]
		);

		$defaultimage = plugins_url( 'images/banner-44.jpg', __DIR__ );
		
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
                'label_block' => true,
                'default' => 'Quisque sed nunc, Etiam dignissim trou boun',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Weekend Discount',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'blonwe-core' ),
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Aenean iaculis nisl ante fringilla suspendisse suscipit ac urna fronseka terll freiska polin...',
                'pleaceholder' => esc_html__( 'Enter item description here.', 'blonwe-core' )
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
				'condition' => ['banner_type' => ['select-type', 'type1', 'type2', 'type3', 'type4', 'type5']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' ),
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
				'separator' => 'before',
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
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
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
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
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'subtitle_border',
                'label' => esc_html__( 'Border', 'blonwe-core' ),
                'selector' => '{{WRAPPER}} .entry-subtitle ',
            ]
        );
        
		$this->add_responsive_control( 'subtitle_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_responsive_control( 'subtitle_padding',
            [
                'label' => esc_html__( 'Padding', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'subtitle_background',
                'label' => esc_html__( 'Background', 'blonwe-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .entry-subtitle',
            ]
        );
		
		$this->add_control( 'subtitles_color',
			[
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}} !important;'],
			   'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
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
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle',
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-subtitle',
				'condition' => ['banner_type' => ['select-type', 'type1', 'type3', 'type4', 'type5', 'type6']]
				
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
                'selectors' => [ '{{WRAPPER}} .entry-excerpt p, .entry-caption p, .hidden-content p' => 'font-size: {{SIZE}}px !important;' ],
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
                'selectors' => [ '{{WRAPPER}} .entry-excerpt p, .entry-caption p, .hidden-content p' => 'font-weight: {{SIZE}} !important;' ],
            ]
        );
		
		$this->add_control( 'desc_color',
			[
               'label' => esc_html__( 'Description Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-excerpt p, .entry-caption p, .hidden-content p' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-excerpt p, .entry-caption p , .hidden-content p' => 'opacity: {{VALUE}} ;']
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

                'selector' => '{{WRAPPER}} .entry-excerpt p, .entry-caption p, .hidden-content p',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['banner_type' => ['select-type', 'type1', 'type2', 'type3', 'type4', 'type5']]
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
		
		
		if($settings['banner_type'] == 'type6'){
			
			echo '<div class="hover-block">';
			echo '<div class="entry-content">';
			echo '<div class="entry-header">';
			echo '<p class="entry-subtitle font-12 letter-spacing-1" style="display: inline-block;">'.esc_html($settings['subtitle']).'</p>';
			echo '<h2 class="entry-title font-md-36 weight-500">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="hidden-content pt-10 font-14">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			
		} elseif($settings['banner_type'] == 'type5'){
			
			echo '<div class="klb-banner outer-style small-size dark align-center justify-start space-30 w-60">';
			echo '<div class="entry-media">';
			echo '<div class="media-content">';
			echo '<h4 class="entry-title">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-24 weight-600">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn text icon-right radius-rounded">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			
		} elseif($settings['banner_type'] == 'type4'){
			
			echo '<div class="klb-banner inner-style small-size light align-center justify-center space-40 w-90">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-white">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-54 weight-400 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn primary icon-right radius-rounded">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media overlay">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			
		} elseif($settings['banner_type'] == 'type3'){
			
			echo '<div class="klb-banner inner-style small-size light align-center justify-center space-40 w-90">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-white">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-54 weight-400 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn primary icon-right radius-rounded">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			  
		} elseif($settings['banner_type'] == 'type2'){
			
			echo '<div class="klb-banner banner-text dark" style="background-color: #fcdfb0;">';
			echo '<div class="entry-wrapper">';
			echo '<div class="banner-column order-1 order-lg-1">';
			echo '<div class="text-wrapper">';
			echo '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
			echo '<div class="entry-caption"><p>'.blonwe_sanitize_data($settings['desc']).'</p></div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="banner-column order-3 order-lg-2">';
			echo '<div class="simple-image">';
			echo '<img src="'.esc_url($settings['image']['url']).'" />';
			echo '</div>';
			echo '</div>';
			echo '<div class="banner-column order-2 order-lg-3">';
			echo '<div class="button-wrapper">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn black icon-right">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
		} else {
			
			echo '<div class="klb-banner inner-style small-size light align-center justify-center space-60 w-90">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-46 weight-700">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400 not-opacity">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn primary icon-right radius-rounded">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media overlay">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
		}	
		
	}

}
