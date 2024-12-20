<?php

namespace Elementor;

class Blonwe_Vendor_Carousel2_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-vendor-carousel2';
    }
    public function get_title() {
        return esc_html__('Vendor Carousel 2 (K)', 'blonwe-core');
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5',
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
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );
		
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="klb-module module-carousel default">';
		echo '<div class="module-body klb-slider-wrapper">';
		echo '<div class="klb-loader-wrapper">';
		echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
		echo '</div><!-- klb-loader-wrapper -->';  
		echo '<div class="klb-slider carousel-style arrows-center arrows-style-1 arrows-white-border hidden-arrows zoom-effect dots-style-1 gutter-10" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="3" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="false">';
		
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
			$store_banner_url         = $store_banner_id ? wp_get_attachment_image_src( $store_banner_id ) : '';
			$show_store_open_close    = dokan_get_option( 'store_open_close', 'dokan_appearance', 'on' );
			$dokan_store_time_enabled = isset( $store_info['dokan_store_time_enabled'] ) ? $store_info['dokan_store_time_enabled'] : '';
			$store_open_is_on         = ( 'on' === $show_store_open_close && 'yes' === $dokan_store_time_enabled && ! $is_store_featured ) ? 'store_open_is_on' : '';
		
			echo '<div class="slider-item">';
			echo '<div class="klb-storebox style-3">';
			echo '<a href="'.esc_url($store_url ).'">';
			echo '<div class="store-detail">';
			echo '<div class="store-avatar" style="background-color: #000;">';
			echo '<img src="'.esc_url( $vendor->get_avatar() ).'" />';
			echo '</div><!-- store-avatar -->';
			echo '<div class="store-info">';
			echo '<div class="store-name">'.esc_html($store_name ).'</div>';
			echo '<div class="store-description">'.blonwe_sanitize_data($vendor->description).'</div>';
							
			echo '<a href="'.esc_url($store_url ).'" class="btn link icon-right">'.esc_html__( 'View All Products', 'blonwe-core' ).'<i class="klb-icon-right-arrow-large"></i></a>';
			echo '</div><!-- store-info -->';
			echo '</div><!-- store-detail -->';
			echo '</a>';
			echo '</div><!-- klb-storebox -->';        
			echo '</div><!-- slider-item -->';
		}		
		
		echo '</div><!-- klb-slider -->';
		echo '</div><!-- module-body -->';
		echo '</div><!-- klb-module -->'; 
		
	}

}
