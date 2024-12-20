<?php

namespace Elementor;

class Blonwe_Custom_Title_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-custom-title';
    }
    public function get_title() {
        return esc_html__('Custom Title (K)', 'blonwe-core');
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
		
		$this->add_control( 'title_type',
			[
				'label' => esc_html__( 'Title Type', 'blonwe-core' ),
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
					'type13'  => esc_html__( 'Type 13', 'blonwe-core' ),
					'type14'  => esc_html__( 'Type 14', 'blonwe-core' ),
					'type15'  => esc_html__( 'Type 15', 'blonwe-core' ),
				],
			]
		);

		$defaultimage = plugins_url( 'images/wine-decorator-1.png', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
				'condition' => ['title_type' => ['type9', 'type10']]
            ]
        );	
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Ullamcorper sit amet lorem sed, tempus eleifend lacus fornelluis.',
                'pleaceholder' => esc_html__( 'Set a title.', 'blonwe-core' ),
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Fusce quis rutrum lectus',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'blonwe-core' ),
				'condition' => ['title_type' => ['type1', 'type2', 'type5', 'type8', 'type9', 'type10', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description ', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Quisque lacinia commodo euismod. Nullam tempus nec mi id blandit.',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'blonwe-core' ),
				'condition' => ['title_type' => ['type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' ),
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
            ]
        );
	
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
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
		
		$this->add_control( 'button_heading',
            [
                'label' => esc_html__( 'BUTTON', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_control( 'button_color',
			[
               'label' => esc_html__( 'Button Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'color: {{VALUE}};'],
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
			]
        );
		
		$this->add_control( 'button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klbth-module-header .btn:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
			]
        );
		
		$this->add_control( 'button_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'opacity: {{VALUE}} ;'],
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .btn',
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .btn',
				'condition' => ['title_type' => ['type4', 'type5', 'type8', 'type11', 'type13', 'type14', 'type15']]
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
			
		$output = '';
		
		if($settings['title_type'] == 'type15'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="text-block">';
			echo '<h4 class="entry-subtitle d-inline-flex font-13 bordered-badge rounded-5 mb-20">'.esc_html($settings['subtitle']).'</h4>';
			echo '<h1 class="entry-title font-md-48 weight-700 text-gradiend-dark mb-md-20">'.esc_html($settings['title']).'</h1>';
			echo '<div class="entry-description max-920 weight-300 color-gray mb-40 font-md-15">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button primary icon-right rounded-5">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
		} elseif($settings['title_type'] == 'type14'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="text-block max-w-1200 text-center">';
			echo '<h4 class="entry-subtitle d-inline-flex font-13 bordered-badge-white rounded-5 mb-20">'.esc_html($settings['subtitle']).'</h4>';
			echo '<h1 class="entry-title font-md-76 weight-700 text-gradiend-gray mb-md-30">'.esc_html($settings['title']).'</h1>';
			echo '<div class="entry-description max-920 weight-300 color-gray-500 mb-40">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button primary icon-right rounded-5">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
		} elseif($settings['title_type'] == 'type13'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="text-block position-relative">';
			echo '<p class="entry-subtitle font-12 weight-600 letter-spacing-1 color-primary">'.esc_html($settings['subtitle']).'</p>';
			echo '<h2 class="entry-title font-md-46 mb-20">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-description font-15 mt-20 mb-40 max-920 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn primary button-rounded icon-right">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
		} elseif($settings['title_type'] == 'type12'){
			echo '<div class="text-block text-center position-relative">';
			echo '<p class="entry-subtitle font-12 weight-600 letter-spacing-1 color-primary">'.esc_html($settings['subtitle']).'</p>';
			echo '<h2 class="entry-title font-md-42 mb-20">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-description font-15 mt-20 max-920 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type11'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="text-block position-relative">';
			echo '<p class="entry-subtitle font-12 weight-600 letter-spacing-1 color-primary">'.esc_html($settings['title']).'</p>';
			echo '<div class="entry-description font-15 mt-20 max-920 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div><!-- entry-description -->';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link icon-right font-default">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
		} elseif($settings['title_type'] == 'type10'){
			echo '<div class="text-block position-relative z-index-1 pt-30 pt-md-60 pl-30 pl-md-60">';
			if($settings['image']){
				echo '<div class="text-decoration position-absolute center top-0 left-0">';
				echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
				echo '</div>';
			}
			echo '<p class="entry-subtitle font-12 weight-600 letter-spacing-1 color-primary">'.esc_html($settings['subtitle']).'</p>';
			echo '<h2 class="entry-title font-md-48 mb-20">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-description font-15 mt-20 max-920 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type9'){
			echo '<div class="text-block text-center position-relative pt-30 pt-md-60">';
			if($settings['image']){
				echo '<div class="text-decoration position-absolute center top-0">';
				echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
				echo '</div>';
			}	
			echo '<p class="entry-subtitle font-12 weight-600 letter-spacing-1 color-primary">'.esc_html($settings['subtitle']).'</p>';
			echo '<h2 class="entry-title font-md-48 mb-20">'.blonwe_sanitize_data($settings['title']).'</h2>';
			echo '<div class="entry-description font-15 mt-20 max-920 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type8'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="text-block">';
			echo '<div class="entry-subtitle font-12 mb-15">'.esc_html($settings['subtitle']).'</div>';
			echo '<h2 class="entry-title font-24 font-md-48 lh-1-3 mb-15">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-description font-15 mb-30">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<div class="entry-footer">';
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn black outline icon-right">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
				echo '</div>';
			}
			echo '</div>';
		} elseif($settings['title_type'] == 'type7'){
			echo '<div class="klb-text-block text-center max-text-block">';
			echo '<h3 class="entry-title font-md-36 weight-600 mb-20">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description font-14 font-md-16 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type6'){
			echo '<div class="klb-module klb-categories-wrapper">';
			echo '<div class="module-header centered">';
			echo '<div class="module-header-inner">';
			echo '<div class="column order-1 order-sm-1">';
			echo '<h3 class="entry-title font-md-32">'.esc_html($settings['title']).'</h3>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-excerpt color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type5'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="klb-text-block">';
			echo '<h4 class="entry-subtitle font-12">'.esc_html($settings['subtitle']).'</h4>';
			echo '<h2 class="entry-title font-28 font-md-42 weight-500 mb-20">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-description font-18 weight-300 mb-40 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn default outline icon-right">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
		} elseif($settings['title_type'] == 'type4'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="klb-module">';		
			echo '<div class="module-header default">';
			echo '<div class="module-header-inner">';
			echo '<div class="column order-1 order-sm-1">';
			echo '<h3 class="entry-title default-size">'.esc_html($settings['title']).'</h3>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<div class="column button-column order-2 order-sm-3">';
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link icon-right link">';
				echo '<span class="button-text">'.esc_html($settings['btn_title']).'</span>';
				echo '<div class="button-icon">';
				echo '<i class="klb-icon-right-arrow-large"></i>';
				echo '</div>';
				echo '</a>';
				echo '</div>';
			}	
			echo '</div>';
			if($settings['desc']){
				echo '<div class="entry-excerpt">';
				echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type3'){
			echo '<div class="klb-text-block text-center">';
			echo '<h3 class="entry-title font-md-42 weight-500 mb-20">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description font-14 font-md-18">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type2'){
			echo '<div class="klb-text-block">';
			echo '<h5 class="entry-subtitle font-15 color-gray">'.esc_html($settings['subtitle']).'</h5>';
			echo '<h2 class="entry-title font-md-66 weight-500 mb-20">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-description font-14 font-md-16 color-dark-gray">';
			echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		} else {			
			echo '<div class="klb-text-block">';
			echo '<h5 class="entry-subtitle font-15 color-gray">'.esc_html($settings['subtitle']).'</h5>';
			echo '<h2 class="entry-title">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
		}
	}

}
