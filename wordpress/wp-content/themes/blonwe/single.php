<?php
/**
 * single.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.0
 * 
 */
 ?>

<?php get_header(); ?>

<?php 
wp_enqueue_script( 'theia-sticky-sidebar');
wp_enqueue_script( 'blonwe-stickysidebar');
?>

<div id="content" class="site-content">
    <div class="page-inner">
        <div class="container">
	
			<?php if( get_theme_mod( 'blonwe_blog_layout' ) == 'left-sidebar') { ?>
				<div class="row content-wrapper sidebar-left">
					<div id="sidebar" class="col col-12 col-lg-3 sidebar-column blog-sidebar sticky">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
					<div class="col col-12 col-lg-9 primary-column">
						<div class="blog-single-post">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/single', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php comments_template(); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'blonwe') ?></h2>

							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } elseif( get_theme_mod( 'blonwe_blog_layout' ) == 'full-width') { ?>
				<div class="row content-wrapper">
					<div class="col-12 col-lg-10 primary-column">
						<div class="blog-single-post">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/single', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php comments_template(); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'blonwe') ?></h2>

							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
					<div class="row content-wrapper sidebar-right">
						<div class="col col-12 col-lg-9 primary-column">
							<div class="blog-single-post">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<?php  get_template_part( 'post-format/single', get_post_format() ); ?>

								<?php endwhile; ?>
							
									<?php comments_template(); ?>
									
								<?php else : ?>

									<h2><?php esc_html_e('No Posts Found', 'blonwe') ?></h2>

								<?php endif; ?>
							</div>
						</div>
						<div id="sidebar" class="col col-12 col-lg-3 sidebar-column blog-sidebar sticky">
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				<?php } else { ?>
					<div class="row content-wrapper">
						<div class="col col-12 col-lg-10 offset-lg-1 primary-column">
							<div class="blog-single-post">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<?php  get_template_part( 'post-format/single', get_post_format() ); ?>

								<?php endwhile; ?>
							
									<?php comments_template(); ?>
									
								<?php else : ?>

									<h2><?php esc_html_e('No Posts Found', 'blonwe') ?></h2>

								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php } ?>
				
			<?php } ?>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>