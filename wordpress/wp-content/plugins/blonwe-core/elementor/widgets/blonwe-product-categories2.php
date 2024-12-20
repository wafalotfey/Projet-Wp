<?php

namespace Elementor;

class Blonwe_Product_Categories2_Widget extends Widget_Base {
    use Blonwe_Helper;
	
    public function get_name() {
        return 'blonwe-product-categories2';
    }
    public function get_title() {
        return esc_html__('Product Categories 2 (K)', 'blonwe-core');
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
		
		$this->add_control( 'categories_type',
			[
				'label' => esc_html__( 'Categories Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'	  => esc_html__( 'Type 3', 'blonwe-core' ),
					'type4'	  => esc_html__( 'Type 4', 'blonwe-core' ),
					'type5'	  => esc_html__( 'Type 5', 'blonwe-core' ),
					'type6'	  => esc_html__( 'Type 6', 'blonwe-core' ),
					'type7'	  => esc_html__( 'Type 7', 'blonwe-core' ),
					'type8'	  => esc_html__( 'Type 8', 'blonwe-core' ),
					'type9'	  => esc_html__( 'Type 9', 'blonwe-core' ),
					'type10'	  => esc_html__( 'Type 10', 'blonwe-core' ),
				],
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
				'default' => '6',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
					'5'		  => esc_html__( '5 Columns', 'blonwe-core' ),
					'6'		  => esc_html__( '6 Columns', 'blonwe-core' ),
					'7'		  => esc_html__( '7 Columns', 'blonwe-core' ),
					'8'		  => esc_html__( '8 Columns', 'blonwe-core' ),
					'9'		  => esc_html__( '9 Columns', 'blonwe-core' ),
				],
			]
		);

