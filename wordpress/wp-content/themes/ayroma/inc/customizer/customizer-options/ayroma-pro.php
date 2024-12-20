<?php
function ayroma_upsale_setting( $wp_customize ) {
	
	$wp_customize->add_section(
        'aromatic_upsale',
        array(
            'title' 		=> __('Get More Features in Ayroma Pro','ayroma'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	 Buttons
	=========================================*/
	
	class Ayroma_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'aromatic_upsale';

	   function render_content() {
		?>
			<div class="upsale_info">
				<ul>
					<li><a href="https://preview.sellerthemes.com/pro/ayroma/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-desktop"></i><?php _e( 'Pro Demo','ayroma' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.com/ayroma-premium/" class="btn-primary" target="_blank"><i class="dashicons dashicons-cart"></i><?php _e( 'Purchase Now','ayroma' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.ticksy.com/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-sos"></i><?php _e( 'Ask for Support','ayroma' ); ?> </a></li>
					
					<li><a href="https://wordpress.org/support/theme/ayroma/reviews/#new-post" class="btn-green" target="_blank"><i class="dashicons dashicons-heart"></i><?php _e( 'Give us Rating','ayroma' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'aromatic_upsale_btns',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new Ayroma_Button_Customize_Control( $wp_customize, 'aromatic_upsale_btns', array(
		'section' => 'aromatic_upsale',
    ))
);
}
add_action( 'customize_register', 'ayroma_upsale_setting',999 );