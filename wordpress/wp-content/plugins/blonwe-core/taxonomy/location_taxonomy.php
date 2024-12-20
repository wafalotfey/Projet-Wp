<?php

/*************************************************
## Scripts
*************************************************/
function blonwe_location_scripts() {
	wp_register_style( 'klb-location-filter',   plugins_url( 'css/location-filter.css', __FILE__ ), false, '1.0');
	wp_register_script( 'klb-location-filter',  plugins_url( 'js/location-filter.js', __FILE__ ), true );

}
add_action( 'wp_enqueue_scripts', 'blonwe_location_scripts' );

/*************************************************
## Register Location Taxonomy
*************************************************/ 

function custom_taxonomy_location()  {
$labels = array(
    'name'                       => 'Locations',
    'singular_name'              => 'Location',
    'menu_name'                  => 'Locations',
    'all_items'                  => 'All Locations',
    'parent_item'                => 'Parent Item',
    'parent_item_colon'          => 'Parent Item:',
    'new_item_name'              => 'New Item Name',
    'add_new_item'               => 'Add New Location',
    'edit_item'                  => 'Edit Item',
    'update_item'                => 'Update Item',
    'separate_items_with_commas' => 'Separate Item with commas',
    'search_items'               => 'Search Items',
    'add_or_remove_items'        => 'Add or remove Items',
    'choose_from_most_used'      => 'Choose from the most used Items',
);
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
);
register_taxonomy( 'location', array( 'product','shop_coupon' ), $args );
register_taxonomy_for_object_type( 'location', array( 'product','shop_coupon' ) );
}
add_action( 'init', 'custom_taxonomy_location' );



/*************************************************
## Blonwe Query Vars
*************************************************/ 
function blonwe_query_vars( $query_vars ){
    $query_vars[] = 'klb_special_query';
    return $query_vars;
}
add_filter( 'query_vars', 'blonwe_query_vars' );

/*************************************************
## Blonwe Product Query for Klb Shortcodes
*************************************************/ 
function blonwe_location_product_query( $query ){
    if( isset( $query->query_vars['klb_special_query'] ) && blonwe_location() != 'all'){
		$tax_query[] = array(
			'taxonomy' => 'location',
			'field'    => 'slug',
			'terms'    => blonwe_location(),
		);

		$query->set( 'tax_query', $tax_query );
	}
}
add_action( 'pre_get_posts', 'blonwe_location_product_query' );

/*************************************************
## Blonwe Location
*************************************************/ 
function blonwe_location(){	
	$location  = isset( $_COOKIE['location'] ) ? $_COOKIE['location'] : 'all';
	if($location){
		return $location;
	}
}

/*************************************************
## Blonwe Location Output
*************************************************/
add_action('wp_footer', 'blonwe_location_output'); 
function blonwe_location_output(){
	
	wp_enqueue_style( 'klb-location-filter');
	wp_enqueue_script( 'jquery-cookie');
	wp_enqueue_script( 'klb-location-filter');
	wp_localize_script( 'klb-location-filter', 'locationfilter', array(
		'popup' => blonwe_ft() == 'location' ? '1' : get_theme_mod('blonwe_location_filter_popup',0),
		
	));

	$terms = get_terms( array(
		'taxonomy' => 'location',
		'hide_empty' => false,
		'parent'    => 0,
	) );

	$output = '';
	
	$output .= '<div class="klb-modal-root default-modal location-modal">';
	$output .= '<div class="klb-modal-inner">';
	$output .= '<div class="klb-location-modal">';
	$output .= '<div class="klb-modal-header">';
	$output .= '<h4 class="entry-title">'.esc_html__('Delivery to you','blonwe-core').'</h4>';
	$output .= '<div class="site-close">';
	$output .= '<svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">';
	$output .= '<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>';
	$output .= '<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>';
	$output .= '</svg>';
	$output .= '</div><!-- site-close --> ';     
	$output .= '</div><!-- klb-modal-header -->';
	$output .= '<div class="klb-location-body">';
	$output .= '<h3 class="entry-title">'.esc_html__('Where to deliver your purchases?','blonwe-core').'</h3>';
	$output .= '<div class="entry-description">';
	$output .= '<p>'.esc_html__('Delivery times available depend on where you are ordering from','blonwe-core').'</p>';
	$output .= '</div><!-- entry-description -->';
	$output .= '<div class="location-search-form">';
	$output .= '<form action="#">';
	$output .= '<i class="klb-ecommerce-icon-location"></i>';
	$output .= '<input type="search" name="s" value="" placeholder="'.esc_attr__('Search your location...','blonwe-core').'" autocomplete="off" class="location-input">';
	$output .= '</form>';
	$output .= '</div><!-- location-search -->';
	$output .= '<div class="location-list site-scroll">';
	$output .= '<ul>';
	$output .= '<li class="location-item"><a href="" data-slug="all"> <div class="location-detail"><div class="location-name">'.esc_html__('Select a Location','blonwe-core').'</div></div><div class="location-checkbox"></div></a></li>';
	
	foreach ( $terms as $term ) {
		if($term->slug == blonwe_location()){
			$select = 'active';
		} else {
			$select = '';
		}
	
		$output .= '<li class="location-item '.esc_attr($select).'">';
		$output .= '<a href="'.add_query_arg('location', esc_attr($term->slug)).'" data-slug="'.esc_attr($term->slug).'">';
		$output .= '<div class="location-detail">';
		$output .= '<div class="location-name">'.esc_html($term->name).'</div>';
		$output .= '<div class="location-address">'.esc_html($term->description).' </div>';
		$output .= '</div>';
		$output .= '<div class="location-checkbox"></div>';
		$output .= '</a>';
		$output .= '</li>';
	}		
	
	$output .= '</ul>';
	$output .= '</div><!-- location-list -->';  
	$output .= '</div><!-- klb-location-body -->';
	$output .= '</div><!-- klb-location-modal -->';
	$output .= '</div><!-- klb-modal-inner -->';
	$output .= '<div class="klb-modal-overlay"></div>';
	$output .= '</div><!-- klb-modal-root --> ';

	echo $output;
}