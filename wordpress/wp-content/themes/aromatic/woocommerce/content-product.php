<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>
	<div class="product">
	<?php if ( is_shop() || is_single()) { ?>
		<div class="product-single">
			<div class="product-img" aria-hidden="true">
				<?php
					/**
					 * Hook: woocommerce_before_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_open - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item' );
					
				?>	
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<?php 
							if ( $product->is_on_sale() ) : 
								 echo apply_filters( 'woocommerce_sale_flash', '<div class="sale-ribbon"><span class="tag-line">' . esc_html__( 'Sale', 'aromatic' ) . '</span></div>', $post, $product ); 
							 endif; 
						?> 
						<?php the_post_thumbnail(); ?>
					</a>
			</div>
			<div class="product-content-outer">
				<div class="product-content">
					<h5>
						<a href="<?php esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
					</h5>
				</div>
			</div>
			<div class="product-action">
				<?php echo $product->get_price_html(); ?>
				<?php
					/**
					 * Hook: woocommerce_after_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					 do_action( 'woocommerce_after_shop_loop_item' ); 
				?>
			</div>
		</div>
	<?php }else{ ?>
		<div class="product-single">
			<div class="product-img" aria-hidden="true">
				<?php
					/**
					 * Hook: woocommerce_before_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_open - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item' );
					
				?>	
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<?php 
							if ( $product->is_on_sale() ) : 
								 echo apply_filters( 'woocommerce_sale_flash', '<div class="sale-ribbon"><span class="tag-line">' . esc_html__( 'Sale', 'aromatic' ) . '</span></div>', $post, $product ); 
							 endif; 
						?> 
						<?php the_post_thumbnail(); ?>
					</a>
			</div>
			<div class="product-content-outer">
				<div class="product-content">
					<h5>
						<a href="<?php esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
					</h5>
				</div>
			</div>
			<div class="product-action">
				<div class="price">
					<?php echo $product->get_price_html(); ?>
				</div>
				<?php
					/**
					 * Hook: woocommerce_after_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					 do_action( 'woocommerce_after_shop_loop_item' ); 
				?>
			</div>
		</div>	
	<?php }?>
	</div>
</li>
