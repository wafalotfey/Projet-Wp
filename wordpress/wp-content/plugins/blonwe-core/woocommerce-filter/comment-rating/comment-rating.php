<?php
/*************************************************
## Comment Rating Scripts
*************************************************/ 
function blonwe_comment_rating_scripts() {
	wp_register_style( 'blonwe-comment-rating',    plugins_url( 'css/comment-rating.css', __FILE__ ), false, '1.0');
	wp_register_script( 'blonwe-comment-rating',    plugins_url( 'js/comment-rating.js', __FILE__ ), false, '1.0');
	wp_localize_script( 'blonwe-comment-rating', 'blonwecomment', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
	));
}
add_action( 'wp_enqueue_scripts', 'blonwe_comment_rating_scripts' );

/*************************************************
## Comment Rating CallBack
*************************************************/
add_action( 'wp_ajax_nopriv_comment_rating', 'blonwe_comment_rating_callback' );
add_action( 'wp_ajax_comment_rating', 'blonwe_comment_rating_callback' );
function blonwe_comment_rating_callback() {
	
	$rating = $_POST['rating'];
	$product_id = $_POST['product_id'];
	
	$args = array (
	'post_type' => 'product',
	'post_id' => $product_id,
	'meta_query'  => array( array(
		'key'     => 'rating',
		'value'   => $rating,
	) ),
	);
	$comments = get_comments( $args );

	wp_list_comments( array( 'callback' => 'woocommerce_comments' ), $comments);
	
	wp_die();
}
/*************************************************
## Comment Rating
*************************************************/
add_action('blonwe_before_comment','blonwe_comment_rating');
function blonwe_comment_rating(){
	global $product;
	
	$rating_count = $product->get_rating_count();
	$average      = $product->get_average_rating();
	$klbrating = $product->get_rating_counts();

	if($rating_count < 1){
		return;
	}

	if(!array_key_exists(1, $klbrating)){
		$klbrating[1] = 0;
	}
	if(!array_key_exists(2, $klbrating)){
		$klbrating[2] = 0;
	}
	if(!array_key_exists(3, $klbrating)){
		$klbrating[3] = 0;
	}
	if(!array_key_exists(4, $klbrating)){
		$klbrating[4] = 0;
	}
	if(!array_key_exists(5, $klbrating)){
		$klbrating[5] = 0;
	}
	krsort($klbrating);
	
	wp_enqueue_style('blonwe-comment-rating');
	wp_enqueue_script('blonwe-comment-rating');
	
?>
	<div class="reviews-slot">
		<div class="reviews-rating">
			<div class="review-count"><?php echo esc_html($average); ?></div>
			<div class="review-stars">
				<div class="product-rating">
					<?php echo wc_get_rating_html( $average, $rating_count ); ?>
				</div><!-- product-rating -->
				<div class="review-stars-description">
					<p><?php esc_html_e('Average of', 'blonwe-core') ?> <strong><?php echo sprintf(_n('%d review', '%d reviews', $rating_count, 'blonwe-core'), $rating_count); ?></strong></p>
				</div><!-- review-stars-description -->
			</div><!-- review-stars -->
		</div><!-- reviews-rating -->
		<div class="ratings-summary">
			<?php foreach($klbrating as $key => $value){ 
				$own_percent = floor( $value / $rating_count * 100 );
			?>
				<div class="rating-item">
					<a href="<?php echo esc_url( add_query_arg( 'klbrating', $key, get_permalink( $product->get_id() ) ) ); ?>#tab-reviews" data-rating="<?php echo esc_attr($key); ?>" data-rating_count="<?php echo esc_attr($value); ?>" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
						<span class="rating"><i class="klb-icon-star"></i><?php echo esc_html($key); ?></span>
						<span class="rating-progress"><span class="progress-bar" style="width: <?php echo esc_attr($own_percent); ?>%;"></span></span>
						<span class="rating-count"><?php echo esc_html($value); ?></span>
					</a>
				</div><!-- rating-item -->
			<?php } ?>
		</div><!-- ratings-summary -->
	</div><!-- reviews-slot -->
<?php
}

