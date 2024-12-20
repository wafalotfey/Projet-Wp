<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aromatic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aromatic_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
		//$classes[] = 'aromatic-home2';
	
	return $classes;
}
add_filter( 'body_class', 'aromatic_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('aromatic_str_replace_assoc')) {

    /**
     * aromatic_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function aromatic_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

// Comments Counts
if ( ! function_exists( 'aromatic_comment_count' ) ) :
function aromatic_comment_count() {
	$aromatic_comments_count 	= get_comments_number();
	if ( 0 === intval( $aromatic_comments_count ) ) {
		echo esc_html__( '0 Comments', 'aromatic' );
	} else {
		/* translators: %s Comment number */
		 echo sprintf( _n( '%s Comment', '%s Comments', $aromatic_comments_count, 'aromatic' ), number_format_i18n( $aromatic_comments_count ) );
	}
} 
endif;


/**
 * Display Sidebars
 */
if ( ! function_exists( 'aromatic_get_sidebars' ) ) {
	/**
	 * Get Sidebar
	 *
	 * @since 1.0
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function aromatic_get_sidebars( $sidebar_id ) {
		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="widget">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Add Widget', 'aromatic' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Get registered sidebar name by sidebar ID.
 *
 * @since  1.0.0
 * @param  string $sidebar_id Sidebar ID.
 * @return string Sidebar name.
 */
function aromatic_get_sidebar_name_by_id( $sidebar_id = '' ) {

	if ( ! $sidebar_id ) {
		return;
	}

	global $wp_registered_sidebars;
	$sidebar_name = '';

	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
		$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
	}

	return $sidebar_name;
}


/**
 * Aromatic Logo
 */
if ( ! function_exists( 'aromatic_logo' ) ) {
	function aromatic_logo() {
		if(has_custom_logo())
			{	
				the_custom_logo();
			}
			else { 
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h4 class="site-title">
					<?php 
						echo esc_html(get_bloginfo('name'));
					?>
				</h4>
			</a>	
		<?php 						
			}
		?>
		<?php
			$aromatic_description = get_bloginfo( 'description');
			if ($aromatic_description) : ?>
				<p class="site-description"><?php echo esc_html($aromatic_description); ?></p>
		<?php endif;
	}
}
add_action( 'aromatic_logo', 'aromatic_logo' );


/**
 * Aromatic Navigation
 */
if ( ! function_exists( 'aromatic_main_nav' ) ) {
	function aromatic_main_nav() {
		wp_nav_menu( 
			array(  
				'theme_location' => 'primary_menu',
				'container'  => '',
				'menu_class' => 'menu-wrap menu-primary',
				'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
				'walker' => new WP_Bootstrap_Navwalker()
				 ) 
			);
	}
}
add_action( 'aromatic_main_nav', 'aromatic_main_nav' );

/**
 * Aromatic Header Cart
 */
if ( ! function_exists( 'aromatic_hdr_cart' ) ) {
	function aromatic_hdr_cart() {
		$aromatic_hs_cart = get_theme_mod( 'hide_show_cart','1');
		if($aromatic_hs_cart=='1' && class_exists( 'woocommerce' )): ?>
			<li class="cart-wrapper">
				<div class="cart-main">
					<button type="button"
						class="cart-icon-wrap header-cart cart-trigger">
						<i class="jcs ja-cart"></i>
						<?php 
							if ( class_exists( 'woocommerce' ) ) {
								$count = WC()->cart->cart_contents_count;
								$cart_url = wc_get_cart_url();
								
								if ( $count > 0 ) {
								?>
									 <span class="cart-count"><?php echo esc_html( $count ); ?></span>
								<?php 
								}
								else {
									?>
									<span class="cart-count"><?php esc_html_e('0','aromatic')?></span>
									<?php 
								}
							}
							?>
					</button>
					<span class="cart-label">
						<span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
					</span>
					<div class="cart-modal cart-modal-1">
						<div class="cart-container">
							<div class="cart-header">
								<div class="cart-top">
									<span class="cart-text"><?php esc_html_e('Shopping Cart','aromatic'); ?></span>
									<a href="javascript:void(0);" class="cart-close"><?php esc_html_e('CLOSE','aromatic'); ?></a>
								</div>
							</div>
							<div class="cart-data">
								<?php get_template_part('woocommerce/cart/mini','cart'); ?>
							</div>	
						</div>
						<div class="cart-overlay"></div>
					</div>
				</div>
			</li>
			<?php endif;
	}
}
add_action( 'aromatic_hdr_cart', 'aromatic_hdr_cart' );


