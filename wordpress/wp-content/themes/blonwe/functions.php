<?php
/**
 * functions.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.1.9
 * 
 */
update_option( 'envato_purchase_code_48378751', ' aba3a6c2-2008-494c-b9e1-c9d743352645' );
update_option( '_license_key_status', 'valid' );
/*************************************************
## Get Theme Info
*************************************************/ 
if ( ! function_exists( 'blonwe_get_theme_info' ) ) {
	function blonwe_get_theme_info( $parameter ) {
		
		$theme_info = wp_get_theme( get_template() )->get( $parameter );
		
		return $theme_info;
	}
}

define( 'BLONWE_VERSION', blonwe_get_theme_info( 'Version' ) );

/*************************************************
## Admin style and scripts  
*************************************************/ 
function blonwe_admin_styles() {
	wp_enqueue_style('blonwe-klbtheme',     get_template_directory_uri() .'/assets/css/admin/klbtheme.css');
	wp_enqueue_script('blonwe-init', 	    get_template_directory_uri() .'/assets/js/init.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('blonwe-register',    get_template_directory_uri() .'/assets/js/admin/register.js', array('jquery'), BLONWE_VERSION, true);
}
add_action('admin_enqueue_scripts', 'blonwe_admin_styles');

 /*************************************************
## Blonwe Fonts
*************************************************/
function blonwe_fonts_url() {
	$fonts_url = '';

	$allfont = array();
	
	$inter 		= '"Inter", sans-serif';
	$firasans 	= '"Fira Sans", sans-serif';
	$jost 		= '"Jost", sans-serif';
	$lora 		= '"Lora", serif';
	$crimson 	= '"Crimson Text", serif';
	$manrope 	= '"Manrope", sans-serif';
	$dmsans 	= '"DM Sans", sans-serif';
	$krub 		= '"Krub", sans-serif';
	$rubik 		= '"Rubik", sans-serif';
	$gochi 		= '"Gochi Hand", cursive';
	$sofia 		= '"Sofia Sans Semi Condensed", sans-serif';
	$prata 		= '"Prata", serif';
	$garamond 	= '"EB Garamond", serif';
	$cabin 		= '"Cabin", sans-serif';
	$wix 		= '"Wix Madefor Text", sans-serif';

	$allfont[] = isset(get_theme_mod('blonwe_body_typography', [])['font-family']) ? get_theme_mod('blonwe_body_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_heading_typography', [])['font-family']) ? get_theme_mod('blonwe_heading_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_menu_typography', [])['font-family']) ? get_theme_mod('blonwe_menu_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_form_typography', [])['font-family']) ? get_theme_mod('blonwe_form_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_button_typography', [])['font-family']) ? get_theme_mod('blonwe_button_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_price_typography', [])['font-family']) ? get_theme_mod('blonwe_price_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_product_name_typography', [])['font-family']) ? get_theme_mod('blonwe_product_name_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_topbar_typography', [])['font-family']) ? get_theme_mod('blonwe_topbar_typography', [])['font-family'] :'';
	
	$font_families = array();
	
	if(in_array($inter, $allfont) || !$allfont) {
		$font_families[] = 'Inter:wght@100;200;300;400;500;600;700;800;900';
	}
	
	if(in_array($firasans, $allfont)) {
		$font_families[] = 'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	}
	
	if(in_array($jost, $allfont)) {
		$font_families[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	}
	
	if(in_array($lora, $allfont)) {
		$font_families[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	}
	
	if(in_array($crimson, $allfont)) {
		$font_families[] = 'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	}
	
	if(in_array($manrope, $allfont)) {
		$font_families[] = 'Manrope:wght@200;300;400;500;600;700;800';
	}
	
	if(in_array($dmsans, $allfont)) {
		$font_families[] = 'DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700';
	}
	
	if(in_array($krub, $allfont)) {
		$font_families[] = 'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700';
	}
	
	if(in_array($rubik, $allfont)) {
		$font_families[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	}
	
	if(in_array($gochi, $allfont)) {
		$font_families[] = 'Gochi+Hand';
	}
	
	if(in_array($sofia, $allfont)) {
		$font_families[] = 'Sofia+Sans+Semi+Condensed:ital,wght@0,1;0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,1;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	}
	
	if(in_array($prata, $allfont)) {
		$font_families[] = 'Prata';
	}
	
	if(in_array($garamond, $allfont)) {
		$font_families[] = 'EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800';
	}
	
	if(in_array($cabin, $allfont)) {
		$font_families[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	}
	
	if(in_array($wix, $allfont)) {
		$font_families[] = 'Wix+Madefor+Text:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800';
	}
	
	if(in_array($inter, $allfont) || in_array($firasans, $allfont) || in_array($jost, $allfont) || in_array($lora, $allfont) || in_array($crimson, $allfont) || in_array($manrope, $allfont) || in_array($dmsans, $allfont) || in_array($krub, $allfont) || in_array($rubik, $allfont) || in_array($gochi, $allfont) || in_array($sofia, $allfont) || in_array($prata, $allfont) || in_array($garamond, $allfont) || in_array($cabin, $allfont) || in_array($wix, $allfont)) {
		$query_args = array( 
			'family' => rawurldecode( implode( '&family=', $font_families ) ), 
			'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
	}
	
	return esc_url_raw( $fonts_url );
}

function blonwe_fonts_local() {
	$fonts_url = '';

	$allfont = array();
	
	$satoshi = '"Satoshi-Variable", sans-serif';

	$allfont[] = isset(get_theme_mod('blonwe_body_typography', [])['font-family']) ? get_theme_mod('blonwe_body_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_heading_typography', [])['font-family']) ? get_theme_mod('blonwe_heading_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_menu_typography', [])['font-family']) ? get_theme_mod('blonwe_menu_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_form_typography', [])['font-family']) ? get_theme_mod('blonwe_form_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_button_typography', [])['font-family']) ? get_theme_mod('blonwe_button_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_price_typography', [])['font-family']) ? get_theme_mod('blonwe_price_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_product_name_typography', [])['font-family']) ? get_theme_mod('blonwe_product_name_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('blonwe_topbar_typography', [])['font-family']) ? get_theme_mod('blonwe_topbar_typography', [])['font-family'] :'';
	
	$font_families = array();

	if(in_array($satoshi, $allfont)) { 
		$fonts_url =  get_template_directory_uri()  . '/assets/fonts/satoshi/Satoshi-Variable.woff2';
		
	}
	
	return esc_url_raw( $fonts_url );
}

/*************************************************
## Styles and Scripts
*************************************************/ 
define('BLONWE_INDEX_CSS', 	  get_template_directory_uri()  . '/assets/css');
define('BLONWE_INDEX_JS', 	  get_template_directory_uri()  . '/assets/js');

function blonwe_scripts() {

	if ( is_admin_bar_showing() ) {
		wp_enqueue_style( 'blonwe-klbtheme', BLONWE_INDEX_CSS . '/admin/klbtheme.css', false, BLONWE_VERSION);    
	}	

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'bootstrap', 							BLONWE_INDEX_CSS . '/bootstrap.min.css', false, BLONWE_VERSION);
	wp_register_style( 'mediaelementplayer', 				BLONWE_INDEX_CSS . '/mediaelementplayer.min.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'scrollbar', 							BLONWE_INDEX_CSS . '/perfect-scrollbar.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'slick-slider', 						BLONWE_INDEX_CSS . '/slick-slider.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'magnific-popup', 					BLONWE_INDEX_CSS . '/magnific-popup.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'blonwe-storebox', 					BLONWE_INDEX_CSS . '/storebox.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'blonwe-contact', 					BLONWE_INDEX_CSS . '/contact.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'blonwe-blog-single', 				BLONWE_INDEX_CSS . '/blog-single.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'blonwe-order-tracking', 				BLONWE_INDEX_CSS . '/order-tracking.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'select2-min', 						BLONWE_INDEX_CSS . '/select2.min.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'blonwe-base', 						BLONWE_INDEX_CSS . '/base.css', false, BLONWE_VERSION);
	wp_style_add_data( 'blonwe-base', 'rtl', 'replace' );
	wp_enqueue_style( 'blonwe-base-dark', 					BLONWE_INDEX_CSS . '/base-dark.css', false, BLONWE_VERSION);
	wp_enqueue_style( 'blonwe-font-url',  					blonwe_fonts_url(), array(), null );
	wp_enqueue_style( 'blonwe-font-local',  				blonwe_fonts_local(), array(), null );
	wp_enqueue_style( 'blonwe-style',         	    		get_stylesheet_uri() );
	wp_style_add_data( 'blonwe-style', 'rtl', 'replace' );

	$mapkey = get_theme_mod('blonwe_mapapi');
	
	if( get_theme_mod( 'blonwe_single_type' ) == 'type5'){
		wp_dequeue_script( 'flexslider' ); 
	}
	wp_enqueue_script( 'imagesloaded');
	wp_enqueue_script( 'gsap-bundle',    	    	BLONWE_INDEX_JS . '/gsap.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'waypoints',    	    	    BLONWE_INDEX_JS . '/waypoints.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'sticky',    	    	    BLONWE_INDEX_JS . '/sticky.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'perfect-scrollbar-min',    	BLONWE_INDEX_JS . '/perfect-scrollbar.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'select2-full-min',    	    BLONWE_INDEX_JS . '/select2.full.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'slick',    	    	        BLONWE_INDEX_JS . '/slick.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-googlemap',         '//maps.googleapis.com/maps/api/js?key='. $mapkey .'', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'jquery-countdown',    	    BLONWE_INDEX_JS . '/jquery.countdown.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'theia-sticky-sidebar',    	BLONWE_INDEX_JS . '/theia-sticky-sidebar.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'jquery-magnific-popup',    	BLONWE_INDEX_JS . '/jquery.magnific-popup.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'bootstrap-bundle',    	    BLONWE_INDEX_JS . '/bootstrap.bundle.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'mediaelement-and-player',  BLONWE_INDEX_JS . '/mediaelement-and-player.min.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-siteslider',    	 	BLONWE_INDEX_JS . '/custom/siteslider.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-countdown',        	BLONWE_INDEX_JS . '/custom/countdown.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-layered-dropdown',   BLONWE_INDEX_JS . '/custom/layered-dropdown.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-stickysidebar',     BLONWE_INDEX_JS . '/custom/stickysidebar.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-productquantity',    BLONWE_INDEX_JS . '/custom/productquantity.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-hoverslider',       BLONWE_INDEX_JS . '/custom/hoverslider.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-productHover',       BLONWE_INDEX_JS . '/custom/productHover.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-sidebarfilter',     BLONWE_INDEX_JS . '/custom/sidebarfilter.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-sitescroll',     	BLONWE_INDEX_JS . '/custom/sitescroll.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-cartquantity',    	BLONWE_INDEX_JS . '/custom/cartquantity.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-flex-thumbs',       BLONWE_INDEX_JS . '/custom/flex-thumbs.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-popup-login',       BLONWE_INDEX_JS . '/custom/popup-login.js', array('jquery'), BLONWE_VERSION, true);
	wp_enqueue_script( 'blonwe-theme-select',     	BLONWE_INDEX_JS . '/custom/theme-select.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-mini-cart-scroll',  BLONWE_INDEX_JS . '/custom/mini_cart_scroll.js', array('jquery'), BLONWE_VERSION, true);
	wp_register_script( 'blonwe-loginform',   		BLONWE_INDEX_JS . '/custom/loginform.js', array('jquery'), BLONWE_VERSION, true);
	if ( is_rtl() ) {
	wp_enqueue_script( 'bundle-rtl',    	    	BLONWE_INDEX_JS . '/bundle-rtl.js', array('jquery'), BLONWE_VERSION, true);
	} else {
	wp_enqueue_script( 'bundle',    	    	 	BLONWE_INDEX_JS . '/bundle.js', array('jquery'), BLONWE_VERSION, true);
	}
	
}
add_action( 'wp_enqueue_scripts', 'blonwe_scripts' );

/*************************************************
## Icons
*************************************************/ 
function blonwe_icon_styles() {

	$icon_css_multicheck = get_theme_mod('blonwe_icon_css',array( 'auto-part', 'interface', 'ecommerce', 'delivery', 'furniture', 'grocery', 'electronics', 'organic'));
	
	if(in_array('auto-part', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-auto-part', 					BLONWE_INDEX_CSS . '/klbtheme-icon-auto-part.css', false, BLONWE_VERSION);
	}
	if(in_array('interface', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-interface', 					BLONWE_INDEX_CSS . '/klbtheme-icon-interface.css', false, BLONWE_VERSION);
	}
	if(in_array('ecommerce', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-ecommerce', 					BLONWE_INDEX_CSS . '/klbtheme-icon-ecommerce.css', false, BLONWE_VERSION);
	} 
	if(in_array('delivery', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-delivery', 						BLONWE_INDEX_CSS . '/klbtheme-icon-delivery.css', false, BLONWE_VERSION);
	} 
	if(in_array('furniture', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-furniture', 					BLONWE_INDEX_CSS . '/klbtheme-icon-furniture.css', false, BLONWE_VERSION);
	} 
	if(in_array('grocery', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-grocery', 						BLONWE_INDEX_CSS . '/klbtheme-icon-grocery.css', false, BLONWE_VERSION);
	} 
	if(in_array('electronics', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-electronics', 					BLONWE_INDEX_CSS . '/klbtheme-icon-electronics.css', false, BLONWE_VERSION);
	} 
	if(in_array('organic', $icon_css_multicheck)){
		wp_enqueue_style( 'icon-organic', 						BLONWE_INDEX_CSS . '/klbtheme-icon-organic.css', false, BLONWE_VERSION);
	} 
	
	wp_enqueue_style( 'icon-social', 						BLONWE_INDEX_CSS . '/klbtheme-icon-social.css', false, BLONWE_VERSION);
	
}
add_action('admin_enqueue_scripts', 'blonwe_icon_styles');
add_action('wp_enqueue_scripts', 'blonwe_icon_styles');

/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function blonwe_theme_setup() {
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array('gallery', 'audio', 'video'));
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array('gallery_thumbnail_image_width' => 99,) );
	load_theme_textdomain( 'blonwe', get_template_directory() . '/languages' );
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'blonwe_theme_setup' );

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/ 

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'blonwe_register_required_plugins' );

function blonwe_register_required_plugins() {

	$url = 'http://klbtheme.com/blonwe/plugins/';
	$mainurl = 'http://klbtheme.com/plugins/';

	$plugins = array(
		
        array(
            'name'                  => esc_html__('Meta Box','blonwe'),
            'slug'                  => 'meta-box',
        ),

        array(
            'name'                  => esc_html__('Contact Form 7','blonwe'),
            'slug'                  => 'contact-form-7',
        ),
		
        array(
            'name'                  => esc_html__('Kirki','blonwe'),
            'slug'                  => 'kirki',
        ),
		
		array(
            'name'                  => esc_html__('MailChimp Subscribe','blonwe'),
            'slug'                  => 'mailchimp-for-wp',
        ),
		
        array(
            'name'                  => esc_html__('Elementor','blonwe'),
            'slug'                  => 'elementor',
            'required'              => true,
        ),
		
        array(
            'name'                  => esc_html__('WooCommerce','blonwe'),
            'slug'                  => 'woocommerce',
            'required'              => true,
        ),

        array(
            'name'                  => esc_html__('Blonwe Core','blonwe'),
            'slug'                  => 'blonwe-core',
            'source'                => $url . 'blonwe-core.zip',
            'required'              => true,
            'version'               => '1.1.8',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Envato Market','blonwe'),
            'slug'                  => 'envato-market',
            'source'                => $mainurl . 'envato-market.zip',
            'required'              => true,
            'version'               => '2.0.12',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),


	);

	$config = array(
		'id'           => 'blonwe',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/*************************************************
## Blonwe Register Menu 
*************************************************/

function blonwe_register_menus() {
	register_nav_menus( array( 'main-menu' 	   => esc_html__('Primary Navigation Menu','blonwe')) );
	
	$canvasbottommenu = get_theme_mod('blonwe_canvas_bottom_menu','0');
	$topleftmenu = get_theme_mod('blonwe_top_left_menu','0');
	$toprightmenu = get_theme_mod('blonwe_top_right_menu','0');
	$sidebarmenu = get_theme_mod('blonwe_header_sidebar','0');
	
	if($canvasbottommenu == '1'){
	register_nav_menus( array( 'canvas-bottom' 	   => esc_html__('Canvas Bottom Menu','blonwe')) );
	}
	
	if($topleftmenu == '1'){
		register_nav_menus( array( 'top-left-menu'     => esc_html__('Top Left Menu','blonwe')) );
	}
	
	if($toprightmenu == '1'){
		register_nav_menus( array( 'top-right-menu'     => esc_html__('Top Right Menu','blonwe')) );
	}
	
	if($sidebarmenu == '1'){
		register_nav_menus( array( 'sidebar-menu'       => esc_html__('Sidebar Menu','blonwe')) );
	}
	
}
add_action('init', 'blonwe_register_menus');

/*************************************************
## Excerpt More
*************************************************/ 

function blonwe_excerpt_more($more) {
  global $post;
  return '<div class="klb-readmore button"><a class="btn link" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__('Read More', 'blonwe') . ' <i class="klbth-icon-right-arrow"></i></a></div>';
  }
 add_filter('excerpt_more', 'blonwe_excerpt_more');
 
/*************************************************
## Word Limiter
*************************************************/ 
function blonwe_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

/*************************************************
## Widgets
*************************************************/ 

function blonwe_widgets_init() {
	register_sidebar( array(
	  'name' => esc_html__( 'Blog Sidebar', 'blonwe' ),
	  'id' => 'blog-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Blog page.','blonwe' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Shop Sidebar', 'blonwe' ),
	  'id' => 'shop-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Shop.','blonwe' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );
	
	register_sidebar( array(
	  'name' => esc_html__( 'Shop Top Widget', 'blonwe' ),
	  'id' => 'shop-top-widget',
	  'description'   => esc_html__( 'These are top widgets for the Shop.','blonwe' ),
	  'before_widget' => '<nav class="woocommerce-sub-categories %2$s">',
	  'after_widget'  => '</nav>',
	  'before_title'  => '<span>',
	  'after_title'   => '</span>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer First Column', 'blonwe' ),
	  'id' => 'footer-1',
	  'description'   => esc_html__( 'These are widgets for the Footer.','blonwe' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Second Column', 'blonwe' ),
	  'id' => 'footer-2',
	  'description'   => esc_html__( 'These are widgets for the Footer.','blonwe' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Third Column', 'blonwe' ),
	  'id' => 'footer-3',
	  'description'   => esc_html__( 'These are widgets for the Footer.','blonwe' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fourth Column', 'blonwe' ),
	  'id' => 'footer-4',
	  'description'   => esc_html__( 'These are widgets for the Footer.','blonwe' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );
	
	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fifth Column', 'blonwe' ),
	  'id' => 'footer-5',
	  'description'   => esc_html__( 'These are widgets for the Footer.','blonwe' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'blonwe_widgets_init' );
 
/*************************************************
## Coupon Page
*************************************************/ 

function blonwe_add_excerpt_support_for_pages() {
	add_post_type_support( 'shop_coupon', 'thumbnail' );
	add_post_type_support( 'shop_coupon', 'editor' );
}
add_action( 'init', 'blonwe_add_excerpt_support_for_pages' );
 
 
/*************************************************
## Blonwe Comment
*************************************************/

if ( ! function_exists( 'blonwe_comment' ) ) :
 function blonwe_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
   case 'pingback' :
   case 'trackback' :
  ?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'blonwe' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'blonwe' ), ' ' ); ?></p>
  <?php
    break;
   default :
  ?>
  
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		  <article class="comment-body klb-comment-body">
			  <div class="vcard">
				<img src="<?php echo get_avatar_url( $comment, 90 ); ?>" alt="<?php comment_author(); ?>" class="avatar">
			  </div>
			<div class="comment-right-side comment-meta">
				<div class="comment-author">
				<b class="fn"><a class="url"><?php comment_author(); ?></a></b>
				</div>
				<div class="comment-metadata">
				  <time><?php comment_date(); ?></time>
				</div><!-- comment-metadata -->
			
				<div class="comment-content">
					<div class="klb-post">
						<?php comment_text(); ?>
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'blonwe' ); ?></em>
						<?php endif; ?>
					</div>
				</div><!-- comment-content -->
				<div class="reply">
				  <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- reply -->
			</div><!-- comment-right-side -->

		  </article>
	    </div>
	</li>

  <?php
    break;
  endswitch;
 }
endif;

/*************************************************
## Blonwe Widget Count Filter
 *************************************************/

function blonwe_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="catcount">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return blonwe_sanitize_data($links);
}
add_filter('wp_list_categories', 'blonwe_cat_count_span');
 
function blonwe_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="catcount">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return blonwe_sanitize_data($links);
}
add_filter( 'get_archives_link', 'blonwe_archive_count_span' );


/*************************************************
## Pingback url auto-discovery header for single posts, pages, or attachments
 *************************************************/
function blonwe_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blonwe_pingback_header' );

/*************************************************
## Nav Description
 *************************************************/
function blonwe_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="badge ' . $item->description . '">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
 
    return blonwe_sanitize_data($item_output);
}
add_filter( 'walker_nav_menu_start_el', 'blonwe_nav_description', 10, 4 );

/************************************************************
## DATA CONTROL FROM PAGE METABOX OR ELEMENTOR PAGE SETTINGS
*************************************************************/
function blonwe_page_settings( $opt_id){
	
	if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {
		// Get the current post id
		$post_id = get_the_ID();

		// Get the page settings manager
		$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

		// Get the settings model for current post
		$page_settings_model = $page_settings_manager->get_model( $post_id )->get_data('settings');

		// Retrieve the color we added before
		return isset($page_settings_model['blonwe_elementor_'.$opt_id]) ? $page_settings_model['blonwe_elementor_'.$opt_id] : false;
	}
}

/************************************************************
## Elementor Register Location
*************************************************************/
function blonwe_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single' );
	$elementor_theme_manager->register_location( 'archive' );

}
add_action( 'elementor/theme/register_locations', 'blonwe_register_elementor_locations' );

/************************************************************
## Elementor Get Templates
*************************************************************/
function blonwe_get_elementor_template($template_id){
	if($template_id){

		$frontend = \Elementor\Plugin::instance()->frontend;
	    printf( '<div class="blonwe-elementor-template template-'.esc_attr($template_id).'">%1$s</div>', $frontend->get_builder_content_for_display( $template_id, true ) );	
	   
	   if ( class_exists( '\Elementor\Plugin' ) ) {
	        $elementor = \Elementor\Plugin::instance();
	        $elementor->frontend->enqueue_styles();
			$elementor->frontend->enqueue_scripts();
	    }
	
	    if ( class_exists( '\ElementorPro\Plugin' ) ) {
	        $elementor_pro = \ElementorPro\Plugin::instance();
	        $elementor_pro->enqueue_styles();
	    }

	}

}
add_action( 'blonwe_before_main_shop', 	 'blonwe_get_elementor_template', 10);
add_action( 'blonwe_after_main_shop', 	 'blonwe_get_elementor_template', 10);
add_action( 'blonwe_before_main_footer', 'blonwe_get_elementor_template', 10);
add_action( 'blonwe_after_main_footer',  'blonwe_get_elementor_template', 10);
add_action( 'blonwe_before_main_header', 'blonwe_get_elementor_template', 10);
add_action( 'blonwe_after_main_header',  'blonwe_get_elementor_template', 10);

/************************************************************
## Do Action for Templates and Product Categories
*************************************************************/
function blonwe_do_action($hook){
	
	if ( !class_exists( 'woocommerce' ) ) {
		return;
	}

	$categorytemplate = get_theme_mod('blonwe_elementor_template_each_shop_category');
	if(is_product_category()){
		if($categorytemplate && array_search(get_queried_object()->term_id, array_column($categorytemplate, 'category_id')) !== false){
			foreach($categorytemplate as $c){
				if($c['category_id'] == get_queried_object()->term_id){
					do_action( $hook, $c[$hook.'_elementor_template_category']);
				}
			}
		} else {
			do_action( $hook, get_theme_mod($hook.'_elementor_template'));
		}
	} else {
		do_action( $hook, get_theme_mod($hook.'_elementor_template'));
	}
	
}

/*************************************************
## Blonwe Get Image
*************************************************/
function blonwe_get_image($image){
	$app_image = ! wp_attachment_is_image($image) ? $image : wp_get_attachment_url($image);
	
	return esc_html($app_image);
}

/*************************************************
## Blonwe Get options
*************************************************/
function blonwe_get_option(){	
	$getopt  = isset( $_GET['opt'] ) ? $_GET['opt'] : '';

	return esc_html($getopt);
}

/*************************************************
## Blonwe Body Class
*************************************************/ 
function blonwe_body_input_class( $classes ) {
	
	if(get_theme_mod('blonwe_body_input_type') == 'filled') {
		$classes[] = 'input-variation-filled';
	} else {
		$classes[] = 'input-variation-default';
	}	
	
	return $classes;
}
add_filter('body_class', 'blonwe_body_input_class');


/*************************************************
## Blonwe Custom 404 Page
*************************************************/ 
if ( ! function_exists( 'blonwe_custom_404_page' ) ) {
	function blonwe_custom_404_page( $template ) {
		global $wp_query;
		$custom_404 = get_theme_mod('blonwe_404_page');

		if ( $custom_404 === 'default' || empty( $custom_404 ) ) {
			return $template;
		}

		$wp_query->query( 'page_id=' . $custom_404 );
		$wp_query->the_post();
		$template = get_page_template();
		rewind_posts();

		return $template;
	}

	add_filter( '404_template', 'blonwe_custom_404_page', 999 );
}

/*************************************************
## Blonwe FT
*************************************************/ 
if ( ! function_exists( 'blonwe_ft' ) ) {
	function blonwe_ft() {
		return;
	}
}
	
/*************************************************
## Blonwe Theme options
*************************************************/
	
	require_once get_template_directory() . '/includes/metaboxes.php';
	require_once get_template_directory() . '/includes/woocommerce.php';
	require_once get_template_directory() . '/includes/woocommerce-filter.php';
	require_once get_template_directory() . '/includes/pjax/filter-functions.php';
	require_once get_template_directory() . '/includes/sanitize.php';
	require_once get_template_directory() . '/includes/header/main-header.php';
	require_once get_template_directory() . '/includes/footer/main_footer.php';
	require_once get_template_directory() . '/includes/woocommerce/tab-ajax.php';
	require_once get_template_directory() . '/includes/woocommerce/tab-ajax-grid.php';
	require_once get_template_directory() . '/includes/woocommerce/tab-ajax-grid2.php';
	require_once get_template_directory() . '/includes/woocommerce/tab-ajax-list.php';
	require_once get_template_directory() . '/includes/merlin/theme-register.php';
	require_once get_template_directory() . '/includes/merlin/setup-wizard.php';