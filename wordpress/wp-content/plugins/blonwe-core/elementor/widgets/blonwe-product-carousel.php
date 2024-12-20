<?php

namespace Elementor;

class Blonwe_Product_Carousel_Widget extends Widget_Base {
    use Blonwe_Helper;

    public function get_name() {
        return 'blonwe-product-carousel';
    }
    public function get_title() {
        return esc_html__('Product Carousel (K)', 'blonwe-core');
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
				'default' => 'true',
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

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->blonwe_query_elementor_controls($post_count = 3, $column = 3, $carousel = 'yes');
		/***** END QUERY CONTROLS SECTION *****/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		$contenttype = '';
		
		if($settings['content_type'] == 'type3'){
			$contenttype .= 'arrows-style-2 gutter-5 align-start';
		} elseif($settings['content_type'] == 'type2'){
			$contenttype .= 'arrows-style-2 gutter-10 align-start';
		} else {
			$contenttype .= 'bordered arrows-style-1';
		}
		
		$output .= '<div class="klb-slider-wrapper">';
		$output .= '<div class="klb-loader-wrapper">';
		$output .= '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
		$output .= '</div>';
		$output .= '<div class="klb-slider carousel-style products arrows-center arrows-white-border hidden-arrows zoom-effect dots-style-1 '.esc_attr($contenttype).'" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="false">';
        
		$output .= $this->blonwe_elementor_product_loop($settings, $productslider = 'yes');
		
		$output .= '</div>';
		$output .= '</div>';

		echo $output;
	}

}
