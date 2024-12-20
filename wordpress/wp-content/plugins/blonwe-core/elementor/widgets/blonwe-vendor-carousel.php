<?php

namespace Elementor;

class Blonwe_Vendor_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-vendor-carousel';
    }
    public function get_title() {
        return esc_html__('Vendor Carousel (K)', 'blonwe-core');
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
		
		$this->add_control( 'vendor_type',
			[
				'label' => esc_html__( 'Stores Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
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
				'default' => '1',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'1' 	  => esc_html__( '1 Column', 'blonwe-core' ),
					'2'		  => esc_html__( '2 Columns', 'blonwe-core' ),
				],
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
                'label' => esc_html__( 'Auto Speed', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'chakta' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1200',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );
		
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$carouseltype= '';
		$carouselstyle= '';
			
		if($settings['vendor_type'] == 'type2'){
			$carouseltype .= '';
			$carouselstyle .= 'style-2';
		} else {
			$carouseltype .= 'default';
			$carouselstyle .= 'style-1';
		}
		
		echo '<div class="klb-module module-carousel '.esc_attr($carouseltype).'">';
		echo '<div class="module-body klb-slider-wrapper">';
		echo '<div class="klb-loader-wrapper">';
		echo '<div class="klb-loader" data-size="md" data-color="primary" data-border="sm"></div>';
		echo '</div><!-- klb-loader-wrapper -->';
				
		echo '<div class="klb-slider carousel-style arrows-center arrows-style-1 arrows-white-border hidden-arrows zoom-effect dots-style-1 gutter-5" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="2" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="false">';
 

		 $sellers = dokan_get_sellers();
		 
		 foreach ($sellers['users'] as $seller){
			$vendor                   = dokan()->vendor->get( $seller->ID );
			$store_banner_id          = $vendor->get_banner_id();
			$store_name               = $vendor->get_shop_name();
			$store_url                = $vendor->get_shop_url();
			$store_rating             = $vendor->get_rating();
			$is_store_featured        = $vendor->is_featured();
			$store_phone              = $vendor->get_phone();
			$store_info               = dokan_get_store_info( $seller->ID );
			$store_address            = dokan_get_seller_short_address( $seller->ID );
			$store_banner_url         = $store_banner_id ? wp_get_attachment_image_src( $store_banner_id, $image_size ) : '';
			$show_store_open_close    = dokan_get_option( 'store_open_close', 'dokan_appearance', 'on' );
			$dokan_store_time_enabled = isset( $store_info['dokan_store_time_enabled'] ) ? $store_info['dokan_store_time_enabled'] : '';
			$store_open_is_on         = ( 'on' === $show_store_open_close && 'yes' === $dokan_store_time_enabled && ! $is_store_featured ) ? 'store_open_is_on' : '';
			
			echo '<div class="slider-item">';
			echo '<div class="klb-storebox '.esc_attr($carouselstyle).'">';
			echo '<a href="'.esc_url($store_url ).'">';
			echo '<div class="store-detail">';
			echo '<div class="store-avatar">';
			echo '<img src="'.esc_url( $vendor->get_avatar() ).'" />';
			echo '</div><!-- store-avatar -->';
			echo '<div class="store-info">';
			echo '<div class="store-name">'.esc_html($store_name ).'</div>';
			if ( $is_store_featured ){
			echo '<div class="store-caption">'.esc_html__( 'Featured', 'blonwe-core' ).'</div>';
			}
			
			echo '<div class="store-rating">';
			echo '<i class="klb-icon-star"></i>';
			echo '<p><strong>'.esc_html($store_rating['rating']).'</strong> '.esc_html__('Rating', 'blonwe-core').'</p>';
			echo '</div><!-- store-rating -->';
			echo '</div><!-- store-info -->';
			echo '</div><!-- store-detail -->';
			
			
			$args = array(
			    'author' => $seller->ID,
				'post_type' => 'product',
				'posts_per_page' => 3,
				'order'          => 'DESC',
				'post_status'    => 'publish',
			);
		
			$args['klb_special_query'] = true;
			
			$count = 1;
			
			$loop = new \WP_Query( $args );
			if ( $loop->have_posts() ) {
				
				echo '<div class="store-products">';
				
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					global $post;
					global $woocommerce;
					
					$allproduct = wc_get_product( get_the_ID() );
					$price = $allproduct->get_price_html();
					
					if($settings['vendor_type'] == 'type2'){
						echo '<div class="column">';
						echo '<div class="product-item">';
						echo '<div class="product-image">';
						echo blonwe_product_image();
						echo '</div>';
						echo '<div class="product-price">';
						echo '<span class="price">';
						echo $price;
						echo '</span><!-- price -->';
						echo '</div><!-- product-price -->';
						echo '</div><!-- product-item -->';
						echo '</div><!-- column -->';
					} else {
						if($count == 1){
							echo '<div class="column">';
							echo '<div class="product-item">';
							echo '<div class="product-image">';
							echo blonwe_product_image();
							echo '</div>';
							echo '<div class="product-price">';
							echo '<span class="price">';
							echo $price;
							echo '</span><!-- price -->';
							echo '</div><!-- product-price -->';
							echo '</div><!-- product-item -->';
							echo '</div><!-- column -->';
							echo '<div class="column">';
						} else {
							echo '<div class="child-column">';
							echo '<div class="product-item">';
							echo '<div class="product-image">';
							echo blonwe_product_image();
							echo '</div>';
							echo '<div class="product-price">';
							echo '<span class="price">';
							echo $price;
							echo '</span><!-- price -->';
							echo '</div><!-- product-price -->';
							echo '</div><!-- product-item -->';
							echo '</div><!-- child-column -->';
						}
					
						if ($count == $loop->post_count) {
							echo '</div><!-- column -->';
						}
						
						$count++;
					}
				endwhile;
				
				if($settings['vendor_type'] == 'type2'){
					echo '<div class="column product-count">';
					echo '<div class="store-total-product">+'.count_user_posts($seller->ID, 'product').'</div>';
					echo '</div><!-- column -->';
				}
				
				echo '</div><!-- store-products -->';
				
			}
			wp_reset_postdata();
			
			
			echo '</a>';
			echo '</div><!-- klb-storebox -->';
			echo '</div><!-- slider-item -->';
		 }
 
		
		echo '</div><!-- klb-slider -->';
		echo '</div><!-- module-body -->';
		echo '</div><!-- klb-module -->';
		
	}

}
