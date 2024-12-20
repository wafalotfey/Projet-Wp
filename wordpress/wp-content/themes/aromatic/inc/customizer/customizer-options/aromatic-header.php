<?php
function aromatic_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'aromatic'),
		) 
	);
	/*=========================================
	Aromatic Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','aromatic'),
			'panel'  		=> 'header_section',
		)
    );
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','aromatic'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Cart
	$wp_customize->add_setting(
		'hdr_nav_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_cart',
		array(
			'type' => 'hidden',
			'label' => __('Cart','aromatic'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_checkbox',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aromatic' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Browse Section
	=========================================*/	
	$wp_customize->add_setting(
		'product_search_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'product_search_head',
		array(
			'type' => 'hidden',
			'label' => __('Product Search','aromatic'),
			'section' => 'header_navigation',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting( 
		'hs_product_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_checkbox',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hs_product_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aromatic' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);
	
	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','aromatic'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','aromatic'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aromatic' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'aromatic_header_settings' );

