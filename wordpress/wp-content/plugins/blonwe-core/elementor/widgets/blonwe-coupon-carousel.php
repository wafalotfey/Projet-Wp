<?php

namespace Elementor;

class Blonwe_Coupon_Carousel_Widget extends Widget_Base {
	use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-coupon-carousel';
    }
    public function get_title() {
        return esc_html__('Coupon Carousel (K)', 'blonwe-core');
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'blonwe' ];
    }

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'2' 	  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
					'5'		  => esc_html__( '5 Columns', 'blonwe-core' ),
					'6'		  => esc_html__( '6 Columns', 'blonwe-core' ),
					'7'		  => esc_html__( '7 Columns', 'blonwe-core' ),
					'8'		  => esc_html__( '8 Columns', 'blonwe-core' ),
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
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
				],
			]
		);
		
		// Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'shop_coupon', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
		$this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->blonwe_cpt_get_post_title('shop_coupon'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
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
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );
		
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		$outmodal = '';
		
		if(is_front_page()){
		$args['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
		$args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		$args['post_type'] = 'shop_coupon';
		
		$args = array(
			'post_type' => 'shop_coupon',
			'posts_per_page' => $settings['post_count'],
			'post__in'       => $settings['post_include_filter'],
			'post_status'    => 'publish',
		);
			
		query_posts( $args );

		$output .= '<div class="klb-slider carousel-style products arrows-center arrows-style-2 arrows-white-border hidden-arrows zoom-effect dots-style-1 gutter-15 align-start" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="3" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-infinite="false">';
		
		
		
		if( have_posts() ) : while ( have_posts() ) : the_post();
			global $product;
			global $post;
			global $woocommerce;
			global $wp_query;
				
				
			$destination_url = get_post_meta( get_the_ID(), 'klb_coupon_destination_url', true );
			$blog_thumbnail= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "blonwe-portfolio-thumb" );
			$blog_image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );				 
			$imageresize = blonwe_resize( $blog_image[0], 296, 236, true, true, true );
			
			$coupon = new \WC_Coupon(get_the_ID());
			$date = $coupon->get_date_expires();
		
			$coupon_amount = get_post_meta( get_the_ID(), 'coupon_amount', true );
			$discount_type = get_post_meta( get_the_ID(), 'discount_type', true );

			$titleid = get_the_title();
			$strid =  preg_replace('/[^a-zA-Z0-9-_\.]/','', $titleid); 
			
			$output .= '<div class="slider-item">';
			
			
			$output .= '<div class="product">';
			$output .= '<div class="product-wrapper style-10 ">';
			$output .= '<div class="product-inner">';
                        
			$output .= '<div class="thumbnail-wrapper entry-media">';
			$output .= '<a href="#" class="product-thumbnail">';
			$output .= '<img src="'.esc_url($imageresize).'" alt="'.get_the_title().'">';
			$output .= '</a>';
			$output .= '<div class="thumbnail-buttons">';
			
			$output .= '</div><!-- thumbnail-buttons -->';
			$output .= '</div><!-- thumbnail-wrapper --> ';
			$output .= '<div class="content-wrapper">';
			$output .= '<h2 class="product-title"><a href="#">'.get_the_excerpt().'</a></h2>';
			
			$output .= '<div class="entry-description">';
			$output .= '<p>'.get_the_content().'</p>';
			$output .= '</div><!-- entry-description -->';
                        
			$output .= '<div class="price-block">';
			if($discount_type == 'fixed_cart' || $discount_type == 'fixed_product'){
			$output .= '<span class="badge background-green-light">'.get_woocommerce_currency_symbol().$coupon_amount.' '.esc_html__(' OFF','blonwe-core').'</span>';
			} else {
			$output .= '<span class="badge background-green-light">'.$coupon_amount.'% '.esc_html__(' OFF','blonwe-core').'</span>';
			}
			$output .= '</div><!-- price-block -->';
			
			$output .= '<div class="product-buttons primary-button">';
			$output .= '<a href="#'.esc_attr($strid.get_the_ID()).'" class="button default outline coupon-modal-trigger" data-code="'.get_the_title().'">'.esc_html__('Copy Code','blonwe-core').'</a>';
			
			if($date){
				
				$output .= '<div class="klb-countdown-wrapper">';
				$output .= '<div class="klb-countdown style-mini size-xs separate-second" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
				$output .= '<div class="count-item">';
				$output .= '<div class="count days"></div>';
				$output .= '<div class="count-label">'.esc_html__('d','blonwe-core').'</div>';
				$output .= '</div><!-- count-item -->';
				$output .= '<span class="sep-h">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count hours"></div>';
				$output .= '<div class="count-label">'.esc_html__('h','blonwe-core').'</div>';
				$output .= '</div><!-- count-item -->';
				$output .= '<span class="sep-m">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count minutes"></div>';
				$output .= '<div class="count-label">'.esc_html__('m','blonwe-core').'</div>';
				$output .= '</div><!-- count-item -->';
				$output .= '<span class="sep-s">:</span>';
				$output .= '<div class="count-item">';
				$output .= '<div class="count second"></div>';
				$output .= '<div class="count-label">'.esc_html__('s','blonwe-core').'</div>';
				$output .= '</div><!-- count-item -->';
				$output .= '</div><!-- klb-countdown -->';
				$output .= '</div><!-- klb-countdown-wrapper -->';
				
			}	
			
			$output .= '</div><!-- product-buttons -->';
			$output .= '</div><!-- content-wrapper -->';
			$output .= '</div><!-- product-inner -->';
			$output .= '</div><!-- product-wrapper -->';
			$output .= '</div><!-- product -->'; 
			$output .= '</div>';
			
			
			$outmodal .= '<div id="'.esc_attr($strid.get_the_ID()).'" class="klb-coupon-modal white-popup mfp-hide">';
			$outmodal .= '<div class="klb-coupon-inner">';
			$outmodal .= '<div class="store-thumbnail" style="background-color: #000;">';
			$outmodal .= '<img class="img-responsive" src="'.esc_url($imageresize).'" alt="'.get_the_title().'">';
			$outmodal .= '</div><!-- store-thumbnail -->';
			$outmodal .= '<div class="store-content">';
			$outmodal .= '<h4 class="store-name">'.get_the_excerpt().'</h4>';
			$outmodal .= '<div class="entry-description">';
			$outmodal .= '<p>'.get_the_content().'</p>';
			$outmodal .= '</div><!-- entry-description -->';
			$outmodal .= '<div class="coupon-code">';
			$outmodal .= '<div class="code">'.get_the_title().'</div>';
			$outmodal .= '</div><!-- coupon-code -->';
			$outmodal .= '</div><!-- store-content -->';
			$outmodal .= '</div><!-- klb-coupon-inner -->';
			$outmodal .= '</div>';
			
			
			endwhile;
			wp_reset_query();
			endif;
			
			$output .= '</div>';
			
			
			echo  	'<div class="klb-module module-carousel default">
						<div class="module-body klb-slider-wrapper">
						  <div class="klb-loader-wrapper">
							<div class="klb-loader" data-size="" data-color="" data-border=""></div>
						  </div><!-- klb-loader-wrapper --> 
						  '.$output.'
						</div>
						'.$outmodal.'
					</div>';

	}

}
