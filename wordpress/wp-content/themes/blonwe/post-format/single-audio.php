<article id="post-<?php the_ID(); ?>" <?php post_class('klb-article post'); ?>>
	<div class="entry-header">
		<?php if(has_category()){ ?>
			<div class="entry-category">
				<?php the_category(', '); ?>
			</div><!-- entry-category -->
		<?php } ?>
		<h3 class="entry-title"><?php the_title(); ?></h3>
		<div class="entry-meta">
			
			<div class="entry-published">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
			</div><!-- entry-published -->
			
			<?php the_tags( '<div class="meta-item">', ', ', ' </div>'); ?>
		
			<?php if ( is_sticky()) {
				printf( '<span class="meta-item sticky-post"><i class="klb-icon-star-empty"></i> %s</span>', esc_html__('Featured', 'blonwe' ) );
			} ?>
			
		</div><!-- entry-meta -->
	</div>
	
	<figure class="entry-media embed-responsive embed-responsive-16by9">
	   <?php echo get_post_meta($post->ID, 'klb_blogaudiourl', true); ?>
	</figure>
	
	<div class="entry-wrapper">
		<div class="entry-content">
			<div class="klb-post">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			</div>
		</div><!-- entry-content -->
	</div><!-- entry-wrapper -->
	
</article><!-- post -->