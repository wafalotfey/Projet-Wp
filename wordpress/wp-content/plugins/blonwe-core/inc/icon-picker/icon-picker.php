<?php

/*************************************************
## Admin style and scripts  
*************************************************/ 
function blonwe_iconpicker_admin_scripts() {
    wp_register_script('klb-iconpicker', plugins_url( 'js/icon-picker.js', __FILE__ ), false, '1.0');
	wp_localize_script( 'klb-iconpicker', 'iconpicker', array(
		'iconlist' => get_theme_mod('blonwe_icon_css',array( 'auto-part', 'interface', 'ecommerce', 'delivery', 'furniture', 'grocery', 'electronics', 'organic', 'social')),
	));
	
    wp_register_style('klb-iconpicker', plugins_url( 'css/icon-picker.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'blonwe_iconpicker_admin_scripts' );

/*************************************************
## Blonwe Menu Custom Fields
*************************************************/
function blonwe_menu_custom_icon_fields( $item_id, $item ) {
	$theme_locations = get_nav_menu_locations();
	$menuid = absint( get_user_option( 'nav_menu_recently_edited' ) );
	
	wp_enqueue_style( 'klb-iconpicker');
	wp_enqueue_script('klb-iconpicker');
	wp_enqueue_style( 'blonwe-klbicon');

    $menu_item_iconfield = get_post_meta( $item_id, '_menu_item_iconfield', true );
	
    ?>
    <div class="et_menu_options">
        <div class="blonwe-field-iconfield description description-wide">
            <label for="menu_item_iconfield-<?php echo esc_attr($item_id); ?>">
                <?php esc_html_e( 'Icon Field', 'blonwe-core'  ); ?><br />
				<input type="text" class="widefat code edit-menu-item-custom klbicon-picker" id="menu_item_iconfield-<?php echo esc_attr( $item_id ); ?>" name="menu_item_iconfield[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $menu_item_iconfield ); ?>"/>
            </label>
			
			<div class="klb-iconsholder-wrapper">
				<div class="klb-iconsholder">
					<input type="text" class="iconsearch" placeholder="<?php esc_attr_e('Search icon...','blonwe-core'); ?>">
					
					<select class="iconcat" name="iconcat">
						<option value=""> <?php echo esc_html_e('Select List', 'blonwe-core'); ?> </option>
						<option value="social" selected> <?php echo esc_html_e('Social', 'blonwe-core'); ?> </option>
						<?php foreach(get_theme_mod('blonwe_icon_css',array('ecommerce')) as $icon){ ?>
							<option value="<?php echo esc_attr($icon); ?>"> <?php echo esc_html($icon); ?> </option>
						<?php } ?>
					</select>
				</div>
			</div>
        
			
		
		</div>
    </div>

    <?php

}
add_action( 'wp_nav_menu_item_custom_fields', 'blonwe_menu_custom_icon_fields', 10, 2 );

/*************************************************
## Blonwe Save menu item meta
*************************************************/
function blonwe_nav_icon_update( $menu_id, $menu_item_db_id ) {

    if (!empty($_REQUEST['menu_item_iconfield'])) {
        $iconfield_enabled_value = $_REQUEST['menu_item_iconfield'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_iconfield', $iconfield_enabled_value );
    }
}

add_action( 'wp_update_nav_menu_item', 'blonwe_nav_icon_update', 10, 2 );

/*************************************************
## Output menu icon field
*************************************************/
add_filter( 'wp_nav_menu_objects', 'blonwe_icon_wp_nav_menu_objects', 10, 2 );
function blonwe_icon_wp_nav_menu_objects( $sorted_menu_items, $args  ) {
    foreach ( $sorted_menu_items as $item ) {
		$menu_item_iconfield = get_post_meta( $item->ID, '_menu_item_iconfield', true );	
		if($menu_item_iconfield){
			$item->title = '<i class="'.$menu_item_iconfield.'"></i>' . $item->title;
		}
    }

    return $sorted_menu_items;
}