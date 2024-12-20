<?php
/**
 * Define Theme Version
 */
define( 'AYROMA_THEME_VERSION', '15.0' );	
	
function ayroma_css() {
	$parent_style = 'aromatic-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'ayroma-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('ayroma-media-query',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('aromatic-media-query');
	
	wp_enqueue_script('ayroma-custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

}
add_action( 'wp_enqueue_scripts', 'ayroma_css',999);



require get_stylesheet_directory() . '/inc/customizer/customizer-options/ayroma-pro.php';

/**
 * Import Settings From Parent Theme
 *
 */
function ayroma_parent_theme_options() {
	$aromatic_mods = get_option( 'theme_mods_aromatic' );
	if ( ! empty( $aromatic_mods ) ) {
		foreach ( $aromatic_mods as $aromatic_mod_k => $aromatic_mod_v ) {
			set_theme_mod( $aromatic_mod_k, $aromatic_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'ayroma_parent_theme_options' );