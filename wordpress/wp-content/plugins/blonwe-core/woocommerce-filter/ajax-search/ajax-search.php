<?php
/*************************************************
## Ajax Search Scripts
*************************************************/ 
function blonwe_ajax_search_scripts() {
	wp_enqueue_style( 'blonwe-ajax-search',    plugins_url( 'css/ajax-search.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'blonwe-ajax-search',    plugins_url( 'js/ajax-search.js', __FILE__ ), false, '1.0');
	wp_localize_script( 'blonwe-ajax-search', 'blonwesearch', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
	));
}
add_action( 'wp_enqueue_scripts', 'blonwe_ajax_search_scripts' );


/*************************************************
## Ajax Login CallBack
*************************************************/ 
add_action( 'wp_ajax_nopriv_ajax_search', 'blonwe_ajax_search_callback' );
add_action( 'wp_ajax_ajax_search', 'blonwe_ajax_search_callback' );
if(!function_exists('blonwe_ajax_search_callback')){
	function blonwe_ajax_search_callback() {
		global $wpdb;
		
		$keyword        = esc_html( $_POST['keyword'] );
		
		$clean_term = wc_clean( $keyword );
		$sku_to_id = $wpdb->get_results( "SELECT product_id FROM {$wpdb->wc_product_meta_lookup} WHERE sku LIKE '%{$clean_term}%';", ARRAY_N );
	
	
		$args = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => 5,
		);
		
		if(!empty($sku_to_id)){
			$args['meta_query'] = array( array(
				'key' => '_sku',
				'value' => $keyword,
				'compare' => 'LIKE'
			) );
		} else {
			$args['s'] = $keyword;
		}
		
		if($_POST['selected_cat'] != null){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'slug',
				'terms' 	=> $_POST['selected_cat'],
			);
		}
		
		if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			);
		}
	
		$args = new WP_Query( $args );
	
		if ( $args->have_posts() ) {
			
			if(get_theme_mod('blonwe_ajax_search_result_type') == 'type2'){
				echo '<div class="header-search-results">';
				echo '<ul class="list">';
				while ( $args->have_posts() ) : $args->the_post();
					$product = wc_get_product( get_the_ID() );
					
					$title = $product->get_name();
					$price = $product->get_price_html();
	
					if ( ! $product || ( 'trash' === $product->get_status() ) ) {
						continue;
					}
					
					echo '<li>';
					echo '<div class="search-img">';
					echo $product->get_image('thumbnail');
					echo '</div>';
					echo '<div class="search-content">';
					echo '<h1 class="product-title"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h1>';
					echo '<span class="price">'.$price.'</span>';
					echo '</div>';
					echo '</li>';
				endwhile;
				
				if($args->found_posts > 5){
					$searchall = add_query_arg(
						array(
							's' => $keyword, 
							'post_type' => 'product'
						),
						site_url() 
					);
							
					echo '<li class="search-more">';
					echo '<a href="'.esc_url($searchall).'"><span>'.esc_html__('See all products...','blonwe-core').'</span> <span>('.esc_html($args->found_posts).')</span></a>';
					echo '</li>';
				}
				
				echo '</ul>';
				
				// Trending Keywords 
				if(blonwe_get_most_popular_keywords() && $args->found_posts < 3){
					echo '<span class="search-results-heading">'.esc_html__('Trending:', 'blonwe-core').'</span>';
					echo blonwe_get_most_popular_keywords();
				}
				echo '</div>';
				wp_reset_postdata();
			} else {
				$output = '';
				
				$output .= '<div class="header-search-results grid-style style-1">';
				
				// Trending Keywords
				if(blonwe_get_most_popular_keywords()){
					$output .= '<div class="column keywords-column">';
					$output .= '<span class="search-results-heading">'.esc_html__('Trending:', 'blonwe-core').'</span>';
					$output .= blonwe_get_most_popular_keywords('list-style',10);
					$output .= '</div><!-- column -->';
				}
				$output .= '<div class="column products list-style">';
				
				while ( $args->have_posts() ) : $args->the_post();
					$product = wc_get_product( get_the_ID() );
					$price = $product->get_price_html();
				
					$output .= '<div class="product">';
					$output .= '<div class="product-inner">';
					$output .= '<div class="thumbnail-wrapper">';
					ob_start();
					$output .= blonwe_product_second_image();
					$output .= ob_get_clean();
					$output .= '</div><!-- thumbnail-wrapper -->';
					$output .= '<div class="content-wrapper">';
					$output .= '<span class="price">';
					$output .= $price;
					$output .= '</span><!-- price -->';
					$output .= '<h4 class="product-title entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
					$output .= '</div><!-- content-wrapper -->';
					$output .= '</div><!-- product-inner -->';
					$output .= '</div>';
				endwhile;
				wp_reset_postdata();
				
				$output .= '</div><!-- products-list-style -->';
				$output .= '</div><!-- header-search-results -->';
				
				echo $output;
			}
		} else {
			echo '<ul><li><span>'.sprintf(esc_html__( 'No results found for "%s"', 'blonwe-core' ), esc_html( $keyword )).'</span></li></ul>';
		}
	
		wp_die();
	
	}
}
/*************************************************
## Search Query For SKU
*************************************************/ 
if ( ! function_exists( 'blonwe_sku_search_query' ) ) {
	function blonwe_sku_search_query( $where, $s ) {
		global $wpdb;

		$search_ids = array();
		$terms = explode( ',', $s );

		foreach ( $terms as $term ) {
			//Include the search by id if admin area.
			if ( is_admin() && is_numeric( $term ) ) {
				$search_ids[] = $term;
			}
			// search for variations with a matching sku and return the parent.

			$sku_to_parent_id = $wpdb->get_col( $wpdb->prepare( "SELECT p.post_parent as post_id FROM {$wpdb->posts} as p join {$wpdb->wc_product_meta_lookup} ml on p.ID = ml.product_id and ml.sku LIKE '%%%s%%' where p.post_parent <> 0 group by p.post_parent", wc_clean( $term ) ) );

			//Search for a regular product that matches the sku.
			$clean_term = wc_clean( $term );
			$sku_to_id = $wpdb->get_results( "SELECT product_id FROM {$wpdb->wc_product_meta_lookup} WHERE sku LIKE '%{$clean_term}%';", ARRAY_N );

			$sku_to_id_results = array();
			if ( is_array( $sku_to_id ) ) {
				foreach ( $sku_to_id as $id ) {
					$sku_to_id_results[] = $id[0];
				}
			}

			$search_ids = array_merge( $search_ids, $sku_to_id_results, $sku_to_parent_id );
		}

		$search_ids = array_filter( array_map( 'absint', $search_ids ) );

		if ( sizeof( $search_ids ) > 0 ) {
			$where = str_replace( ')))', ")) OR ( {$wpdb->posts}.ID IN (" . implode( ',', $search_ids ) . ")))", $where );
		}

		return $where;
	}
}
 
