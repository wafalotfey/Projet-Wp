<?php
/* Notifications in customizer */
require get_template_directory() . '/inc/customizer/customizer-notify.php';
$aromatic_config_customizer = array(
	'recommended_plugins'       => array(
		'woocommerce' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>WooCommerce</strong> plugin for taking full advantage of all the features this theme has to offer.', 'aromatic')),
		),
		'ecommerce-companion' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>eCommerce Companion</strong> plugin for taking full advantage of all the features this theme has to offer.', 'aromatic')),
		)
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'aromatic' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'aromatic' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'aromatic' ),
	'activate_button_label'     => esc_html__( 'Activate', 'aromatic' ),
	'aromatic_deactivate_button_label'   => esc_html__( 'Deactivate', 'aromatic' ),
);
Aromatic_Customizer_Notify::init( apply_filters( 'aromatic_customizer_notify_array', $aromatic_config_customizer ) );



class aromatic_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof aromatic_import_dummy_data ) ) {
			self::$instance = new aromatic_import_dummy_data;
			self::$instance->aromatic_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function aromatic_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'aromatic_import_customize_scripts' ), 0 );

	}
	
	

	public function aromatic_import_customize_scripts() {

	wp_enqueue_script( 'aromatic-import-customizer-js', get_template_directory_uri() . '/inc/customizer/assets/js/import-customizer.js', array( 'customize-controls' ) );
	}
}

$aromatic_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
aromatic_import_dummy_data::init( apply_filters( 'aromatic_import_customizer', $aromatic_import_customizers ) );