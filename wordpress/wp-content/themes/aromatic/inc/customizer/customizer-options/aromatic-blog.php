<?php
function aromatic_blog2_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Frontpage
	=========================================*/
	$wp_customize->add_panel(
		'aromatic_frontpage2_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'aromatic' ),
		)
	);
	/*=========================================
	Blog Section
	=========================================*/
	$wp_customize->add_section(
		'blog2_setting', array(
			'title' => esc_html__( 'Blog Section', 'aromatic' ),
			'priority' => 9,
			'panel' => 'aromatic_frontpage2_sections',
		)
	);
	
	/*=========================================
	Setting
	=========================================*/
	// Setting
	$wp_customize->add_setting(
		'blog2_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'blog2_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','aromatic'),
			'section' => 'blog2_setting',
		)
	);
	
	// Hide/Show
	$wp_customize->add_setting(
		'blog2_setting_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'blog2_setting_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','aromatic'),
			'section' => 'blog2_setting',
		)
	);
	/*=========================================
	Header
	=========================================*/
	$wp_customize->add_setting(
		'blog2_header'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'blog2_header',
		array(
			'type' => 'hidden',
			'label' => __('Header','aromatic'),
			'section' => 'blog2_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'blog2_ttl',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'blog2_ttl',
		array(
		    'label'   => __('Title','aromatic'),
		    'section' => 'blog2_setting',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Content
	=========================================*/
	$wp_customize->add_setting(
		'blog2_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'blog2_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','aromatic'),
			'section' => 'blog2_setting',
		)
	);
	
	// No. of Products Display
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'blog2_num',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'blog2_num', 
			array(
				'label'      => __( 'No of Blog Display', 'aromatic' ),
				'section'  => 'blog2_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}

}

add_action( 'customize_register', 'aromatic_blog2_setting' );

// selective refresh
function aromatic_blog2_section_partials( $wp_customize ){
	
	// blog2_ttl
	$wp_customize->selective_refresh->add_partial( 'blog2_ttl', array(
		'selector'            => '.post-home2 .section-title',
		'settings'            => 'blog2_ttl',
		'render_callback'  => 'aromatic_blog2_ttl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'aromatic_blog2_section_partials' );

// blog2_ttl
function aromatic_blog2_ttl_render_callback() {
	return get_theme_mod( 'blog2_ttl' );
}