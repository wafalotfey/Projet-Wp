<?php

namespace Elementor;

class Blonwe_Product_Search_Widget extends Widget_Base {
	use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-product-search';
    }
    public function get_title() {
        return esc_html__('Product Search (K)', 'blonwe-core');
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

        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'blonwe-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'blonwe-core' ),
                    'title' => esc_html__( 'Title', 'blonwe-core' ),
                ],
                'default' => 'menu_order',
            ]
        );

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Find The Right Parts Faster',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Having the right automotive parts and car accessories will help you to boost your travel comfort and go on the long-distance journey comfortably that you have been planning.',
				'label_block' => true,
            ]
        );
		
		$repeater = new Repeater();
        $repeater->add_control( 'attribute_name',
            [
                'label' => esc_html__( 'Filter Attributes', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'multiple' => true,
                'options' => $this->blonwe_woo_attributes(),
                'description' => 'Select Attribute',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'attribute_items',
            [
                'label' => esc_html__( 'Attributes', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'attributes' => '',
                    ],
                    [
						'attributes' => '',
                    ],
                ]
            ]
        );
		
        $this->add_control( 'button_text',
            [
                'label' => esc_html__( 'Button text', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Find Auto Parts',
				'label_block' => true,
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		echo '<div class="klb-custom-form">';
		echo '<div class="custom-form-header">';
		echo '<h2 class="entry-title">'.esc_html($settings['title']).'</h2>';
		echo '<div class="entry-description">';
		echo '<p>'.esc_html($settings['desc']).'</p>';
		echo '</div><!-- entry-description -->';
		echo '</div><!-- custom-form-header -->';
		echo '<div class="custom-form-body">';
		
		if($settings['attribute_items']){
			wp_enqueue_script('blonwe-attribute-filter');
			
			echo '<form class="service-search-form" id="klb-attribute-filter" action="' . wc_get_page_permalink( 'shop' ) . '" method="get">';
			
			
				foreach($settings['attribute_items'] as $item){
					$terms = get_terms( 'pa_'.$item['attribute_name'], array(
						'orderby' => $settings['orderby'],
						'hide_empty' => true,
						'parent' => 0,
					));
					
					$label_name = wc_attribute_label( 'pa_'.$item['attribute_name'] );

					echo '<div class="form-column"> ';
					echo '<select class="theme-select" name="filter_'.esc_attr($item['attribute_name']).'" id="filter_'.esc_attr($item['attribute_name']).'" tax="pa_'.$item['attribute_name'].'" data-placeholder="'.esc_attr__('Select','blonwe-core').' '.esc_attr($label_name).'" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'blonwe-core').'">';
					echo '<option value="">'.sprintf(esc_html__('Select %s','blonwe-core'), $label_name).'</option>';
					foreach ($terms as $term) {
						echo '<option id="'.esc_attr($term->term_id).'" value="'.esc_attr($term->slug).'">'.esc_html($term->name).'</option>';
					}
					echo '</select>';
					echo '</div>';
					
					$childcount = 1;
					foreach ($terms as $term) {
						$term_children = get_term_children( $term->term_id, 'pa_'.$item['attribute_name'] );
						
						if($term_children && $childcount == 1){
							echo '<div class="form-column"> ';
							echo '<select class="child-attr theme-select" id="child_filter_'.esc_attr($item['attribute_name']).'" name="filter_'.esc_attr($item['attribute_name']).'" data-placeholder="'.esc_attr__('Select','blonwe-core').' Model" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'blonwe-core').'" disabled>';
							echo '<option value="0">'.sprintf(esc_html__('Select %s First','blonwe-core'), $item['attribute_name']).'</option>';
							echo '</select>';
							echo '</div>';
						}
						$childcount++;
					}
					
					echo '<input type="text" id="klb_filter_'.esc_attr($item['attribute_name']).'" name="filter_'.esc_attr($item['attribute_name']).'" value="" hidden/>';
				}
			
				echo '<div class="form-column button-column"> ';
				echo '<button class="btn primary">'.esc_html($settings['button_text']).'</button>';
				echo '</div>';
			
			echo '</form>';
		}
		
		echo '</div><!-- custom-form-body -->';	
		echo '</div><!-- klb-custom-form -->';	
		
	}

}
