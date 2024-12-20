<?php
/**
 * page.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.0
 */
?>

<?php get_header(); ?>

	<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 

	<?php if ( class_exists( 'woocommerce' ) ) { ?>

		<?php if (is_cart()) { ?>
			<div id="content" class="site-content">
				<div class="container">		
					<?php woocommerce_breadcrumb(); ?>
					
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</div>
		<?php } elseif (is_checkout()) { ?>
			<div id="content" class="site-content">
				<div class="container">		
					<?php woocommerce_breadcrumb(); ?>
					
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</div>
	   <?php } elseif (is_account_page()) { ?>
			<div id="content" class="my-account-page site-content">
				<div class="container">	
					<?php woocommerce_breadcrumb(); ?>
					
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</div>
	   <?php } elseif ($elementor_page ) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="empty-klb"></div>
			<div class="klb-page page-content section">
				<div class="container">
					<div class="row ">
						<div class="col-12 col-lg-10 offset-lg-1">
							<?php while(have_posts()) : the_post(); ?>
								<h1 class="klb-page-title"><?php the_title(); ?></h1>
								<div class="klb-post">
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								</div>
							<?php endwhile; ?>
							<div class="single-post">
								<?php comments_template(); ?>
							</div>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>

	   <?php if ($elementor_page ) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="empty-klb"></div>
			<div class="klb-page page-content section">
				<div class="container">
					<div class="row ">
						<div class="col-12 col-lg-10 offset-lg-1">
							<?php while(have_posts()) : the_post(); ?>
								<h1 class="klb-page-title"><?php the_title(); ?></h1>
								<div class="klb-post">
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'blonwe' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								</div>
							<?php endwhile; ?>
							<div class="single-post">
								<?php comments_template(); ?>
							</div>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php get_footer(); ?>