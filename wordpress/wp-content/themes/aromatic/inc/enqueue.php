<?php
 /**
 * Enqueue scripts and styles.
 */
function aromatic_scripts() {
	
	// Styles	
	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('tiny-slider',get_template_directory_uri().'/assets/css/tiny-slider.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	
	wp_enqueue_style('owl-carousel-default',get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('aromatic-theme-fonts',get_template_directory_uri().'/assets/css/theme-fonts/fonts.css');
	
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/css/animate.min.css');
	
	wp_enqueue_style('aromatic-animation',get_template_directory_uri().'/assets/css/animation.css');
	
	wp_enqueue_style('aromatic-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('splitting', get_template_directory_uri() . '/assets/css/splitting.css');
	
	wp_enqueue_style('aromatic-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('aromatic-media-query', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style( 'aromatic-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/assets/js/tiny-slider.js', array('jquery'), true);
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);
	
	wp_enqueue_script('owlcarousel2-filter', get_template_directory_uri() . '/assets/js/owlcarousel2-filter.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('jquery-tilt', get_template_directory_uri() . '/assets/js/tilt.jquery.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('splitting', get_template_directory_uri() . '/assets/js/splitting.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);

	wp_enqueue_script('aromatic-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aromatic_scripts' );