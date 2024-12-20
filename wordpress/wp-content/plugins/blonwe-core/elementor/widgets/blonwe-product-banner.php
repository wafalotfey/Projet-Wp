<?php

namespace Elementor;

class Blonwe_Product_Banner_Widget extends Widget_Base {
    use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-product-banner';
    }
    public function get_title() {
        return esc_html__('Product Banner (K)', 'blonwe-core');
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
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Laptop &amp; Computers',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' )
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
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->blonwe_query_elementor_controls($post_count = 10, $column = 5);
		/***** END QUERY CONTROLS SECTION *****/
		
		/*****   START CONTROLS SECTION   ******/
		$this->start_controls_section(
			'banner_section',
			[
				'label' => esc_html__( 'Banner', 'blonwe-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultimage = plugins_url( 'images/banner-12.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'banner_title',
            [
                'label' => esc_html__( 'Banner Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Vivamus eu tellus ferfekter otup',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'banner_subtitle',
            [
                'label' => esc_html__( 'Banner Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Weekend Discount',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'banner_desc',
            [
                'label' => esc_html__( 'Banner Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Weekend Discount',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'banner_price_text',
            [
                'label' => esc_html__( 'Price Text', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'from',
                'pleaceholder' => esc_html__( 'Add the price text.', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'banner_price',
            [
                'label' => esc_html__( 'Price', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$249.99',
                'pleaceholder' => esc_html__( 'Add a price.', 'blonwe-core' )
            ]
        );
		
		$this->add_control( 'banner_text_color',
			[
				'label' => esc_html__( 'Text Color', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'light',
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
		$this->start_controls_section('header_blonwe_styling',
            [
                'label' => esc_html__( 'Header Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'header_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'header_title_color',
			[
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'header_title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-header .entry-title:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'header_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .module-header .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'header_title_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header .entry-title',
				
            ]
        );
		
		$this->add_control( 'header_button_heading',
            [
                'label' => esc_html__( 'BUTTON', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'header_button_color',
			[
               'label' => esc_html__( 'Button Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header .button-column a.btn' => 'color: {{VALUE}};'],
			]
        );
		
		$this->add_control( 'header_button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-header .button-column a.btn:hover' => 'color: {{VALUE}};'],
			]
        );
		
		$this->add_control( 'header_button_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .module-header .button-column a.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'header_button_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .button-column a.btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_button_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header .button-column a.btn',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/*****   START CONTROLS SECTION   ******/
		$this->start_controls_section('banner_blonwe_styling',
            [
                'label' => esc_html__( 'Banner Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'banner_image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'banner_css_filters',
				'selector' => '{{WRAPPER}}  .klb-banner .entry-media img',
			]
		);
		
		$this->add_control( 'banner_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'banner_title_size',
            [
                'label' => esc_html__( 'Title Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .klb-banner .entry-title' => 'font-size: {{SIZE}}px !important;' ],
            ]
        );
		
		$this->add_control( 'banner_title_color',
			[
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-banner .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'banner_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-banner .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_title_text_shadow',
				'selector' => '{{WRAPPER}} .klb-banner .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klb-banner .entry-title',
				
            ]
        );
		
		$this->add_control( 'banner_subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'banner_subtitle_size',
            [
                'label' => esc_html__( 'Subtitle Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .klb-banner .entry-subtitle' => 'font-size: {{SIZE}}px !important;' ],
            ]
        );
		
		$this->add_control( 'banner_subtitles_color',
			[
               'label' => esc_html__( 'Subtitle Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-banner .entry-subtitle' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'banner_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-banner .entry-subtitle ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .klb-banner .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_subtitle_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klb-banner .entry-subtitle',
				
            ]
        );
		
		$this->add_control( 'banner_description_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'banner_desc_size',
            [
                'label' => esc_html__( 'Description Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .klb-banner .entry-excerpt p' => 'font-size: {{SIZE}}px !important;' ],
            ]
        );
		
		$this->add_control( 'banner_desc_color',
			[
               'label' => esc_html__( 'Description Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-banner .entry-excerpt p' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'banner_description_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-banner .entry-excerpt p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_description_text_shadow',
				'selector' => '{{WRAPPER}} .klb-banner .entry-excerpt p ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_description_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klb-banner .entry-excerpt p',
				
            ]
        );
		
		$this->add_control( 'banner_price_text_heading',
            [
                'label' => esc_html__( 'PRICE TEXT', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'banner_price_text_color',
           [
               'label' => esc_html__( 'Price Text Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-banner .banner-price .price-label ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'banner_price_text_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .klb-banner .banner-price .price-label ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_price_text_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klb-banner .banner-price .price-label'
            ]
        );
		
		$this->add_control( 'banner_price_heading',
            [
                'label' => esc_html__( 'PRICE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'banner_price_color',
           [
               'label' => esc_html__( 'Price Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-banner .banner-price .price ' => 'color: {{VALUE}};']
           ]
        );
		
		
		$this->add_control( 'banner_price_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-banner .banner-price .price ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_price_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .klb-banner .banner-price .price'
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
		
		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
			'parent'    => 0,
			'include'   => $settings['cat_filter'],
			'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		) );
		
		$colortype= '';
		
		if($settings['banner_text_color'] == 'light'){
			$colortype .= 'light';
		} else {
			$colortype .= 'dark';
		}
		
		$output .= '<div class="klb-module module-products-grid style-2">';
			
		$output .= '<div class="module-header default">';
		$output .= '<div class="module-header-inner">';
		$output .= '<div class="column order-1 order-sm-1">';
		$output .= '<h3 class="entry-title default-size">'.esc_html($settings['title']).'</h3>';
		$output .= '</div>';
		$output .= '<div class="column button-column order-2 order-sm-3">';
		$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn link icon-right link" '.esc_attr($target.$nofollow).'>';
		$output .= '<span class="button-text">'.esc_html($settings['btn_title']).'</span>';
		$output .= '<div class="button-icon">';
		$output .= '<i class="klb-icon-right-arrow-large"></i>';
		$output .= '</div><!-- button-icon -->';
		$output .= '</a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';  
				
		$output .= '<div class="module-body grid-wrapper bordered">';
		$output .= '<div class="module-column">';
		$output .= '<div class="banner-area">';
		$output .= '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-start justify-start space-40 w-100">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-inner">';
		$output .= '<div class="entry-heading">';
		$output .= '<h4 class="entry-subtitle color-green">'.esc_html($settings['banner_subtitle']).'</h4>';
		$output .= '</div>';
		$output .= '<div class="entry-body">';
		$output .= '<h2 class="entry-title font-sm-26 font-md-28 weight-700 lh-1-1">'.esc_html($settings['banner_title']).'</h2>';
		$output .= '<div class="entry-excerpt font-md-15 weight-400">';
		$output .= '<p>'.esc_html($settings['banner_desc']).'</p>';
		$output .= '</div><!-- entry-excerpt -->';
		$output .= '</div><!-- entry-body -->';
		$output .= '<div class="entry-footer">';
		$output .= '<div class="banner-price size-sm bolded">';
		$output .= '<div class="price-label">'.esc_html($settings['banner_price_text']).'</div>';
		$output .= '<span class="price">';
		$output .= '<span class="woocommerce-Price-amount amount">';
		$output .= '<bdi><span class="woocommerce-Price-currencySymbol">'.esc_html($settings['banner_price']).'</span></bdi>';
		$output .= '</span>';
		$output .= '</span>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="entry-media">';
		$output .= '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
		$output .= '</div><!-- entry-media -->';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		$output .= '<div class="module-column">';
		$output .= '<div class="products grid-column mobile-grid-'.esc_attr($settings['mobile_column']).' column-'.esc_attr($settings['column']).' no-gutters">';
		
		$output .= $this->blonwe_elementor_product_loop($settings);   
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		echo $output;
	}

}
