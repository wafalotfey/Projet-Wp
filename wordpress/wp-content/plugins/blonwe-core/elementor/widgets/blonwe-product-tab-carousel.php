<?php

namespace Elementor;

class Blonwe_Product_Tab_Carousel_Widget extends \Elementor\Widget_Base {
    use Blonwe_Helper;
    public function get_name() {
        return 'blonwe-product-tab-carousel';
    }
    public function get_title() {
        return esc_html__('Product Tab Carousel (K)', 'blonwe-core');
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
		
		$this->add_control( 'header_type',
			[
				'label' => esc_html__( 'Header Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' 	=> esc_html__( 'Select Type', 'blonwe-core' ),
					'type1' 	=> esc_html__( 'Style 1', 'blonwe-core' ),
					'type2'		=> esc_html__( 'Style 2', 'blonwe-core' ),
					'type3'		=> esc_html__( 'Style 3', 'blonwe-core' ),
					'type4'		=> esc_html__( 'Style 4', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'content_type',
			[
				'label' => esc_html__( 'Content Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' 	=> esc_html__( 'Select Type', 'blonwe-core' ),
					'type1' 	=> esc_html__( 'Style 1', 'blonwe-core' ),
					'type2'		=> esc_html__( 'Style 2', 'blonwe-core' ),
					'type3'		=> esc_html__( 'Style 3', 'blonwe-core' ),
				],
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
				'condition' => ['header_type' => ['type4']]
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
				'condition' => ['header_type' => ['type1', 'type2', 'type3']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' ),
				'condition' => ['header_type' => ['type1', 'type2', 'type3']]
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
		
		$this->add_control( 'arrows_type',
			[
				'label' => esc_html__( 'Arrows Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'arrows-style-1',
				'options' => [
					'select-type' 		=> esc_html__( 'Select Type', 'blonwe-core' ),
					'arrows-style-1' 	=> esc_html__( 'Style 1', 'blonwe-core' ),
					'arrows-style-2'	=> esc_html__( 'Style 2', 'blonwe-core' ),
				],
				'condition' => ['arrows' => 'true']
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
		
        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->blonwe_query_elementor_controls($post_count = 8, $column = 5, $default_type = 'type3');
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
		
		$this->add_control( 'button_heading',
            [
                'label' => esc_html__( 'BUTTON', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'button_color',
			[
               'label' => esc_html__( 'Button Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header a.btn' => 'color: {{VALUE}};'],
			]
        );
		
		$this->add_control( 'button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-header a.btn:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .module-header a.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .module-header a.btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header a.btn',
				
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
		
		$headertype= '';
		$contentstyle = '';
		
		if($settings['header_type'] == 'type4'){
			$headertype .= 'extra-space centered';
			$contentstyle = 'default centered';
		} elseif($settings['header_type'] == 'type3'){
			$headertype .= '';
			$contentstyle = '';
		} elseif($settings['header_type'] == 'type2'){
			$headertype .= 'extra-space';
			$contentstyle = '';
		} else {
			$headertype .= 'border-thin';
			$contentstyle = '';
		}
		
		$contenttype= '';
			
		if($settings['content_type'] == 'type3'){
			$contenttype .= 'gutter-15 align-start';
		} elseif($settings['content_type'] == 'type2'){
			$contenttype .= 'bordered';
		} else {
			$contenttype .= 'gutter-10 align-start';
		}
			
		$portfolio_filters = get_terms(array(
			'taxonomy' => 'product_cat',
			'include' => $settings['cat_filter'],
		));
		
		
			
			if($portfolio_filters){
				
				$cat_filter .= '<div class="module-header-inner">';
					
				$cat_filter .= '<div class="column order-1 order-sm-1">';
				$cat_filter .= '<h3 class="entry-title default-size">'.esc_html($settings['title']).'</h3>';
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
				
				if($settings['header_type'] != 'type4'){
					if($settings['btn_title']){
						$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
						$cat_filter .= '<div class="column button-column order-2 order-sm-3">';
						$cat_filter .= '<a href="'.esc_url($settings['btn_link']['url']).'"  '.esc_attr($target.$nofollow).' class="btn link icon-right link">';
						$cat_filter .= '<span class="button-text">'.esc_html($settings['btn_title']).'</span>';
						$cat_filter .= '<div class="button-icon">';
						$cat_filter .= '<i class="klb-icon-right-arrow-large"></i>';
						$cat_filter .= '</div>';
						$cat_filter .= '</a>';
						$cat_filter .= '</div>';
					}
				}
				
				$cat_filter .= '</div>';
				
				if($settings['header_type'] == 'type4'){
					$cat_filter .= '<div class="entry-excerpt">';
					$cat_filter .= '<p>'.esc_html($settings['desc']).'</p>';
					$cat_filter .= '</div>';
				}
				
			}

				$output .= '<div class="klb-loader-wrapper">';
				$output .= '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				$output .= '</div>  ';
				$output .= '<div class="klb-slider carousel-style products arrows-center arrows-white-border hidden-arrows zoom-effect dots-style-1 '.esc_attr($settings['arrows_type']).' '.esc_attr($contenttype).'" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-producttype="'.esc_attr($settings['product_type']).'" data-perpage="'.esc_attr($settings['post_count']).'" data-best_selling="'.esc_attr($settings['best_selling']).'" data-featured="'.esc_attr($settings['featured']).'" data-onsale="'.esc_attr($settings['on_sale']).'" data-stockprogressbar="'.esc_attr($settings['stock_progressbar']).'" data-countdown="'.esc_attr($settings['product_box_countdown']).'" data-stockstatus="'.esc_attr($settings['stock_status']).'" data-shippingclass="'.esc_attr($settings['shipping_class']).'" data-infinite="false">';
				$output .= $this->blonwe_elementor_product_loop($settings, $productslider = 'yes', $widget = 'tabcarousel');		
				$output .= '</div>';
				
				
		echo  '<div class="klb-module module-carousel '.esc_attr($contentstyle).'">
				  <div class="module-header default '.esc_attr($headertype).'">
					'.$cat_filter.'
				  </div>
				  <div class="klb-products-tab module-body klb-slider-wrapper">
					'.$output.'
				  </div>
				</div>';		
		
		
	}

}
