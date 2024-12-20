<?php

namespace Elementor;

class Blonwe_Product_Grid_Widget extends Widget_Base {
    use Blonwe_Helper;

    public function get_name() {
        return 'blonwe-product-grid';
    }
    public function get_title() {
        return esc_html__('Product Grid (K)', 'blonwe-core');
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
		
		$this->add_control( 'grid_type',
			[
				'label' => esc_html__( 'Product Grid Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' 	=> esc_html__( 'Select Type', 'blonwe-core' ),
					'type1' 		=> esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'			=> esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'			=> esc_html__( 'Type 3', 'blonwe-core' ),
					'type4'			=> esc_html__( 'Type 4', 'blonwe-core' ),
				],
			]
		);
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->blonwe_query_elementor_controls($post_count = 4, $column = 2);
		/***** END QUERY CONTROLS SECTION *****/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if($settings['grid_type'] == 'type4'){
			$output .= '<div class="custom-product-block small bordered shadowed">';
			$output .= '<div class="products mobile-grid-'.esc_attr($settings['mobile_column']).' column-'.esc_attr($settings['column']).'">';
			$output .= $this->blonwe_elementor_product_loop($settings);   
			$output .= '</div>';
			$output .= '</div>';
			
			echo $output;
		} elseif($settings['grid_type'] == 'type3'){
			$output .= '<div class="klb-module module-products-grid style-4">';
			$output .= '<div class="module-body grid-wrapper bordered">';
			$output .= '<div class="products grid-column mobile-grid-'.esc_attr($settings['mobile_column']).' column-'.esc_attr($settings['column']).' no-gutters">';
			$output .= $this->blonwe_elementor_product_loop($settings);   
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			
			echo $output;
			
		} elseif($settings['grid_type'] == 'type2'){
			$output .= '<div class="klb-module module-products-grid style-8">';
			$output .= '<div class="products  mobile-grid-'.esc_attr($settings['mobile_column']).' column-'.esc_attr($settings['column']).'">';
			$output .= $this->blonwe_elementor_product_loop($settings);   
			$output .= '</div>';
			$output .= '</div>';
			
			echo $output;
			
		} else {
			$output .= '<div class="klb-module module-products-grid style-5">';
			$output .= '<div class="module-body grid-wrapper">';
			$output .= '<div class="module-column">';
			$output .= '<div class="products grid-column mobile-grid-'.esc_attr($settings['mobile_column']).' column-'.esc_attr($settings['column']).'">';
			$output .= $this->blonwe_elementor_product_loop($settings);   
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			
			echo $output;
		}		
	}

}
