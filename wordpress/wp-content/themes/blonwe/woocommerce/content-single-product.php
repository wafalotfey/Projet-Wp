<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$thumb_type = get_theme_mod( 'blonwe_single_gallery_type' ) == 'vertical' || blonwe_ft() == 'vertical' ? 'vertical vertical-thumbnails' : '';

?>

<?php if( get_theme_mod( 'blonwe_single_type' ) == 'type5') { ?>	
	<?php $single_type = 'style-5'; ?>
	<?php $sticky_type = 'sticky-gallery'; ?>
	<?php $detail_type = ''; ?>
	<?php $sidebar_type = ''; ?>
<?php } elseif( get_theme_mod( 'blonwe_single_type' ) == 'type4') { ?>
	<?php $single_type = 'style-4'; ?>
	<?php $sticky_type = ''; ?>
	<?php $detail_type = 'with-side'; ?>
	<?php $sidebar_type = 'for-sidebar'; ?>
<?php } elseif( get_theme_mod( 'blonwe_single_type' ) == 'type3') { ?>	
	<?php $single_type = 'style-3'; ?>
	<?php $sticky_type = ''; ?>
	<?php $detail_type = 'with-side'; ?>
	<?php $sidebar_type = ''; ?>
<?php } else { ?>
	<?php $single_type = 'style-1'; ?>
	<?php $sticky_type = ''; ?>
	<?php $detail_type = ''; ?>
	<?php $sidebar_type = ''; ?>
<?php } ?>


<div class="row content-wrapper">
	<div class="col col-12 primary-column">
		<article id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product ', $product ); ?>>
		
			<div class="single-product-wrapper <?php echo esc_attr($single_type); ?>">
			
				<?php do_action('blonwe_single_header_top'); ?>
				
				<div class="column product-gallery <?php echo esc_attr($thumb_type); ?> <?php echo esc_attr($sticky_type); ?>">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
				
				<div class="column product-detail <?php echo esc_attr($detail_type); ?> <?php echo esc_attr($sidebar_type); ?>">
				
					<?php do_action('blonwe_single_side_inner'); ?>
					
					<div class="product-detail-inner">
						
						
						
						<?php do_action('blonwe_single_header_side'); ?>
						
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>
					</div>
				</div>
					
					
				<div class="column product-content">	
					<?php
					/**
					 * Hook: woocommerce_after_single_product_summary.
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>
				
			</div>
		</article>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>