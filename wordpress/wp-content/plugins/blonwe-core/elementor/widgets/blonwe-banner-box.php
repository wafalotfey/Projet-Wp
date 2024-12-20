<?php

namespace Elementor;

class Blonwe_Banner_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-banner-box';
    }
    public function get_title() {
        return esc_html__('Banner Box (K)', 'blonwe-core');
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

		$defaultimage = plugins_url( 'images/banner-32.jpg', __DIR__ );
		$defaultimage2 = plugins_url( 'images/decorative-star.png', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$this->add_control( 'decorative_image_tab',
			[
				'label' => esc_html__( 'Decorative Image', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
				'condition' => ['banner_type' => ['type8']]
			]
		);
		
		$this->add_control( 'decorative_image',
            [
                'label' => esc_html__( 'Decorative Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage2],
				'condition' => ['decorative_image_tab' => 'true']
            ]
        );

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Vivamus eu tellus',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Weekend Discount',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'blonwe-core' )
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
					'red'	 	  => esc_html__( 'Red ', 'blonwe-core' ),
					'orange'	  => esc_html__( 'Orange ', 'blonwe-core' ),
					'white'	 	  => esc_html__( 'White ', 'blonwe-core' ),
					'primary'	  => esc_html__( 'Primary ', 'blonwe-core' ),
				],
			]
		);
		
        $this->add_control( 'second_subtitle',
            [
                'label' => esc_html__( 'Second Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Aenean iaculis nisl...',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'price_text',
            [
                'label' => esc_html__( 'Price Text', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'from',
                'pleaceholder' => esc_html__( 'Add the price text.', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'price',
            [
                'label' => esc_html__( 'Price', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$249.99',
                'pleaceholder' => esc_html__( 'Add a price.', 'blonwe-core' )
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
		
		$this->add_control( 'price_text_heading',
            [
                'label' => esc_html__( 'PRICE TEXT', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'price_text_color',
           [
               'label' => esc_html__( 'Price Text Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-price .price-label ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'price_text_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .banner-price .price-label ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_text_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .banner-price .price-label'
            ]
        );
		
		$this->add_control( 'price_heading',
            [
                'label' => esc_html__( 'PRICE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'price_color',
           [
               'label' => esc_html__( 'Price Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-price .price ' => 'color: {{VALUE}};']
           ]
        );
		
		
		$this->add_control( 'price_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .banner-price .price ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .banner-price .price'
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-30 w-60">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).' font-13 weight-500 badge background-secondary">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-24 weight-600">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price align-items-center size-sm">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price filled">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media overlay">';
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			
			
			if($settings['decorative_image_tab'] == 'true'){
				echo '<div class="entry-decorative animation-float-bob-y">';
				echo '<img src="'.esc_url($settings['decorative_image']['url']).'" data-sizes="auto"/>';
				echo '</div>';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-30 w-60">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-24 weight-700 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price size-sm bolded">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<div class="image-decoration" style="color: #cae8e6">';
			echo '<svg xmlns="http://www.w3.org/2000/svg" width="652.2" height="1100.9" viewbox="0 0 652.2 1100.9">';
			echo '<path fill="currentColor" d="M554.6,0c0,0,82.7,88.6,82.7,221.8s-82.7,120.8-82.7,266.5s97.6,203.6,97.6,349.3s-97.6,263.2-97.6,263.2H0V0H554.6z"/>';
			echo '</svg>';
			echo '</div>';
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-50 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div><!-- entry-heading -->';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-sm-22 font-md-32 weight-400 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div><!-- entry-excerpt -->';
			echo '</div><!-- entry-body -->';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span><!-- price -->';
			echo '</div><!-- banner-price -->';
			echo '</div><!-- entry-footer -->';
			echo '</div><!-- entry-inner -->';
			echo '</div><!-- entry-wrapper -->';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div><!-- entry-media -->';
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-40 w-70">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-26 weight-700">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price size-sm bolded">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-50 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-sm-28 font-md-34 weight-700 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			  
		} elseif($settings['banner_type'] == 'type4'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="banner-area">';
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-start justify-start space-40 w-80">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-sm-26 font-md-28 weight-700 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price size-sm bolded">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			echo '</div>';
					
		} elseif($settings['banner_type'] == 'type3'){
			
			$colortype= '';
			
			if($settings['text_color'] == 'light'){
				$colortype .= 'light';
			} else {
				$colortype .= 'dark';
			}
			
			$subtitlecolor= '';
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-50 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div><!-- entry-heading -->';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-sm-26 font-md-34 weight-600 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price weight-700">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-30 w-60">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-24 weight-700 lh-1-1">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-footer">';
			echo '<div class="banner-price size-sm bolded">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
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
			
			if($settings['subtitle_color'] == 'primary'){
				$subtitlecolor .= 'primary';
			} elseif($settings['subtitle_color'] == 'white'){
				$subtitlecolor .= 'white';
			} elseif($settings['subtitle_color'] == 'orange'){
				$subtitlecolor .= 'orange';
			} elseif($settings['subtitle_color'] == 'red'){
				$subtitlecolor .= 'red';
			} elseif($settings['subtitle_color'] == 'green'){	
				$subtitlecolor .= 'green';
			} else {
				$subtitlecolor .= 'blue';
			}
			
			echo '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-center justify-start space-30 w-60">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<h4 class="entry-subtitle font-13 weight-500 color-'.esc_attr($subtitlecolor).'">'.esc_html($settings['subtitle']).'</h4>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-22 weight-600">'.esc_html($settings['title']).'</h2>';
			echo '<div class="entry-excerpt font-md-15 weight-400">';
			echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
			echo '</div> ';
			echo '</div>'; 
			echo '<div class="entry-footer">';
			echo '<div class="banner-price size-sm">';
			echo '<div class="price-label">'.esc_html($settings['price_text']).'</div>';
			echo '<span class="price">';
			echo '<span class="woocommerce-Price-amount amount">';
			echo '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['price']).'</span></bdi>';
			echo '</span>';
			echo '</span>'; 
			echo '</div>'; 
			echo '</div>'; 
			echo '</div>';
			echo '</div>'; 
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div> ';
		}	
	}

}
