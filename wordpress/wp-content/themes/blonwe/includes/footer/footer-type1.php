<footer class="site-footer footer-type1">

	<?php $subscribe = get_theme_mod('blonwe_footer_subscribe_area',0); ?>
	<?php if($subscribe == 1){ ?>
		<div class="footer-row color-layout-white color-scheme-dark footer-newsletter bordered-top border-theme-10 style-1">
			<div class="container">
				<div class="footer-inner">
					<div class="column text-column">
						<div class="newsletter-text">
							<h2 class="entry-title"><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_footer_subscribe_title')); ?></h2>
							<div class="entry-caption">
								<p><?php echo blonwe_sanitize_data(get_theme_mod('blonwe_footer_subscribe_subtitle')); ?></p>
							</div><!-- entry-caption -->
						</div><!-- newsletter-text -->
					</div><!-- column -->
					<div class="column form-column">
						<div class="newsletter-form">
							<?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('blonwe_footer_subscribe_formid').'"]'); ?>
						</div><!-- newsletter-form -->
					</div><!-- column -->
				</div><!-- footer-inner -->
			</div><!-- container -->
		</div><!-- footer-row -->
	<?php } ?>
		
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'footer-4' )) { ?>
		<div class="footer-row color-layout-light-gray color-scheme-dark footer-widgets">
			<div class="container">
				<div class="footer-inner">
					<?php if(get_theme_mod('blonwe_footer_column') == '3columns'){ ?>
						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div><!-- col -->
					<?php } elseif(get_theme_mod('blonwe_footer_column') == '4columns'){ ?>
						<div class="column primary column-brand">
							<?php dynamic_sidebar( 'footer-1' ); ?>	
						</div><!-- column -->
						<div class="column secondary column-widgets">
							<div class="widget-column">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div><!-- widget-column -->
							<div class="widget-column">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div><!-- widget-column -->
							<div class="widget-column">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div><!-- widget-column -->
						</div><!-- column -->
					<?php } else { ?>
						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div><!-- col -->
						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-5' ); ?>
						</div><!-- col -->
					<?php } ?>
				</div><!-- footer-inner -->
			</div><!-- container -->
		</div><!-- footer-row -->
	<?php } ?>
	
	<?php $footersocial = get_theme_mod('blonwe_footer_social_list'); ?>
	<?php $appimage = get_theme_mod('blonwe_footer_app_image'); ?>
	<?php if($footersocial || $appimage){ ?>
		<div class="footer-row color-layout-light-gray color-scheme-dark footer-social bordered-top-inner border-theme-15">
			<div class="container">
				<div class="footer-inner">
					
					<?php if(!empty($footersocial)){ ?>
						<div class="site-social">
							<div class="social-label"><?php echo esc_html(get_theme_mod( 'blonwe_footer_social_list_title' )); ?></div>
							<ul class="color-theme rounded-style">
								<?php foreach($footersocial as $f){ ?>
									<li><a class="<?php echo esc_attr($f['social_icon']); ?>" href="<?php echo esc_url($f['social_url']); ?>" target="_blank"><i class="klb-social-icon-<?php echo esc_attr($f['social_icon']); ?>"></i></a></li>
								<?php } ?>
							</ul>
						</div><!-- site-social -->
					<?php } ?>
					
					
					<?php if($appimage){ ?>
						<div class="site-application">
							<div class="app-label"><?php echo esc_html(get_theme_mod('blonwe_footer_app_title')); ?></div>
							<ul>
								<?php foreach($appimage as $app){ ?>
									<li>
										<a href="<?php echo esc_url($app['app_url']); ?>">
											<img src="<?php echo esc_url( blonwe_get_image($app['app_image'])); ?>" alt="<?php esc_attr_e('app','blonwe'); ?>"/>
										</a>
									</li>
								<?php } ?>	
							</ul>
						</div><!-- site-application -->
					<?php } ?>
				</div><!-- footer-inner -->
			</div><!-- container -->
		</div><!-- footer-row -->
	<?php } ?>
	
	<div class="footer-row color-scheme-dark footer-copyright">
		<div class="container">
			<div class="footer-inner">
				<div class="site-copyright">
				  <?php if(get_theme_mod( 'blonwe_copyright' )){ ?>
						<p><?php echo blonwe_sanitize_data(get_theme_mod( 'blonwe_copyright' )); ?></p>
					<?php } else { ?>
						<p><?php esc_html_e('Copyright 2022.KlbTheme . All rights reserved','blonwe'); ?></p>
					<?php } ?>
				</div><!-- site-copyright -->        
				
				<?php $footerpayment = get_theme_mod('blonwe_footer_payment_repeater',0); ?>
				<?php if($footerpayment){ ?>
					<div class="site-payment-cards">
						<div class="payment-cards-label"><?php echo esc_html(get_theme_mod( 'blonwe_footer_payment_text' )); ?></div>
						<div class="payment-cards">
						<?php foreach($footerpayment as $f){ ?>
							<div class="card-item">
								<img src="<?php echo esc_url( blonwe_get_image($f['payment_image'])); ?>" alt="<?php esc_attr_e('payment','blonwe'); ?>"/>
							</div>
						<?php } ?>
						</div><!-- payment-cards -->
					</div><!-- site-payment-cards -->
				<?php } ?>
				
			</div><!-- footer-inner -->
		</div><!-- container -->
	</div><!-- footer-row -->
	
</footer><!-- site-footer -->