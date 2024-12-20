<?php

namespace Elementor;

class Blonwe_Deals_Product_Widget extends Widget_Base {
    use Blonwe_Helper;

    public function get_name() {
        return 'blonwe-deals-product';
    }
    public function get_title() {
        return esc_html__('Deals Product (K)', 'blonwe-core');
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
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 1
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

		$output .= '<div class="klb-module module-products-grid style-9">';
		$output .= '<div class="center">';
		$output .= '<div class="products">';
		
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
				$short_desc = $product->get_short_description();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'blonwe_wishlist_button', '0' );
				$compare = get_theme_mod( 'blonwe_compare_button', '0' );
				$quickview = get_theme_mod( 'blonwe_quick_view_button', '0' );
				$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';

				$managestock = $product->managing_stock();
				$stock_quantity = $product->get_stock_quantity();
				$stock_format = esc_html__('Only %s left in stock','blonwe-core');
				$stock_poor = '';
				if($managestock && $stock_quantity < 10) {
					$stock_poor .= '<div class="product-message color-danger">'.sprintf($stock_format, $stock_quantity).'</div>';
				}
				
				$total_sales = $product->get_total_sales();
				$total_stock = $total_sales + $stock_quantity;
				
				if($managestock) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}

				$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';
				
				 $output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				$output .= '<div class="product-wrapper style-5">';
				$output .= '<div class="product-inner">';
				$output .= '<div class="thumbnail-wrapper">';
							
					$output .= blonwe_sale_percentage();
		  
					ob_start();
					$output .= blonwe_product_second_image();
					$output .= ob_get_clean();
					
				$output .= '<div class="thumbnail-buttons">';
					ob_start();
					do_action('blonwe_wishlist_action');
					$output .= ob_get_clean();

					$output .= blonwe_quickview('quickview_type1');
					
					ob_start();
					do_action('blonwe_compare_action');
					$output .= ob_get_clean();
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<div class="content-wrapper">';
				
				if($ratingcount){	
					$output .= '<div class="product-rating">';
					$output .= $rating;
					$output .= '<div class="rating-count">';
					$output .= '<span class="count-text">'.sprintf(_n('%d', '%d', $ratingcount, 'blonwe-core'), $ratingcount).'</span>';
					$output .= '</div><!-- rating-count -->';
					$output .= '</div><!-- product-rating -->  ';
				} 

                $output .= '<h2 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';                          
				$output .= '<span class="price">';
                $output .= $price;
				$output .= '</span>';
			
				if($managestock && $stock_quantity > 0) {
					$output .= '<div class="product-progress">';
					$output .= '<div class="product-progressbar style-1 size-6">';
					$output .= '<span class="progressbar" style="width: '.$progress_percentage.'%"></span>';
					$output .= '</div>';
					$output .= '<div class="product-progress-detail">';
					$output .= '<div class="product-stock">';
					$output .= '<div class="available">'.esc_html__('Available:','blonwe-core').' <strong>'.esc_html($stock_quantity).'</strong></div>';
					$output .= '<div class="sold">'.esc_html__('Sold:','blonwe-core').'<strong>'.esc_html($total_sales).'</strong></div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
				}
				
				if($short_desc){
				$output .= '<div class="product-checklist">';
					$output .= $short_desc;
				$output .= ' </div>';
				}
				
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				
			endwhile;
		}
		wp_reset_postdata();
		

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		echo $output;
	}

}
