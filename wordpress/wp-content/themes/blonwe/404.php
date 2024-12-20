<?php
/**
 * 404.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.0
 */
?>

<?php get_header(); ?>

<div id="content" class="site-content page-error">
    <div class="page-inner">
        <div class="container">
			<div class="page-not-found">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.png" alt="<?php bloginfo("name"); ?>">
				<h1 class="entry-title"><?php esc_html_e('That Page Cant Be Found','blonwe'); ?></h1>
				<div class="entry-description">
					<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try to search for what you are looking for?','blonwe'); ?></p>
				</div><!-- entry-description -->
				<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn primary"><?php esc_html_e('Go To Homepage','blonwe'); ?></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>