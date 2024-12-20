<?php
if ( ! function_exists( 'blonwe_cart_icon' ) ) {
	function blonwe_cart_icon(){
		$headercart = get_theme_mod('blonwe_header_cart','0');
		if($headercart == '1'){
			global $woocommerce;
			$carturl = wc_get_cart_url(); 
			?>
			
			<?php if( get_theme_mod( 'blonwe_header_cart_type' ) == 'type5') { ?>
				<div class="header-action cart-button custom-dropdown row-style default" data-placement="right">
					<a href="<?php echo esc_url($carturl); ?>" class="action-link custom-dropdown-link" tabindex="0" role="button" aria-expanded="false">
						<div class="action-icon">
							<i class="klb-icon-shopping-basket-cut"></i>
							<div class="action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>
						</div><!-- action-icon -->
					</a>
					<div class="dropdown-menu custom-dropdown-menu hide">
						<div class="custom-dropdown-body">
								<div class="cart-not-empty">
									<div class="fl-mini-cart-content">
										<?php woocommerce_mini_cart(); ?>
									</div>
								</div>
								
								<?php if(get_theme_mod('blonwe_header_mini_cart_notice')){ ?>
									<div class="cart-discount">
										<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_header_mini_cart_notice')); ?></p>
									</div><!-- cart-discount -->
								<?php } ?>	
						</div><!-- custom-dropdown-body -->
					</div><!-- custom-dropdown-menu -->
                </div><!-- header-action -->
				
			<?php } elseif( get_theme_mod( 'blonwe_header_cart_type' ) == 'type4') { ?>
				<div class="header-action cart-button custom-dropdown row-style default" data-placement="right">
						<a href="<?php echo esc_url($carturl); ?>" class="action-link custom-dropdown-link" tabindex="0" role="button" aria-expanded="false">
							<div class="action-icon">
								<i class="klb-icon-italic-shop"></i>
								<div class="action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>
							</div><!-- action-icon -->
						</a>
						<div class="dropdown-menu custom-dropdown-menu hide">
							<div class="custom-dropdown-body">
						
								<div class="cart-not-empty">
									<div class="fl-mini-cart-content">
										<?php woocommerce_mini_cart(); ?>
									</div>
								</div>
								
								<?php if(get_theme_mod('blonwe_header_mini_cart_notice')){ ?>
									<div class="cart-discount">
										<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_header_mini_cart_notice')); ?></p>
									</div><!-- cart-discount -->
								<?php } ?>	
									
							</div>
						</div><!-- custom-dropdown-menu -->
				</div><!-- header-action -->
			<?php } elseif( get_theme_mod( 'blonwe_header_cart_type' ) == 'type3') { ?>
				<div class="header-action cart-button custom-dropdown row-style default" data-placement="right">
					<a href="<?php echo esc_url($carturl); ?>" class="action-link custom-dropdown-link" tabindex="0" role="button" aria-expanded="false">
						<div class="action-icon">
							<i class="klb-icon-shopping-cart-extra"></i>
						  <div class="action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>
						</div><!-- action-icon -->
					</a>
					<div class="dropdown-menu custom-dropdown-menu hide">
						<div class="custom-dropdown-body">
							
							<div class="cart-not-empty">
								<div class="fl-mini-cart-content">
									<?php woocommerce_mini_cart(); ?>
								</div>
							</div>
							
							<?php if(get_theme_mod('blonwe_header_mini_cart_notice')){ ?>
								<div class="cart-discount">
									<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_header_mini_cart_notice')); ?></p>
								</div><!-- cart-discount -->
							<?php } ?>	
							
						</div><!-- custom-dropdown-body -->
					</div><!-- custom-dropdown-menu -->
                </div><!-- header-action -->
			<?php } elseif( get_theme_mod( 'blonwe_header_cart_type' ) == 'type2') { ?>
				<div class="header-action cart-button custom-dropdown column-style default" data-placement="right">
					<a href="<?php echo esc_url($carturl); ?>" class="action-link custom-dropdown-link" tabindex="0" role="button" aria-expanded="false">
						<div class="action-icon">
							<i class="klb-icon-shopping-basket-cut"></i>
						  <div class="action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>
						</div><!-- action-icon -->
						  <div class="action-text">
							<p><?php esc_html_e('My Cart','blonwe'); ?></p>
						  </div><!-- action-text -->
					</a>
					<div class="dropdown-menu custom-dropdown-menu hide">
						<div class="custom-dropdown-body">
						
							<div class="cart-not-empty">
								<div class="fl-mini-cart-content">
									<?php woocommerce_mini_cart(); ?>
								</div>
							</div>
							
							<?php if(get_theme_mod('blonwe_header_mini_cart_notice')){ ?>
								<div class="cart-discount">
									<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_header_mini_cart_notice')); ?></p>
								</div><!-- cart-discount -->
							<?php } ?>	
							
						</div><!-- custom-dropdown-body -->
					</div><!-- custom-dropdown-menu -->
                </div><!-- header-action -->
			<?php } else { ?>
				<div class="header-action cart-button custom-dropdown row-style default" data-placement="right">
					<a href="<?php echo esc_url($carturl); ?>" class="action-link custom-dropdown-link" tabindex="0" role="button" aria-expanded="false">
						<div class="action-icon">
							<i class="klb-icon-shopping-cart-extra"></i>
							<div class="action-count cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'blonwe'), $woocommerce->cart->cart_contents_count);?></div>
						</div><!-- action-icon -->
						<div class="action-text">
							<span><?php esc_html_e('Total','blonwe'); ?></span>
							<p class="cart-price price"><?php echo WC()->cart->get_cart_subtotal(); ?></p>
						</div><!-- action-text -->
					</a>
					<div class="dropdown-menu custom-dropdown-menu hide">
						<div class="custom-dropdown-body">
						
							<div class="cart-not-empty">
								<div class="fl-mini-cart-content">
									<?php woocommerce_mini_cart(); ?>
								</div>
							</div>
							
							<?php if(get_theme_mod('blonwe_header_mini_cart_notice')){ ?>
								<div class="cart-discount">
								  <p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_header_mini_cart_notice')); ?></p>
								</div><!-- cart-discount -->
							<?php } ?>	
							
						</div><!-- custom-dropdown-body -->
					</div><!-- custom-dropdown-menu -->
				</div><!-- header-action --> 
			<?php } ?>		
		<?php }
	}
}