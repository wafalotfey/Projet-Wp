<?php  
if ( ! function_exists( 'aromatic_front_blog' ) ) :
	function aromatic_front_blog() {
    $aromatic_blog2_setting_hs 		= get_theme_mod('blog2_setting_hs','1');
	$aromatic_blog2_ttl 			= get_theme_mod('blog2_ttl');
	$aromatic_blog2_num				= get_theme_mod('blog2_num','3');
	if($aromatic_blog2_setting_hs=='1'):
?>
<section class="latest-blog1 pt-default post-home2" id="latest-blog1">
	<div class="container">
		<div class="row">
			<?php if(!empty($aromatic_blog2_ttl)): ?>
				<div class="col-12 text-center wow fadeInRight">
					<div class="section-title"><?php echo wp_kses_post($aromatic_blog2_ttl); ?></div>
				</div>
			<?php endif; ?>
			<?php 
				$aromatic_blog2_args = array( 'post_type' => 'post', 'posts_per_page' => $aromatic_blog2_num,'post__not_in'=>get_option("sticky_posts")) ; 	
			
				$aromatic_wp_query = new WP_Query($aromatic_blog2_args);
				if($aromatic_wp_query)
				{	
				while($aromatic_wp_query->have_posts()):$aromatic_wp_query->the_post();
			
			?>
				<div class="col-12 col-md-4 col-xl-4 wow fadeInUp">
					<?php get_template_part('template-parts/content/content','page'); ?>
				</div>
			<?php endwhile; } wp_reset_postdata(); ?>
		</div>
	</div>
</section>	
<?php
endif; }
endif;
if ( function_exists( 'aromatic_front_blog' ) ) {
$section_priority = apply_filters( 'aromatic_section_priority', 14, 'aromatic_front_blog' );
add_action( 'aromatic_sections', 'aromatic_front_blog', absint( $section_priority ) );
}