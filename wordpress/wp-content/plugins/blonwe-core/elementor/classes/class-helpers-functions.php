<?php
namespace Elementor;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
trait Blonwe_Helper
{
	
	/**
    * Query Elementor Controls
    *
    */
    protected function blonwe_query_elementor_controls($post_count = '8', $column = '4', $default_type = 'type1')
    {
        $this->start_controls_section(
            'blonwe_section_post__filters',
            [
                'label' => esc_html__('Query', 'blonwe-core'),
            ]
        );
		
		
		$this->add_control( 'product_type',
			[
				'label' => esc_html__( 'Product Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => $default_type,
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
					'type10'	  => esc_html__( 'Type 10', 'blonwe-core' ),
					'type11'	  => esc_html__( 'Type 11', 'blonwe-core' ),
					'type12'	  => esc_html__( 'Type 12', 'blonwe-core' ),
					'type13'	  => esc_html__( 'Type 13', 'blonwe-core' ),
				],
			]
		);
	
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => $column,
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'1' 	  => esc_html__( '1 Columns', 'blonwe-core' ),
					'2' 	  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
					'5'		  => esc_html__( '5 Columns', 'blonwe-core' ),
					'6'		  => esc_html__( '6 Columns', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'1' 	  => esc_html__( '1 Column', 'blonwe-core' ),
					'2'		  => esc_html__( '2 Columns', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'tablet_column',
			[
				'label' => esc_html__( 'Tablet Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'1' 	  => esc_html__( '1 Column', 'blonwe-core' ),
					'2'		  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
				],
			]
		);
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => get_theme_mod('blonwe_elementor_product_search_limit',100)) ) ),
                'default' => $post_count
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
    }
	
	/**
    * Elementor Product Loop
    */
    protected function blonwe_elementor_product_loop($settings, $productslider = 'no', $widget = '' )
    {
		$output = '';
		
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
            'post__in'       => $settings['post_include_filter'],
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

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}

		if($settings['cat_filter']){
			
			if(!empty($settings['cat_filter']) && $widget == 'tabcarousel'){
				$term = reset($settings['cat_filter']);
			} else {
				$term = $settings['cat_filter'];
			}
			
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $term
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
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
		
		if($productslider == 'yes'){
				$loop = new \WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						global $post;
						global $woocommerce;
						
						$output .= '<div class="slider-item"> ';
						$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'"> ';
						if($settings['product_type'] == 'type13'){
							$output .= blonwe_product_type13($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type12'){
							$output .= blonwe_product_type12($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type11'){
							$output .= blonwe_product_type11($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type10'){
							$output .= blonwe_product_type10($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type9'){
							$output .= blonwe_product_type9($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type8'){
							$output .= blonwe_product_type8($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type7'){
							$output .= blonwe_product_type7($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type6'){
							$output .= blonwe_product_type6($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type5'){
							$output .= blonwe_product_type5($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type4'){
							$output .= blonwe_product_type4($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type3'){
							$output .= blonwe_product_type3($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} elseif($settings['product_type'] == 'type2'){
							$output .= blonwe_product_type2($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						} else {
							$output .= blonwe_product_type1($stockprogressbar, $stockstatus, $shippingclass, $countdown);
						}
						$output .= '</div>';
						$output .= '</div>';
					endwhile;
				}
				wp_reset_postdata();
		} else{
			$loop = new \WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					global $post;
					global $woocommerce;
			
					
					$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
					if($settings['product_type'] == 'type13'){
						$output .= blonwe_product_type13($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type12'){
						$output .= blonwe_product_type12($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type11'){
						$output .= blonwe_product_type11($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type10'){
						$output .= blonwe_product_type10($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type9'){
						$output .= blonwe_product_type9($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type8'){
						$output .= blonwe_product_type8($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type7'){
						$output .= blonwe_product_type7($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type6'){
						$output .= blonwe_product_type6($stockprogressbar, $stockstatus, $shippingclass, $countdown);	
					} elseif($settings['product_type'] == 'type5'){
						$output .= blonwe_product_type5($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type4'){
						$output .= blonwe_product_type4($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type3'){
						$output .= blonwe_product_type3($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} elseif($settings['product_type'] == 'type2'){
						$output .= blonwe_product_type2($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					} else {
						$output .= blonwe_product_type1($stockprogressbar, $stockstatus, $shippingclass, $countdown);
					}
					$output .= '</div>';
					
				endwhile;
			}
			wp_reset_postdata();
		}
		
		return $output;
    }
	
	protected function blonwe_product_carousel_settings()
    {
        $this->start_controls_section(
            'blonwe_section_product_carousel_settings',
            [
                'label' => esc_html__('Settings', 'blonwe-core'),
            ]
        );
		
		$this->add_control( 'arrow_type',
			[
				'label' => esc_html__( 'Arrow Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'nav_style4',
				'options' => [
					'select-column' => esc_html__( 'Select Type', 'blonwe-core' ),
					'nav_style1'	  => esc_html__( 'Nav Style 1', 'blonwe-core' ),
					'nav_style2'	  => esc_html__( 'Nav Style 2', 'blonwe-core' ),
					'nav_style3'	  => esc_html__( 'Nav Style 3', 'blonwe-core' ),
					'nav_style4'	  => esc_html__( 'Nav Style 4', 'blonwe-core' ),
					'nav_style5'	  => esc_html__( 'Nav Style 5', 'blonwe-core' ),
				],
			]
		);
		
        $this->end_controls_section();
    }
	
    protected function blonwe_button_controls($hide_controls = array(),$id='',$selector='')
    {
        $hide_controls = $hide_controls;
        // Color
        if($selector && $id){
            /*****   Button Options   ******/
            $this->start_controls_section( $id.'_btn_settings',
                [
                    'label'          => esc_html__( 'Button', 'blonwe-core' ),
                    'tab'            => Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control( $id.'_btn_type',
                [
                    'label'         => esc_html__( 'Button Type', 'blonwe-core' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => '',
                    'options'       => [
                        ''                         => esc_html__( 'Select a option', 'blonwe-core' ),
                        'btn btn-primary'          => esc_html__( 'Primary', 'blonwe-core' ),
                        'btn btn-black'            => esc_html__( 'Black', 'blonwe-core' ),
                        'btn btn-white'            => esc_html__( 'White', 'blonwe-core' ),
                        'btn btn-ghost-white'      => esc_html__( 'Outline white', 'blonwe-core' ),
                        'btn btn-ghost-black'      => esc_html__( 'Outline black', 'blonwe-core' ),
                        'btn-simple'               => esc_html__( 'Simple Text', 'blonwe-core' )
                    ]
                ]
            );
            $this->add_control( $id.'_btn_style',
                [
                    'label'         => esc_html__( 'Button Style', 'blonwe-core' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => '',
                    'options'       => [
                        ''                 => esc_html__( 'Select a option', 'blonwe-core' ),
                        'btn-square'       => esc_html__( 'Square', 'blonwe-core' ),
                        'btn-round'        => esc_html__( 'Round', 'blonwe-core' ),
                        'btn-circle'       => esc_html__( 'Circle', 'blonwe-core' )
                    ],
                    'condition'     => [
                        $id.'_btn_type!' => '',
                        $id.'_btn_type!' => 'btn-simple',
                    ]
                ]
            );
            $this->add_control( $id.'_btn_size',
                [
                    'label'         => esc_html__( 'Size', 'blonwe-core' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => '',
                    'options'       => [
                        ''                           => esc_html__( 'Select size', 'blonwe-core' ),
                        'btn-sm btn-md btn-lg'       => esc_html__( 'Large', 'blonwe-core' ),
                        'btn-sm btn-md'              => esc_html__( 'medium', 'blonwe-core' ),
                        'btn-sm'                     => esc_html__( 'small', 'blonwe-core' )
                    ],
                    'condition'     => [
                        $id.'_btn_type!' => '',
                        $id.'_btn_type!' => 'btn-simple',
                    ]
                ]
            );
            if(in_array('alignment', $hide_controls) == false){
                $this->add_responsive_control( 'btn_alignment',
                    [
                        'label'          => esc_html__( 'Alignment', 'blonwe-core' ),
                        'type'           => Controls_Manager::CHOOSE,
                        'selectors'      => ['{{WRAPPER}} .blonwe-button:not(.btn-justify)' => 'text-align: {{VALUE}};'],
                        'options'        => [
                            'left'      => [
                                'title'    => esc_html__( 'Left', 'blonwe-core' ),
                                'icon'     => 'fa fa-align-left'
                            ],
                            'center'    => [
                                'title'    => esc_html__( 'Center', 'blonwe-core' ),
                                'icon'     => 'fa fa-align-center'
                            ],
                            'right'     => [
                                'title'    => esc_html__( 'Right', 'blonwe-core' ),
                                'icon'     => 'fa fa-align-right'
                            ]
                        ],
                        'toggle'         => true,
                        'default'        => 'left'
                    ]
                );
            }
            if(in_array('fullwidth', $hide_controls) == false){
                $this->add_control( 'btn_fullwidth',
                    [
                        'label'          => esc_html__( 'Full width', 'blonwe-core' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'label_on'       => esc_html__( 'Yes', 'blonwe-core' ),
                        'label_off'      => esc_html__( 'No', 'blonwe-core' ),
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition'      => [ 'btn_type!' => 'btn-simple'],
                    ]
                );
            }
            $this->add_control( $id.'_btn_text',
                [
                    'label'         => esc_html__( 'Button Text', 'blonwe-core' ),
                    'type'          => Controls_Manager::TEXT,
                    'label_block'   => true,
                    'default'       => esc_html__( 'Button Text', 'blonwe-core' )
                ]
            );
            $this->add_control( $id.'_btn_link',
                [
                    'label'         => esc_html__( 'Button Link', 'blonwe-core' ),
                    'type'          => Controls_Manager::URL,
                    'label_block'   => true,
                    'default'       => [
                        'url'         => '#',
                        'is_external' => ''
                    ],
                    'show_external' => true
                ]
            );
            $this->add_control( $id.'_btn_icon',
                [
                    'label'        => __( 'Button Icon', 'blonwe-core' ),
                    'type'         => Controls_Manager::ICONS,
                    'default'      => [
                        'value'        => '',
                        'library'      => 'solid'
                    ]
                ]
            );
            $this->add_control( $id.'_btn_icon_pos',
                [
                    'label'         => esc_html__( 'Icon Position', 'blonwe-core' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'btn-icon-right',
                    'condition'     => ['btn_icon!' => ''],
                    'options'       => [
                        'btn-icon-left'    => esc_html__( 'Before', 'blonwe-core' ),
                        'btn-icon-right'   => esc_html__( 'After', 'blonwe-core' )
                    ]
                ]
            );
            $this->start_controls_tabs($id.'_btn_tabs');
            $this->start_controls_tab( $id.'_btn_normal_tab',
                [
                    'label'         => esc_html__( 'Normal', 'blonwe-core' ),
                    'condition'     => ['btn_icon!' => ''],
                ]
            );
            $this->add_control( $id.'_btn_icon_spacing',
                [
                    'label'         => esc_html__( 'Icon Spacing', 'blonwe-core' ),
                    'type'          => Controls_Manager::SLIDER,
                    'range'         => [
                        'px'   => [
                            'max' => 60
                        ]
                    ],
                    'condition'     => ['btn_icon!' => ''],
                    'selectors'     => [
                        '{{WRAPPER}} '.$selector.'.btn-icon-left i'  => 'margin-right: {{SIZE}}px;',
                        '{{WRAPPER}} '.$selector.'.btn-icon-right i' => 'margin-left: {{SIZE}}px;'
                    ]
                ]
            );
            $this->add_control( $id.'_btn_icon_opacity',
                [
                    'label'         => esc_html__( 'Opacity', 'blonwe-core' ),
                    'type'          => Controls_Manager::NUMBER,
                    'min'           => 0,
                    'max'           => 1,
                    'step'          => 0.1,
                    'default'       => '',
                    'condition'     => ['btn_icon!' => ''],
                    'selectors'     => [
                        '{{WRAPPER}} '.$selector.'.btn-icon-left i'  => 'opacity: {{VALUE}};',
                        '{{WRAPPER}} '.$selector.'.btn-icon-right i' => 'opacity: {{VALUE}};'
                    ]
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab( $id.'_btn_hover_tab',
                [
                    'label'         => esc_html__( 'Hover', 'blonwe-core' ),
                    'condition'     => ['btn_icon!' => ''],
                ]
            );
            $this->add_control( $id.'_btn_icon_spacing_hover',
                [
                    'label'         => esc_html__( 'Icon Spacing', 'blonwe-core' ),
                    'type'          => Controls_Manager::SLIDER,
                    'range'         => [
                        'px'   => [
                            'max' => 60
                        ]
                    ],
                    'condition'     => ['btn_icon!' => ''],
                    'selectors'     => [
                        '{{WRAPPER}} '.$selector.'.btn-icon-left:hover i'      => 'margin-right: {{SIZE}}px;',
                        '{{WRAPPER}} '.$selector.'.btn.btn-icon-right:hover i' => 'margin-left: {{SIZE}}px;'
                    ]
                ]
            );
            $this->add_control( $id.'_btn_icon_opacity_hover',
                [
                    'label'         => esc_html__( 'Opacity', 'blonwe-core' ),
                    'type'          => Controls_Manager::NUMBER,
                    'min'           => 0,
                    'max'           => 1,
                    'step'          => 0.1,
                    'default'       => '',
                    'condition'     => ['btn_icon!' => ''],
                    'selectors'     => [
                        '{{WRAPPER}} '.$selector.'.btn-icon-left:hover i'  => 'opacity: {{VALUE}};',
                        '{{WRAPPER}} '.$selector.'.btn-icon-right:hover i' => 'opacity: {{VALUE}};'
                    ]
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();
            /*****   End Button Options   ******/
        }
    }
    protected function blonwe_style_controls($hide_controls = array(),$id='',$selector='')
    {
        $hide_controls = $hide_controls;
        // Color
        if($selector && $id){
            if(in_array('color', $hide_controls) == false){
                $this->add_control(
                    $id.'_color',
                    [
                        'label'         => esc_html__( 'Color', 'blonwe-core' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => ['{{WRAPPER}} '.$selector => 'color: {{VALUE}};']
                    ]
                );
            }
            // Typography
            if(in_array('typo', $hide_controls) == false){
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'          => $id.'_typo',
                        'label'         => esc_html__( 'Typography', 'blonwe-core' ),
                        'selector'      => '{{WRAPPER}} '.$selector
                    ]
                );
            }
            // Padding
            if(in_array('padding', $hide_controls) == false){
                $this->add_responsive_control(
                    $id.'_padding',
                    [
                        'label'         => esc_html__( 'Padding', 'blonwe-core' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => ['{{WRAPPER}} '.$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ],
                        'separator'     => 'before'
                    ]
                );
            }
            // Margin
            if(in_array('margin', $hide_controls) == false){
                $this->add_responsive_control(
                    $id.'_margin',
                    [
                        'label'         => esc_html__( 'Margin', 'blonwe-core' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => ['{{WRAPPER}} '.$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ],
                        'separator'     => 'before'
                    ]
                );
            }
            // Border
            if(in_array('border', $hide_controls) == false){
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'          => $id.'_border',
                        'label'         => esc_html__( 'Border', 'blonwe-core' ),
                        'selector'      => '{{WRAPPER}} '.$selector,
                        'separator'     => 'before'
                    ]
                );
            }
            $this->add_control( 'hr_border_radius_'.$id,
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );
            // Border
            if(in_array('border', $hide_controls) == false){
                $this->add_responsive_control(
                    $id.'_border_radius',
                    [
                        'label'         => esc_html__( 'Border Radius', 'blonwe-core' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px' ],
                        'selectors'     => ['{{WRAPPER}} '.$selector => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-left-radius: {{BOTTOM}}{{UNIT}};border-bottom-right-radius: {{LEFT}}{{UNIT}};'],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ]
                    ]
                );
            }
            $this->add_control( 'hr_shadow_'.$id,
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );
            // Box shadow
            if(in_array('shadow', $hide_controls) == false){
                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'          => $id.'_shadow',
                        'label'         => esc_html__( 'Box shadow', 'blonwe-core' ),
                        'selector'      => '{{WRAPPER}} '.$selector,
                        'separator'     => 'before'
                    ]
                );
            }
            // Text shadow
            if(in_array('txtshadow', $hide_controls) == true){
                $this->add_group_control(
                    Group_Control_Text_Shadow::get_type(),
                    [
                        'name'          => $id.'_txtshadow',
                        'label'         => esc_html__( 'Text shadow', 'blonwe-core' ),
                        'selector'      => '{{WRAPPER}} '.$selector,
                        'separator'     => 'before'
                    ]
                );
            }
            // Background
            if(in_array('background', $hide_controls) == false){
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'         => $id.'_background',
                        'label'        => esc_html__( 'Background', 'blonwe-core' ),
                        'types'        => [ 'classic', 'gradient' ],
                        'selector'     => '{{WRAPPER}} '.$selector,
                        'separator'    => 'before'
                    ]
                );
            }
        }
    }
    /**
    * Get all elementor page templates
    *
    * @return array
    */
    public function blonwe_get_elementor_templates($type = null)
    {
        $args = [
            'post_type' => 'elementor_library',
            'posts_per_page' => get_theme_mod('blonwe_elementor_product_search_limit',100),
        ];
        if ($type) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'elementor_library_type',
                    'field' => 'slug',
                    'terms' => $type,
                ],
            ];
        }
        $page_templates = get_posts($args);
        $options = array();
        if (!empty($page_templates) && !is_wp_error($page_templates)) {
            foreach ($page_templates as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }
        return $options;
    }
    /*
    * List Blog Users
    */
    public function blonwe_get_users()
    {
        $users = get_users();
        $options = array();
        if ( ! empty( $users ) && ! is_wp_error( $users ) ) {
            foreach ( $users as $user ) {
                if( $user->user_login !== 'wp_update_service' ) {
                    $options[ $user->ID ] = $user->user_login;
                }
            }
        }
        return $options;
    }
    /*
     * List Categories
     */
    public function blonwe_get_categories()
    {
        $terms = get_terms( 'category', array(
            'orderby'    => 'count',
            'hide_empty' => 0
        ) );
        $options = array();
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
                $options[ $term->term_id ] = $term->name;
            }
        }
        return $options;
    }
    /*
    * List Tags
    */
    public function blonwe_get_tags()
    {
        $tags = get_tags();
        $options = array();
        if ( ! empty( $tags ) && ! is_wp_error( $tags ) ){
            foreach ( $tags as $tag ) {
                $options[ $tag->term_id ] = $tag->name;
            }
        }
        return $options;
    }
    /*
     * List Posts
     */
    public function blonwe_get_posts() {
        $list = get_posts( array(
            'post_type'         => 'post',
            'posts_per_page'    => get_theme_mod('blonwe_elementor_product_search_limit',100),
        ) );
        $options = array();
        if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
            foreach ( $list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        }
        return $options;
    }
    public function blonwe_cpt_get_post_title($cptname='') {
        if ( $cptname ) {
            $list = get_posts( array(
                'post_type'         => $cptname,
                'posts_per_page'    => get_theme_mod('blonwe_elementor_product_search_limit',100),
            ) );
            $options = array();
            if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
                foreach ( $list as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            }
            return $options;
        }
    }
    /**
    * Get All Post Types
    * @return array
    */
    public function blonwe_get_post_types()
    {
        $blonwe_cpts = get_post_types(array('public' => true, 'show_in_nav_menus' => true), 'object');
        $post_types = array_merge($blonwe_cpts);
        foreach ($post_types as $type) {
            $types[$type->name] = $type->label;
        }
        return $types;
    }
    /**
    * Get CPT Taxonomies
    * @return array
    */
    public function blonwe_cpt_taxonomies($posttype,$value='id')
    {
        $options = array();
        $terms = get_terms( $posttype );
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                if ('name' == $value) {
                    $options[$term->name] = $term->name;
                } else {
                    $options[$term->term_id] = $term->name;
                }
            }
        }
        return $options;
    }
    /**
    * Get WooCommerce Attributes
    * @return array
    */
    public function blonwe_woo_attributes()
    {
        $options = array();
        if ( class_exists( 'WooCommerce' ) ) {
            global $product;
            $terms = wc_get_attribute_taxonomies();
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $options[$term->attribute_name] = $term->attribute_label;
                }
            }
        }
        return $options;
    }
    /**
    * Get WooCommerce Attributes Taxonomies
    * @return array
    */
    public function blonwe_woo_attributes_taxonomies()
    {
        $options = array();
        if ( class_exists( 'WooCommerce' ) ) {
            $attribute_taxonomies = wc_get_attribute_taxonomies();
            foreach ($attribute_taxonomies as $tax) {
                $terms = get_terms( 'pa_'.$tax->attribute_name, 'orderby=name&hide_empty=0' );
                foreach ($terms as $term) {
                    $options[$term->name] = $term->name;
                }
            }
        }
        return $options;
    }
    /**
    * Get WooCommerce Product Skus
    * @return array
    */
    public function blonwe_woo_get_skus()
    {
        $options = array();
        if ( class_exists( 'WooCommerce' ) ) {
            $args = array(
                'post_type' => 'product', 
                'posts_per_page' => get_theme_mod('blonwe_elementor_product_search_limit',100)
            );
            
            $wcProductsArray = get_posts($args);
            
            if (count($wcProductsArray)) {
                foreach ($wcProductsArray as $productPost) {
                    $productSKU = get_post_meta($productPost->ID, '_sku', true);
                    $options[$productSKU] = $productSKU;
                }
            }
        }
        return $options;
    }
    /*
    * List Contact Forms
    */
    public function blonwe_get_cf7() {
        $list = get_posts( array(
            'post_type'         => 'wpcf7_contact_form',
            'posts_per_page'    => get_theme_mod('blonwe_elementor_product_search_limit',100),
        ) );
        $options = array();
        if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
            foreach ( $list as $form ) {
                $options[ $form->ID ] = $form->post_title;
            }
        }
        return $options;
    }
    public function blonwe_registered_sidebars() {
        global $wp_registered_sidebars;
        $options = array();
        if ( ! empty( $wp_registered_sidebars ) && ! is_wp_error( $wp_registered_sidebars ) ) {
            foreach ( $wp_registered_sidebars as $sidebar ) {
                $options[ $sidebar['id'] ] = $sidebar['name'];
            }
        }
        return $options;
    }
    /*
    * List Icons
    */
    public function blonwe_theme_icon_list()
    {
        $options = array(
            '' => esc_html__( 'None', 'blonwe-core' ),
            'is-user' => esc_html__( 'user', 'blonwe-core' ),
            'is-youtube' => esc_html__( 'youtube', 'blonwe-core' ),
            'is-wordpress' => esc_html__( 'wordpress', 'blonwe-core' ),
            'is-whatsapp' => esc_html__( 'whatsapp', 'blonwe-core' ),
            'is-watch' => esc_html__( 'watch', 'blonwe-core' ),
            'is-vine' => esc_html__( 'vine', 'blonwe-core' ),
            'is-view' => esc_html__( 'eye', 'blonwe-core' ),
            'is-twitter' => esc_html__( 'twitter', 'blonwe-core' ),
            'is-tripadvisor' => esc_html__( 'tripadvisor', 'blonwe-core' ),
            'is-support' => esc_html__( 'support', 'blonwe-core' ),
            'is-star' => esc_html__( 'star', 'blonwe-core' ),
            'is-star-outline' => esc_html__( 'star-outline', 'blonwe-core' ),
            'is-spotify' => esc_html__( 'spotify', 'blonwe-core' ),
            'is-soundcloud' => esc_html__( 'soundcloud', 'blonwe-core' ),
            'is-snapchat' => esc_html__( 'snapchat', 'blonwe-core' ),
            'is-skype' => esc_html__( 'skype', 'blonwe-core' ),
            'is-send' => esc_html__( 'send', 'blonwe-core' ),
            'is-search' => esc_html__( 'search', 'blonwe-core' ),
            'is-rss' => esc_html__( 'rss', 'blonwe-core' ),
            'is-reddit' => esc_html__( 'reddit', 'blonwe-core' ),
            'is-quality' => esc_html__( 'quality', 'blonwe-core' ),
            'is-pinterest' => esc_html__( 'pinterest', 'blonwe-core' ),
            'is-odnoklassniki' => esc_html__( 'odnoklassniki', 'blonwe-core' ),
            'is-next' => esc_html__( 'next', 'blonwe-core' ),
            'is-myspace' => esc_html__( 'myspace', 'blonwe-core' ),
            'is-menu' => esc_html__( 'menu', 'blonwe-core' ),
            'is-linkedin' => esc_html__( 'linkedin', 'blonwe-core' ),
            'is-itunes' => esc_html__( 'itunes', 'blonwe-core' ),
            'is-internet' => esc_html__( 'internet', 'blonwe-core' ),
            'is-instagram' => esc_html__( 'instagram', 'blonwe-core' ),
            'is-heart' => esc_html__( 'heart', 'blonwe-core' ),
            'is-google-plus' => esc_html__( 'google-plus', 'blonwe-core' ),
            'is-google-plus2' => esc_html__( 'google-plus2', 'blonwe-core' ),
            'is-github' => esc_html__( 'github', 'blonwe-core' ),
            'is-gift' => esc_html__( 'gift', 'blonwe-core' ),
            'is-filter' => esc_html__( 'filter', 'blonwe-core' ),
            'is-facebook' => esc_html__( 'facebook', 'blonwe-core' ),
            'is-exchange' => esc_html__( 'exchange', 'blonwe-core' ),
            'is-dribbble' => esc_html__( 'dribbble', 'blonwe-core' ),
            'is-document' => esc_html__( 'document', 'blonwe-core' ),
            'is-digg' => esc_html__( 'digg', 'blonwe-core' ),
            'is-delete' => esc_html__( 'delete', 'blonwe-core' ),
            'is-close' => esc_html__( 'close', 'blonwe-core' ),
            'is-comment' => esc_html__( 'comment', 'blonwe-core' ),
            'is-charity' => esc_html__( 'charity', 'blonwe-core' ),
            'is-cart' => esc_html__( 'cart', 'blonwe-core' ),
            'is-calendar' => esc_html__( 'calendar', 'blonwe-core' ),
            'is-box' => esc_html__( 'box', 'blonwe-core' ),
            'is-behance' => esc_html__( 'behance', 'blonwe-core' ),
            'is-bag' => esc_html__( 'bag', 'blonwe-core' ),
            'is-back' => esc_html__( 'back', 'blonwe-core' ),
            'is-avatar' => esc_html__( 'avatar', 'blonwe-core' ),
            'is-apple' => esc_html__( 'apple', 'blonwe-core' ),
            'is-arrow-up' => esc_html__( 'arrow-up', 'blonwe-core' ),
            'is-arrow-right' => esc_html__( 'arrow-right', 'blonwe-core' ),
            'is-arrow-right2' => esc_html__( 'arrow-right2', 'blonwe-core' ),
            'is-arrow-down' => esc_html__( 'arrow-down', 'blonwe-core' ),
            'is-arrow-down2' => esc_html__( 'arrow-down2', 'blonwe-core' ),
            'is-arrow-500px2' => esc_html__( 'arrow-500px2', 'blonwe-core' ),
            'is-arrow-500px' => esc_html__( 'arrow-500px', 'blonwe-core' ),
        );
        return $options;
    }
    // hex to rgb color
    public function blonwe_hextorgb($hex) {
        $hex = str_replace("#", "", $hex);
        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        return $rgb; // returns an array with the rgb values
    }
	
    public function blonwe_registered_nav_menus() {
        $menus = wp_get_nav_menus();
        $options = array();
        if ( ! empty( $menus ) && ! is_wp_error( $menus ) ) {
            foreach ( $menus as $menu ) {
                $options[ $menu->slug ] = $menu->name;
            }
        }
        return $options;
    }
	
    public function blonwe_registered_image_sizes() {
        $image_sizes = get_intermediate_image_sizes();
        $options = array();
        if ( ! empty( $image_sizes ) && ! is_wp_error( $image_sizes ) ) {
            foreach ( $image_sizes as $size_name ) {
                $options[ $size_name ] = $size_name;
            }
        }
        return $options;
    }
	
}