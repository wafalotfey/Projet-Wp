<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'blonwe_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the shop settings.', 'blonwe-core' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the blog settings.', 'blonwe-core' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the header settings.', 'blonwe-core' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'blonwe-core' ),
		esc_attr__( 'You can customize the main color.', 'blonwe-core' ),
	),

	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'blonwe-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'blonwe-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the map settings.', 'blonwe-core' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the footer settings.', 'blonwe-core' ),
	),
	
	'blonwe_widgets' => array (
		esc_attr__( 'Blonwe Widgets', 'blonwe-core' ),
		esc_attr__( 'You can customize the blonwe widgets.', 'blonwe-core' ),
	),

	'gdpr_settings' => array (
		esc_attr__( 'GDPR Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the GDPR settings.', 'blonwe-core' ),
	),

	'newsletter_settings' => array (
		esc_attr__( 'Newsletter Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the Newsletter Popup settings.', 'blonwe-core' ),
	),
	
	'maintenance_settings' => array (
		esc_attr__( 'Maintenance Settings', 'blonwe-core' ),
		esc_attr__( 'You can customize the Maintenance settings.', 'blonwe-core' ),
	),
	
	'typography_settings' => array (
		esc_attr__( 'Blonwe Typography', 'blonwe-core' ),
		esc_attr__( 'You can customize the Typography settings.', 'blonwe-core' ),
	),

	'other_settings' => array (
		esc_attr__( 'Other', 'blonwe-core' ),
		esc_attr__( 'You can customize the other settings.', 'blonwe-core' ),
	),

);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'blonwe_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function blonwe_customizer_add_field ( $args ) {
	Kirki::add_field(
		'blonwe_customizer',
		$args
	);
}

	/*====== Header ==================================================================================*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'blonwe_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'blonwe-core' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'blonwe-core' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'blonwe-core' ),
				esc_attr__( 'You can customize the logo which is on header..', 'blonwe-core' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'blonwe-core' ),
				esc_attr__( 'You can customize the header.', 'blonwe-core' )
			),
			
			'header_product_tab' => array(
				esc_attr__( 'Header Products Tab', 'blonwe-core' ),
				esc_attr__( 'You can customize the header products tab.', 'blonwe-core' )
			),
			
			'header_search' => array(
				esc_attr__( 'Header Search', 'blonwe-core' ),
				esc_attr__( 'You can customize the loader.', 'blonwe-core' )
			),
			
			'header_notification' => array(
				esc_attr__( 'Header Notification', 'blonwe-core' ),
				esc_attr__( 'You can customize the header notification.', 'blonwe-core' )
			),

			'canvas_menu' => array(
				esc_attr__( 'Canvas Menu Contact Box', 'blonwe-core' ),
				esc_attr__( 'You can customize the canvas menu contact box.', 'blonwe-core' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'blonwe-core' ),
				esc_attr__( 'You can customize the loader.', 'blonwe-core' )
			),
			
			'header1_style' => array(
				esc_attr__( 'Header 1 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'header2_style' => array(
				esc_attr__( 'Header 2 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'header3_style' => array(
				esc_attr__( 'Header 3 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'header4_style' => array(
				esc_attr__( 'Header 4 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'header5_style' => array(
				esc_attr__( 'Header 5 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'header6_style' => array(
				esc_attr__( 'Header 6 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'sidebar_menu_style' => array(
				esc_attr__( 'Sidebar Menu Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
			'header_location_style' => array(
				esc_attr__( 'Location Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the style.', 'blonwe-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'blonwe_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'blonwe_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_logo',
				'label' => esc_attr__( 'Logo', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'blonwe-core' ),
				'section' => 'blonwe_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo White ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_logo_white',
				'label' => esc_attr__( 'Logo 2', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'blonwe-core' ),
				'section' => 'blonwe_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set logo as text.', 'blonwe-core' ),
				'section' => 'blonwe_header_logo_section',
				'default' => 'Blonwe',
			)
		);

		/*====== Logo Size ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'blonwe_logo_size',
				'label'       => esc_html__( 'Logo Size', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'blonwe-core' ),
				'section'     => 'blonwe_header_logo_section',
				'default'     => 173,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 400,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-main .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Mobil Logo Size ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'blonwe_mobil_logo_size',
				'label'       => esc_html__( 'Mobile Logo Size', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set size of the mobil logo.', 'blonwe-core' ),
				'section'     => 'blonwe_header_logo_section',
				'default'     => 173,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-mobile .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Sidebar Logo Size ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'blonwe_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Logo Size', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set size of the sidebar logo.', 'blonwe-core' ),
				'section'     => 'blonwe_header_logo_section',
				'default'     => 156,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-drawer .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Header Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'blonwe_header_type',
				'label'       => esc_html__( 'Header Type', 'blonwe-core' ),
				'section'     => 'blonwe_header_general_section',
				'default'     => 'type1',
				'priority'    => 10,
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
					'type5' => esc_attr__( 'Type 5', 'blonwe-core' ),
					'type6' => esc_attr__( 'Type 6', 'blonwe-core' ),
				),
			) 
		);

		/*====== Middle Sticky Header Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_sticky_header',
				'label' => esc_attr__( 'Sticky Header', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Middle Sticky Header Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_sticky_header_bg_color',
				'label' => esc_attr__( 'Sticky Header Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_sticky_header',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Middle Sticky Header Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_sticky_header_font_color',
				'label' => esc_attr__( 'Sticky Header Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_sticky_header',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);

		/*====== Mobile Sticky Header Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_mobile_sticky_header',
				'label' => esc_attr__( 'Mobile Sticky Header', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the header on the mobile.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Location Filter Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_location_filter',
				'label' => esc_attr__( 'Location Filter', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the location filter on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_header_type',
					  'operator' => '==',
					  'value'    => 'type2',
					],
				],
			)
		);

		/*====== Location Filter Popup Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_location_filter_popup',
				'label' => esc_attr__( 'Popup Location Filter', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable popup location.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_location_filter',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Dark Theme Button Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_dark_theme_toggle',
				'label' => esc_attr__( 'Dark Theme Button', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the dark theme button.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Account Icon ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_account',
				'label' => esc_attr__( 'Account Icon / Login', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable User Login/Signup on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Popup Login ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_popup_login',
				'label' => esc_attr__( 'Popup Login?', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the popup login on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_account',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Popup Login Image======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_header_popup_login_image',
				'label' => esc_attr__( 'Popup Login Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_popup_login',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Account Icon Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_header_account_type',
				'label'       => esc_html__( 'Account Icon Type', 'blonwe-core' ),
				'section'     => 'blonwe_header_general_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_account',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Header Cart Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_cart',
				'label' => esc_attr__( 'Header Cart', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Mini Cart Type ======*/
		blonwe_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'blonwe_header_mini_cart_type',
			'label'       => esc_html__( 'Mini Cart Type', 'blonwe-core' ),
			'section'     => 'blonwe_header_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'sidecart' => esc_attr__( 'Side Cart', 'blonwe-core' ),
				'default' => esc_attr__( 'Default', 'blonwe-core' ),
			),
			'required' => array(
				array(
				  'setting'  => 'blonwe_header_cart',
				  'operator' => '==',
				  'value'    => '1',
				),
			),
			) 
		);
		
		/*====== Header Cart Icon Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_header_cart_type',
				'label'       => esc_html__( 'Header Cart Icon Type', 'blonwe-core' ),
				'section'     => 'blonwe_header_general_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
					'type5' => esc_attr__( 'Type 5', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_cart',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Header Mini Cart Notice ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_mini_cart_notice',
				'label' => esc_attr__( 'Mini Cart Notice', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a text for the mini cart.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_cart',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Help Center Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_help_center_button',
				'label' => esc_attr__( 'Help Center', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Help Center on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Help Center Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FCC419',
				'settings' => 'blonwe_help_center_font_color',
				'label' => esc_attr__( 'Header Help Center Font Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'required' => array(
					array(
					  'setting'  => 'blonwe_help_center_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Help Center Icon ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_help_center_icon',
				'label' => esc_attr__( 'Help Center Icon', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an icon. for example: klb-icon-zap', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => 'klb-icon-zap',
				'required' => array(
					array(
					  'setting'  => 'blonwe_help_center_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Help Center Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_help_center_title',
				'label' => esc_attr__( 'Help Center Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a text for the button.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => 'Buy Theme',
				'required' => array(
					array(
					  'setting'  => 'blonwe_help_center_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Help Center URL ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_help_center_url',
				'label' => esc_attr__( 'Help Center URL', 'blonwe-core' ),
				'description' => esc_attr__( 'Set an url for the help center', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '#',
				'required' => array(
					array(
					  'setting'  => 'blonwe_help_center_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Sidebar ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_sidebar',
				'label' => esc_attr__( 'Sidebar Menu', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Menu', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Sidebar Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_header_sidebar_type',
				'label'       => esc_html__( 'Sidebar Type', 'blonwe-core' ),
				'section'     => 'blonwe_header_general_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_sidebar',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);

		/*====== Header Sidebar Collapse ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_sidebar_collapse',
				'label' => esc_attr__( 'Disable Collapse on Frontpage', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Collapse on Home Page.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_sidebar',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Left Menu Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_top_left_menu',
				'label' => esc_attr__( 'Top Left Menu', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the top left menu.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Top Right Menu Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_top_right_menu',
				'label' => esc_attr__( 'Top Right Menu', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the top right menu.', 'blonwe-core' ),
				'section' => 'blonwe_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Products Tab Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_products_tab',
				'label' => esc_attr__( 'Products Tab', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Products Tab', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => '0',
			)
		);
		
		/*====== Header Products Tab Button Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_products_button_title',
				'label' => esc_attr__( 'Button Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a text for the button.', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => 'Best Discounts',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_products_tab_title',
				'label' => esc_attr__( 'Tab Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a title for the tab.', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => 'The best discounts this week',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Subtitle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_products_tab_subtitle',
				'label' => esc_attr__( 'Tab Subtitle', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a subtitle for the tab.', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => 'Every week you can find the best discounts here.',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab On Sale ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_products_tab_on_sale',
				'label' => esc_attr__( 'On Sale Products?', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Featured ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_products_tab_featured',
				'label' => esc_attr__( 'Featured Products?', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Best Selling ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_products_tab_best_selling',
				'label' => esc_attr__( 'Best Selling Products?', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Post count ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_products_tab_post_count',
				'label' => esc_attr__( 'Posts Count', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'default' => '6',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_header_products_tab_title_color',
				'label' => esc_attr__( 'Tab Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Subtitle Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#B8BDC1',
				'settings' => 'blonwe_header_products_tab_subtitle_color',
				'label' => esc_attr__( 'Tab Subtitle Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_header_product_tab_section',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Search Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_search',
				'label' => esc_attr__( 'Header Search', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the search on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'blonwe_header_search_type',
				'label'       => esc_html__( 'Header Search Type', 'blonwe-core' ),
				'section'     => 'blonwe_header_search_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
					'type5' => esc_attr__( 'Type 5', 'blonwe-core' ),
					'type6' => esc_attr__( 'Type 6', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Ajax Search Form ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_ajax_search_form',
				'label' => esc_attr__( 'Ajax Search Form', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable ajax search form for the header search.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Search Most Popular Keys ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_most_popular_keys',
				'label' => esc_attr__( 'Popular Keys on Search Result', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable popular keys on ajax search result.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'default' => '1',
				'required' => array(
					array(
					  'setting'  => 'blonwe_ajax_search_form',
					  'operator' => '==',
					  'value'    => '1',
					),
					array(
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Search Most Popular Keys ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_delete_most_popular_key',
				'label' => esc_attr__( 'Reset Popular Keys', 'blonwe-core' ),
				'description' => esc_attr__( 'Save the settings. Refresh the page once and disable the feature again.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_most_popular_keys',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Ajax Search Result Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_ajax_search_result_type',
				'label'       => esc_html__( 'Ajax Search Result Type', 'blonwe-core' ),
				'section'     => 'blonwe_header_search_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_ajax_search_form',
					  'operator' => '==',
					  'value'    => '1',
					),
					array(
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Header Search Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'blonwe_header_search_bg_color',
				'label' => esc_attr__( 'Header Search Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Header Search Background Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'blonwe_header_search_bg_hvrcolor',
				'label' => esc_attr__( 'Header Search Background Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Header Search Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'blonwe_header_search_border_color',
				'label' => esc_attr__( 'Header Search Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Header Search Input Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'blonwe_header_search_input_color',
				'label' => esc_attr__( 'Header Search Input Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Header Search Icon Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF',
				'settings' => 'blonwe_header_search_icon_color',
				'label' => esc_attr__( 'Header Search Icon Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_header_search_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_header_search',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Top Notification1 Text Toggle======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_top_notification1_toggle',
				'label' => esc_attr__( 'Top Notification 1', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the notification 1 on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification 1 Icon ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_top_notification1_icon',
				'label' => esc_attr__( 'Top Notification 1 Icon', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an icon. for example: klb-ecommerce-icon-telephone', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'blonwe_top_notification1_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Notification 1 Content ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_top_notification1_content',
				'label' => esc_attr__( 'Top Notification 1 Content', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a text for the notification 1 content.', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'default' => 'You can contact us 24/7<a href="tel:0800300353">0 800 300-353</a>',
				'required' => array(
					array(
					  'setting'  => 'blonwe_top_notification1_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Notification Count Toggle======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_top_notification_count_toggle',
				'label' => esc_attr__( 'Top Notification Count', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the notification count on the header.', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification Count Text ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_top_notification_count_text',
				'label' => esc_attr__( 'Top Notification Count Text', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a text for the notification count.', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Top Notification Count Date ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'date',
				'settings' => 'blonwe_top_notification_count_date',
				'label' => esc_attr__( 'Top Notification Count Date', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a date for the notification count.', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Top Notification Count Date Image======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_top_notification_count_date_image',
				'label' => esc_attr__( 'Top Notification Count Date Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_header_notification_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Top Notification Count Date Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffedb3',
				'settings' => 'blonwe_top_notification_count_date_bg_color',
				'label' => esc_attr__( 'Top Notification Count Date Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_header_notification_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Top Notification Count Date Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF',
				'settings' => 'blonwe_top_notification_count_date_font_color',
				'label' => esc_attr__( 'Top Notification Count Date Font Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_header_notification_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Top Notification Countdown Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(255, 255, 255, 0.25)',
				'settings' => 'blonwe_top_notification_countdown_bg_color',
				'label' => esc_attr__( 'Top Notification Countdown Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_header_notification_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Top Notification Countdown Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF',
				'settings' => 'blonwe_top_notification_countdown_font_color',
				'label' => esc_attr__( 'Top Notification Countdown Font Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_header_notification_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_top_notification_count_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Toggle Menu Button Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_toggle_menu_button',
				'label' => esc_attr__( 'Toggle Menu Button', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the toggle menu button.', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'default' => '0',
			)
		);
		
		
		/*====== Canvas Bottom Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_canvas_bottom_menu',
				'label' => esc_attr__( 'Canvas Bottom Menu', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the canvas bottom menu.', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'default' => '0',
			)
		);
		
		/*====== Canvas Bottom Menu Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_canvas_bottom_menu_title',
				'label' => esc_attr__( 'Canvas Bottom Menu Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a title.', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_canvas_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);

		/*====== Canvas Menu Contact Box Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_canvas_menu_contact_title',
				'label' => esc_attr__( 'Contact Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a title.', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'default' => '',
			)
		);
		
		/*====== Canvas Menu Contact Box ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'blonwe_canvas_menu_contact_box',
				'label' => esc_attr__( 'Contact Box', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set the contact box.', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'fields' => array(
					'menu_contact_box_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "klb-icon-square-phone"', 'blonwe-core' ),
					),
					'menu_contact_box_title' => array(
						'type' => 'textarea',
						'label' => esc_attr__( ' Title', 'blonwe-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'blonwe-core' ),
					),
					'menu_contact_box_subtitle' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Subtitle', 'blonwe-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'blonwe-core' ),
					),
				),
			)
		);
		
		/*====== Toggle Button Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_toggle_button_bg_color',
				'label' => esc_attr__( 'Toggle Button Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_canvas_menu_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Toggle Button Background Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_toggle_button_bg_hvrcolor',
				'label' => esc_attr__( 'Toggle Button Background Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_canvas_menu_section',
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Toggle Button Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_toggle_button_font_color',
				'label' => esc_attr__( 'Toggle Button Font Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'priority'    => 15,
				'section' => 'blonwe_canvas_menu_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Toggle Button Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_toggle_button_border_style',
				'label' => esc_attr__( 'Toggle Button Border', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'priority'    => 15,
				'default' => 'solid',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.site-header .header-action.custom-toggle .action-link',
					],
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);	
		
		/*====== Toggle Button Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_toggle_button_border_width_setting',
				'label' => esc_attr__( 'Toggle Button Border Width', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'priority'    => 15,
				'default'     => [
					'top-width'    => '1px',
					'right-width'  => '1px',
					'bottom-width' => '1px',
					'left-width'   => '1px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
					'left-width'   => esc_attr__( 'Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.site-header .header-action.custom-toggle .action-link',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_button_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Toggle Button Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#DFE2E6',
				'settings' => 'blonwe_toggle_button_border_color',
				'label' => esc_attr__( 'Toggle Button Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'priority'    => 15,
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_button_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Toggle Button Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_toggle_button_border_radius_setting',
				'label' => esc_attr__( 'Toggle Button Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_canvas_menu_section',
				'priority'    => 15,
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.site-header .header-action.custom-toggle .action-link',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_button_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				'active_callback' => [
					[
					  'setting'  => 'blonwe_toggle_menu_button',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);

		/*====== PreLoader Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_preloader',
				'label' => esc_attr__( 'Enable Loader', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'blonwe-core' ),
				'section' => 'blonwe_header_preloader_section',
				'default' => '0',
			)
		);	
		
		/*====== Header 1 Style ================*/		
			
			/*====== Header 1 Top Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header1_top_bg_color',
					'label' => esc_attr__( 'Header Top Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);	
			
			/*====== Header 1 Top Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_top_font_color',
					'label' => esc_attr__( 'Header Top Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Top Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_top_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Top Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_top_submenu_font_color',
					'label' => esc_attr__( 'Header Top Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			
			/*====== Header 1 Top Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_top_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Main Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header1_main_bg_color',
					'label' => esc_attr__( 'Header Main Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Main Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_main_font_color',
					'label' => esc_attr__( 'Header Main Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			
			/*====== Header 1 Main Icon Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_main_icon_color',
					'label' => esc_attr__( 'Header Main Icon Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Main Icon Count Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#ffc21f',
					'settings' => 'blonwe_header1_main_icon_count_bg_color',
					'label' => esc_attr__( 'Header Main Icon Count Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Main Icon Count Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_main_icon_count_color',
					'label' => esc_attr__( 'Header Main Icon Count Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Bottom Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header1_bottom_bg_color',
					'label' => esc_attr__( 'Header Bottom Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header1 Bottom Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_bottom_font_color',
					'label' => esc_attr__( 'Header Bottom Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			
			/*====== Header1 Bottom Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_bottom_font_hvrcolor',
					'label' => esc_attr__( 'Header Bottom Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			/*====== Header 1 Bottom Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_bottom_submenu_font_color',
					'label' => esc_attr__( 'Header Main Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			
			/*====== Header 1 Bottom Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header1_bottom_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator10',
				'section'     => 'blonwe_header1_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 1 Top Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header1_top_border_style',
					'label' => esc_attr__( 'Header Top Border', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'default' => 'none',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type1 .header-topbar',
						],
					],
				)
			);	
			
			/*====== Header 1 Top Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header1_top_border_width_setting',
					'label' => esc_attr__( 'Header Top Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '0px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type1 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header1_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 1 Top Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '',
					'settings' => 'blonwe_header1_top_border_color',
					'label' => esc_attr__( 'Header Top Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header1_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 1 Top Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header1_top_border_radius_setting',
					'label' => esc_attr__( 'Header Top Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type1 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header1_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator11',
				'section'     => 'blonwe_header1_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 1 Bottom Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header1_bottom_border_style',
					'label' => esc_attr__( 'Header Bottom Border', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type1 .header-bottom, .site-header.header-type1 .header-mobile-main',
						],
					],
				)
			);	
			
			/*====== Header 1 Bottom Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header1_bottom_border_width_setting',
					'label' => esc_attr__( 'Header Bottom Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type1 .header-bottom, .site-header.header-type1 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header1_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 1 Bottom Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(27, 31, 34, 0.1)',
					'settings' => 'blonwe_header1_bottom_border_color',
					'label' => esc_attr__( 'Header Bottom Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header1_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 1 Bottom Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header1_bottom_border_radius_setting',
					'label' => esc_attr__( 'Header Bottom Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header1_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type1 .header-bottom, .site-header.header-type1 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header1_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
		/*====== Header 2 Style ================*/		
			
			/*====== Header 2 Top Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#031424',
					'settings' => 'blonwe_header2_top_bg_color',
					'label' => esc_attr__( 'Header Top Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);	
			
			/*====== Header 2 Top Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header2_top_font_color',
					'label' => esc_attr__( 'Header Top Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header2 Top Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header2_top_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header 2 Top Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header2_top_submenu_font_color',
					'label' => esc_attr__( 'Header Top Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			
			/*====== Header 2 Top Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header2_top_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);	
			
			/*====== Header Decorator ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'toggle',
					'settings' => 'blonwe_header_main_decorator',
					'label' => esc_attr__( 'Header Decorator', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default' => '0',
				)
			);
			
			/*====== Header Decorator Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#5335cb',
					'settings' => 'blonwe_header_main_decorator_color',
					'label' => esc_attr__( 'Header Decorator Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'active_callback' => [
					[
					  'setting'  => 'blonwe_header_main_decorator',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
				)
			);
			
			/*====== Header 2 Main Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#031424',
					'settings' => 'blonwe_header2_main_bg_color',
					'label' => esc_attr__( 'Header Main Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header 2 Main Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header2_main_font_color',
					'label' => esc_attr__( 'Header Main Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			
			/*====== Header 2 Main Icon Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header2_main_icon_color',
					'label' => esc_attr__( 'Header Main Icon Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header 2 Main Icon Count Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#ffc21f',
					'settings' => 'blonwe_header2_main_icon_count_bg_color',
					'label' => esc_attr__( 'Header Main Icon Count Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header 2 Main Icon Count Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header2_main_icon_count_color',
					'label' => esc_attr__( 'Header Main Icon Count Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header 2 Bottom Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#031424',
					'settings' => 'blonwe_header2_bottom_bg_color',
					'label' => esc_attr__( 'Header Bottom Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			/*====== Header 2 Bottom Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header2_bottom_font_color',
					'label' => esc_attr__( 'Header Bottom Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			
			/*====== Header 2 Bottom Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header2_bottom_font_hvrcolor',
					'label' => esc_attr__( 'Header Bottom Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);	

			/*====== Header 2 Bottom Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header2_bottom_submenu_font_color',
					'label' => esc_attr__( 'Header Bottom Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			
			/*====== Header 2 Bottom Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header2_bottom_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Bottom Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator12',
				'section'     => 'blonwe_header2_style_section',
				'default'     => '<hr>',
			) );

			/*====== Header 2 Top Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header2_top_border_style',
					'label' => esc_attr__( 'Header Top Border', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type2 .header-topbar',
						],
					],
				)
			);	
			
			/*====== Header 2 Top Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header2_top_border_width_setting',
					'label' => esc_attr__( 'Header Top Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type2 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header2_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 2 Top Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(255, 255, 255, 0.15)',
					'settings' => 'blonwe_header2_top_border_color',
					'label' => esc_attr__( 'Header Top Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header2_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 2 Top Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header2_top_border_radius_setting',
					'label' => esc_attr__( 'Header Top Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type2 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header2_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator13',
				'section'     => 'blonwe_header2_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 2 Bottom Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header2_bottom_border_style',
					'label' => esc_attr__( 'Header Bottom Border', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default' => 'none',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type2 .header-bottom, .site-header.header-type2 .header-mobile-main',
						],
					],
				)
			);	
			
			/*====== Header 2 Bottom Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header2_bottom_border_width_setting',
					'label' => esc_attr__( 'Header Bottom Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '0px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type2 .header-bottom, .site-header.header-type2 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header2_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 2 Bottom Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '',
					'settings' => 'blonwe_header2_bottom_border_color',
					'label' => esc_attr__( 'Header Bottom Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header2_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 2 Bottom Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header2_bottom_border_radius_setting',
					'label' => esc_attr__( 'Header Bottom Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header2_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type2 .header-bottom, .site-header.header-type2 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header2_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
		/*====== Header 3 Style ================*/		
			
			/*====== Header 3 Top Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_top_bg_color',
					'label' => esc_attr__( 'Header Top Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);	
			
			/*====== Header 3 Top Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#FFF',
					'settings' => 'blonwe_header3_top_font_color',
					'label' => esc_attr__( 'Header Top Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Top Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#FFF',
					'settings' => 'blonwe_header3_top_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Top Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_top_submenu_font_color',
					'label' => esc_attr__( 'Header Top Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			
			/*====== Header 3 Top Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_top_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Main Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header3_main_bg_color',
					'label' => esc_attr__( 'Header Main Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Main Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_main_font_color',
					'label' => esc_attr__( 'Header Main Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			
			/*====== Header 3 Main Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_main_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Main Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_main_submenu_font_color',
					'label' => esc_attr__( 'Header Main Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			
			/*====== Header 3 Main Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_main_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			
			/*====== Header 3 Main Icon Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header3_main_icon_color',
					'label' => esc_attr__( 'Header Main Icon Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Main Icon Count Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#ee403d',
					'settings' => 'blonwe_header3_main_icon_count_bg_color',
					'label' => esc_attr__( 'Header Main Icon Count Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			/*====== Header 3 Main Icon Count Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#FFF',
					'settings' => 'blonwe_header3_main_icon_count_color',
					'label' => esc_attr__( 'Header Main Icon Count Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator14',
				'section'     => 'blonwe_header3_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 3 Top Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header3_top_border_style',
					'label' => esc_attr__( 'Header Top Border', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'default' => 'none',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type3 .header-topbar',
						],
					],
				)
			);	
			
			/*====== Header 3 Top Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header3_top_border_width_setting',
					'label' => esc_attr__( 'Header Top Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '0px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type3 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header3_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 3 Top Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '',
					'settings' => 'blonwe_header3_top_border_color',
					'label' => esc_attr__( 'Header Top Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header3_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 3 Top Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header3_top_border_radius_setting',
					'label' => esc_attr__( 'Header Top Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type3 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header3_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator15',
				'section'     => 'blonwe_header3_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 3 Main Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header3_main_border_style',
					'label' => esc_attr__( 'Header Main Border', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type3 .header-main, .site-header.header-type3 .header-mobile-main',
						],
					],
				)
			);	
			
			/*====== Header 3 Main Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header3_main_border_width_setting',
					'label' => esc_attr__( 'Header Main Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type3 .header-main, .site-header.header-type3 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header3_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 3 Main Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(27, 31, 34, 0.1)',
					'settings' => 'blonwe_header3_main_border_color',
					'label' => esc_attr__( 'Header Main Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header3_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 3 Main Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header3_main_border_radius_setting',
					'label' => esc_attr__( 'Header Main Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header3_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type3 .header-main, .site-header.header-type3 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header3_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
		/*====== Header 4 Style ================*/		
			
			/*====== Header 4 Top Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header4_top_bg_color',
					'label' => esc_attr__( 'Header Top Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'choices'     => [
						'alpha' => true,
					],
				)
			);	
			
			/*====== Header 4 Top Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_top_font_color',
					'label' => esc_attr__( 'Header Top Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			/*====== Header 4 Top Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_top_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			/*====== Header 4 Top Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_top_submenu_font_color',
					'label' => esc_attr__( 'Header Top Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			
			/*====== Header 4 Top Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_top_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			/*====== Header 4 Main Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header4_main_bg_color',
					'label' => esc_attr__( 'Header Main Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 4 Main Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_main_font_color',
					'label' => esc_attr__( 'Header Main Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			
			/*====== Header 4 Main Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_main_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			/*====== Header 4 Main Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_main_submenu_font_color',
					'label' => esc_attr__( 'Header Main Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			
			/*====== Header 4 Main Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_main_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			
			/*====== Header 4 Main Icon Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header4_main_icon_color',
					'label' => esc_attr__( 'Header Main Icon Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			/*====== Header 4 Main Icon Count Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#f44c30',
					'settings' => 'blonwe_header4_main_icon_count_bg_color',
					'label' => esc_attr__( 'Header Main Icon Count Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 4 Main Icon Count Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#FFF',
					'settings' => 'blonwe_header4_main_icon_count_color',
					'label' => esc_attr__( 'Header Main Icon Count Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator20',
				'section'     => 'blonwe_header4_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 4 Top Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header4_top_border_style',
					'label' => esc_attr__( 'Header Top Border', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type4 .header-topbar',
						],
					],
				)
			);	
			
			/*====== Header 4 Top Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header4_top_border_width_setting',
					'label' => esc_attr__( 'Header Top Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type4 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header4_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 4 Top Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(27, 31, 34, 0.1)',
					'settings' => 'blonwe_header4_top_border_color',
					'label' => esc_attr__( 'Header Top Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header4_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 4 Top Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header4_top_border_radius_setting',
					'label' => esc_attr__( 'Header Top Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type4 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header4_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator21',
				'section'     => 'blonwe_header4_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 4 Main Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header4_main_border_style',
					'label' => esc_attr__( 'Header Main Border', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type4 .header-main, .site-header.header-type4 .header-mobile-main',
						],
					],
				)
			);	
			
			/*====== Header 4 Main Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header4_main_border_width_setting',
					'label' => esc_attr__( 'Header Main Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type4 .header-main, .site-header.header-type4 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header4_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 4 Main Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(27, 31, 34, 0.1)',
					'settings' => 'blonwe_header4_main_border_color',
					'label' => esc_attr__( 'Header Main Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header4_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 4 Main Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header4_main_border_radius_setting',
					'label' => esc_attr__( 'Header Main Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header4_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type4 .header-main, .site-header.header-type4 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header4_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);	
			
		/*====== Header 5 Style ================*/		
			
			/*====== Header 5 Top Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(255, 255, 255, 0)',
					'settings' => 'blonwe_header5_top_bg_color',
					'label' => esc_attr__( 'Header Top Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'choices'     => [
						'alpha' => true,
					],
				)
			);	
			
			/*====== Header 5 Top Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header5_top_font_color',
					'label' => esc_attr__( 'Header Top Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			/*====== Header 5 Top Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header5_top_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			/*====== Header 5 Top Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header5_top_submenu_font_color',
					'label' => esc_attr__( 'Header Top Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			
			/*====== Header 5 Top Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header5_top_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			/*====== Header 5 Main Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(255, 255, 255, 0)',
					'settings' => 'blonwe_header5_main_bg_color',
					'label' => esc_attr__( 'Header Main Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 5 Main Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header5_main_font_color',
					'label' => esc_attr__( 'Header Main Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			
			/*====== Header 5 Main Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header5_main_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			/*====== Header 5 Main Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header5_main_submenu_font_color',
					'label' => esc_attr__( 'Header Main Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			
			/*====== Header 5 Main Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header5_main_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Main Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			
			/*====== Header 5 Main Icon Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header5_main_icon_color',
					'label' => esc_attr__( 'Header Main Icon Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			/*====== Header 5 Main Icon Count Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#f16624',
					'settings' => 'blonwe_header5_main_icon_count_bg_color',
					'label' => esc_attr__( 'Header Main Icon Count Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			/*====== Header 5 Main Icon Count Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#FFF',
					'settings' => 'blonwe_header5_main_icon_count_color',
					'label' => esc_attr__( 'Header Main Icon Count Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator22',
				'section'     => 'blonwe_header5_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 5 Top Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header5_top_border_style',
					'label' => esc_attr__( 'Header Top Border', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type5 .header-topbar',
						],
					],
				)
			);	
			
			/*====== Header 5 Top Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header5_top_border_width_setting',
					'label' => esc_attr__( 'Header Top Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type5 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header5_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 5 Top Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(255, 255, 255, 0.2)',
					'settings' => 'blonwe_header5_top_border_color',
					'label' => esc_attr__( 'Header Top Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header5_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 5 Top Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header5_top_border_radius_setting',
					'label' => esc_attr__( 'Header Top Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type5 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header5_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator23',
				'section'     => 'blonwe_header5_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 5 Main Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header5_main_border_style',
					'label' => esc_attr__( 'Header Main Border', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type5 .header-main',
						],
					],
				)
			);	
			
			/*====== Header 5 Main Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header5_main_border_width_setting',
					'label' => esc_attr__( 'Header Main Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type5 .header-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header5_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 5 Main Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(255, 255, 255, 0.2)',
					'settings' => 'blonwe_header5_main_border_color',
					'label' => esc_attr__( 'Header Main Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header5_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 5 Main Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header5_main_border_radius_setting',
					'label' => esc_attr__( 'Header Main Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header5_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type5 .header-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header5_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);		
			
		/*====== Header 6 Style ================*/		
			
			/*====== Header 6 Top Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_top_bg_color',
					'label' => esc_attr__( 'Header Top Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);	
			
			/*====== Header 6 Top Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header6_top_font_color',
					'label' => esc_attr__( 'Header Top Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header6 Top Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header6_top_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header 6 Top Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_top_submenu_font_color',
					'label' => esc_attr__( 'Header Top Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			
			/*====== Header 6 Top Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_top_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Top Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);	
			
			/*====== Header 6 Main Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header6_main_bg_color',
					'label' => esc_attr__( 'Header Main Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header 6 Main Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_main_font_color',
					'label' => esc_attr__( 'Header Main Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			
			/*====== Header 6 Main Icon Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_main_icon_color',
					'label' => esc_attr__( 'Header Main Icon Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header 6 Main Icon Count Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#114384',
					'settings' => 'blonwe_header6_main_icon_count_bg_color',
					'label' => esc_attr__( 'Header Main Icon Count Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header 6 Main Icon Count Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header6_main_icon_count_color',
					'label' => esc_attr__( 'Header Main Icon Count Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header 6 Bottom Background Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#fff',
					'settings' => 'blonwe_header6_bottom_bg_color',
					'label' => esc_attr__( 'Header Bottom Background Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			/*====== Header 6 Bottom Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_bottom_font_color',
					'label' => esc_attr__( 'Header Bottom Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			
			/*====== Header 6 Bottom Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_bottom_font_hvrcolor',
					'label' => esc_attr__( 'Header Bottom Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);	

			/*====== Header 6 Bottom Submenu Font Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_bottom_submenu_font_color',
					'label' => esc_attr__( 'Header Bottom Submenu Font Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			
			/*====== Header 6 Bottom Submenu Font Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_bottom_submenu_font_hvrcolor',
					'label' => esc_attr__( 'Header Bottom Submenu Font Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator24',
				'section'     => 'blonwe_header6_style_section',
				'default'     => '<hr>',
			) );

			/*====== Header 6 Top Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header6_top_border_style',
					'label' => esc_attr__( 'Header Top Border', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default' => 'none',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type6 .header-topbar',
						],
					],
				)
			);	
			
			/*====== Header 6 Top Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_top_border_width_setting',
					'label' => esc_attr__( 'Header Top Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '0px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 6 Top Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '',
					'settings' => 'blonwe_header6_top_border_color',
					'label' => esc_attr__( 'Header Top Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 6 Top Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_top_border_radius_setting',
					'label' => esc_attr__( 'Header Top Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .header-topbar',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_top_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator25',
				'section'     => 'blonwe_header6_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 6 Main Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header6_main_border_style',
					'label' => esc_attr__( 'Header Main Border', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type6 .header-main',
						],
					],
				)
			);	
			
			/*====== Header 6 Main Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_main_border_width_setting',
					'label' => esc_attr__( 'Header Main Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '2px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .header-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 6 Main Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#1B1F22',
					'settings' => 'blonwe_header6_main_border_color',
					'label' => esc_attr__( 'Header Main Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 6 Main Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_main_border_radius_setting',
					'label' => esc_attr__( 'Header Main Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .header-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);	
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator26',
				'section'     => 'blonwe_header6_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 6 Bottom Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header6_bottom_border_style',
					'label' => esc_attr__( 'Header Bottom Border', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type6 .header-bottom, .site-header.header-type6 .header-mobile-main',
						],
					],
				)
			);	
			
			/*====== Header 6 Bottom Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_bottom_border_width_setting',
					'label' => esc_attr__( 'Header Bottom Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '1px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .header-bottom, .site-header.header-type6 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 6 Bottom Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(27, 31, 34, 0.15)',
					'settings' => 'blonwe_header6_bottom_border_color',
					'label' => esc_attr__( 'Header Bottom Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 6 Bottom Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_bottom_border_radius_setting',
					'label' => esc_attr__( 'Header Bottom Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .header-bottom, .site-header.header-type6 .header-mobile-main',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);	
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator27',
				'section'     => 'blonwe_header6_style_section',
				'default'     => '<hr>',
			) );
			
			/*====== Header 6 Bottom Menu Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_header6_bottom_menu_border_style',
					'label' => esc_attr__( 'Header Bottom Menu Border', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header.header-type6 .klb-menu-nav.primary-menu.menu-seperate .klb-menu > .menu-item + .menu-item',
						],
					],
				)
			);	
			
			/*====== Header 6 Bottom Menu Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_bottom_border_menu_width_setting',
					'label' => esc_attr__( 'Header Bottom Menu Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '0px',
						'left-width'   => '1px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .klb-menu-nav.primary-menu.menu-seperate .klb-menu > .menu-item + .menu-item',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_menu_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Header 6 Bottom Menu Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => 'rgba(27, 31, 34, 0.15)',
					'settings' => 'blonwe_header6_bottom_menu_border_color',
					'label' => esc_attr__( 'Header Bottom Menu Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_menu_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Header 6 Bottom Menu Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_header6_bottom_menu_border_radius_setting',
					'label' => esc_attr__( 'Header Bottom Menu Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header6_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header.header-type6 .klb-menu-nav.primary-menu.menu-seperate .klb-menu > .menu-item + .menu-item',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_header6_bottom_menu_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);	
			
			
	/*====== Sidebar Menu Style ================*/	

		/*====== Sidebar Title Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f1f3f5',
				'settings' => 'blonwe_sidebar_menu_title_bg_color',
				'label' => esc_attr__( 'Sidebar Title Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'blonwe-core' ),
				'section' => 'blonwe_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Title Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_sidebar_menu_title_font_color',
				'label' => esc_attr__( 'Sidebar Title Font Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_sidebar_menu_style_section',
			)
		);	
		
		/*====== Sidebar Menu Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_sidebar_menu_bg_color',
				'label' => esc_attr__( 'Sidebar Menu Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'blonwe-core' ),
				'section' => 'blonwe_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Menu Icon Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#768088',
				'settings' => 'blonwe_sidebar_menu_icon_color',
				'label' => esc_attr__( 'Sidebar Menu Icon Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_sidebar_menu_style_section',
			)
		);	
		
		/*====== Sidebar Menu Font Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_sidebar_menu_font_color',
				'label' => esc_attr__( 'Sidebar Menu Font Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_sidebar_menu_style_section',
			)
		);	
		
		/*====== Sidebar Menu Font Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_sidebar_menu_font_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_sidebar_menu_style_section',
			)
		);
		
		// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator16',
				'section'     => 'blonwe_sidebar_menu_style_section',
				'default'     => '<hr>',
			) );
		
		/*====== Sidebar Menu Title Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_sidebar_menu_title_border_style',
					'label' => esc_attr__( 'Sidebar Menu Title Border', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'default' => 'none',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.header-bottom .dropdown-categories > a.gray::before',
						],
					],
				)
			);	
			
			/*====== Sidebar Menu Title Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_sidebar_menu_title_border_width_setting',
					'label' => esc_attr__( 'Sidebar Menu Title Border Width', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'default'     => [
						'top-width'    => '0px',
						'right-width'  => '0px',
						'bottom-width' => '0px',
						'left-width'   => '0px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
						'left-width'   => esc_attr__( 'Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.header-bottom .dropdown-categories > a.gray::before',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_sidebar_menu_title_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Sidebar Menu Title Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '',
					'settings' => 'blonwe_sidebar_menu_title_border_color',
					'label' => esc_attr__( 'Sidebar Menu Title Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_sidebar_menu_title_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Sidebar Menu Title Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_sidebar_menu_tite_border_radius_setting',
					'label' => esc_attr__( 'Sidebar Menu Title Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '0px',
						'bottom-right-radius' => '0px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.header-bottom .dropdown-categories > a.gray::before',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_sidebar_menu_title_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			// Separator
			blonwe_customizer_add_field ( array(
				'type'        => 'custom',
				'settings'    => 'klb_separator29',
				'section'     => 'blonwe_sidebar_menu_style_section',
				'default'     => '<hr>',
			) );
		
		/*====== Sidebar Menu Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_sidebar_menu_border_style',
					'label' => esc_attr__( 'Sidebar Menu Border', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.header-bottom:not(.color-layout-black) .dropdown-categories .dropdown-menu',
						],
					],
				)
			);	
			
			/*====== Sidebar Menu Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_sidebar_menu_border_width_setting',
					'label' => esc_attr__( 'Sidebar Menu Border Width', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'default'     => [
						'top-width'    => '1px',
						'right-width'  => '1px',
						'bottom-width' => '1px',
						'left-width'   => '1px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
						'left-width'   => esc_attr__( 'Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.header-bottom:not(.color-layout-black) .dropdown-categories .dropdown-menu',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_sidebar_menu_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Sidebar Menu Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#DFE2E6',
					'settings' => 'blonwe_sidebar_menu_border_color',
					'label' => esc_attr__( 'Sidebar Menu Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_sidebar_menu_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Sidebar Menu Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_sidebar_menu_border_radius_setting',
					'label' => esc_attr__( 'Sidebar Menu Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_sidebar_menu_style_section',
					'default'     => [
						'top-left-radius'     => '0px',
						'top-right-radius'    => '0px',
						'bottom-left-radius'  => '6px',
						'bottom-right-radius' => '6px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.header-bottom:not(.color-layout-black) .dropdown-categories .dropdown-menu',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_sidebar_menu_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
		/*======  Location Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_lct_bg_color',
				'label' => esc_attr__( 'Location Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*======  Location Background Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_lct_bg_hvrcolor',
				'label' => esc_attr__( 'Location Background Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for hover background.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*======  Location Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1b1f22',
				'settings' => 'blonwe_lct_color',
				'label' => esc_attr__( ' Location Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*======  Location Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1b1f22',
				'settings' => 'blonwe_lct_hvrcolor',
				'label' => esc_attr__( ' Location Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*======  Location Second Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1b1f22',
				'settings' => 'blonwe_lct_scnd_color',
				'label' => esc_attr__( ' Location Second Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*======  Location Second Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1b1f22',
				'settings' => 'blonwe_lct_scnd_hvrcolor',
				'label' => esc_attr__( ' Location Second Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*======  Location Icon Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1b1f22',
				'settings' => 'blonwe_lct_icon_color',
				'label' => esc_attr__( ' Location Icon Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_header_location_style_section',
			)
		);
		
		/*====== Location Border ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'select',
					'settings' => 'blonwe_lct_border_style',
					'label' => esc_attr__( 'Location Border', 'blonwe-core' ),
					'section' => 'blonwe_header_location_style_section',
					'default' => 'solid',
					'choices' => array(
						'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
						'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
						'double' => esc_attr__( 'Double', 'blonwe-core' ),
						'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
						'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
						'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
					),
					'output'      => [
						[
							'property' => 'border-style',
							'element'  => '.site-header .header-action.location-button.bordered a',
						],
					],
				)
			);	
			
			/*====== Location Border Width ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_lct_border_width_setting',
					'label' => esc_attr__( 'Location Border Width', 'blonwe-core' ),
					'section' => 'blonwe_header_location_style_section',
					'default'     => [
						'top-width'    => '1px',
						'right-width'  => '1px',
						'bottom-width' => '1px',
						'left-width'   => '1px',
					],
					'choices'     => [
						'top-width'    => esc_attr__( 'Top', 'textdomain' ),
						'right-width'  => esc_attr__( 'Right', 'textdomain' ),
						'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
						'left-width'   => esc_attr__( 'Left', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'property' => 'border',
							'element'  => '.site-header .header-action.location-button.bordered a',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_lct_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);
			
			/*====== Location Border Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#ced4da',
					'settings' => 'blonwe_lct_border_color',
					'label' => esc_attr__( 'Location Border Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header_location_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_lct_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Location Border Hover Color ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'color',
					'default' => '#adb5bd',
					'settings' => 'blonwe_lct_border_hvrcolor',
					'label' => esc_attr__( 'Location Border Hover Color', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
					'section' => 'blonwe_header_location_style_section',
					'active_callback' => [
						[
						  'setting'  => 'blonwe_lct_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
					
					'choices'     => [
						'alpha' => true,
					],
				)
			);
			
			/*====== Location Border Radius ======*/
			blonwe_customizer_add_field (
				array(
					'type' => 'dimensions',
					'settings' => 'blonwe_lct_border_radius_setting',
					'label' => esc_attr__( 'Location Border Radius', 'blonwe-core' ),
					'section' => 'blonwe_header_location_style_section',
					'default'     => [
						'top-left-radius'     => '8px',
						'top-right-radius'    => '8px',
						'bottom-left-radius'  => '8px',
						'bottom-right-radius' => '8px',
					],
					'choices'     => [
						'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
						'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
						'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
						'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
					],
					'transport'   => 'auto',
					'output'    => [
						[
							'property' => 'border',
							'element'  => '.site-header .header-action.location-button.bordered a',
						],
					],
					
					'active_callback' => [
						[
						  'setting'  => 'blonwe_lct_border_style',
						  'operator' => '!=',
						  'value'    => 'none',
						]
					],
				)
			);	
		
	/*====== SHOP ====================================================================================*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'blonwe_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'blonwe-core' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'blonwe-core' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'blonwe-core' ),
				esc_attr__( 'You can customize shop settings.', 'blonwe-core' )
			),
			
			'shop_product_box' => array(
				esc_attr__( 'Product Box', 'blonwe-core' ),
				esc_attr__( 'You can customize the product box settings.', 'blonwe-core' )
			),
			
			'shop_single' => array(
				esc_attr__( 'Product Detail', 'blonwe-core' ),
				esc_attr__( 'You can customize the product single settings.', 'blonwe-core' )
			),
			
			'shop_banner' => array(
				esc_attr__( 'Banner', 'blonwe-core' ),
				esc_attr__( 'You can customize the banner.', 'blonwe-core' )
			),
			
			'my_account' => array(
				esc_attr__( 'My Account', 'blonwe-core' ),
				esc_attr__( 'You can customize the my account page.', 'blonwe-core' )
			),

			'free_shipping_bar' => array(
				esc_attr__( 'Free Shipping Bar ', 'blonwe-core' ),
				esc_attr__( 'You can customize the free shipping bar settings.', 'blonwe-core' )
			),
			
			'wishlist' => array(
				esc_attr__( 'Wishlist', 'blonwe-core' ),
				esc_attr__( 'You can customize the wishlist settings.', 'blonwe-core' )
			),
			
			'compare' => array(
				esc_attr__( 'Compare', 'blonwe-core' ),
				esc_attr__( 'You can customize the compare settings.', 'blonwe-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'blonwe_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'blonwe_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_shop_layout',
				'label' => esc_attr__( 'Layout', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'blonwe-core' ),
					'full-width' => esc_attr__( 'Full Width', 'blonwe-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'blonwe-core' ),
				),
			)
		);

		/*====== Shop Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_shop_width',
				'label' => esc_attr__( 'Shop Page Width', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => 'boxed',
				'choices' => array(
					'boxed' => esc_attr__( 'Boxed', 'blonwe-core' ),
					'wide' => esc_attr__( 'Wide', 'blonwe-core' ),
				),
			)
		);

		blonwe_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'blonwe_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'blonwe-core' ),
			'section'     => 'blonwe_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'blonwe-core' ),
				'loadmore' => esc_attr__( 'Load More', 'blonwe-core' ),
				'infinite' => esc_attr__( 'Infinite', 'blonwe-core' ),
			),
			) 
		);

		/*====== Ajax on Shop Page ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Grid-List Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Atrribute Swatches ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Perpage Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_perpage_view',
				'label' => esc_attr__( 'Perpage View', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable perpage view on shop page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Atrribute Swatches ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Ajax Notice Shop ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Added to Cart Ajax Notice', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Badge Tab ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_badge_tab',
				'label' => esc_attr__( 'Product Badge Tab', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the product badge tab.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Remove All Button ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_remove_all_button',
				'label' => esc_attr__( 'Remove All Button in cart page', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the remove all button.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu Edit Toggle======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'blonwe-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		new \Kirki\Field\Repeater(
			array(
				'type' => 'repeater',
				'settings' => 'blonwe_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'blonwe-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'blonwe_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'blonwe-core' ),
						'description' => esc_attr__( 'You can select a type', 'blonwe-core' ),
						'default' => 'default',
						'choices' => array(
							'default' => esc_attr__( 'Default', 'blonwe-core' ),
							'search' => esc_attr__( 'Search', 'blonwe-core' ),
							'filter' => esc_attr__( 'Filter', 'blonwe-core' ),
							'category' => esc_attr__( 'category', 'blonwe-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "store"', 'blonwe-core' ),
					),
					'mobile_menu_text' => array(
						'type' => 'text',
						'label' => esc_attr__( ' Text', 'blonwe-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'blonwe-core' ),
					),
					'mobile_menu_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'blonwe-core' ),
					),
				),
				
			)
		);

		/*====== Product Stock Quantity ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_stock_quantity',
				'label' => esc_attr__( 'Show Stock Quantity', 'blonwe-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Min/Max Quantity ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Category Description ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'blonwe-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Catalog Mode - Disable Add to Cart ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);	

		/*====== Recently Viewed Products ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Recently Viewed Products.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Recently Viewed Products Coulmn ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_recently_viewed_products_column',
				'label'       => esc_html__( 'Recently Viewed Products Column', 'blonwe-core' ),
				'section'     => 'blonwe_shop_general_section',
				'default'     => '4',
				'priority'    => 10,
				'choices'     => array(
					'6' => esc_attr__( '6', 'blonwe-core' ),
					'5' => esc_attr__( '5', 'blonwe-core' ),
					'4' => esc_attr__( '4', 'blonwe-core' ),
					'3' => esc_attr__( '3', 'blonwe-core' ),
					'2' => esc_attr__( '2', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_recently_viewed_products',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);

		/*====== Min Order Amount ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'blonwe-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'blonwe_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Image Size ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		/*====== Product Box Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'blonwe_product_box_type',
				'label'       => esc_html__( 'Shop Product Box Type', 'blonwe-core' ),
				'section'     => 'blonwe_shop_product_box_section',
				'default'     => 'type1',
				'priority'    => 10,
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
					'type5' => esc_attr__( 'Type 5', 'blonwe-core' ),
					'type6' => esc_attr__( 'Type 6', 'blonwe-core' ),
					'type7' => esc_attr__( 'Type 7', 'blonwe-core' ),
					'type8' => esc_attr__( 'Type 8', 'blonwe-core' ),
					'type9' => esc_attr__( 'Type 9', 'blonwe-core' ),
					'type10' => esc_attr__( 'Type 10', 'blonwe-core' ),
					'type11' => esc_attr__( 'Type 11', 'blonwe-core' ),
					'type12' => esc_attr__( 'Type 12', 'blonwe-core' ),
					'type13' => esc_attr__( 'Type 13', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Product Box Gallery Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_product_box_gallery',
				'label'       => esc_html__( 'Product Gallery Type', 'blonwe-core' ),
				'section'     => 'blonwe_shop_product_box_section',
				'default'     => 'type1',
				'priority'    => 10,
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Quantity Box Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_quantity_box',
				'label' => esc_attr__( 'Quantity Box', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable quantity box for the product box.', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Quick View Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Shipping Class  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_shipping_class',
				'label' => esc_attr__( 'Shipping Classes', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the shipping class on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Product Box Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_product_box_shipping_class_type',
				'label'       => esc_html__( 'Shipping Class Type', 'blonwe-core' ),
				'section'     => 'blonwe_shop_product_box_section',
				'default'     => 'default',
				'priority'    => 10,
				'choices'     => array(
					'default' => esc_attr__( 'Default', 'blonwe-core' ),
					'bordered' => esc_attr__( 'Bordered', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_product_box_shipping_class',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Stock Status  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_stock_status',
				'label' => esc_attr__( 'Stock Status', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the stock statu on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Poor Stock Status  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_poor_stock',
				'label' => esc_attr__( 'Poor Stock', 'blonwe-core' ),
				'description' => esc_attr__( 'Show quantity remaining in stock when low e.g. "Only 9 left in stock"', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_product_box_stock_status',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Stock Progress Bar  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_stock_progress_bar',
				'label' => esc_attr__( 'Stock Progress Bar', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the stock progress bar on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Countdown  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_countdown',
				'label' => esc_attr__( 'Countdown', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the countdown on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product SKU  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_sku',
				'label' => esc_attr__( 'Product SKU', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the sku on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product Attributes  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_attributes',
				'label' => esc_attr__( 'Product Attributes', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the attributes on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product Variable  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_product_box_variable',
				'label' => esc_attr__( 'Product Variable', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable or Disable the variable on the product box', 'blonwe-core' ),
				'section' => 'blonwe_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Gallery Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_single_gallery_type',
				'label'       => esc_html__( 'Gallery Type (Product Detail)', 'blonwe-core' ),
				'section'     => 'blonwe_shop_single_section',
				'default'     => 'horizontal',
				'priority'    => 10,
				'choices'     => array(
					'horizontal' => esc_attr__( 'Horizontal', 'blonwe-core' ),
					'vertical' => esc_attr__( 'Vertical', 'blonwe-core' ),
					'1column'  => esc_attr__( '1column', 'blonwe-core' ),
					'2columns' => esc_attr__( '2columns', 'blonwe-core' ),
					'carousel2columns' => esc_attr__( 'Carousel 2columns', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Shop Single Type ======*/
		blonwe_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'blonwe_single_type',
			'label'       => esc_html__( 'Type (Product Detail)', 'blonwe-core' ),
			'section'     => 'blonwe_shop_single_section',
			'default'     => 'type1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
				'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
				'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
				'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
				'type5' => esc_attr__( 'Type 5', 'blonwe-core' ),
			),
			) 
		);

		/*====== Shop Single Product Tab Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_single_product_tab_type',
				'label'       => esc_html__( 'Product Tab Type', 'blonwe-core' ),
				'section'     => 'blonwe_shop_single_section',
				'default'     => 'horizontal_tab',
				'priority'    => 10,
				'choices'     => array(
					'horizontal_tab' 		  => esc_attr__( 'Horizontal Tab', 'blonwe-core' ),
					'vertical_tab' 		      => esc_attr__( 'Vertical Tab', 'blonwe-core' ),
					'accordion_tab' 		  => esc_attr__( 'Accordion Tab', 'blonwe-core' ),
					'accordion_tab_content'   => esc_attr__( 'Accordion Tab Content', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Shop Single Banner Image======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_shop_single_banner_image',
				'label' => esc_attr__( 'Single Banner Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'active_callback' => [
					[
					  'setting'  => 'blonwe_single_type',
					  'operator' => '==',
					  'value'    => 'type4',
					],
				],
			)
		);
		
		/*====== Shop Single Banner URL ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_shop_single_banner_image_url',
				'label' => esc_attr__( 'Single Banner URL', 'blonwe-core' ),
				'description' => esc_attr__( 'Set an url for the button', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '#',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_single_type',
					  'operator' => '==',
					  'value'    => 'type4',
					],
				],
			)
		);
		
		/*====== Shop Single Full width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_single_full_width',
				'label' => esc_attr__( 'Full Width', 'blonwe-core' ),
				'description' => esc_attr__( 'Stretch the single product page content.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Image Zoom  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Comment by Rating ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_comment_rating',
				'label' => esc_attr__( 'Comment Rating', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the review slot.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Product360 View ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Product 360 View.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Ajax Add To Cart ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*======  Sticky Single Cart ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Sticky Titles ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_single_sticky_titles',
				'label' => esc_attr__( 'Sticky Titles', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the sticky titles for desktop.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Single Cart ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Buy Now Single ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Related By Tags ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_related_by_tags',
				'label' => esc_attr__( 'Related Products with Tags', 'blonwe-core' ),
				'description' => esc_attr__( 'Display the related products by tags.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Product Stock Progress Bar ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_stock_progress_bar',
				'label' => esc_attr__( 'Stock Progress Bar', 'blonwe-core' ),
				'description' => esc_attr__( 'Display the stock progress bar if stock management is enabled.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Product Time Countdown ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_time_countdown',
				'label' => esc_attr__( 'Time Countdown', 'blonwe-core' ),
				'description' => esc_attr__( 'Display the sale time countdown.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Order on WhatsApp ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'blonwe-core' ),
				'description' => esc_attr__( 'Enable the button on the product detail page.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'blonwe_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Move Review Tab ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'blonwe-core' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Social Share ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_shop_social_share',
				'label' => esc_attr__( 'Social Share (Product Detail)', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Social Share ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'blonwe_shop_single_share',
				'section'     => 'blonwe_shop_single_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin', 'reddit', 'whatsapp'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'blonwe-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'blonwe-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'blonwe-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'blonwe-core' ),
					'reddit'    => esc_html__( 'Reddit', 	'blonwe-core' ),
					'whatsapp'  => esc_html__( 'WhatsApp', 	'blonwe-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'blonwe_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Related Post Column ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_shop_related_post_column',
				'label' => esc_attr__( 'Related Post Column', 'blonwe-core' ),
				'description' => esc_attr__( 'You can control related post column with this option.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '4',
				'choices' => array(
					'6' => esc_attr__( '6 Columns', 'blonwe-core' ),
					'5' => esc_attr__( '5 Columns', 'blonwe-core' ),
					'4' => esc_attr__( '4 Columns', 'blonwe-core' ),
					'3' => esc_attr__( '3 Columns', 'blonwe-core' ),
					'2' => esc_attr__( '2 Columns', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Shop Single Checklist ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_single_checklist',
				'label' => esc_attr__( 'Checklist', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable the featured list.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Checklist ======*/
		new \Kirki\Field\Repeater(
			array(
				'type' => 'repeater',
				'settings' => 'blonwe_single_products_checklist',
				'label' => esc_attr__( 'Product Checklist', 'blonwe-core' ),
				'description' => esc_attr__( 'You can create the checklist list.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_section',
				'row_label' => array (
					'type' => 'field',
					'field' => 'link_text',
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_single_checklist',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'checklist_title' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Title', 'blonwe-core' ),
						'description' => esc_attr__( 'You can enter a title.', 'blonwe-core' ),
					),
				),
			)
		);
		
		/*====== Shop Banner Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'blonwe_shop_banner_type',
				'label'       => esc_html__( 'Shop Banner Type', 'blonwe-core' ),
				'section'     => 'blonwe_shop_banner_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Shop Banner Image======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_shop_banner_image',
				'label' => esc_attr__( 'Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'active_callback' => [
					[
					  'setting'  => 'blonwe_shop_banner_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],
			)
		);
		
		/*====== Shop Banner Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_shop_banner_title',
				'label' => esc_attr__( 'Set Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a title.', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Banner Subtitle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_shop_banner_subtitle',
				'label' => esc_attr__( 'Set Subtitle', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a subtitle.', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_shop_banner_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],
			)
		);
		
		/*====== Shop Banner Description ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_shop_banner_desc',
				'label' => esc_attr__( 'Set Description', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a description.', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_shop_banner_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],
			)
		);
		
		/*====== Shop Banner Price Text ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_shop_banner_price_text',
				'label' => esc_attr__( 'Set Price Text', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a description.', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_shop_banner_type',
					  'operator' => '==',
					  'value'    => 'type2',
					],
				],
			)
		);
		
		/*====== Shop Banner Price  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_shop_banner_price',
				'label' => esc_attr__( 'Set Price', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a description.', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_shop_banner_type',
					  'operator' => '==',
					  'value'    => 'type2',
					],
				],
			)
		);
		
		/*====== Shop Banner URL ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_shop_banner_url',
				'label' => esc_attr__( 'Set URL', 'blonwe-core' ),
				'description' => esc_attr__( 'Set an url for the button', 'blonwe-core' ),
				'section' => 'blonwe_shop_banner_section',
				'default' => '#',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_shop_banner_type',
					  'operator' => '==',
					  'value'    => 'type2',
					],
				],
			)
		);
		
		/*====== Shop Banner Text Color======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_shop_banner_text_color',
				'label'       => esc_html__( 'Shop Banner Text Color', 'blonwe-core' ),
				'section'     => 'blonwe_shop_banner_section',
				'default'     => 'dark',
				'choices'     => array(
					'dark' 	=> esc_attr__( 'Dark', 'blonwe-core' ),
					'light' => esc_attr__( 'Light', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Banner Repeater For each category ======*/
		add_action( 'init', function() {
			new \Kirki\Field\Repeater(
				array(
					'type' => 'repeater',
					'settings' => 'blonwe_shop_banner_each_category',
					'label' => esc_attr__( 'Banner For Categories', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set banner for each category.', 'blonwe-core' ),
					'section' => 'blonwe_shop_banner_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'blonwe-core' ),
							'description' => esc_html__( 'Set a category', 'blonwe-core' ),
							'priority'    => 10,
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'category_image' =>  array(
							'type' => 'image',
							'label' => esc_attr__( 'Image', 'blonwe-core' ),
							'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
						),
						
						'category_title' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Title', 'blonwe-core' ),
							'description' => esc_attr__( 'You can set a title.', 'blonwe-core' ),
						),
						
						'category_subtitle' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Subtitle', 'blonwe-core' ),
							'description' => esc_attr__( 'You can set a subtitle.', 'blonwe-core' ),
						),
						
						'category_desc' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Description', 'blonwe-core' ),
							'description' => esc_attr__( 'You can set a description.', 'blonwe-core' ),
						),
						
						'category_price_text' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Price Text', 'blonwe-core' ),
							'description' => esc_attr__( 'You can set a button text.', 'blonwe-core' ),
						),
						
						'category_price' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Price', 'blonwe-core' ),
							'description' => esc_attr__( 'You can set a button text.', 'blonwe-core' ),
						),
						
						'category_button_url' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set URL', 'blonwe-core' ),
							'description' => esc_attr__( 'Set an url for the button', 'blonwe-core' ),
						),
					),
					'active_callback' => [
						[
						  'setting'  => 'blonwe_shop_banner_type',
						  'operator' => '!=',
						  'value'    => 'type1',
						]
					],
				)
			);
		} );
		
		/*====== My Account Layouts ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_my_account_layout',
				'label' => esc_attr__( 'Layout', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose a layout for the login form.', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => 'default',
				'choices' => array(
					'default' => esc_attr__( 'Default', 'blonwe-core' ),
					'logintab' => esc_attr__( 'Login Tab', 'blonwe-core' ),
				),
			)
		);

		/*====== Registration Form First Name ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_registration_first_name',
				'label' => esc_attr__( 'Register - First Name', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'blonwe-core' ),
					'visible' => esc_attr__( 'Visible', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Registration Form Last Name ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_registration_last_name',
				'label' => esc_attr__( 'Register - Last Name', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'blonwe-core' ),
					'visible' => esc_attr__( 'Visible', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Company ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_registration_billing_company',
				'label' => esc_attr__( 'Register - Billing Company', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'blonwe-core' ),
					'visible' => esc_attr__( 'Visible', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Phone ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_registration_billing_phone',
				'label' => esc_attr__( 'Register - Billing Phone', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'blonwe-core' ),
					'visible' => esc_attr__( 'Visible', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Ajax Login-Register ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_ajax_login_form',
				'label' => esc_attr__( 'Activate Ajax for Login Form', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => '0',
			)
		);

		/*====== Redirect URL After Login ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'url',
				'settings' => 'blonwe_redirect_url_after_login',
				'label' => esc_attr__( 'Redirect URL After Login', 'blonwe-core' ),
				'section' => 'blonwe_my_account_section',
				'default' => '',
			)
		);
		
	/*====== Free Shipping Settings =======================================================*/
	
		/*====== Free Shipping ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_free_shipping',
				'label' => esc_attr__( 'Free shipping bar', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => '0',
			)
		);
		
		/*====== Free Shipping Goal Amount ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shipping_progress_bar_amount',
				'label' => esc_attr__( 'Goal Amount', 'blonwe-core' ),
				'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => '100',
				'required' => array(
					array(
					  'setting'  => 'blonwe_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Cart Page ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_card_page',
				'label' => esc_attr__( 'Cart page', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Mini cart ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_mini_cart',
				'label' => esc_attr__( 'Mini cart', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Checkout page ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_checkout',
				'label' => esc_attr__( 'Checkout page', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Initial ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_initial',
				'label' => esc_attr__( 'Initial Message', 'blonwe-core' ),
				'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => 'Add [remainder] to cart and get free shipping!',
				'required' => array(
					array(
					  'setting'  => 'blonwe_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Success ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_success',
				'label' => esc_attr__( 'Success message', 'blonwe-core' ),
				'description' => esc_attr__( 'Message to show after reaching 100%.', 'blonwe-core' ),
				'section' => 'blonwe_free_shipping_bar_section',
				'default' => 'Your order qualifies for free shipping!',
				'required' => array(
					array(
					  'setting'  => 'blonwe_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
	/*====== Wishlist Settings =======================================================*/
		
		/*====== Wishlist Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of the wishlist button.', 'blonwe-core' ),
				'section' => 'blonwe_wishlist_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Page ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_wishlist_page',
				'label' => esc_attr__( 'Select a Wishlist Page', 'blonwe-core' ),
				'description' => esc_attr__( 'You can select a wishlist page. [klbwl_list]', 'blonwe-core' ),
				'section' => 'blonwe_wishlist_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_wishlist_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Wishlist  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_wishlist',
				'label' => esc_attr__( 'Wishlist', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable wishlist on the header.', 'blonwe-core' ),
				'section' => 'blonwe_wishlist_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_wishlist_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Wishlist Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'blonwe_header_wishlist_type',
				'label'       => esc_html__( 'Wishlist Icon Type', 'blonwe-core' ),
				'section'     => 'blonwe_wishlist_section',
				'default'     => 'type1',
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_header_wishlist',
					  'operator' => '==',
					  'value'    => '1',
					),
					array(
					  'setting'  => 'blonwe_wishlist_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
	/*====== Compare Settings =======================================================*/
	
		/*====== Shop Compare Toggle  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_compare_button',
				'label' => esc_attr__( 'Compare on Shop', 'blonwe-core' ),
				'description' => esc_attr__( 'Activate the compare button on the shop page.', 'blonwe-core' ),
				'section' => 'blonwe_compare_section',
				'default' => '0',
			)
		);
		
		/*====== Compare Page ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_compare_page',
				'label' => esc_attr__( 'Select a Compare Page', 'blonwe-core' ),
				'description' => esc_attr__( 'You can select a compare page. [klbcp_list]', 'blonwe-core' ),
				'section' => 'blonwe_compare_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_compare_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Compare  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_header_compare',
				'label' => esc_attr__( 'Compare on Header', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable compare on the header.', 'blonwe-core' ),
				'section' => 'blonwe_compare_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'blonwe_compare_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		

		
	/*====== Shop Single Style Settings =======================================================*/
		
		/*====== Shop Single Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_shop_single_bg_color',
				'label' => esc_attr__( 'Shop Single Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Image Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_shop_single_image_border_color',
				'label' => esc_attr__( 'Shop Single Image Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);	
		
		/*====== Shop Single Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_shop_single_title_color',
				'label' => esc_attr__( 'Shop Single Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E6FCF5',
				'settings' => 'blonwe_shop_single_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Stock Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Text Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'blonwe_shop_single_stock_text_color',
				'label' => esc_attr__( 'Shop Single Stock Text Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF5F5',
				'settings' => 'blonwe_shop_single_out_of_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Text Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#C92A2A',
				'settings' => 'blonwe_shop_single_out_of_stock_text_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Text Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Regular Price Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'blonwe_shop_single_regular_price_color',
				'label' => esc_attr__( 'Shop Single Regular Price Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Sale Price Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f03e3e',
				'settings' => 'blonwe_shop_single_sale_price_color',
				'label' => esc_attr__( 'Shop Single Sale Price Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Description Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'blonwe_shop_single_desc_color',
				'label' => esc_attr__( 'Shop Single Description Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#12B886',
				'settings' => 'blonwe_shop_single_button_bg_color',
				'label' => esc_attr__( 'Shop Single Button Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'blonwe_shop_single_button_bg_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Background Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#12B886',
				'settings' => 'blonwe_shop_single_button_border_color',
				'label' => esc_attr__( 'Shop Single Button border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Border Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'blonwe_shop_single_button_border_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button border Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_shop_single_button_text_color',
				'label' => esc_attr__( 'Shop Single Button Text Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_shop_single_button_text_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Text Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_shop_single_wishlist_title_color',
				'label' => esc_attr__( 'Shop Single Wishlist Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_shop_single_wishlist_title_icon_bg_color',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Background Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF5F5',
				'settings' => 'blonwe_shop_single_wishlist_title_icon_bg_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Background Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#DEE2E6',
				'settings' => 'blonwe_shop_single_wishlist_title_icon_border_color',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Border Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#00000000',
				'settings' => 'blonwe_shop_single_wishlist_title_icon_border_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Border Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_shop_single_wishlist_title_icon_color',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Hover Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f03e3e',
				'settings' => 'blonwe_shop_single_wishlist_title_icon_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Hover Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'blonwe_shop_single_meta_title_color',
				'label' => esc_attr__( 'Shop Single Meta Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Subtitle Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_shop_single_meta_subtitle_color',
				'label' => esc_attr__( 'Shop Single Meta Subtitle Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Module Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'blonwe_shop_single_module_title_color',
				'label' => esc_attr__( 'Shop Single Module Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_shop_single_style_section',
			)
		);


	/*====== Blog Settings =======================================================*/
		/*====== Layouts ======*/
		
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_blog_layout',
				'label' => esc_attr__( 'Layout', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose a layout.', 'blonwe-core' ),
				'section' => 'blonwe_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'blonwe-core' ),
					'full-width' => esc_attr__( 'Full Width', 'blonwe-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Main color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'blonwe_main_color',
				'label' => esc_attr__( 'Main Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the main color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Main color RGB ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(255, 194, 31, 0.1)',
				'settings' => 'blonwe_main_color_rgb',
				'label' => esc_attr__( 'Main Color RGB', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the main rgb color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*======  Secondary Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'blonwe_secondary_color',
				'label' => esc_attr__( 'Secondary Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the secondary color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
			)
		);
		
		/*======  Secondary color RGB ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(4, 30, 66, 0.1)',
				'settings' => 'blonwe_secondary_color_rgb',
				'label' => esc_attr__( 'Secondary Color RGB', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the secondary rgb color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Dark Theme Main color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'blonwe_dark_theme_main_color',
				'label' => esc_attr__( 'Dark Theme Main Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the dark main color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
			)
		);
		
		/*====== Dark Theme Main color RGB ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(255, 194, 31, 0.1)',
				'settings' => 'blonwe_dark_theme_main_color_rgb',
				'label' => esc_attr__( 'Dark Theme Main Color RGB', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the dark main rgb color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Dark Theme Secondary color======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'blonwe_dark_theme_secondary_color',
				'label' => esc_attr__( 'Dark Theme Secondary Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the dark secondary color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
			)
		);
		
		/*====== Dark Theme Secondary color RGB ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(4, 30, 66, 0.1)',
				'settings' => 'blonwe_dark_theme_secondary_color_rgb',
				'label' => esc_attr__( 'Dark Theme Secondary Color RGB', 'blonwe-core' ),
				'description' => esc_attr__( 'You can customize the dark secondary rgb color.', 'blonwe-core' ),
				'section' => 'blonwe_main_color_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
	/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'blonwe_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'blonwe-core' ),
				'section'     => 'blonwe_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'blonwe-core' ),
				'choices'     => blonwe_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'blonwe_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'blonwe-core' ),
				'section'     => 'blonwe_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'blonwe-core' ),
				'choices'     => blonwe_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'blonwe_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'blonwe-core' ),
				'section'     => 'blonwe_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'blonwe-core' ),
				'choices'     => blonwe_get_elementorTemplates('section'),
				
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'blonwe_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'blonwe-core' ),
				'section'     => 'blonwe_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'blonwe-core' ),
				'choices'     => blonwe_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'blonwe_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'blonwe-core' ),
				'section'     => 'blonwe_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'blonwe-core' ),
				'choices'     => blonwe_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'blonwe_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'blonwe-core' ),
				'section'     => 'blonwe_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'blonwe-core' ),
				'choices'     => blonwe_get_elementorTemplates('section'),
				
			)
		);

		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			new \Kirki\Field\Repeater(
				array(
					'type' => 'repeater',
					'settings' => 'blonwe_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'blonwe-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'blonwe-core' ),
					'section' => 'blonwe_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'blonwe-core' ),
							'description' => esc_html__( 'Set a category', 'blonwe-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'blonwe_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'blonwe-core' ),
							'choices'     => blonwe_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'blonwe-core' ),
						),
						
						'blonwe_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'blonwe-core' ),
							'choices'     => blonwe_get_elementorTemplates('section'),
						),
						
						'blonwe_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'blonwe-core' ),
							'choices'     => blonwe_get_elementorTemplates('section'),
						),
						
						'blonwe_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'blonwe-core' ),
							'choices'     => blonwe_get_elementorTemplates('section'),
						),
						
						'blonwe_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'blonwe-core' ),
							'choices'     => blonwe_get_elementorTemplates('section'),
						),
						
						'blonwe_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'blonwe-core' ),
							'choices'     => blonwe_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );


		/*====== Map Settings ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'blonwe-core' ),
				'description' => esc_attr__( 'Add your google map api key', 'blonwe-core' ),
				'section' => 'blonwe_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Blonwe Widgets ======*/
		/*====== Widgets Panels ======*/
		Kirki::add_panel (
			'blonwe_widgets_panel',
			array(
				'title' => esc_html__( 'Blonwe Widgets', 'blonwe-core' ),
				'description' => esc_html__( 'You can customize the blonwe widgets.', 'blonwe-core' ),
			)
		);

		$sections = array (
			
			'social_media' => array(
				esc_attr__( 'Social Media', 'blonwe-core' ),
				esc_attr__( 'You can customize the social media widget.', 'blonwe-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'blonwe_widgets_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'blonwe_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		/*====== Social Media Widget ======*/
		new \Kirki\Field\Repeater(
			array(
				'type' => 'repeater',
				'settings' => 'blonwe_social_media_widget',
				'label' => esc_attr__( 'Social Media Widget', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'blonwe-core' ),
				'section' => 'blonwe_social_media_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "facebook"', 'blonwe-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'blonwe-core' ),
					),

				),
			)
		);
		
	
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'blonwe_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'blonwe-core' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'blonwe-core' ),
			)
		);

		$sections = array (
			'footer_subscribe' => array(
				esc_attr__( 'Subscribe', 'blonwe-core' ),
				esc_attr__( 'You can customize the subscribe area.', 'blonwe-core' )
			),
			
			'footer_extra' => array(
				esc_attr__( 'Footer Extra', 'blonwe-core' ),
				esc_attr__( 'You can customize the footer extra section.', 'blonwe-core' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'blonwe-core' ),
				esc_attr__( 'You can customize the footer settings.', 'blonwe-core' )
			),
			
			'footer1_style' => array(
				esc_attr__( 'Footer 1 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the footer settings.', 'blonwe-core' )
			),
			
			'footer2_style' => array(
				esc_attr__( 'Footer 2 Style', 'blonwe-core' ),
				esc_attr__( 'You can customize the footer settings.', 'blonwe-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'blonwe_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'blonwe_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		
		/*====== Subcribe Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_footer_subscribe_area',
				'label' => esc_attr__( 'Subcribe', 'blonwe-core' ),
				'description' => esc_attr__( 'Disable or Enable subscribe section.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default' => '0',
			)
		);
		
		/*====== Subcribe FORM ID======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_footer_subscribe_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'blonwe-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Subscribe Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_footer_subscribe_title',
				'label' => esc_attr__( 'Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Subscribe Subtitle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_footer_subscribe_subtitle',
				'label' => esc_attr__( 'Subtitle', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Subscribe Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_subscribe_bg_color',
				'label' => esc_attr__( 'Subscribe Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Subscribe Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_subscribe_title_color',
				'label' => esc_attr__( 'Subscribe Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Subscribe Subtitle Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_subscribe_subtitle_color',
				'label' => esc_attr__( 'Subscribe Subtitle Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Subscribe Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer_subscribe_border_style',
				'label' => esc_attr__( 'Subscribe Border', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default' => 'solid',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type1 .footer-row.footer-newsletter',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);	
		
		/*====== Subscribe Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer_subscribe_border_width_setting',
				'label' => esc_attr__( 'Subscribe Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default'     => [
					'top-width'    => '1px',
					'right-width'  => '0px',
					'bottom-width' => '0px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-newsletter',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Subscribe Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(27, 31, 34, 0.1)',
				'settings' => 'blonwe_footer_subscribe_border_color',
				'label' => esc_attr__( 'Subscribe Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Subscribe Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer_subscribe_border_radius_setting',
				'label' => esc_attr__( 'Subscribe Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer_subscribe_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-newsletter',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_subscribe_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'blonwe_footer_type',
				'label'       => esc_html__( 'Footer Type', 'blonwe-core' ),
				'section'     => 'blonwe_footer_general_section',
				'default'     => 'type1',
				'priority' => 5,
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
				),
			) 
		);
		
		/*====== Footer Image ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_footer_bg_image',
				'label' => esc_attr__( 'Background Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload a image.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 6,
				'choices' => array(
					'save_as' => 'id',
				),
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer_type',
					  'operator' => '==',
					  'value'    => 'type2',
					]
				],
			)
		);
		
		/*====== Footer Column ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer_column',
				'label' => esc_attr__( 'Footer Column', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set footer column.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 7,
				'default' => '4columns',
				'choices' => array(
					'5columns' => esc_attr__( '5 Columns', 'blonwe-core' ),
					'4columns' => esc_attr__( '4 Columns', 'blonwe-core' ),
					'3columns' => esc_attr__( '3 Columns', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Copyright ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_copyright',
				'label' => esc_attr__( 'Copyright', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 8,
				'default' => '',
			)
		);
		
		/*====== Social List Title======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_footer_social_list_title',
				'label' => esc_attr__( 'Social List Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a title.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'default' => '',
				'priority' => 12,
			)
		);
		
		/*====== Footer Social List ======*/
		new \Kirki\Field\Repeater(
			array(
				'type' => 'repeater',
				'settings' => 'blonwe_footer_social_list',
				'label' => esc_attr__( 'Social List', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority'    => 13,
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "facebook"', 'blonwe-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'blonwe-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'blonwe-core' ),
					),

				),
			)
		);
		
		/*====== APP Title======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_footer_app_title',
				'label' => esc_attr__( 'APP Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a title.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 15,
				'default' => '',
			)
		);
		
		/*====== APP Image ======*/
		new \Kirki\Field\Repeater(
			array(
				'type' => 'repeater',
				'settings' => 'blonwe_footer_app_image',
				'label' => esc_attr__( 'APP IMAGE', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set the app images.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 16,
				'fields' => array(
					'app_image' => array(
						'type' => 'image',
						'label' => esc_attr__( 'Image', 'blonwe-core' ),
						'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
					),
					
					'app_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'blonwe-core' ),
						'description' => esc_attr__( 'set an url for the image.', 'blonwe-core' ),
					),
				),
			)
		);
		
		/*====== Payment Image Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_footer_payment_image',
				'label' => esc_attr__( 'Payment Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of Payment Image.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 17,
				'default' => '0',
			)
		);
		
		/*====== Payment Image Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_footer_payment_text',
				'label' => esc_attr__( 'Title', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set text for Payment Image.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 18,
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'blonwe_footer_payment_image',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Payment Image ======*/
		new \Kirki\Field\Repeater(
			array(
				'type' => 'repeater',
				'settings' => 'blonwe_footer_payment_repeater',
				'label' => esc_attr__( 'Payment Images', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set the payment images.', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 19,
				'fields' => array(
					'payment_image' => array(
						'type' => 'image',
						'label' => esc_attr__( 'Image', 'blonwe-core' ),
						'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
					),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_footer_payment_image',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Back to top  ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_scroll_to_top',
				'label' => esc_attr__( 'Back To Top Button', 'blonwe-core' ),
				'section' => 'blonwe_footer_general_section',
				'priority' => 20,
				'default' => '0',
			)
		);
		
	/*====== Footer 1 Style =============================*/	
		
		/*====== Footer Main Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f8f9fa',
				'settings' => 'blonwe_footer1_main_bg_color',
				'label' => esc_attr__( 'Footer Main Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Main Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer1_main_title_color',
				'label' => esc_attr__( 'Footer Main Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Main Subtitle Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer1_main_subtitle_color',
				'label' => esc_attr__( 'Footer Main Subtitle Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);
		
		/*====== Footer Social Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f8f9fa',
				'settings' => 'blonwe_footer1_social_bg_color',
				'label' => esc_attr__( 'Footer Social Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Social Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer1_social_color',
				'label' => esc_attr__( 'Footer Social Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);	
		
		/*====== Footer Bottom Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'blonwe_footer1_bottom_bg_color',
				'label' => esc_attr__( 'Footer Main Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Bottom Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer1_bottom_color',
				'label' => esc_attr__( 'Footer Bottom Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);	
		
		/*====== Footer 1 Copyright Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer1_copyright_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
			)
		);
		
		/*====== Footer Main Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer1_main_border_style',
				'label' => esc_attr__( 'Footer Main Border', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default' => 'none',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type1 .footer-row.footer-widgets',
					],
				],
			)
		);	
		
		/*====== Footer Main Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer1_main_border_width_setting',
				'label' => esc_attr__( 'Footer Main Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default'     => [
					'top-width'    => '0px',
					'right-width'  => '0px',
					'bottom-width' => '0px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-widgets',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_main_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Main Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'blonwe_footer1_main_border_color',
				'label' => esc_attr__( 'Footer Main Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_main_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Footer Main Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer1_main_border_radius_setting',
				'label' => esc_attr__( 'Footer Main Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-widgets',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_main_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Social Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer1_social_border_style',
				'label' => esc_attr__( 'Footer Social Border', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default' => 'solid',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type1 .footer-row.footer-social .footer-inner',
					],
				],
			)
		);	
		
		/*====== Footer Social Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer1_social_border_width_setting',
				'label' => esc_attr__( 'Footer Social Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default'     => [
					'top-width'    => '1px',
					'right-width'  => '0px',
					'bottom-width' => '0px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-social .footer-inner',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_social_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Social Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(27, 31, 34, 0.15)',
				'settings' => 'blonwe_footer1_social_border_color',
				'label' => esc_attr__( 'Footer Social Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_social_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Footer Social Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer1_social_border_radius_setting',
				'label' => esc_attr__( 'Footer Social Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-social .footer-inner',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_social_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Bottom Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer1_bottom_border_style',
				'label' => esc_attr__( 'Footer Bottom Border', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default' => 'none',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type1 .footer-row.footer-copyright',
					],
				],
			)
		);	
		
		/*====== Footer Bottom Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer1_bottom_border_width_setting',
				'label' => esc_attr__( 'Footer Bottom Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default'     => [
					'top-width'    => '0px',
					'right-width'  => '0px',
					'bottom-width' => '0px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-copyright',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_bottom_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Bottom Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'blonwe_footer1_bottom_border_color',
				'label' => esc_attr__( 'Footer Bottom Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_bottom_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Footer Bottom Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer1_bottom_border_radius_setting',
				'label' => esc_attr__( 'Footer Bottom Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer1_style_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type1 .footer-row.footer-copyright',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer1_bottom_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
	/*====== Footer 2 Style =============================*/	
		
		/*====== Footer 2 Main Title Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer2_main_title_color',
				'label' => esc_attr__( 'Footer Main Title Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Main Subtitle Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer2_main_subtitle_color',
				'label' => esc_attr__( 'Footer Main Subtitle Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);
		
		/*====== Footer Social Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f0f5f8',
				'settings' => 'blonwe_footer2_social_bg_color',
				'label' => esc_attr__( 'Footer Social Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Social Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer2_social_color',
				'label' => esc_attr__( 'Footer Social Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);	
		
		/*====== Footer Bottom Background Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f0f5f8',
				'settings' => 'blonwe_footer2_bottom_bg_color',
				'label' => esc_attr__( 'Footer Main Background Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Bottom Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer2_bottom_color',
				'label' => esc_attr__( 'Footer Bottom Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);	
		
		/*====== Footer 2 Copyright Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1B1F22',
				'settings' => 'blonwe_footer2_copyright_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
			)
		);
		
		/*====== Footer Main Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer2_main_border_style',
				'label' => esc_attr__( 'Footer Main Border', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default' => 'none',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type2 .footer-row.footer-widgets',
					],
				],
			)
		);	
		
		/*====== Footer Main Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer2_main_border_width_setting',
				'label' => esc_attr__( 'Footer Main Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default'     => [
					'top-width'    => '0px',
					'right-width'  => '0px',
					'bottom-width' => '0px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type2 .footer-row.footer-widgets',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_main_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Main Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'blonwe_footer2_main_border_color',
				'label' => esc_attr__( 'Footer Main Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_main_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Footer Main Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer2_main_border_radius_setting',
				'label' => esc_attr__( 'Footer Main Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type2 .footer-row.footer-widgets',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_main_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Social Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer2_social_border_style',
				'label' => esc_attr__( 'Footer Social Border', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default' => 'solid',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type2 .footer-row.footer-social .footer-inner',
					],
				],
			)
		);	
		
		/*====== Footer Social Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer2_social_border_width_setting',
				'label' => esc_attr__( 'Footer Social Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default'     => [
					'top-width'    => '1px',
					'right-width'  => '0px',
					'bottom-width' => '1px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type2 .footer-row.footer-social .footer-inner',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_social_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Social Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(27, 31, 34, 0.1)',
				'settings' => 'blonwe_footer2_social_border_color',
				'label' => esc_attr__( 'Footer Social Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_social_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Footer Social Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer2_social_border_radius_setting',
				'label' => esc_attr__( 'Footer Social Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type2 .footer-row.footer-social .footer-inner',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_social_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Bottom Border ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'blonwe_footer2_bottom_border_style',
				'label' => esc_attr__( 'Footer Bottom Border', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default' => 'none',
				'choices' => array(
					'none' 	 => esc_attr__( 'None', 'blonwe-core' ),
					'solid'  => esc_attr__( 'Solid', 'blonwe-core' ),
					'double' => esc_attr__( 'Double', 'blonwe-core' ),
					'dotted' => esc_attr__( 'Dotted', 'blonwe-core' ),
					'dashed' => esc_attr__( 'Dashed', 'blonwe-core' ),
					'groove' => esc_attr__( 'Groove', 'blonwe-core' ),
				),
				'output'      => [
					[
						'property' => 'border-style',
						'element'  => '.footer-type2 .footer-row.footer-copyright',
					],
				],
			)
		);	
		
		/*====== Footer Bottom Border Width ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer2_bottom_border_width_setting',
				'label' => esc_attr__( 'Footer Bottom Border Width', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default'     => [
					'top-width'    => '0px',
					'right-width'  => '0px',
					'bottom-width' => '0px',
					'left-width'   => '0px',
				],
				'choices'     => [
					'top-width'    => esc_attr__( 'Top', 'textdomain' ),
					'right-width'  => esc_attr__( 'Right', 'textdomain' ),
					'bottom-width' => esc_attr__( 'Bottom', 'textdomain' ),
					'left-width'   => esc_attr__( 'Left', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'      => [
					[
						'property' => 'border',
						'element'  => '.footer-type2 .footer-row.footer-copyright',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_bottom_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);
		
		/*====== Footer Bottom Border Color ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'blonwe_footer2_bottom_border_color',
				'label' => esc_attr__( 'Footer Bottom Border Color', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_bottom_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
				
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Footer Bottom Border Radius ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'blonwe_footer2_bottom_border_radius_setting',
				'label' => esc_attr__( 'Footer Bottom Border Radius', 'blonwe-core' ),
				'section' => 'blonwe_footer2_style_section',
				'default'     => [
					'top-left-radius'     => '0px',
					'top-right-radius'    => '0px',
					'bottom-left-radius'  => '0px',
					'bottom-right-radius' => '0px',
				],
				'choices'     => [
					'top-left-radius'     => esc_attr__( 'Top Left', 'textdomain' ),
					'top-right-radius'    => esc_attr__( 'Top Right', 'textdomain' ),
					'bottom-left-radius'  => esc_attr__( 'Bottom Left', 'textdomain' ),
					'bottom-right-radius' => esc_attr__( 'Bottom Right', 'textdomain' ),
				],
				'transport'   => 'auto',
				'output'    => [
					[
						'property' => 'border',
						'element'  => '.footer-type2 .footer-row.footer-copyright',
					],
				],
				
				'active_callback' => [
					[
					  'setting'  => 'blonwe_footer2_bottom_border_style',
					  'operator' => '!=',
					  'value'    => 'none',
					]
				],
			)
		);

		/*====== GDPR Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_gdpr_toggle',
				'label' => esc_attr__( 'Enable GDPR', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of GDPR.', 'blonwe-core' ),
				'section' => 'blonwe_gdpr_settings_section',
				'default' => '0',
			)
		);
		
		/*====== GDPR Type ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_gdpr_type',
				'label' => esc_attr__( 'GDPR Type', 'blonwe-core' ),
				'section' => 'blonwe_gdpr_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Image======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_gdpr_image',
				'label' => esc_attr__( 'Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_gdpr_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'active_callback' => [
					[
					  'setting'  => 'blonwe_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'blonwe_gdpr_type',
					  'operator' => '!=',
					  'value'    => 'type2',
					]
				],
			)
		);
		
		/*====== GDPR Text ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_gdpr_text',
				'label' => esc_attr__( 'GDPR Text', 'blonwe-core' ),
				'section' => 'blonwe_gdpr_settings_section',
				'default' => 'In order to provide you a personalized shopping experience, our site uses cookies. <br><a href="#">cookie policy</a>.',
				'required' => array(
					array(
					  'setting'  => 'blonwe_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Expire Date ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_gdpr_expire_date',
				'label' => esc_attr__( 'GDPR Expire Date', 'blonwe-core' ),
				'section' => 'blonwe_gdpr_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'blonwe_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Button Text ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_gdpr_button_text',
				'label' => esc_attr__( 'GDPR Button Text', 'blonwe-core' ),
				'section' => 'blonwe_gdpr_settings_section',
				'default' => 'Accept Cookies',
				'required' => array(
					array(
					  'setting'  => 'blonwe_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Newsletter Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_newsletter_popup_toggle',
				'label' => esc_attr__( 'Enable Newsletter', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of Newsletter Popup.', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Newsletter Type ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_newsletter_type',
				'label' => esc_attr__( 'Newsletter Type', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'blonwe-core' ),
					'type2' => esc_attr__( 'Type 2', 'blonwe-core' ),
					'type3' => esc_attr__( 'Type 3', 'blonwe-core' ),
					'type4' => esc_attr__( 'Type 4', 'blonwe-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'blonwe_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Image ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_newsletter_image',
				'label' => esc_attr__( 'Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),

				'active_callback' => [
					[
					  'setting'  => 'blonwe_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'blonwe_newsletter_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],

			)
		);
		
		
		/*====== Newsletter Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_newsletter_popup_title',
				'label' => esc_attr__( 'Newsletter Title', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'default' => 'Subscribe To Newsletter',
				'required' => array(
					array(
					  'setting'  => 'blonwe_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Subtitle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_newsletter_popup_subtitle',
				'label' => esc_attr__( 'Newsletter Subtitle', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'default' => 'Subscribe to the Blonwe mailing list to receive updates on new arrivals, special offers and our promotions.',
				'required' => array(
					array(
					  'setting'  => 'blonwe_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup FORM ID======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_newsletter_popup_formid',
				'label' => esc_attr__( 'Newsletter Form Id.', 'blonwe-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'blonwe_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup Expire Date ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_newsletter_popup_expire_date',
				'label' => esc_attr__( 'Newsletter Expire Date', 'blonwe-core' ),
				'section' => 'blonwe_newsletter_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'blonwe_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Toggle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'blonwe_maintenance_toggle',
				'label' => esc_attr__( 'Enable Maintenance Mode', 'blonwe-core' ),
				'description' => esc_attr__( 'You can choose status of Maintenance.', 'blonwe-core' ),
				'section' => 'blonwe_maintenance_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Maintenance Title ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_maintenance_title',
				'label' => esc_attr__( 'Title', 'blonwe-core' ),
				'section' => 'blonwe_maintenance_settings_section',
				'default' => 'We Are Coming Soon',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Subtitle ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'blonwe_maintenance_desc',
				'label' => esc_attr__( 'Subtitle', 'blonwe-core' ),
				'section' => 'blonwe_maintenance_settings_section',
				'default' => 'Sed consectetur, dolor ut euismod imperdiet, ipsum massa fringilla odio, non laoreet nunc nisi pulvinar nulla. Maecenas egestas ex et mi viverra, vel vehicula sapien congue. In hac habitasse platea.',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Count Date ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'date',
				'settings' => 'blonwe_maintenance_date',
				'label' => esc_attr__( 'Maintenance Count Date', 'blonwe-core' ),
				'description' => esc_attr__( 'You can add a date for the maintenance count.', 'blonwe-core' ),
				'section' => 'blonwe_maintenance_settings_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
				],
			)
		);
		
		/*====== Maintenance Mailchimp FORM ID======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_maintenance_mailchimp_formid',
				'label' => esc_attr__( 'Mailchimp Form Id.', 'blonwe-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'blonwe-core' ),
				'section' => 'blonwe_maintenance_settings_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'blonwe_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Image ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'blonwe_maintenance_image',
				'label' => esc_attr__( 'Background Image', 'blonwe-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'blonwe-core' ),
				'section' => 'blonwe_maintenance_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),
				'active_callback' => [
					[
					  'setting'  => 'blonwe_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Skin Type ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'blonwe_skin_type',
				'label' => esc_attr__( 'Layout', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => 'light',
				'choices' => array(
					'light' => esc_attr__( 'Light', 'blonwe-core' ),
					'dark' => esc_attr__( 'Dark', 'blonwe-core' ),
				),
			)
		);
		
		/*====== Body Typography ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_body_typography',
				'label'       => esc_attr__( 'Body Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'    => '"Inter", sans-serif',
					'variant'        => 'regular',
					'font-size'      => '12px',
					'letter-spacing' => '-0.02em',
					'color'          => '#1B1F22',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);

		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator1',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );

		/*====== Heading Typography h1,h2,h3,h4,h5,h6======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_heading_typography',
				'label'       => esc_attr__( 'Heading Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'    => '"Inter", sans-serif',
					'variant'        => 'regular',
					'letter-spacing' => '-0.02em',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);

		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator2',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );

		/*====== Main Menu Typography======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_menu_typography',
				'label'       => esc_attr__( 'Menu Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'    => '"Inter", sans-serif',
					'variant'        => '500',
					'font-size'      => '15px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_menu_submenu_font_size',
				'label' => esc_attr__( 'Sub Menu Font Size', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '14px',
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_menu_submenu_font_weight',
				'label' => esc_attr__( 'Sub Menu Font Weight', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '400',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator3',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Form Typography======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_form_typography',
				'label'       => esc_attr__( 'Form Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'    => '"Inter", sans-serif',
					'variant'        => '500',
					'font-size'      => '15px',
					'letter-spacing' => '-0.01em',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator4',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Button Typography======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_button_typography',
				'label'       => esc_attr__( 'Button Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'    => '"Inter", sans-serif',
					'variant'        => '600',
					'font-size'      => '15px',
					'letter-spacing' => '-0.01em',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator5',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Price Typography======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_price_typography',
				'label'       => esc_attr__( 'Price Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'       => '"Inter", sans-serif',
					'variant'           => '400',
					'font-size'      	=> '22px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_price_font_size_mobile',
				'label' => esc_attr__( 'Font Size Mobile', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '18px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator6',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Product Name Typography======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_product_name_typography',
				'label'       => esc_attr__( 'Product Name Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'       => '"Inter", sans-serif',
					'variant'           => '600',
					'font-size'      	=> '14px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_product_name_font_size_mobile',
				'label' => esc_attr__( 'Font Size Mobile', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '18px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator7',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== TopBar Typography======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'blonwe_topbar_typography',
				'label'       => esc_attr__( 'Top Bar Typography', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => [
					'font-family'       => '"Inter", sans-serif',
					'variant'           => '500',
					'font-size'      	=> '12px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Blonwe Fonts',
								'children' => [
									[ 'id' => '"Inter", sans-serif', 'text' => 'Inter' ],
									[ 'id' => '"Fira Sans", sans-serif', 'text' => 'Fira Sans' ],
									[ 'id' => '"Jost", sans-serif', 'text' => 'Jost' ],
									[ 'id' => '"Satoshi-Variable", sans-serif', 'text' => 'Satoshi-Variable' ],
									[ 'id' => '"Lora", serif', 'text' => 'Lora' ],
									[ 'id' => '"Crimson Text", serif', 'text' => 'Crimson Text' ],
									[ 'id' => '"Manrope", sans-serif', 'text' => 'Manrope' ],
									[ 'id' => '"DM Sans", sans-serif', 'text' => 'DM Sans' ],
									[ 'id' => '"Krub", sans-serif', 'text' => 'Krub' ],
									[ 'id' => '"Rubik", sans-serif', 'text' => 'Rubik' ],
									[ 'id' => '"Gochi Hand", cursive', 'text' => 'Gochi Hand' ],
									[ 'id' => '"Sofia Sans Semi Condensed", sans-serif', 'text' => 'Sofia Sans Semi Condensed' ],
									[ 'id' => '"Prata", serif', 'text' => 'Prata' ],
									[ 'id' => '"EB Garamond", serif', 'text' => 'EB Garamond' ],
									[ 'id' => '"Cabin", sans-serif', 'text' => 'Cabin' ],
									[ 'id' => '"Wix Madefor Text", sans-serif', 'text' => 'Wix Madefor Text' ],
								],
							],
						],
						'variants' => [
							'"Inter", sans-serif'       		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Fira Sans", sans-serif'   		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Jost", sans-serif'         		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Satoshi-Variable", sans-serif'     => array('300', 'regular', '500', '600', '700', '800', '900'),
							'"Lora", serif'         			 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Crimson Text", serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Manrope", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"DM Sans", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Krub", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Rubik", sans-serif'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Gochi Hand", cursive'        		 => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Sofia Sans Semi Condensed", sans-serif'  => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Prata", serif'  					=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"EB Garamond", serif'  			=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Cabin", sans-serif'  				=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
							'"Wix Madefor Text", sans-serif'  	=> array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_topbar_submenu_font_size',
				'label' => esc_attr__( 'Sub Menu Font Size', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '12px',
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_topbar_submenu_font_weight',
				'label' => esc_attr__( 'Sub Menu Font Weight', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '500',
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_topbar_height',
				'label' => esc_attr__( 'Top Bar Height', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '38px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator88',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_border_radius_base',
				'label' => esc_attr__( 'Border Radius Base', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '6px',
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_border_radius_form',
				'label' => esc_attr__( 'Border Radius Form', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '4px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator9',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_main_padding_top',
				'label' => esc_attr__( 'Header Main Padding Top', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '15px',
			)
		);
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_main_padding_bottom',
				'label' => esc_attr__( 'Header Main Padding Bottom', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '15px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator18',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_site_width',
				'label' => esc_attr__( 'Site Width', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '1360px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator19',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_header_bottom_height',
				'label' => esc_attr__( 'Header Bottom Height', 'blonwe-core' ),
				'section' => 'blonwe_typography_settings_section',
				'default' => '48px',
			)
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator17',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Input Type ======*/
		blonwe_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'blonwe_body_input_type',
				'label'       => esc_html__( 'Input Type', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => 'default',
				'choices'     => array(
					'default' => esc_attr__( 'Default', 'blonwe-core' ),
					'filled' => esc_attr__( 'Filled', 'blonwe-core' ),
				),
			) 
		);
		
		// Separator
		blonwe_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator28',
			'section'     => 'blonwe_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Icon Css ======*/
		blonwe_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'blonwe_icon_css',
				'label'       => esc_html__( 'Icon Css', 'blonwe-core' ),
				'section'     => 'blonwe_typography_settings_section',
				'default'     => array('auto-part', 'interface', 'ecommerce', 'delivery', 'furniture', 'grocery', 'electronics', 'organic', 'social'),
				'choices'     => [
					'auto-part'  	 => esc_html__( 'Auto Part', 	'blonwe-core' ),
					'interface' 	 => esc_html__( 'Interface', 	'blonwe-core' ),
					'ecommerce'		 => esc_html__( 'Ecommerce', 'blonwe-core' ),
					'delivery' 		 => esc_html__( 'Delivery', 	'blonwe-core' ),
					'furniture' 	 => esc_html__( 'Furniture', 	'blonwe-core' ),
					'grocery'  		 => esc_html__( 'Grocery', 	'blonwe-core' ),
					'electronics'  	 => esc_html__( 'Electronics', 	'blonwe-core' ),
					'organic'  		 => esc_html__( 'Organic', 	'blonwe-core' ),
				],
			)
		);

	/*====== Other Settings =============================*/	
	
		/*====== 404 Page ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'Dropdown_Pages',
				'settings' => 'blonwe_404_page',
				'label' => esc_attr__( 'Select a 404 Page', 'blonwe-core' ),
				'description' => esc_attr__( 'Select a page that will be shown as your default 404 error page.', 'blonwe-core' ),
				'section' => 'blonwe_other_settings_section',
				'default' => '',
				'placeholder' => __( 'Select a page', 'blonwe-core' ),
				'choices' => array(
					'default' => esc_attr__( 'Select a Page', 'blonwe-core' ),
				),
			)
		);

		/*====== Product Search Limit on Elementor ======*/
		blonwe_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'blonwe_elementor_product_search_limit',
				'label' => esc_attr__( 'Elementor Product Search Limit', 'blonwe-core' ),
				'description' => esc_attr__( 'You can set a product search limit for Elementor.', 'blonwe-core' ),
				'section' => 'blonwe_other_settings_section',
				'default' => '100',
			)
		);
