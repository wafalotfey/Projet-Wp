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
<section class="blog-single-section pt-default" id="blog-single-section">
	<div class="container">
		<div class="row">
			<div id="st-primary-content" class="<?php esc_attr(aromatic_blog_column_layout()); ?> col-12">
				<article>
					<?php if( have_posts() ): ?>
							<?php while( have_posts() ): the_post(); ?>
								<div class="intro fadeInLeft wow slow">
									<figure class="intro-image-wrapper">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="intro-image">
												<a href="javascript:void(0);">
													<?php the_post_thumbnail(); ?>
												</a>
												<a href="javascript:void(0);" class="post-hover"><i class="fa fa-share"></i></a>
											</div>
										<?php } ?>	
										<div class="blog-post-content">
											<div class="blog-post-meta">
												<a href="#" class="blog-date">
													<div class="meta-blog-icon"><i class="fa fa-calendar-alt"></i></div>
													<time class="meta-info"><?php echo esc_html(get_the_date('j')); ?> <?php echo esc_html(get_the_date('M')); ?>, <?php echo esc_html(get_the_date('Y')); ?></time>
												</a>
												<a href="#" class="blog-comment">
													<div class="meta-blog-icon"><i class="fa fa-comment-alt"></i></div>
													<time class="meta-info"><?php aromatic_comment_count(); ?></time>
												</a>
											</div>
										</div>
									</figure>
								</div>
								<?php     
									if ( is_single() ) :
									
									the_title('<h4 class="title">', '</h4>' );
									
									else:
									
									the_title( sprintf( '<h4 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
									
									endif;

									the_content( 
										sprintf( 
											__( 'Read More', 'aromatic' ), 
											'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
										) 
									);									
								?> 
							<?php endwhile; ?>
					<?php endif; ?>
					<?php comments_template( '', true ); // show comments  ?>
				</article>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
