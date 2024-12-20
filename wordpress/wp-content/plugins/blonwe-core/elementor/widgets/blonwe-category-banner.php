<?php

namespace Elementor;

class Blonwe_Category_Banner_Widget extends Widget_Base {
    use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-category-banner';
    }
    public function get_title() {
        return esc_html__('Category Banner (K)', 'blonwe-core');
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$defaultimage = plugins_url( 'images/banner-38.jpg', __DIR__ );
		
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
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Aenean iaculis nisl ante fringilla suspendisse suscipit ac urna fronseka terll freiska polin...',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'child_count',
            [
                'label' => esc_html__( 'Child Item Count', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description'=> 'How many sub-categories?.',
				'label_block' => true,
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';		

		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => 1,
			'parent'    => 0,
			'number' => 1,
			'include'   => $settings['cat_filter'],
		) );
		

		foreach ( $terms as $term ) {
			$term_data = get_option('taxonomy_'.$term->term_id);
			$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
			$term_children = get_term_children( $term->term_id, 'product_cat' );
			
			echo '<div class="klb-banner inner-style small-size dark align-top justify-start space-40 w-50">';
			echo '<div class="entry-wrapper">';
			echo '<div class="entry-inner">';
			echo '<div class="entry-heading">';
			echo '<div class="entry-count-text">';
			echo '<span class="count">'.sprintf(_n('%d', '%d', $term->count, 'blonwe-core'), $term->count).'</span>'.sprintf(_n('Product', 'Products', $term->count, 'blonwe-core'), $term->count);
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-body">';
			echo '<h2 class="entry-title font-md-42 weight-500">'.esc_html($term->name).'</h2>';
			echo '<div class="entry-excerpt font-md-16 weight-400">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
				
				$count = 1;
				
				if($term_children){
					echo '<div class="entry-footer">';
					echo '<nav class="sub-categories">';
					echo '<ul>';
					foreach($term_children as $child){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						if($settings['child_count']){
							if($count <= $settings['child_count']){
							echo '<li class="menu-item"><a href="'.esc_url(get_term_link( $childterm )).'">'.esc_html($childterm->name).'</a></li>';
							}
						} else {
							echo '<li class="menu-item"><a href="'.esc_url(get_term_link( $childterm )).'">'.esc_html($childterm->name).'</a></li>';
						}
						$count++;
					}
					echo '</ul>';
					echo '</nav>';
					echo '</div>';
					
					
				}
				
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
			echo '</div>';
			echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
			echo '</div>';
			
		}
		
	}

}