		$this->add_control( 'tablet_column',
			[
				'label' => esc_html__( 'Tablet Column', 'blonwe-core' ),
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
					'9'		  => esc_html__( '9 Columns', 'blonwe-core' ),
				],
			]
		);

		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'2' 	  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
					'5'		  => esc_html__( '5 Columns', 'blonwe-core' ),
					'6'		  => esc_html__( '6 Columns', 'blonwe-core' ),
					'7'		  => esc_html__( '7 Columns', 'blonwe-core' ),
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
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
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
				'hide_empty' => 1,
				'parent'    => 0,
				'include'   => $settings['cat_filter'],
				'exclude'   => $settings['exclude_category'],
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		} else {
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => 1,
				'parent'    => 0,
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		}
		
		if($settings['categories_type'] == 'type10'){
			
				echo '<div class="klb-slider-wrapper">';
				echo '<div class="klb-loader-wrapper">';
				echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				echo '</div>';
				echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-10" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $terms as $term ) {
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="slider-item">';
					echo '<div class="klb-category-block style-8 small entry-media">';
					if($image){
						echo '<div class="category-thumbnail">';
						echo '<img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'">';
						echo '</div>';
					}
					echo '<div class="category-detail">';
					echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
					echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
					echo '</div>';
					echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
					echo '</div>';
					echo '</div>';
				}
				
				echo '</div>';
				echo '</div>';    
			
		} elseif($settings['categories_type'] == 'type9'){
			
				echo '<div class="klb-module klb-categories-wrapper">';
				echo '<div class="klb-slider-wrapper">';
				echo '<div class="klb-loader-wrapper">';
				echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				echo '</div>';   
				echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-15" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
              
				foreach ( $terms as $term ) {
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="slider-item">';
					echo '<div class="klb-category-block style-6 small entry-media">';
					echo '<div class="category-thumbnail entry-media rounded">';
					if($image){
						echo '<img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'">';
					}
					echo '</div>';
					echo '<div class="category-detail">';
					echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
					echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
					echo '</div>';
					echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
					echo '</div>';
					echo '</div>';
				}
				
				echo '</div>';
				echo '</div>';
				echo '</div>'; 
			
		} elseif($settings['categories_type'] == 'type8'){
			
				echo '<div class="klb-module klb-categories-wrapper">';
				echo '<div class="klb-slider-wrapper">';
				echo '<div class="klb-loader-wrapper">';
				echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				echo '</div>';    
				echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-15" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';

				foreach ( $terms as $term ) {
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="slider-item">';
					echo '<div class="klb-category-block style-7 small entry-media">';
					echo '<div class="category-thumbnail entry-media">';
					if($image){
						echo '<img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'">';
					}
					echo '</div>';
					echo '<div class="category-detail">';
					echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
					echo '</div>';
					echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
					echo '</div>';
					echo '</div>';
					
				}
              
				echo '</div>';
				echo '</div>';
				echo '</div>';
				
		} elseif($settings['categories_type'] == 'type7'){
		
				echo '<div class="klb-module klb-categories-wrapper">';
				echo '<div class="klb-slider-wrapper">';
				echo '<div class="klb-loader-wrapper">';
				echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				echo '</div>';   
				echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-15" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $terms as $term ) {
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="slider-item">';
					echo '<div class="klb-category-block style-5 small entry-media">';
					echo '<div class="category-thumbnail entry-media">';
					if($image){
						echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
					}
					echo '</div>';
					echo '<div class="category-detail">';
					echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
					echo '</div>';
					echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
					echo '</div>';
					echo '</div>';
					
				}  

				echo '</div>';
				echo '</div>';
				echo '</div>';
				
		} elseif($settings['categories_type'] == 'type6'){
			
				echo '<div class="klb-slider-wrapper">';
				echo '<div class="klb-loader-wrapper">';
				echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				echo '</div>'; 
				echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-5" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $terms as $term ) {
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="slider-item">';
					echo '<div class="klb-category-block style-2 small entry-media">';
					echo '<div class="category-thumbnail">';
					if($image){
						echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
					}
					echo '</div>';
					echo '<div class="category-detail">';
					echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
					echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
					echo '</div>';
					echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
				
		} elseif($settings['categories_type'] == 'type5'){
				echo '<div class="colored-wrapper custom-yellow-light pb-35">';
				echo '<div class="container">';
				echo '<div class="klb-slider-wrapper">';
				echo '<div class="klb-loader-wrapper">';
				echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
				echo '</div>';
				echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-10" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $terms as $term ) {
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="slider-item">';
					echo '<div class="klb-category-block style-2 small entry-media">';
					echo '<div class="category-thumbnail">';
					if($image){
						echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
					}
					echo '</div>';
					echo '<div class="category-detail">';
					echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
					echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
					echo '</div>';
					echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
					echo '</div>';
					echo '</div>';
					
                }
            
				echo '</div>';
				echo '</div>'; 
				echo '</div>';
				echo '</div>';
				
		} elseif($settings['categories_type'] == 'type4'){
			echo '<div class="klb-slider-wrapper">';
			echo '<div class="klb-loader-wrapper">';
			echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
			echo '</div>';
			echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 category-bordered" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
            
			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				
				echo '<div class="slider-item">';
				echo '<div class="klb-category-block style-2 entry-media">';
				echo '<div class="category-thumbnail">';
				if($image){
				echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
				}
				echo '</div>';
				echo '<div class="category-detail">';
				echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
				echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
				echo '</div>';
				echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
				echo '</div>';
				echo '</div>';
            }
			
			echo '</div>';
			echo '</div>';
			
		} elseif($settings['categories_type'] == 'type3'){
			echo '<div class="klb-slider-wrapper">';
			echo '<div class="klb-loader-wrapper">';
			echo '<div class="klb-loader" data-size="md" data-color="primary" data-border="sm"></div>';
			echo '</div>';
			echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-shadow dots-style-1 gutter-5" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
            
			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				
				echo '<div class="slider-item">';
				echo '<div class="klb-category-block style-1 entry-media">';
				echo '<div class="category-detail">';
				echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
				
				if($term_children){
					$count = 0;
					echo '<ul>';
					foreach($term_children as $child){
						if($count < 3){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						
						echo '<li class="menu-item"><a href="'.esc_url(get_term_link( $child )).'">'.esc_html($childterm->name).'</a></li>';
						}
						
						$count++;
					}
					echo '</ul>';
				}  
		
				echo '</div>';
				echo '<div class="category-thumbnail">';
				if($image){
				echo '<img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'">';
				}
				echo '</div>';
				echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
				echo '</div>';
				echo '</div>';
            }
              
            
			echo '</div>';
			echo '</div>';
			
		} elseif($settings['categories_type'] == 'type2'){
			echo '<div class="klb-module klb-categories-wrapper">';
			echo '<div class="klb-slider-wrapper">';
			echo '<div class="klb-loader-wrapper">';
			echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
			echo '</div>';
			echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-15" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
			
			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );	
				
              
				echo '<div class="slider-item">';
				echo '<div class="klb-category-block style-6 small entry-media">';
				echo '<div class="category-thumbnail entry-media">';
				if($image){
				echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
				}
				echo '</div>';
				echo '<div class="category-detail">';
				echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
				echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
				echo '</div>';
				echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
				echo '</div>';
				echo '</div>';
              
            }    
           
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="klb-slider-wrapper">';
			echo '<div class="klb-loader-wrapper">';
			echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
			echo '</div>';
			echo '<div class="klb-slider carousel-style arrows-center arrows-style-2 arrows-white-border dots-style-1 gutter-10" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="true" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
			

			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );	
				
				echo '<div class="slider-item">';
				echo '<div class="klb-category-block style-4 small entry-media">';
				echo '<div class="category-thumbnail entry-media">';
				if($image){
				echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
				}
				echo '</div>';
				echo '<div class="category-detail">';
				echo '<h4 class="entry-title">'.esc_html($term->name).'</h4>';
				echo '<div class="category-count">'.esc_html($term->count).' '.esc_html__('Products','blonwe-core').'</div>';
				echo '</div>';
				echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
				echo '</div>';
				echo '</div>';
			}
			
			echo '</div>';
			echo '</div>';
		}
		
	}

}
