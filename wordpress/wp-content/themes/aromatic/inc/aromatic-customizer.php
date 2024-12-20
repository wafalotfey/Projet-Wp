<?php
/**
 * Aromatic Theme Customizer.
 *
 * @package Aromatic
 */

 if ( ! class_exists( 'Aromatic_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Aromatic_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'admin_enqueue_scripts',array( $this, 'aromatic_admin_script' ) ); 
			add_action( 'customize_preview_init',array( $this, 'aromatic_customize_preview_js' ) );
			add_action( 'customize_register',    array( $this, 'aromatic_customizer_register' ) );
			add_action( 'after_setup_theme',     array( $this, 'aromatic_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function aromatic_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';

			
			/**
			 * Helper files
			 */
			require AROMATIC_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		
		/**
		 * Admin Script
		 */
		function aromatic_admin_script() {
			wp_enqueue_style('aromatic-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
			wp_enqueue_script( 'aromatic-admin-script', AROMATIC_PARENT_INC_URI . '/customizer/assets/js/admin-script.js', array( 'jquery' ), '', true );
			wp_localize_script( 'aromatic-admin-script', 'aromatic_ajax_object',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
			);
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function aromatic_customize_preview_js() {
			wp_enqueue_script( 'aromatic-customizer', AROMATIC_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}

		// Include customizer customizer settings.
			
		function aromatic_customizer_settings() {
			require AROMATIC_PARENT_INC_DIR . '/customizer/customizer-options/aromatic-header.php';
			require AROMATIC_PARENT_INC_DIR . '/customizer/customizer-options/aromatic-footer.php';
			require AROMATIC_PARENT_INC_DIR . '/customizer/customizer-options/aromatic-blog.php';
			require AROMATIC_PARENT_INC_DIR . '/customizer/customizer-options/aromatic-general.php';
			require AROMATIC_PARENT_INC_DIR . '/customizer/customizer-options/aromatic_recommended_plugin.php';
			require AROMATIC_PARENT_INC_DIR . '/customizer/customizer-options/aromatic-pro.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Aromatic_Customizer::get_instance();