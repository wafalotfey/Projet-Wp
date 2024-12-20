<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aromatic
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('home-blog p-4'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="blog-img tilt1">
			<?php the_post_thumbnail(); ?>
			<a href="#" class="blog-img-calendar">
				<div class="calendar-date"><?php echo esc_html(get_the_date('j')); ?></div>
				<div class="calendar-month"><?php echo esc_html(get_the_date('M')); ?></div>
			</a>
		</div>
	<?php } ?>	
	<?php     
		if ( is_single() ) :
		
		the_title('<h5 class="post-title">', '</h5>' );
		
		else:
		
		the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
		
		endif; 
	?> 
	<?php 
		the_content( 
				sprintf( 
					__( 'Read More', 'aromatic' ), 
					'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
				) 
			);
	  ?>
	<div class="blog-footer">
		<a href="" class="admin-area">
		<?php  $user = wp_get_current_user(); ?>
			<div class="admin-img"><img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"></div>
			<div class="admin-detail">
				<h6><?php esc_html(the_author()); ?></h6>
			</div>
		</a>
	</div>
</div>