add_filter( 'posts_search', 'blonwe_product_search_sku', 9 );
if ( ! function_exists( 'blonwe_product_search_sku' ) ) {
	function blonwe_product_search_sku( $where, $class = false ) {
		global $pagenow, $wpdb, $wp;
		
		if ( ( is_admin() ) //if ((is_admin() && 'edit.php' != $pagenow) 
				|| !is_search()  
				|| !isset( $wp->query_vars['s'] ) 
				//post_types can also be arrays..
				|| (isset( $wp->query_vars['post_type'] ) && 'product' != $wp->query_vars['post_type'] )
				|| (isset( $wp->query_vars['post_type'] ) && is_array( $wp->query_vars['post_type'] ) && !in_array( 'product', $wp->query_vars['post_type'] ) ) 
				) {
			return $where;
		}

		$s = $wp->query_vars['s'];


		return blonwe_sku_search_query( $where, $s );
		
	}
}

/*************************************************
## Most Popular Keywords
*************************************************/ 
function blonwe_repeat_count($keyword){
	global $wpdb;
	
	//echo "SELECT repeat_count FROM " . BLONWE_TABLE . " WHERE keywords ='" . ($keyword)."'";
	$repeat_count = $wpdb->get_var( "SELECT repeat_count FROM " . BLONWE_TABLE . " WHERE keywords ='" . ($keyword)."'");

	return $repeat_count;
}

add_action('init', 'blonwe_most_popular_search_table');	
function blonwe_most_popular_search_table(){
	global $wpdb;

	define('BLONWE_TABLE', $wpdb->prefix . 'most_popular_search');
	
	 if(get_theme_mod('blonwe_delete_most_popular_key',0) == 1){
		 $table_name = $wpdb->prefix . 'most_popular_search';
		 $sql = "DROP TABLE IF EXISTS $table_name";
		 $wpdb->query($sql);
		 delete_option("my_plugin_db_version");
	 }

	$query = "CREATE TABLE IF NOT EXISTS " . BLONWE_TABLE . "( 
		id INT PRIMARY KEY AUTO_INCREMENT, 
		keywords VARCHAR(255) NOT NULL, 
		query_date varchar(12) NOT NULL, 
		repeat_count INT
	)";
		
	$wpdb->query($query);
	
	if(isset($_GET['s'])){
		$date = date( 'YmdHi' );
		$keyword = $_GET['s'];
		$mySearch = new WP_Query("s=$keyword & showposts=-1");

		$repeat_count = blonwe_repeat_count($keyword);
		
		if($repeat_count != null){
			$row = $wpdb->get_var( "SELECT id FROM " . BLONWE_TABLE . " WHERE keywords = '" . ($keyword)."'");
			$wpdb->update( BLONWE_TABLE, 
				array( 
					'query_date' => $date,
					'repeat_count' => ++$repeat_count,
				), 
				array('id' => $row),
				array('%s', '%s', '%d') 
			);
		} else {
			$wpdb->insert( BLONWE_TABLE, 
				array( 
					'keywords' => $keyword, 
					'query_date' => $date,
					'repeat_count' => 0,
				), 
				array( '%s', '%s', '%d' ) 
			);
		}
	}

}

function blonwe_get_most_popular_keywords($style = 'tag-style', $display = '8'){
	global $wpdb;
	$output = '';
	
	$rows = $wpdb->get_results("SELECT * FROM " . BLONWE_TABLE . " ORDER BY repeat_count DESC");
	
	if(get_theme_mod('blonwe_most_popular_keys', 1) == '0'){
		return;
	}
	
	if($rows && $style == 'tag-style'){
		$output .= '<ul class="search-keywords tag-style">';
		$count = 0;
		foreach($rows as $r){
			if(!empty($r->keywords) && $count < $display){
				$output .= '<li><a href="'.add_query_arg(array('post_type' => 'product', 's' => $r->keywords ), site_url()).'">'.$r->keywords.' </a></li>';
			}
			$count++;
		}	
		$output .= '</ul>';
	}
	
	if($rows && $style == 'list-style'){
		$output .= '<ul class="search-keywords list-style">';
		$count = 0;
		foreach($rows as $r){
			if(!empty($r->keywords) && $count < $display){
				$output .= '<li><a href="'.add_query_arg(array('post_type' => 'product', 's' => $r->keywords ), site_url()).'">'.$r->keywords.' </a></li>';
			}
			$count++;
		}	
		$output .= '</ul>';
	}
	
	return $output;
	
}