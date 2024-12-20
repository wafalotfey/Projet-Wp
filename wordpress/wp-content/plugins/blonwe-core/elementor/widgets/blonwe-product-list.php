<?php

namespace Elementor;

class Blonwe_Product_List_Widget extends Widget_Base {
    use Blonwe_Helper;

    public function get_name() {
        return 'blonwe-product-list';
    }
    public function get_title() {
        return esc_html__('Product List (K)', 'blonwe-core');
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
		
		$this->add_control( 'product_type',
			[
				'label' => esc_html__( 'Product Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'list_type',
			[
				'label' => esc_html__( 'Product List Type', 'blonwe-core' ),
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
		
		$this->add_control( 'countdown_title',
            [
                'label' => esc_html__( 'Countdown Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Remains until the end of the offer',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 4
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
			
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/	
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

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
	
		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
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
		
		if($settings['on_sale'] == 'true'){
			$args['meta_key'] = '_sale_price';
			$args['meta_value'] = array('');
			$args['meta_compare'] = 'NOT IN';
		}
		
		if($settings['list_type'] == 'type3'){
			$slidetype = '';
			$slidestyle = '';
		} elseif($settings['list_type'] == 'type2'){
			$slidetype = 'for-fashion';
			$slidestyle = 'style-4';
		} else {
			$slidetype = 'for-widgets';
			$slidestyle = '';
		}

	
		$output .= '<div class="products list-style '.esc_attr($slidetype).'" data-perpage="'.esc_attr($settings['post_count']).'">';

		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$stock_text = $product->get_availability();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'blonwe_wishlist_button', '0' );
				$compare = get_theme_mod( 'blonwe_compare_button', '0' );
				$quickview = get_theme_mod( 'blonwe_quick_view_button', '0' );
				$managestock = $product->managing_stock();
				$total_sales = $product->get_total_sales();
				$stock_quantity = $product->get_stock_quantity();
				
				if( $product->is_type('variable') ) {
					$variation_ids = $product->get_visible_children();

					if($variation_ids[0]){
						$variation = wc_get_product( $variation_ids[0] );
				
						$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
					} else {
						$sale_price_dates_to = '';
					}
				} else {
					$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
				}
				
			
				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}
				
			
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				
				if($settings['product_type'] == 'type2'){
					$output .= blonwe_product_type_list3();
				} else {
					$output .= '<div class="product-wrapper '.esc_attr($slidestyle).'">';
					$output .= '<div class="product-inner">';
					$output .= '<div class="thumbnail-wrapper entry-media">';
					$output .= '<a class="product-thumbnail" href="'.get_permalink().'">';
					$output .= blonwe_product_image();
					$output .= '</a>';
					$output .= '</div>';
					$output .= '<div class="content-wrapper">';
					if($ratingcount){
					  $output .= '<div class="product-rating">';
						$output .= $rating;
						$output .= '<div class="rating-count"> <span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe-core'), $ratingcount).'</span></div>';
						$output .= '</div>';
					}
					$output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
					$output .= '<span class="price">';
					$output .= $price;
					$output .= '</span>';                  
					$output .= '</div>';
					$output .= '</div>';

					if($sale_price_dates_to){
						$output .= '<div class="product-countdown">';
						$output .= '<div class="klb-countdown-wrapper">';
						$output .= '<div class="klb-countdown filled size-xs" data-date="'.esc_attr($sale_price_dates_to).'">';
						$output .= '<div class="count-item">';
						$output .= '<div class="count days"></div>';
						$output .= '</div>';
						$output .= '<span class="sep-h">:</span>';
						$output .= '<div class="count-item">';
						$output .= '<div class="count hours"></div>';
						$output .= '</div>';
						$output .= '<span class="sep-m">:</span>';
						$output .= '<div class="count-item">';
						$output .= '<div class="count minutes"></div>';
						$output .= '</div>';
						$output .= '<span class="sep-s">:</span>';
						$output .= '<div class="count-item">';
						$output .= '<div class="count second"></div>';
						$output .= '</div>';
						$output .= '</div>';
						$output .= '</div>';
						$output .= '<p>'.esc_html($settings['countdown_title']).'</p>';
						$output .= '</div>';
					}
				 
					$output .= '</div>';
				}
				
				
				$output .= '</div>';
				
			endwhile;
		}
		wp_reset_postdata();

		$output .= '</div>';
		
		echo $output;
	}

}