/**
 * Aromatic Mobile Browse Category
 */
if ( ! function_exists( 'aromatic_hdr_mobile_browse_cat' ) ) {
	function aromatic_hdr_mobile_browse_cat() {
		$aromatic_hs_browse_cat		= get_theme_mod( 'hs_browse_cat','1');
		if($aromatic_hs_browse_cat=='1' && class_exists( 'woocommerce' )):
		?>
			<div class="switcher-tab">
				<button class="active-bg"><?php esc_html_e('Menu','aromatic'); ?></button>
				<button class="cat-menu-bt"><?php esc_html_e('Categories','aromatic'); ?></button>
			</div>
			<div class="product-categories d-none">
				<div class="product-categories-list">
					<ul class="main-menu">
						<?php
							$categories = array(
								  'taxonomy' => 'product_cat',
								  'hide_empty' => false,
								  'parent'   => 0
							  );
							$product_cat = get_terms( $categories );
							foreach ($product_cat as $parent_product_cat) {
								$child_args = array(
									'taxonomy' => 'product_cat',
									'hide_empty' => false,
									'parent'   => $parent_product_cat->term_id
								);
								$thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								$child_product_cats = get_terms( $child_args );
								$aromatic_product_cat_icon = get_term_meta($parent_product_cat->term_id, 'aromatic_product_cat_icon', true);
								if ( ! empty($child_product_cats) ) {
									echo '<li class="menu-item menu-item-has-children"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'" class="nav-link">'.(!empty($aromatic_product_cat_icon) ? "<i class='fa {$aromatic_product_cat_icon}'></i>":''); echo esc_html($parent_product_cat->name).'</a><span class="mobile-toggler d-lg-none"><button type="button" class="fa fa-chevron-right" aria-label="Mobile Collapsed"></button></span>';
								} else {
									echo '<li class="menu-item"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'" class="nav-link">'.(!empty($aromatic_product_cat_icon) ? "<i class='fa {$aromatic_product_cat_icon}'></i>":''); echo esc_html($parent_product_cat->name).'</a>';
								}
								if ( ! empty($child_product_cats) ) {
									echo '<ul class="dropdown-menu">';
									foreach ($child_product_cats as $child_product_cat) {
									echo '<li class="menu-item"><a href="'.esc_url(get_term_link($child_product_cat->term_id)).'" class="dropdown-item">'.esc_html($child_product_cat->name).'</a></li>';
									} echo '</ul>';
								} echo '</li>';
							} ?>
					</ul>
				</div>
			</div>
		<?php endif;
	}
}
add_action( 'aromatic_hdr_mobile_browse_cat', 'aromatic_hdr_mobile_browse_cat' );


/**
 * Aromatic Product Search
 */
if ( ! function_exists( 'aromatic_hdr_product_search' ) ) {
	function aromatic_hdr_product_search() {
		$aromatic_hs_product_search	= get_theme_mod( 'hs_product_search','1'); 
		 if($aromatic_hs_product_search=='1' && class_exists( 'woocommerce' )): ?>
			<div class="header-search-form product-search">
				<form name="product-search" method="POST">
					<div class="search-wrapper">
						<input class="header-search-input" name="s" type="text"
						placeholder="<?php esc_attr_e('Search Products Here', 'aromatic'); ?>" />

					</div>
					<select class="header-search-select" name="product_cat">
					   <option value=""><?php esc_html_e('Select Category', 'aromatic'); ?></option> 
						<?php
							$aromatic_product_categories = get_categories('taxonomy=product_cat');
							foreach ($aromatic_product_categories as $category) {
								$option = '<option value="' . esc_attr($category->category_nicename) . '">';
								$option .= esc_html($category->cat_name);
								$option .= ' (' . absint($category->category_count) . ')';
								$option .= '</option>';
								echo $option; // WPCS: XSS OK.
							}
						?>
					</select>
					<input type="hidden" name="post_type" value="product" />
					<button class="header-search-button" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		<?php endif;
	}
}
add_action( 'aromatic_hdr_product_search', 'aromatic_hdr_product_search' );


 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function aromatic_add_to_cart_count_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count; 
    ?> 	
	<?php
    if ( $count > 0 ) {
	?>
		 <span class="cart-count"><?php echo esc_html( $count ); ?></span>
	<?php 
	}
	else {
		?>
		<span class="cart-count"><?php esc_html_e('0','aromatic')?></span>
		<?php 
	}
    ?><?php
 
    $fragments['span.cart-count'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'aromatic_add_to_cart_count_fragment' );


