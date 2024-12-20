<?php $categorybanner = get_theme_mod('blonwe_shop_banner_each_category'); ?>
<?php if($categorybanner && is_product_category() && array_search(get_queried_object()->term_id, array_column($categorybanner, 'category_id')) !== false){ ?>
	<?php foreach($categorybanner as $c){ ?>
		<?php if($c['category_id'] == get_queried_object()->term_id){ ?>
			
			<?php if(get_theme_mod('blonwe_shop_banner_text_color') == 'light') { ?>
				<?php $bannercolor = 'light'; ?>
			<?php } else { ?>
				<?php $bannercolor = 'dark'; ?>
			<?php } ?>
			
			<div class="page-header centered large <?php echo esc_attr($bannercolor); ?>">
				<div class="container">
					<div class="page-header-inner">
						<?php if($c['category_subtitle']){ ?>
						<h5 class="entry-subtitle"><?php echo esc_html($c['category_subtitle']); ?></h5>
						<?php } ?>
						<h1 class="entry-title large"><?php echo esc_html($c['category_title']); ?></h1>
						<div class="entry-description">
							<p><?php echo blonwe_sanitize_data($c['category_desc']); ?></p>
						</div><!-- entry-description -->
					</div><!-- page-header-inner -->
				</div><!-- container -->
				<div class="page-header-image overlay-25">
					<img src="<?php echo esc_url(blonwe_get_image($c['category_image'])); ?>" alt="<?php echo esc_attr($c['category_title']); ?>"/>
				</div><!-- page-header-image -->
			</div>
			
		<?php } ?>
	<?php } ?>
<?php } else { ?>
	<?php $banner = get_theme_mod('blonwe_shop_banner_image'); ?>
	<?php $bannertitle = get_theme_mod('blonwe_shop_banner_title'); ?>
	<?php $bannersubtitle = get_theme_mod('blonwe_shop_banner_subtitle'); ?>
	<?php $bannerdesc = get_theme_mod('blonwe_shop_banner_desc'); ?>
	<?php if($banner){ ?>
	
		<?php if(get_theme_mod('blonwe_shop_banner_text_color') == 'light') { ?>
			<?php $bannercolor = 'light'; ?>
		<?php } else { ?>
			<?php $bannercolor = 'dark'; ?>
		<?php } ?>
	
		<div class="page-header centered large <?php echo esc_attr($bannercolor); ?>">
			<div class="container">
				<div class="page-header-inner">
					<?php if($bannersubtitle){ ?>
					<h5 class="entry-subtitle"><?php echo esc_html($bannersubtitle); ?></h5>
					<?php } ?>
					<h1 class="entry-title large"><?php echo esc_html($bannertitle); ?></h1>
					<div class="entry-description">
						<p><?php echo esc_html($bannerdesc); ?></p>
					</div><!-- entry-description -->
				</div><!-- page-header-inner -->
			</div><!-- container -->
			<div class="page-header-image overlay-25">
				<img src="<?php echo esc_url(wp_get_attachment_url($banner)); ?>" alt="<?php echo esc_attr($bannertitle); ?>"/>
			</div><!-- page-header-image -->
        </div>
		
	<?php } ?>
<?php } ?>