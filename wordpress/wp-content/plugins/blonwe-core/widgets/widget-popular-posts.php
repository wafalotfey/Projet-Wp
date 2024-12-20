<?php

class widget_popular_posts extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Display the popular posts','blonwe-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'popular_posts' );
		 parent::__construct( 'popular_posts', esc_html__('Blonwe Popular Posts','blonwe-core'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

		$number = $instance['number'];
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
			<div class="widget-body">
				<ul class="posts-list">
					
					<?php $count = 1; ?>
					<?php $popularpost = new WP_Query( array( 
								'posts_per_page' => $number,
								 'meta_key' => 'blonwe_post_views_count',
								 'orderby' => 'meta_value_num',
								 'order' => 'DESC' 
						   ) );
					
					while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
					<li class="post">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<?php  
							$att=get_post_thumbnail_id();
							$image_src = wp_get_attachment_image_src( $att, 'full' );
							$image_src = $image_src[0]; 
							$imgresize = blonwe_resize( $image_src, 100, 100, true, true, true );   
							?>
							<div class="entry-media">
							  <a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_url($imgresize); ?>" alt="<?php the_title_attribute(); ?>">
							  </a>
							</div><!-- entry-media -->
						<?php } ?>
                        <div class="entry-wrapper">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="entry-meta">
								<div class="entry-published">
									<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
								</div><!-- entry-published -->
							</div><!-- entry-meta -->
                        </div><!-- entry-wrapper -->
                    </li>
							
					<?php $count++; ?>	
					<?php endwhile; ?>
				</ul>
			</div>
		
		
		<?php echo $after_widget;
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => 'Popular Posts', 'number' => 3);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','blonwe-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e('Number of items to show:','blonwe-core'); ?></label>
			<input type="number" class="tiny-text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
	<?php
	}
}

// Add Widget
function widget_popular_posts_init() {
	register_widget('widget_popular_posts');
}
add_action('widgets_init', 'widget_popular_posts_init');

?>