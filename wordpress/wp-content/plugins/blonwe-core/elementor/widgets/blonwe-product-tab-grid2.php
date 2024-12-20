<?php

namespace Elementor;

class Blonwe_Product_Tab_Grid2_Widget extends \Elementor\Widget_Base {
    use Blonwe_Helper;
    public function get_name() {
        return 'blonwe-product-tab-grid2';
    }
    public function get_title() {
        return esc_html__('Product Tab Grid 2 (K)', 'blonwe-core');
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
				'label' => esc_html__( 'Products', 'blonwe-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Dont miss this weeks sales',				
            ]
        );
		
		$this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Etiam eget faucibus turpis, sit amet viverra eros. Maecenas eget vehicula nisl. Quisque imperdiet iaculis dignissim. In hac habitasse platea dictumst.',				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->blonwe_query_elementor_controls($post_count = 8, $column = 4);
		/***** END QUERY CONTROLS SECTION *****/
		
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
               'selectors' => ['{{WRAPPER}} .module-header .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-header .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-header .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header .entry-title',
				
            ]
        );
		
		$this->add_control( 'tab_heading',
            [
                'label' => esc_html__( 'Tab Title', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'tab_title_color',
			[
               'label' => esc_html__( 'Tab Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header-tab ul li a' => 'color: {{VALUE}};'],
			]
        );
		
		$this->add_control( 'tab_title_hvrcolor',
			[
               'label' => esc_html__( 'Tab Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header-tab ul li a:hover' => 'color: {{VALUE}};'],
			]
        );
		
		$this->add_control( 'tab_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .module-header-tab ul li a ' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'tab_title_text_shadow',
				'selector' => '{{WRAPPER}} .module-header-tab ul li a ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header-tab ul li a',				
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
               'selectors' => ['{{WRAPPER}} .module-header .entry-excerpt p' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'description_hvrcolor',
			[
               'label' => esc_html__( 'Description Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header .entry-excerpt p:hover' => 'color: {{VALUE}} !important;']
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
                'selectors' => ['{{WRAPPER}} .module-header .entry-excerpt p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .entry-excerpt p ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header .entry-excerpt p',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$output = '';
		$cat_filter = '';

		
		$include = array();
		$exclude = array();
		
		$portfolio_filters = get_terms(array(
			'taxonomy' => 'product_cat',
			'include' => $settings['cat_filter'],
		));
		
		
			
		if($portfolio_filters){
			
			$cat_filter .= '<div class="module-header-inner">';
			$cat_filter .= '<div class="column order-1 order-sm-1">';
			$cat_filter .= '<h3 class="entry-title default-size font-md-32">'.esc_html($settings['title']).'</h3>';
			$cat_filter .= '</div>';
			$cat_filter .= '<div class="column sub-column order-3 order-sm-2">';
			$cat_filter .= '<div class="module-header-tab style-1">';
			$cat_filter .= '<ul>';
			
				foreach($portfolio_filters as $portfolio_filter){
					
					$active_class = '';
					if(!empty($settings['cat_filter']) && reset($settings['cat_filter']) == $portfolio_filter->term_id){
						$active_class .= 'active';
					}
					
					$cat_filter .= '<li class="tab-item '.esc_attr($active_class).'"><a class="tab-link" href="#'.esc_attr($portfolio_filter->slug).'" id="'.esc_attr($portfolio_filter->term_id).'">'.esc_html($portfolio_filter->name).'</a></li>';
					
				}
				
			$cat_filter .= '</ul>';
			$cat_filter .= '</div>';
			$cat_filter .= '</div>';
			$cat_filter .= '</div>';
			$cat_filter .= '<div class="entry-excerpt">';
			$cat_filter .= '<p>'.esc_html($settings['desc']).'</p>';
			$cat_filter .= '</div>';
			
		}	

		$output .= '<div class="products grid-column column-'.esc_attr($settings['column']).' mobile-grid-'.esc_attr($settings['mobile_column']).'" data-producttype="'.esc_attr($settings['product_type']).'" data-perpage="'.esc_attr($settings['post_count']).'" data-best_selling="'.esc_attr($settings['best_selling']).'" data-featured="'.esc_attr($settings['featured']).'" data-onsale="'.esc_attr($settings['on_sale']).'" data-stockprogressbar="'.esc_attr($settings['stock_progressbar']).'" data-countdown="'.esc_attr($settings['product_box_countdown']).'" data-stockstatus="'.esc_attr($settings['stock_status']).'" data-shippingclass="'.esc_attr($settings['shipping_class']).'">';
		$output .= $this->blonwe_elementor_product_loop($settings, $productslider = 'no', $widget = 'tabcarousel');   
		$output .= '</div>';
			
		echo  '<div class="klb-module products-column default centered">
				  <div class="module-header default extra-space centered">
					'.$cat_filter.'
				  </div>
				  <div class="klb-products-tab module-body">
					'.$output.'
				  </div>
				</div>';		
		
		
	}

}
