<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( "charset" ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>
<body <?php body_class('link-underline'); ?>  data-color="default" data-theme="<?php echo get_theme_mod('blonwe_skin_type','light'); ?>">
<?php wp_body_open(); ?>
	
	<?php get_template_part( 'includes/header/models/canvas-menu' ); ?>

	
	<?php if (get_theme_mod( 'blonwe_preloader' )) { ?>
	<div class="site-loading">
		<div class="preloading">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
			</svg>
		</div>
	</div>
	<?php } ?>
	
	<?php if (get_theme_mod( 'blonwe_top_notification_count_toggle' )) { ?>
		<?php get_template_part( 'includes/header/models/top-notification-count' ); ?>
	<?php } ?>
	
	<div id="page" class="page-content">
	
		<?php blonwe_do_action( 'blonwe_before_main_header'); ?>

		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
			<?php
			/**
			* Hook: blonwe_main_header
			*
			* @hooked blonwe_main_header_function - 10
			*/
			do_action( 'blonwe_main_header' );
		
			?>
		<?php } ?>
		
		<?php blonwe_do_action( 'blonwe_after_main_header'); ?>
		
		<div id="main" class="site-primary">
			<div id="content" class="site-content">