<?php
function aromatic_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'aromatic'),
		) 
	);
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','aromatic'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	// Copyright
	$aromatic_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'aromatic' );
	$wp_customize->add_setting( 
		'footer_copyright' , 
			array(
			'default'	      => $aromatic_copyright,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_html',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copyright', 
		array(
			'label'	      => esc_html__( 'Copyright', 'aromatic' ),
			'section'     => 'footer_copy_Section',
			'type'        => 'textarea',
			'priority' => 10,
		) 
	);
	
	/*=========================================
	Footer Background 
	=========================================*/	
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Footer Background','aromatic'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	//  Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/green-standing-leaf.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image 1', 'aromatic'),
			'section'        => 'footer_background',
		) 
	));
	
	//  Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img2' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/pinkshape.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img2' ,
		array(
			'label'          => esc_html__( 'Background Image 2', 'aromatic'),
			'section'        => 'footer_background',
		) 
	));
	
	//  Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img3' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/silverleaf.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aromatic_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img3' ,
		array(
			'label'          => esc_html__( 'Background Image 3', 'aromatic'),
			'section'        => 'footer_background',
		) 
	));
}
add_action( 'customize_register', 'aromatic_footer' );
// Footer selective refresh
function aromatic_footer_partials( $wp_customize ){	
	
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.footer-bottom-wrapper',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'aromatic_footer_copyright_render_callback',
	) );
	
	}
add_action( 'customize_register', 'aromatic_footer_partials' );

// footer_copyright
function aromatic_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}