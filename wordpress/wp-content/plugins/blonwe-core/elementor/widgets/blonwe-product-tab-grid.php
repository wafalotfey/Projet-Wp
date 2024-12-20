<?php

namespace Elementor;

class Blonwe_Product_Tab_Grid_Widget extends \Elementor\Widget_Base {
    use Blonwe_Helper;
    public function get_name() {
        return 'blonwe-product-tab-grid';
    }
    public function get_title() {
        return esc_html__('Product Tab Grid (K)', 'blonwe-core');
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
      
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->blonwe_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->blonwe_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'blonwe-core' ),
                    'DESC' => esc_html__( 'Descending', 'blonwe-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'blonwe-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'blonwe-core' ),
                    'rand' => esc_html__( 'Random', 'blonwe-core' ),
                    'date' => esc_html__( 'Date', 'blonwe-core' ),
                    'title' => esc_html__( 'Title', 'blonwe-core' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control( 'hide_out_of_stock_items',
			[
				'label' => esc_html__( 'Hide Out of Stock?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'stock_progressbar',
			[
				'label' => esc_html__( 'Stock Progress Bar?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'stock_status',
			[
				'label' => esc_html__( 'Stock Status?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'shipping_class',
			[
				'label' => esc_html__( 'Shipping Class?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'product_box_countdown',
			[
				'label' => esc_html__( 'Product Box Countdown?', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
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
               'selectors' => ['{{WRAPPER}} .module-header-inner .button-column a.btn' => 'color: {{VALUE}};'],
			]
        );
		
		$this->add_control( 'button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-header-inner .button-column a.btn:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .module-header-inner .button-column a.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .module-header-inner .button-column a.btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .module-header-inner .button-column a.btn',
				
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
			
			$cat_filter .= '<div class="column button-column order-2 order-sm-3">';
			$cat_filter .= '<a href="'.esc_url($settings['btn_link']['url']).'"  '.esc_attr($target.$nofollow).' class="btn link icon-right link">';
			$cat_filter .= '<span class="button-text">'.esc_html($settings['btn_title']).'</span>';
			$cat_filter .= '<div class="button-icon">';
			$cat_filter .= '<i class="klb-icon-right-arrow-large"></i>';
			$cat_filter .= '</div>';
			$cat_filter .= '</a>';
			$cat_filter .= '</div>';
			$cat_filter .= '</div>';
		}
			
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
	
		$args['klb_special_query'] = true;
	
		if($settings['hide_out_of_stock_items']== 'true'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}

		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> reset($settings['cat_filter']),
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
		}

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}
		
		if($settings['on_sale'] == 'true' && $settings['post_include_filter']){
			$args['post__in'] = wc_get_product_ids_on_sale();
			$args['post__in'] = $settings['post_include_filter'];
		} elseif(($settings['on_sale'] == 'true')) {
        	$args['post__in'] = wc_get_product_ids_on_sale();
        }
		
		$stockprogressbar = $settings['stock_progressbar'];
		$stockstatus = $settings['stock_status'];
		$shippingclass = $settings['shipping_class'];
		$countdown = $settings['product_box_countdown'];
			
			$loop = new \WP_Query( $args );
			
			
			$counter = '1';
			$number = '1';
			
			if ( $loop->have_posts() ) { while ( $loop->have_posts() ) : $loop->the_post() ;
					global $product;
					global $post;
					global $woocommerce;

					$je = (($counter-1)/4);

					
					if (is_int($je)) {
						if($counter == 1){
							$output .= '<div class="module-column"><div class="grid-products"><div class="products">';
						}
						
						$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
						$output .= blonwe_product_type4($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						$output .= '</div>';
						
						if($counter != 1){
							$output .= '</div></div></div><div class="module-column"><div class="list-products"><div class="products list-style">';
						}

					} else {
						if($number == 1){
							$output .= '</div></div></div><div class="module-column"><div class="list-products"><div class="products list-style">';
						}
						
						$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
						$output .= blonwe_product_type_list();
						$output .= '</div>';

						if($number % 3 == 0){
							$output .= '</div></div></div><div class="module-column "><div class="grid-products"><div class="products">';
						}

						$number++;
					}

					
					$counter++;
					
				endwhile;
			}
			wp_reset_postdata();
			$output .= '</div>';

			

				
		echo  '<div class="klb-module module-products-grid style-6 " data-perpage="'.esc_attr($settings['post_count']).'" data-best_selling="'.esc_attr($settings['best_selling']).'" data-featured="'.esc_attr($settings['featured']).'" data-onsale="'.esc_attr($settings['on_sale']).'" data-stockprogressbar="'.esc_attr($settings['stock_progressbar']).'" data-countdown="'.esc_attr($settings['product_box_countdown']).'" data-stockstatus="'.esc_attr($settings['stock_status']).'" data-shippingclass="'.esc_attr($settings['shipping_class']).'">
				  <div class="module-header default border-thin">
					'.$cat_filter.'
				  </div>
				  <div class="klb-products-tab module-body grid-wrapper">
					'.$output.'
				  </div>
				</div>';		
		
		
	}

}
