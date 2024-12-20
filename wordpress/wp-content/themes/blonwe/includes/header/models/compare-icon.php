<?php
if ( ! function_exists( 'blonwe_compare_icon' ) ) {
	function blonwe_compare_icon(){
	?>

	<?php $compareheader = get_theme_mod('blonwe_header_compare',0); ?>
	<?php if($compareheader == 1){ ?>

		<?php if ( class_exists( 'KlbCompare' ) ) { ?>	
			<div class="header-action compare-button row-style">
			  <a href="<?php echo KlbCompare::get_page_url(); ?>" class="action-link">
				<div class="action-icon">
				  <i class="klb-icon-compare-product"></i>
				  <div class="action-count klbcp-count"><?php echo KlbCompare::get_count(); ?></div>
				</div><!-- action-icon -->
			  </a>
			</div><!-- header-action -->
		<?php } ?>
		
	<?php } ?>
	
	<?php 
	
	}
}