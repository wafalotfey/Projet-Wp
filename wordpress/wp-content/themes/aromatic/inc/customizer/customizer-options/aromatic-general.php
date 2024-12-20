<?php
function aromatic_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'aromatic_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'aromatic' ),
		)
	);
	
	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Top Scroller', 'aromatic' ),
			'priority' => 4,
			'panel' => 'aromatic_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aromatic_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'aromatic' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Page Breadcrumb', 'aromatic' ),
			'priority' => 12,
			'panel' => 'aromatic_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','aromatic'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aromatic_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aromatic' ),
			'section'     => 'breadcrumb_setting',
			'type'        => 'checkbox'
		) 
	);
	
		
	// Background // 
	$wp_customize->add_setting(
		'breadcrumb_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','aromatic'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/breadcrumb-leaf.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'aromatic'),
			'section'        => 'breadcrumb_setting',
		) 
	));
	
	// Image Opacity // 
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'breadcrumb_bg_img_opacity',
    	array(
	        'default'			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'breadcrumb_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'aromatic'),
			'section'  => 'breadcrumb_setting',
			'settings' => 'breadcrumb_bg_img_opacity',
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 1,
                    ),
                ),
		) ) 
	);
	}
	
	$wp_customize->add_setting(
	'breadcrumb_overlay_color', 
	array(
		'default' => '#f8f8f8',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'aromatic'),
				'section'    => 'breadcrumb_setting',
			) 
		) 
	);
}

add_action( 'customize_register', 'aromatic_general_setting' );
