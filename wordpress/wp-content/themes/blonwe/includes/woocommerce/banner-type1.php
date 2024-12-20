<?php $categorybanner = get_theme_mod('blonwe_shop_banner_each_category'); ?>
<?php if($categorybanner && is_product_category() && array_search(get_queried_object()->term_id, array_column($categorybanner, 'category_id')) !== false){ ?>
	<?php foreach($categorybanner as $c){ ?>
		<?php if($c['category_id'] == get_queried_object()->term_id){ ?>
		
			<?php if(get_theme_mod('blonwe_shop_banner_text_color') == 'light') { ?>
				<?php $bannercolor = 'light'; ?>
			<?php } else { ?>
				<?php $bannercolor = 'dark'; ?>
			<?php } ?>
			
			<div class="klb-banner inner-style small-size <?php echo esc_attr($bannercolor); ?> align-center justify-start space-50 w-50">
				<div class="entry-wrapper">
					<div class="entry-inner">
						<div class="entry-heading">
							<h4 class="entry-subtitle color-green"><?php echo esc_html($c['category_subtitle']); ?></h4>
						</div><!-- entry-heading -->
						<div class="entry-body">
							<h2 class="entry-title font-sm-28 font-md-34 weight-700 lh-1-1"><?php echo esc_html($c['category_title']); ?></h2>
							<div class="entry-excerpt font-md-16 weight-400">
								<p><?php echo blonwe_sanitize_data($c['category_desc']); ?></p>
							</div><!-- entry-excerpt -->
						</div><!-- entry-body -->
						<div class="entry-footer">
							<div class="banner-price">
								<div class="price-label"><?php echo blonwe_sanitize_data($c['category_price_text']); ?></div>
								<span class="price">
									<span class="woocommerce-Price-amount amount">
										<bdi><?php echo blonwe_sanitize_data($c['category_price']); ?></bdi>
									</span>
								</span><!-- price -->
							</div><!-- banner-price -->
						</div><!-- entry-footer -->
					</div><!-- entry-inner -->
				</div><!-- entry-wrapper -->
				<div class="entry-media">
					<img src="<?php echo esc_url(blonwe_get_image($c['category_image'])); ?>" alt="<?php echo esc_attr($c['category_title']); ?>"/>
				</div><!-- entry-media -->
				<a href="<?php echo esc_url($c['category_button_url']); ?>" class="overlay-link"></a>
			</div>
			
		<?php } ?>
	<?php } ?>
<?php } else { ?>
	<?php $banner = get_theme_mod('blonwe_shop_banner_image'); ?>
	<?php $bannertitle = get_theme_mod('blonwe_shop_banner_title'); ?>
	<?php $bannersubtitle = get_theme_mod('blonwe_shop_banner_subtitle'); ?>
	<?php $bannerdesc = get_theme_mod('blonwe_shop_banner_desc'); ?>
	<?php $bannerpricetext = get_theme_mod('blonwe_shop_banner_price_text'); ?>
	<?php $bannerprice = get_theme_mod('blonwe_shop_banner_price'); ?>
	<?php $bannerurl = get_theme_mod('blonwe_shop_banner_url'); ?>
	<?php if($banner){ ?>
	
		<?php if(get_theme_mod('blonwe_shop_banner_text_color') == 'light') { ?>
			<?php $bannercolor = 'light'; ?>
		<?php } else { ?>
			<?php $bannercolor = 'dark'; ?>
		<?php } ?>
	
		<div class="klb-banner inner-style small-size <?php echo esc_attr($bannercolor); ?> align-center justify-start space-50 w-50">
			<div class="entry-wrapper">
				<div class="entry-inner">
					<div class="entry-heading">
						<h4 class="entry-subtitle color-green"><?php echo esc_html($bannersubtitle); ?></h4>
					</div><!-- entry-heading -->
					<div class="entry-body">
						<h2 class="entry-title font-sm-28 font-md-34 weight-700 lh-1-1"><?php echo esc_html($bannertitle); ?></h2>
						<div class="entry-excerpt font-md-16 weight-400">
							<p><?php echo blonwe_sanitize_data($bannerdesc); ?></p>
						</div><!-- entry-excerpt -->
					</div><!-- entry-body -->
					<div class="entry-footer">
						<div class="banner-price">
							<div class="price-label"><?php echo esc_html($bannerpricetext); ?></div>
							<span class="price">
								<span class="woocommerce-Price-amount amount">
									<bdi><?php echo esc_html($bannerprice); ?></bdi>
								</span>
							</span><!-- price -->
						</div><!-- banner-price -->
					</div><!-- entry-footer -->
				</div><!-- entry-inner -->
			</div><!-- entry-wrapper -->
			<div class="entry-media">
				<img src="<?php echo esc_url(wp_get_attachment_url($banner)); ?>" alt="<?php echo esc_attr($bannertitle); ?>"/>
			</div><!-- entry-media -->
			<a href="<?php echo esc_url($bannerurl); ?>" class="overlay-link"></a>
		</div>
	

	<?php } ?>
<?php } ?>