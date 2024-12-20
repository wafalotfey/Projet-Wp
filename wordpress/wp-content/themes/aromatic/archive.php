<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aromatic
 */

get_header();
?>
<section class="blog-left-section pt-default" id="blog-left-section">
	<div class="container">
		<div class="row">
			<div id="st-primary-content" class="<?php esc_attr(aromatic_blog_column_layout()); ?> col-12">
				<div class="row">
					<?php if( have_posts() ): ?>
			
						<?php while( have_posts() ) : the_post(); ?>
						
						<div class="col-12 col-lg-12 wow fadeInRight slow">
							<?php get_template_part('template-parts/content/content','page'); ?>
						</div>
					<?php endwhile; ?>
							
					<?php else: ?>
						
						<div class="col-12 col-lg-12 wow fadeInRight slow">
							<?php get_template_part('template-parts/content/content','none'); ?>
						</div>
						
					<?php endif; ?>
				</div>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