function aromatic_add_to_cart_total_fragment( $fragments ) {
	
    ob_start(); 
    ?> 	
	<span class="cart-label">
		<span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
	</span>
   <?php
    $fragments['span.cart-label'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'aromatic_add_to_cart_total_fragment' );
 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function aromatic_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Header Widget Area', 'aromatic' ),
		'id' => 'aromatic-header-above-widget',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'aromatic' ),
		'id' => 'aromatic-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'aromatic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span></span>',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget', 'aromatic' ),
		'id' => 'aromatic-footer-widget',
		'description' => __( 'Footer Widget', 'aromatic' ),
		'before_widget' => '<div class="col-lg-3 middle-footer"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'aromatic' ),
		'id' => 'aromatic-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'aromatic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'aromatic_widgets_init' );



/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'aromatic_blog_column_layout' )) :
function aromatic_blog_column_layout(){
	if(is_active_sidebar('aromatic-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;


function aromatic_breadcrumbs_list() {
	
	$showOnHome	= esc_html__('1','aromatic'); 	// 1 - Show breadcrumbs on the homepage, 0 - don't show
	$delimiter 	= '';   // Delimiter between breadcrumb
	$home 		= esc_html__('Home','aromatic'); 	// Text for the 'Home' link
	$showCurrent= esc_html__('1','aromatic'); // Current post/page title in breadcrumb in use 1, Use 0 for don't show
	$before		= '<li class="active">'; // Tag before the current Breadcrumb
	$after 		= '</li>'; // Tag after the current Breadcrumb
	$breadcrumb_middle_content	= '>';
	global $post;
	$homeLink = home_url();

	if (is_home() || is_front_page()) {
 
	if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '"><i class="fa fa-home"></i>  ' . esc_html($home) . '</a></li>';
 
	} else {
 
    echo '<li><a href="' . esc_url($homeLink) . '"><i class="fa fa-home"></i>  ' . esc_html($home) . '</a> ' . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp';
 
    if ( is_category() ) 
	{
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
		echo $before . esc_html__('Archive by category','aromatic').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
		
	} 
	
	elseif ( is_search() ) 
	{
		echo $before . esc_html__('Search results for ','aromatic').' "' . esc_html(get_search_query()) . '"' . $after;
	} 
	
	elseif ( is_day() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp';
		echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a> '. '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp';
		echo $before . esc_html(get_the_time('d')) . $after;
	} 
	
	elseif ( is_month() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp';
		echo $before . esc_html(get_the_time('F')) . $after;
	} 
	
	elseif ( is_year() )
	{
		echo $before . esc_html(get_the_time('Y')) . $after;
	} 
	
	elseif ( is_single() && !is_attachment() )
	{
		if ( get_post_type() != 'post' )
		{
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/"><i class="fa fa-home"></i>  ' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp' . $before . wp_kses_post(get_the_title()) . $after;
		}
		else
		{
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp');
			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
			echo $cats;
			if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
		}
 
    }
		
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$thisshop = woocommerce_page_title();
			}
		}	
		else  {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		}	
	} 
	
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
	{
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;
	} 
	
	elseif ( is_attachment() ) 
	{
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); 
		if(!empty($cat)){
		$cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp');
		}
		echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	
	elseif ( is_page() && !$post->post_parent ) 
	{
		if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
	} 
	
	elseif ( is_page() && $post->post_parent ) 
	{
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) 
		{
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp';
			$parent_id  = $page->post_parent;
		}
		
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) 
		{
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_middle_content) . '&nbsp';
		}
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	elseif ( is_tag() ) 
	{
		echo $before . esc_html__('Posts tagged ','aromatic').' "' . esc_html(single_tag_title('', false)) . '"' . $after;
	} 
	
	elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
		echo $before . esc_html__('Articles posted by ','aromatic').'' . $userdata->display_name . $after;
	} 
	
	elseif ( is_404() ) {
		echo $before . esc_html__('Error 404 ','aromatic'). $after;
    }
	
    if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
		echo ' ( ' . esc_html__('Page','aromatic') . '' . esc_html(get_query_var('paged')). ' )';
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }
 
    echo '</li>';
 
  }
}


/**
 * Aromatic Theme Icons
 */
if(!function_exists( 'aromatic_theme_icon' )) :
	function aromatic_theme_icon($icon) {
		if (str_contains($icon, 'ja')) {
			return 'jcs'.' '.$icon;
		}else{
			return 'fa'.' '.$icon;
		}
	}
endif;