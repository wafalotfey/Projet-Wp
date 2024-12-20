<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.0
 * 
 */
 ?>
 
			</div><!-- site-content -->
		</div><!-- site-primary -->
		
		<?php blonwe_do_action( 'blonwe_before_main_footer'); ?>

		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
		
			<?php
			/**
			* Hook: blonwe_main_footer
			*
			* @hooked blonwe_main_footer_function - 10
			*/
			do_action( 'blonwe_main_footer' );
		
			?>
			
		<?php } ?>
		
		<?php blonwe_do_action( 'blonwe_after_main_footer'); ?>
		
		<div class="site-overlay"></div>
		
	</div><!-- page-content -->
	
	<?php wp_footer(); ?>
	</body>
</html>