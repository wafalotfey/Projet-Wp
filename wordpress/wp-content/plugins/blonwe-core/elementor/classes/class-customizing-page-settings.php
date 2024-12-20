<?php

function blonwe_add_elementor_page_settings_controls( $page ) {

	$page->add_control( 'blonwe_elementor_enable_sidebar_collapse',
		[
			'label'          => esc_html__( 'Sidebar Collapse', 'blonwe-core' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'blonwe-core' ),
			'label_off'      => esc_html__( 'No', 'blonwe-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);

	$page->add_control( 'blonwe_elementor_hide_page_header',
		[
			'label'          => esc_html__( 'Hide Header', 'blonwe-core' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'blonwe-core' ),
			'label_off'      => esc_html__( 'No', 'blonwe-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'blonwe_elementor_page_header_type',
		[
			'label' => esc_html__( 'Header Type', 'blonwe-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'blonwe-core' ),
				'type1' 	  => esc_html__( 'Type 1', 'blonwe-core' ),
				'type2'		  => esc_html__( 'Type 2', 'blonwe-core' ),
				'type3'		  => esc_html__( 'Type 3', 'blonwe-core' ),
				'type4'		  => esc_html__( 'Type 4', 'blonwe-core' ),
				'type5'		  => esc_html__( 'Type 5', 'blonwe-core' ),
				'type6'		  => esc_html__( 'Type 6', 'blonwe-core' ),
			],
		]
	);
	
	$page->add_control( 'blonwe_elementor_header_transparent',
		[
			'label'          => esc_html__( 'Header Transparent', 'blonwe-core' ),
			'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'blonwe-core' ),
			'label_off'      => esc_html__( 'No', 'blonwe-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'blonwe_elementor_hide_page_footer',
		[
			'label'          => esc_html__( 'Hide Footer', 'blonwe-core' ),
			'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'blonwe-core' ),
			'label_off'      => esc_html__( 'No', 'blonwe-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'blonwe_elementor_page_footer_type',
		[
			'label' => esc_html__( 'Footer Type', 'blonwe-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'blonwe-core' ),
				'type1' 	  => esc_html__( 'Type 1', 'blonwe-core' ),
				'type2'		  => esc_html__( 'Type 2', 'blonwe-core' ),
			],
		]
	);
	
	$page->add_control( 'blonwe_elementor_logo',
		[
			'label'          => esc_html__( 'Set Dark Logo', 'blonwe-core' ),
            'type' 			 => \Elementor\Controls_Manager::MEDIA,
		]
	);
	
	$page->add_control( 'blonwe_elementor_logo_light',
		[
			'label'          => esc_html__( 'Set Light Logo', 'blonwe-core' ),
            'type' 			 => \Elementor\Controls_Manager::MEDIA,
		]
	);

	$page->add_control(
		'page_width',
		[
			'label' => __( 'Width', 'blonwe-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'devices' => [ 'desktop' ],
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 1100,
					'max' => 1650,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 1360,
			],
			'selectors' => [
				'{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .elementor-section.elementor-section-boxed>.elementor-container' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		]
	);

}

add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'blonwe_add_elementor_page_settings_controls' );