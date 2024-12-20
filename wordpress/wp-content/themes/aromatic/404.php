<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aromatic
 */

get_header();
?>
<section class="error-section pt-default" id="error-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="text-side text-center">
					<h1><?php esc_html_e('404','aromatic'); ?><span><?php esc_html_e('oops!','aromatic'); ?></span></h1>
					<p class="error-message"><?php esc_html_e('Page Not Found','aromatic'); ?></p>
					<p><?php esc_html_e('Something went wrong, Looks like this page are not available any more.','aromatic'); ?></p>
					<div class="bt" style="display: inline-block"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="cta-01"><span><?php esc_html_e('Go To Home','aromatic'); ?></span></a></div>
				</div>

			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
