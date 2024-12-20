<?php

class widget_search_filter extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Display the search filter','blonwe-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'search_filter' );
		 parent::__construct( 'search_filter', esc_html__('Blonwe Search Filter','blonwe-core'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$subtitle = $instance['subtitle'];	
		$attribute_items = $instance['attribute_items'];
		
		echo $before_widget;
		?>
		
		<div class="widget-body"> 
			<h4 class="widget-title"><?php echo esc_html($title); ?></h4>
			<div class="widget-body"> 
				<div class="entry-description"> 
					<p><?php echo esc_html($subtitle); ?></p>
				</div>
					
				<?php

					if($attribute_items){
						
						wp_enqueue_script('blonwe-attribute-filter');
						
						$str = str_replace(' ','',$attribute_items);
						$attribute_array = explode(',',$str);
				 
						echo '<form class="service-search-form" id="klb-attribute-filter" action="' . wc_get_page_permalink( 'shop' ) . '" method="get">';
						
						foreach($attribute_array as $item_name){

							$terms = get_terms( 'pa_'.$item_name, array(
								'orderby' => 'menu_order',
								'hide_empty' => true,
								'parent' => 0,
							));

							$label_name = wc_attribute_label( 'pa_'.$item_name );

							echo '<div class="form-column">';
							echo '<select class="theme-select" name="filter_'.esc_attr($item_name).'" id="filter_'.esc_attr($item_name).'" tax="pa_'.$item_name.'" data-placeholder="'.esc_attr__('Select', 'blonwe-core').' '.esc_attr($label_name).'" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'blonwe-core').'">';
							
							echo '<option value="">'.sprintf('Select %s', $label_name).'</option>';
							foreach ($terms as $term) {
								echo '<option id="'.esc_attr($term->term_id).'" value="'.esc_attr($term->slug).'">'.esc_html($term->name).'</option>';
							}
							echo '</select>';
							echo '</div>';
							
							$childcount = 1;
							foreach ($terms as $term) {
								$term_children = get_term_children( $term->term_id, 'pa_'.$item_name );
								
								if($term_children && $childcount == 1){
									echo '<div class="form-column">';
									echo '<select class="child-attr theme-select" id="child_filter_'.esc_attr($item_name).'" name="filter_'.esc_attr($item_name).'" data-placeholder="'.esc_attr__('Select Model', 'blonwe-core').'" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'blonwe-core').'" disabled>';
									echo '<option value="0">'.sprintf('Select %s First', $item_name).'</option>';
									echo '</select>';
									echo '</div>';
								}
								$childcount++;
							}
							
							echo '<input type="text" id="klb_filter_'.esc_attr($item_name).'" name="filter_'.esc_attr($item_name).'" value="" hidden/>';
						}
						echo '<div class="form-column">';
						echo '<button class="btn primary">'.esc_html__('Find Auto Parts','blonwe-core').'</button>';
						echo '</div>';
						
						echo '</form>';
					}
					
				?>
			</div>
		</div>
          
		<?php echo $after_widget;
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = $new_instance['subtitle'];
		$instance['attribute_items'] = $new_instance['attribute_items'];
		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => 'Find Your Part', 'subtitle' => '', 'attribute_items' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','blonwe-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php esc_html_e('Subtitle:','medibazar-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" value="<?php echo $instance['subtitle']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('attribute_items'); ?>"><?php esc_html_e('Attribute Items:','klb-attribute-search'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('attribute_items'); ?>" name="<?php echo $this->get_field_name('attribute_items'); ?>" value="<?php echo $instance['attribute_items']; ?>" />
		</p>
	<?php
	}
}

// Add Widget
function widget_search_filter_init() {
	register_widget('widget_search_filter');
}
add_action('widgets_init', 'widget_search_filter_init');

?>