<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aromatic 
 */

get_header();
?>
<section class="shop pt-default" id="shop">
	<div class="container">
		<div class="row">
			<?php if(!is_active_sidebar('aromatic-woocommerce-sidebar')): ?>
			<div id="st-primary-content" class="col-xl-12">
			<?php else: ?>
			<div id="st-primary-content" class="col-xl-9">
			<?php endif; ?>
				<div class="product-collection-area">
					<?php woocommerce_content(); ?>
				</div>
			</div>
			<?php get_sidebar('woocommerce'); ?>

</section>
<?php get_footer(); ?>

