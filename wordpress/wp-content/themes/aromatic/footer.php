</div>
</div>  
<footer class="footer pt-default" id="footer">
	<?php 
		if ( is_active_sidebar( 'aromatic-footer-widget' ) ) {
	?>
		<div class="container">
			<div class="footer-middle-wrapper pb-default">
				<div class="row">
					<?php  dynamic_sidebar( 'aromatic-footer-widget' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- <hr> -->
	<?php
		$footer_copyright 	= get_theme_mod('footer_copyright','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');			
		if(!empty($footer_copyright)) {
	?>
		<div class="footer-bottom-wrapper text-center">
			<?php 	
				$aromatic_copyright_allowed_tags = array(
					'[current_year]' => date_i18n('Y'),
					'[site_title]'   => get_bloginfo('name'),
					'[theme_author]' => sprintf(__('<a href="#">Aromatic</a>', 'aromatic')),
				);
				
				echo apply_filters('aromatic_footer_copyright', wp_kses_post(aromatic_str_replace_assoc($aromatic_copyright_allowed_tags, $footer_copyright)));
			?>
		</div>
	<?php }
	$footer_bg_img	= get_theme_mod('footer_bg_img',esc_url(get_template_directory_uri() .'/assets/images/green-standing-leaf.png'));
	$footer_bg_img2	= get_theme_mod('footer_bg_img2',esc_url(get_template_directory_uri() .'/assets/images/pinkshape.png'));
	$footer_bg_img3	= get_theme_mod('footer_bg_img3',esc_url(get_template_directory_uri() .'/assets/images/silverleaf.png'));
	?>
	<?php if(!empty($footer_bg_img)): ?>
		<img src="<?php echo esc_url($footer_bg_img); ?>">  
	<?php endif; ?>
	<?php if(!empty($footer_bg_img2)): ?>	
		<img src="<?php echo esc_url($footer_bg_img2); ?>"> 
	<?php endif; ?>
	
	<?php if(!empty($footer_bg_img3)): ?>	
		<img src="<?php echo esc_url($footer_bg_img3); ?>">
	<?php endif; ?>
</footer>
<!-- ScrollUp -->
<?php 
	$hs_scroller 	= get_theme_mod('hs_scroller','1');	
	if($hs_scroller == '1') :
?>
	<section class="scrollup" id="scrollup">
		<button class="mouse"></button>
	</section>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
