<?php

namespace Elementor;

class Blonwe_Category_Banner2_Widget extends Widget_Base {
    use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-category-banner2';
    }
    public function get_title() {
        return esc_html__('Category Banner 2 (K)', 'blonwe-core');
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
		
		$this->add_control( 'header_type',
			[
				'label' => esc_html__( 'Header Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' 	=> esc_html__( 'Select Type', 'blonwe-core' ),
					'type1' 	=> esc_html__( 'Style 1', 'blonwe-core' ),
					'type2'		=> esc_html__( 'Style 2', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Meat & Seafood',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Etiam eleifend ex vel leo mollis, ut consequat enim venenatis.',
                'description'=> 'Add a description.',
				'label_block' => true,
				'condition' => ['header_type' => ['type2']]
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
		$this->blonwe_query_elementor_controls($post_count = 3, $column = 3, $carousel = 'yes');
		/***** END QUERY CONTROLS SECTION *****/
		
		/*****   START CONTROLS SECTION   ******/
		$this->start_controls_section(
			'banner_section',
			[
				'label' => esc_html__( 'Banner', 'blonwe-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultimage = plugins_url( 'images/banner-24.jpg', __DIR__ );
		
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
                'default' => 'Vivamus eu tellus',
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
                'default' => 'Aenean iaculis nisl...',
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
		
		$output .= '<div class="klb-module module-products-grid style-3">';
		
		if($settings['title']){
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
			$output .= '</div>';
			$output .= '</a>';
			$output .= '</div>';
			$output .= '</div>';
			
			if($settings['header_type'] == 'type2'){
				$output .= '<div class="entry-excerpt">';
				$output .= '<p>'.esc_html($settings['desc']).'</p>';
				$output .= '</div>';
			}
				
			$output .= '</div>'; 
		}
		
		$output .= '<div class="module-body grid-wrapper bordered">';
		$output .= '<div class="module-column">';
		
		$output .= '<div class="column-child list-items">';
		foreach ( $terms as $term ) {
			$term_data = get_option('taxonomy_'.$term->term_id);
			$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
			$term_children = get_term_children( $term->term_id, 'product_cat' );
			
				$output .= '<nav class="grid-list-menu">';
					if($term_children){
						$count = 0;
						
						$output .= '<ul>';
							foreach($term_children as $child){
								if($count < 5){
								$childterm = get_term_by( 'id', $child, 'product_cat' );
								
								$output .= '<li class="menu-item"><a href="'.esc_url(get_term_link( $child )).'">'.esc_html($childterm->name).'</a></li>';
								}

								
								$count++;
							}
						$output .= '</ul>';
					}
				$output .= '</nav>';
				$output .= '<div class="grid-list-button">';
				$output .= '<a href="'.esc_url(get_term_link( $term )).'" class="btn link blue-link icon-right">'.esc_html__('View All','blonwe-core').' '.esc_html($term->name).'<i class="klb-icon-right-arrow-large"></i></a>';
				$output .= '</div>';
		}	
		$output .= '</div>';
		
		$output .= '<div class="column-child banner-area">';
		$output .= '<div class="klb-banner inner-style small-size '.esc_attr($colortype).' align-start justify-start space-40 w-100">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-inner">';
		$output .= '<div class="entry-heading">';
		$output .= '<h4 class="entry-subtitle color-green">'.esc_html($settings['banner_subtitle']).'</h4>';
		$output .= '</div><!-- entry-heading -->';
		$output .= '<div class="entry-body">';
		$output .= '<h2 class="entry-title font-sm-24 font-md-26 weight-700 lh-1-1">'.esc_html($settings['banner_title']).'</h2>';
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
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';	
		$output .= '</div>';
		$output .= '<div class="module-column klb-slider-wrapper">';
		$output .= '<div class="klb-loader-wrapper">';
		$output .= '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
		$output .= '</div>';     
		$output .= '<div class="klb-slider carousel-style products arrows-center arrows-style-1 arrows-white-border hidden-arrows zoom-effect dots-style-1" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="600" data-arrows="false" data-dots="false" data-infinite="true">';
		
		$output .= $this->blonwe_elementor_product_loop($settings, $productslider = 'yes');
	
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		echo $output;
	}

}
