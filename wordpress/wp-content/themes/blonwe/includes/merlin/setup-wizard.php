<?php
/************************************************************
## Setup Wizard
*************************************************************/
require_once get_parent_theme_file_path( '/includes/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/includes/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/includes/merlin/merlin-config.php' );

/************************************************************
## Setup Wizard Local Import
*************************************************************/
function blonwe_local_import_files() {
	return array(
		array(
			'import_file_name'             	=> 'Electronic',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/electronic/electronic.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/electronic/electronic-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/electronic/electronic-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/electronic/electronic-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Grocery',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/grocery/grocery.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/grocery/grocery-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/grocery/grocery-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/grocery/grocery-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Fashion',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/fashion/fashion.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/fashion/fashion-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/fashion/fashion-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/fashion/fashion-customizer.dat' ),
		),

		array(
			'import_file_name'             	=> 'Marketplace',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/marketplace/marketplace.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/marketplace/marketplace-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/marketplace/marketplace-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/marketplace/marketplace-customizer.dat' ),
		),

		array(
			'import_file_name'             	=> 'Furniture',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/furniture/furniture.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/furniture/furniture-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/furniture/furniture-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/furniture/furniture-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Auto Parts',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/autoparts/autoparts.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/autoparts/autoparts-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/autoparts/autoparts-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/autoparts/autoparts-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Cosmetics',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/cosmetics/cosmetics.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/cosmetics/cosmetics-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/cosmetics/cosmetics-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/cosmetics/cosmetics-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Medical',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/medical/medical.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/medical/medical-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/medical/medical-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/medical/medical-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Sportswear',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/sportswear/sportswear.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/sportswear/sportswear-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/sportswear/sportswear-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/sportswear/sportswear-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Jewellery',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/jewellery/jewellery.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/jewellery/jewellery-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/jewellery/jewellery-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/jewellery/jewellery-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Book',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/book/book.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/book/book-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/book/book-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/book/book-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Glasses',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/glasses/glasses.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/glasses/glasses-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/glasses/glasses-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/glasses/glasses-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Kids',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/kids/kids.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/kids/kids-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/kids/kids-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/kids/kids-customizer.dat' ),
		),

		array(
			'import_file_name'             	=> 'Pet Shop',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/petshop/petshop.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/petshop/petshop-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/petshop/petshop-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/petshop/petshop-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Watch',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/watch/watch.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/watch/watch-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/watch/watch-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/watch/watch-customizer.dat' ),
		),
		array(
			'import_file_name'             	=> 'Wine',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/wine/wine.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/wine/wine-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/wine/wine-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/wine/wine-customizer.dat' ),
		),
		
		array(
			'import_file_name'             	=> 'Organic',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/organic/organic.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/organic/organic-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/organic/organic-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/organic/organic-customizer.dat' ),
		),

		array(
			'import_file_name'             	=> 'Gardening',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/gardening/gardening.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/gardening/gardening-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/gardening/gardening-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/gardening/gardening-customizer.dat' ),
		),

		array(
			'import_file_name'             	=> 'Toys',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/toys/toys.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/toys/toys-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/toys/toys-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/toys/toys-customizer.dat' ),
		),

		array(
			'import_file_name'             	=> 'Coupon',
			'import_img_url'             	=> get_template_directory_uri(). '/includes/merlin/demo-data/coupon/coupon.jpg',
			'local_import_file'            	=> get_parent_theme_file_path( '/includes/merlin/demo-data/coupon/coupon-content.xml' ),
			'local_import_widget_file'     	=> get_parent_theme_file_path( '/includes/merlin/demo-data/coupon/coupon-widgets.wie' ),
			'local_import_customizer_file'  => get_parent_theme_file_path( '/includes/merlin/demo-data/coupon/coupon-customizer.dat' ),
		),
		
	);
}
add_filter( 'merlin_import_files', 'blonwe_local_import_files' );

/************************************************************
## Setup Wizard After Import
*************************************************************/
function blonwe_merlin_after_import_setup() {
	// Assign menus to their locations.
	$main_menu 	  = get_term_by( 'name', 'Menu 1', 'nav_menu' );
	$topleftmenu  = get_term_by( 'name', 'Top Left', 'nav_menu' );
	$toprightmenu = get_term_by( 'name', 'Top Right', 'nav_menu' );
	$sidebarmenu  = get_term_by( 'name', 'Sidebar Menu', 'nav_menu' );
	$canvasbottom = get_term_by( 'name', 'Canvas Bottom', 'nav_menu' );
	
	set_theme_mod(
		'nav_menu_locations', array(
			'main-menu' 	     => $main_menu->term_id,
			'top-left-menu' 	 => $topleftmenu->term_id,
			'top-right-menu' 	 => $toprightmenu->term_id,
			'sidebar-menu' 	     => $sidebarmenu->term_id,
			'canvas-bottom' 	 => $canvasbottom->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	add_action( 'init', function () {
        $query_posts = new WP_Query( array(
            'post_type' => 'product',
        ));
        while ( $query_posts->have_posts() ) {
            $query_posts->the_post();
            wp_update_post( $post );
        }
        wp_reset_postdata();
    });

    if ( did_action( 'elementor/loaded' ) ) {
        // disable some default elementor global settings after setup theme
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'elementor_global_image_lightbox', 'yes' );
    }
    if ( class_exists( 'woocommerce' ) ) {
		update_option( 'woocommerce_enable_signup_and_login_from_checkout', 'yes'  );
		update_option( 'woocommerce_enable_myaccount_registration', 'yes'  );
		update_option( 'woocommerce_registration_generate_username', 'no'  );
		update_option( 'woocommerce_registration_generate_password', 'no'  );
		
		$shop = get_page_by_path('shop');
		$cart = get_page_by_path('cart');
		$checkout = get_page_by_path('checkout');
		$myaccount = get_page_by_path('my-account');
		
        update_option( 'woocommerce_shop_page_id', $shop->ID );
        update_option( 'woocommerce_cart_page_id', $cart->ID );
        update_option( 'woocommerce_checkout_page_id', $checkout->ID );
        update_option( 'woocommerce_myaccount_page_id', $myaccount->ID );
    }


}
add_action( 'merlin_after_all_import', 'blonwe_merlin_after_import_setup' );

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }
?>