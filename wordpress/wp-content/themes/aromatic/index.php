<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
					<?php 
						$aromatic_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$aromatic_paged );	
					?>
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
					<!--  Pagination Start  -->
						<?php								
							// Previous/next page navigation.
							the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
							'next_text'          => '<i class="fa fa-angle-double-right"></i>',
							) ); ?>
					<!--  Pagination End  -->
				</div>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
