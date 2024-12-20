<?php
if ( ! function_exists( 'blonwe_wishlist_icon' ) ) {
	function blonwe_wishlist_icon(){
	?>

	<?php $wishlistheader = get_theme_mod('blonwe_header_wishlist',0); ?>
	<?php if($wishlistheader == 1){ ?>
	
		<?php if( get_theme_mod( 'blonwe_header_wishlist_type' ) == 'type2') { ?>
			<?php if ( class_exists( 'KlbWishlist' ) ) { ?>	
				<div class="header-action wishlist-button column-style">
					<a href="<?php echo KlbWishlist::get_url(); ?>" class="action-link">
						<div class="action-icon">
							<i class="klb-icon-hearth-soft"></i>
						  <div class="action-count count klbwl-wishlist-count"><?php echo KlbWishlist::get_count(); ?></div>
						</div><!-- action-icon -->
						<div class="action-text">
							<p><?php esc_html_e('Wishlist','blonwe'); ?></p>
						</div><!-- action-text -->
					</a>
                </div><!-- header-action --> 
			<?php } ?>
		<?php } else { ?>
			<?php if ( class_exists( 'KlbWishlist' ) ) { ?>	
				<div class="header-action wishlist-button row-style">
                  <a href="<?php echo KlbWishlist::get_url(); ?>" class="action-link">
                    <div class="action-icon">
                      <i class="klb-icon-heart-outline"></i>
                      <div class="action-count klbwl-wishlist-count"><?php echo KlbWishlist::get_count(); ?></div>
                    </div><!-- action-icon -->
                  </a>
                </div><!-- header-action -->
			<?php } ?>
		<?php } ?>
		
	<?php } ?>
	
	<?php 
	
	}
}