<?php

class widget_social_media extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Only Detail Page: Social Media.','blonwe-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'social_media' );
		 parent::__construct( 'social_media', esc_html__('Blonwe Social Media','blonwe-core'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>

		
		<?php $socialmedia = get_theme_mod( 'blonwe_social_media_widget' ); ?>
		<?php if(!empty($socialmedia)){ ?>
			<div class="widget-body">
				<div class="site-social for-widget">
					<ul class="social-color">
						<?php foreach($socialmedia as $s){ ?>
							<li> 
								<a class="<?php echo esc_attr($s['social_icon']); ?>" href="<?php echo esc_url($s['social_url']); ?>"> 
									<div class="social-icon"> <i class="klb-social-icon-<?php echo esc_attr($s['social_icon']); ?>"></i></div>
									<div class="social-label"><?php echo esc_html($s['social_icon']); ?></div>
								</a>
							</li>						  
						<?php } ?>
					</ul>
				</div>
			</div>
		<?php } ?>
	


		<?php echo $after_widget;

	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','blonwe-core'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		  <?php esc_html_e('You can customize the social media from Dashboard > Appearance > Customize > blonwe Widgets > Social Media','blonwe-core'); ?>

		</p>
	<?php
	}
}

// Add Widget
function widget_social_media_init() {
	register_widget('widget_social_media');
}
add_action('widgets_init', 'widget_social_media_init');

?>