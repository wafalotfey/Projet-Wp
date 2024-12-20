<article id="post-<?php the_ID(); ?>" <?php post_class('klb-article post'); ?>>
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
		<?php  
		$att=get_post_thumbnail_id();
		$image_src = wp_get_attachment_image_src( $att, 'full' );
		$image_src = $image_src[0]; 
		?>
		
		<div class="entry-media"> 
		  <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"/></a>
		</div>
	
	<?php } ?>
	
	<div class="entry-wrapper">
		<?php if(has_category()){ ?>
			<div class="entry-category">
				<?php the_category(', '); ?>
			</div><!-- entry-category -->
		<?php } ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="entry-meta">
			<div class="entry-published">
			  <a href="<?php the_permalink(); ?>"> <?php echo get_the_date(); ?></a>
			</div><!-- entry-published -->
			
			<?php the_tags( '<span class="meta-item entry-tags">', ', ', ' </span>'); ?>
			
			<?php if ( is_sticky()) {
				printf( '<span class="meta-item sticky-post"><i class="klb-icon-star-empty"></i> %s</span>', esc_html__('Featured', 'blonwe' ) );
			} ?>
		</div><!-- entry-meta -->
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
			<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
		</div>
	</div>
</article><!-- post -->

