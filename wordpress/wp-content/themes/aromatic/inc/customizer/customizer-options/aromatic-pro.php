<?php
function aromatic_upsale_setting( $wp_customize ) {
	
	$wp_customize->add_section(
        'aromatic_upsale',
        array(
            'title' 		=> __('Get More Features in Aromatic Pro','aromatic'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	 Buttons
	=========================================*/
	
	class Aromatic_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'aromatic_upsale';

	   function render_content() {
		?>
			<div class="upsale_info">
				<ul>
					<li><a href="https://preview.sellerthemes.com/pro/aromatic" class="btn-secondary" target="_blank"><i class="dashicons dashicons-desktop"></i><?php _e( 'Pro Demo','aromatic' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.com/aromatic-premium/" class="btn-primary" target="_blank"><i class="dashicons dashicons-cart"></i><?php _e( 'Purchase Now','aromatic' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.ticksy.com/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-sos"></i><?php _e( 'Ask for Support','aromatic' ); ?> </a></li>
					
					<li><a href="https://wordpress.org/support/theme/aromatic/reviews/#new-post" class="btn-green" target="_blank"><i class="dashicons dashicons-heart"></i><?php _e( 'Give us Rating','aromatic' ); ?> </a></li>
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
	
	$wp_customize->add_control( new Aromatic_Button_Customize_Control( $wp_customize, 'aromatic_upsale_btns', array(
		'section' => 'aromatic_upsale',
    ))
);
}
add_action( 'customize_register', 'aromatic_upsale_setting' );