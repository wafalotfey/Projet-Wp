<?php
/**
* Plugin Name: Blonwe Core
* Description: Premium & Advanced Essential Elements for Elementor
* Plugin URI:  http://themeforest.net/user/KlbTheme
* Version:     1.1.8
* Author:      KlbTheme
* Author URI:  http://themeforest.net/user/KlbTheme
*/


/*
* Exit if accessed directly.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

final class Blonwe_Elementor_Addons
{
    /**
    * Plugin Version
    *
    * @since 1.0
    *
    * @var string The plugin version.
    */
    const VERSION = '1.0.0';

    /**
    * Minimum Elementor Version
    *
    * @since 1.0
    *
    * @var string Minimum Elementor version required to run the plugin.
    */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
    * Minimum PHP Version
    *
    * @since 1.0
    *
    * @var string Minimum PHP version required to run the plugin.
    */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
    * Instance
    *
    * @since 1.0
    *
    * @access private
    * @static
    *
    * @var Blonwe_Elementor_Addons The single instance of the class.
    */
    private static $_instance = null;

    /**
    * Instance
    *
    * Ensures only one instance of the class is loaded or can be loaded.
    *
    * @since 1.0
    *
    * @access public
    * @static
    *
    * @return Blonwe_Elementor_Addons An instance of the class.
    */
    public static function instance()
    {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Constructor
    *
    * @since 1.0
    *
    * @access public
    */
    public function __construct()
    {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Load Textdomain
    *
    * Load plugin localization files.
    *
    * Fired by `init` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function i18n()
    {
        load_plugin_textdomain( 'blonwe-core' );
    }
	
   /**
    * Initialize the plugin
    *
    * Load the plugin only after Elementor (and other plugins) are loaded.
    * Checks for basic plugin requirements, if one check fail don't continue,
    * if all check have passed load the files required to run the plugin.
    *
    * Fired by `plugins_loaded` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function init()
    {
        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'blonwe_admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'blonwe_admin_notice_minimum_elementor_version' ] );
            return;
        }
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'blonwe_admin_notice_minimum_php_version' ] );
            return;
        }
		
		// Categories registered
        add_action( 'elementor/elements/categories_registered', [ $this, 'blonwe_add_widget_category' ] );

		/* Init Include */
        require_once( __DIR__ . '/init.php' );

        /* Customizer Kirki */
        require_once( __DIR__ . '/inc/customizer.php' );

        /* Style php */
        require_once( __DIR__ . '/inc/style.php' );
		
		/* Aq Resizer Image Resize */
        require_once( __DIR__ . '/inc/aq_resizer.php' );
		
		/* Breadcrumb */
        require_once( __DIR__ . '/inc/breadcrumb.php' );

		/* Newsletter */
		if(get_theme_mod('blonwe_newsletter_popup_toggle',0) == 1){
			require_once( __DIR__ . '/inc/newsletter-popup/newsletter-main.php' );
		}

		/* GDPR */
		if(get_theme_mod('blonwe_gdpr_toggle',0) == 1){
			require_once( __DIR__ . '/inc/gdpr/gdpr-main.php' );
		}
		
		/* KLB Attribute Search Filter */
		require_once( __DIR__ . '/inc/klb-attribute-search/klb-attribute-search.php' );
		
		/* Post view for popular posts widget */
        require_once( __DIR__ . '/inc/post_view.php' );

        /* Popular Posts Widget */
        require_once( __DIR__ . '/widgets/widget-popular-posts.php' );

		/* Search Filter */
        require_once( __DIR__ . '/widgets/widget-search-filter.php' );
		
		/* Social Media */
        require_once( __DIR__ . '/widgets/widget-social-media.php' );
		
		/* WooCommerce Filter */
        require_once( __DIR__ . '/woocommerce-filter/woocommerce-filter.php' );
		
		/* Location Taxonomy */
		if(get_theme_mod('blonwe_location_filter',0) == 1){
			require_once( __DIR__ . '/taxonomy/location_taxonomy.php' );
		}
		
		/* Maintenance */
		if(get_theme_mod('blonwe_maintenance_toggle', 0) == 1 || blonwe_ft() == 'maintenance'){
			require_once( __DIR__ . '/inc/maintenance/maintenance.php' );
		}
		
		/* Icon Picker */
		require_once( __DIR__ . '/inc/icon-picker/icon-picker.php' );
		
		/* Menu Endpoints - Mega Menu*/
		require_once( __DIR__ . '/inc/menu-endpoints/menu-endpoints.php' );
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-helpers-functions.php' );
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-customizing-page-settings.php' );

        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
		
		// Register Widget Editor Style
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'widget_editor_style' ] );

        // Register Widget Editor Scripts
        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'widget_editor_scripts' ] );
		
        // Widgets registered
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
    }
	
    /**
    * Register Widgets Category
    *
    */
    public function blonwe_add_widget_category( $elements_manager )
    {
        $elements_manager->add_category( 'blonwe', ['title' => esc_html__( 'Blonwe Core', 'blonwe-core' )]);
    }	
	
    /**
    * Init Widgets
    *
    * Include widgets files and register them
    *
    * @since 1.0
    *
    * @access public
    */
    public function init_widgets()
    {
		// Home Slider
		require_once( __DIR__ . '/elementor/widgets/home-slider/blonwe-home-slider.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Home_Slider_Widget() );
		
		// Home Image
		require_once( __DIR__ . '/elementor/widgets/blonwe-home-image.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Home_Image_Widget() );
		
		// Icon Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-icon-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Icon_Box_Widget() );
		
		// Icon List
		require_once( __DIR__ . '/elementor/widgets/blonwe-icon-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Icon_List_Widget() );
		
		// Banner Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-banner-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Banner_Box_Widget() );
		
		// Banner Box 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-banner-box2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Banner_Box2_Widget() );
		
		// Banner Box 3
		require_once( __DIR__ . '/elementor/widgets/blonwe-banner-box3.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Banner_Box3_Widget() );
		
		// Banner Box 4
		require_once( __DIR__ . '/elementor/widgets/blonwe-banner-box4.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Banner_Box4_Widget() );
		
		// Image Points
		require_once( __DIR__ . '/elementor/widgets/blonwe-image-points.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Image_Points_Widget() );
		
		// Image Animation 
		require_once( __DIR__ . '/elementor/widgets/blonwe-image-animation.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Image_Animation_Widget() );
		
		// Image Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-image-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Image_Box_Widget() );
		
		// Image Search Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-image-search-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Image_Search_Box_Widget() );
		
		// Video Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-video-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Video_Box_Widget() );
		
		// Audio Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-audio-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Audio_Box_Widget() );
		
		// Blonwe Product Tab Carousel
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-tab-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Tab_Carousel_Widget() );
		
		// Blonwe Product Tab Grid
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-tab-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Tab_Grid_Widget() );
		
		// Blonwe Product Tab Grid 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-tab-grid2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Tab_Grid2_Widget() );
		
		// Blonwe Product Tab List
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-tab-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Tab_List_Widget() );
		
		// Blonwe Product Grid
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Grid_Widget() );
		
		// Blonwe Product Carousel
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Carousel_Widget() );
		
		// Blonwe Product Carousel 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-carousel2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Carousel2_Widget() );
		
		// Blonwe Product Carousel 3
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-carousel3.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Carousel3_Widget() );
		
		// Blonwe Special Product 
		require_once( __DIR__ . '/elementor/widgets/special-product/blonwe-special-product.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Special_Product_Widget() );
		
		// Blonwe Special Product 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-deals-product.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Deals_Product_Widget() );
		
		// Blonwe Product Categories
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-categories.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Categories_Widget() );
		
		// Blonwe Product Categories 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-categories2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Categories2_Widget() );
		
		// Blonwe Category Banner
		require_once( __DIR__ . '/elementor/widgets/blonwe-category-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Category_Banner_Widget() );
		
		// Blonwe Category Banner 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-category-banner2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Category_Banner2_Widget() );
		
		// Blonwe Product List
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_List_Widget() );
		
		// Blonwe Product Banner
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Banner_Widget() );
		
		// Blonwe Product Search 
		require_once( __DIR__ . '/elementor/widgets/blonwe-product-search.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Product_Search_Widget() );
		
		// Blonwe Vendor Carousel
		if(class_exists('WeDevs_Dokan')){
			require_once( __DIR__ . '/elementor/widgets/blonwe-vendor-carousel.php' );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Vendor_Carousel_Widget() );
		}
		
		// Blonwe Vendor Carousel 2
		if(class_exists('WeDevs_Dokan')){
			require_once( __DIR__ . '/elementor/widgets/blonwe-vendor-carousel2.php' );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Vendor_Carousel2_Widget() );
		}
		
		// Blonwe Coupon Carousel
		require_once( __DIR__ . '/elementor/widgets/blonwe-coupon-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Coupon_Carousel_Widget() );
		
		// Blonwe Sidebar Menu
		require_once( __DIR__ . '/elementor/widgets/blonwe-sidebar-menu.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Sidebar_Menu_Widget() );
		
		// Blonwe Latest Blog
		require_once( __DIR__ . '/elementor/widgets/blonwe-latest-blog.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Latest_Blog_Widget() );
		
		// Blonwe Page Banner
		require_once( __DIR__ . '/elementor/widgets/blonwe-page-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Page_Banner_Widget() );
		
		// Text Carousel
		require_once( __DIR__ . '/elementor/widgets/blonwe-text-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Text_Carousel_Widget() );
		
		// Text Banner
		require_once( __DIR__ . '/elementor/widgets/blonwe-text-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Text_Banner_Widget() );
		
		// Text Grid
		require_once( __DIR__ . '/elementor/widgets/blonwe-text-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Text_Grid_Widget() );
		
		// Blonwe Text Block 
		require_once( __DIR__ . '/elementor/widgets/blonwe-text-block.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Text_Block_Widget() );
		
		// Blonwe Text List
		require_once( __DIR__ . '/elementor/widgets/blonwe-text-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Text_List_Widget() );
		
		// Custom Title
		require_once( __DIR__ . '/elementor/widgets/blonwe-custom-title.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Custom_Title_Widget() );
		
		// Address Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-address-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Address_Box_Widget() );
		
		// Address Box 2
		require_once( __DIR__ . '/elementor/widgets/blonwe-address-box2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Address_Box2_Widget() );
		
		// Contact Form 7
		require_once( __DIR__ . '/elementor/widgets/blonwe-contact-form-7.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Contact_Form_7_Widget() );
		
		// Blonwe Counter
		require_once( __DIR__ . '/elementor/widgets/blonwe-counter.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Counter_Widget() );
		
		// Blonwe Testimonial Box
		require_once( __DIR__ . '/elementor/widgets/blonwe-testimonial-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Testimonial_Box_Widget() );
		
		// Blonwe Clients Carousel
		require_once( __DIR__ . '/elementor/widgets/blonwe-client-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Client_Carousel_Widget() );
		
		// Blonwe Button
		require_once( __DIR__ . '/elementor/widgets/blonwe-button.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Blonwe_Button_Widget() );
	}
	
	
    /**
    * Admin notice
    *
    * Warning when the site doesn't have Elementor installed or activated.
    *
    * @since 1.0
    *
    * @access public
    */
    public function blonwe_admin_notice_missing_main_plugin()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'blonwe-core' ),
            '<strong>' . esc_html__( 'Blonwe Core', 'blonwe-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'blonwe-core' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required Elementor version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function blonwe_admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'blonwe-core' ),
            '<strong>' . esc_html__( 'Blonwe Core', 'blonwe-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'blonwe-core' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required PHP version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function blonwe_admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'blonwe-core' ),
            '<strong>' . esc_html__( 'Blonwe Core', 'blonwe-core' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'blonwe-core' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
	
    public function widget_styles()
    {
    }

    public function widget_scripts()
    {


		if (is_admin ()){
			wp_enqueue_media ();
			wp_enqueue_script( 'widget-image', plugins_url( 'js/widget-image.js', __FILE__ ));
		}

        // custom-scripts
		if ( is_rtl() ) {
			wp_enqueue_script( 'blonwe-core-custom-scripts-rtl', plugins_url( 'elementor/custom-scripts-rtl.js', __FILE__ ), true );
		} else {
			wp_enqueue_script( 'blonwe-core-custom-scripts', plugins_url( 'elementor/custom-scripts.js', __FILE__ ), true );
		}
    }
	
    public function widget_editor_style(){
		wp_enqueue_style( 'klb-editor-style', plugins_url( 'elementor/editor-style.css', __FILE__ ), true );
    }

    public function widget_editor_scripts(){
		
		wp_enqueue_script( 'klb-editor-scripts', plugins_url( 'elementor/editor-scripts.js', __FILE__ ), true );

    }


} 
Blonwe_Elementor_Addons::instance();