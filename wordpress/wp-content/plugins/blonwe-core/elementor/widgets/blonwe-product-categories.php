<?php

namespace Elementor;

class Blonwe_Product_Categories_Widget extends Widget_Base {
    use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-product-categories';
    }
    public function get_title() {
        return esc_html__('Product Categories (K)', 'blonwe-core');
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


		$this->start_controls_tabs('cat_exclude_include_tabs');
        $this->start_controls_tab('cat_include_tab',
            [ 'label' => esc_html__( 'Include Category', 'blonwe-core' ) ]
        );
       
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Include Category', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->blonwe_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_include_tab 
		
        $this->start_controls_tab( 'cat_exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'blonwe-core' ) ]
        );
		
        $this->add_control( 'exclude_category',
            [
                'label' => esc_html__( 'Exclude Category', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->blonwe_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
       
		$this->end_controls_tab(); // cat_exclude_tab

		$this->end_controls_tabs(); // cat_exclude_include_tabs
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'6' 	  => esc_html__( '2 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '4 Columns', 'blonwe-core' ),
				],
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
                'default' => 'ASC'
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
                'default' => 'menu_order',
            ]
        );
	
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if($settings['cat_filter'] || $settings['exclude_category']){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent'    => 0,
				'include'   => $settings['cat_filter'],
				'exclude'   => $settings['exclude_category'],
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		} else {
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent'    => 0,
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		}
		
		
		echo '<div class="row">';
			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				
				echo '<div class="klb-product-category col col-12 col-md-'.esc_attr($settings['column']).'">';
				echo '<div class="klb-category-block style-3">';
				if($image){
				echo '<div class="category-thumbnail"><a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a></div>';
				}
				
				echo '<div class="category-detail">';
				echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
				echo '<div class="category-count">+'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
					if($term_children){
						$count = 0;
						echo '<ul class="sub-categories">';
						foreach($term_children as $child){
							if($count < 4){
							$childterm = get_term_by( 'id', $child, 'product_cat' );
							
							echo '<li><a href="'.esc_url(get_term_link( $child )).'">'.esc_html($childterm->name).'</a></li>';
							}
							
							$count++;
						}
						echo '</ul>';
					}  
                echo '<a href="'.esc_url(get_term_link( $term )).'" class="btn link color-blue icon-right">'.esc_html__('All','blonwe-core').' '.esc_html($term->name).'<i class="klb-icon-right-arrow-large"></i></a>';
				echo ' </div>';
				
				echo '</div>';
				echo '</div>';
			}
		echo '</div>';
		
	}

}
