<?php
/**
 * Side Bar Template
 */
?>
<?php if ( ! is_active_sidebar( 'aromatic-woocommerce-sidebar' ) ) {	return; } ?>
<div id="st-secondary-content" class="col-12 col-xl-3 product-sidebar-column">
	<section class="sidebar">
		<?php dynamic_sidebar('aromatic-woocommerce-sidebar'); ?>
	</section>
</div>