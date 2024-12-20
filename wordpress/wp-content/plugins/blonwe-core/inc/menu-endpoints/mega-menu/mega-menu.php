<?php

/*************************************************
## Admin style and scripts
*************************************************/ 
function blonwe_megamenu_admin_scripts() {
    wp_register_script('klb-mega-menu', plugins_url( 'js/admin-mega-menu.js', __FILE__ ), false, '1.0');
}
add_action( 'admin_enqueue_scripts', 'blonwe_megamenu_admin_scripts' );

/*************************************************
## Blonwe Mega Menu Custom Fields
*************************************************/
function blonwe_mega_menu_custom_fields( $item_id, $item ) {

    $menu_item_elementor_template = get_post_meta( $item_id, '_menu_item_elementor_template', true );
    $menu_item_elementor_template_width = get_post_meta( $item_id, '_menu_item_elementor_template_width', true );

	wp_enqueue_script('klb-mega-menu');

    ?>
    <div class="et_menu_options">

        <div class="blonwe-field-elementor-template description description-wide">
			<?php if( $item->classes[0] == 'klb-elementor-template'){ ?>
				<label for="menu_item_elementor-template-<?php echo esc_attr($item_id); ?>">
					<?php esc_html_e( 'Elementor Template', 'blonwe-core'  ); ?><br />
					<select class="widefat code edit-menu-item-custom" id="menu_item_elementor_template-<?php echo esc_attr($item_id); ?>" name="menu_item_elementor_template[<?php echo esc_attr($item_id); ?>]">
						<?php foreach(blonwe_get_elementorTemplates('section') as $key => $value){ ?>
							<?php $selected = $menu_item_elementor_template == $key ? "selected='selected'" : ''; ?>
							<option value="<?php echo esc_attr( $key ) ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr( $value ) ?></option>
						<?php } ?>
					</select>
				</label>
				<div class="blonwe-field-elementor-template-width">
					<p>
						<label for="menu_item_elementor-template-width-<?php echo esc_attr($item_id); ?>">
							<?php esc_html_e( 'Sub Menu Width', 'blonwe-core'  ); ?><br />
							<?php $selected_width = $menu_item_elementor_template_width == $key ? "selected='selected'" : ''; ?>
							<select class="widefat code edit-menu-item-custom" id="menu_item_elementor_template_width-<?php echo esc_attr($item_id); ?>" name="menu_item_elementor_template_width[<?php echo esc_attr($item_id); ?>]">
								<option value="large" <?php echo esc_attr($menu_item_elementor_template_width == 'large' ? "selected='selected'" : ''); ?>><?php esc_html_e('Large', 'blonwe-core'); ?></option>
								<option value="has-image" <?php echo esc_attr($menu_item_elementor_template_width == 'has-image' ? "selected='selected'" : ''); ?>><?php esc_html_e('Medium', 'blonwe-core'); ?></option>
							</select>
						</label>
					</p>
				</div>
			<?php }?>
        </div>

    </div>

    <?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'blonwe_mega_menu_custom_fields', 10, 2 );

/*************************************************
## Blonwe Save menu item meta
*************************************************/
function blonwe_mega_menu_nav_update( $menu_id, $menu_item_db_id) {
	
    if (!empty($_REQUEST['menu_item_elementor_template'][$menu_item_db_id])) {
        $menu_elementor_template_enabled_value = $_REQUEST['menu_item_elementor_template'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_elementor_template', $menu_elementor_template_enabled_value );
    }
	
    if (!empty($_REQUEST['menu_item_elementor_template_width'][$menu_item_db_id])) {
        $menu_elementor_template_width_enabled_value = $_REQUEST['menu_item_elementor_template_width'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_elementor_template_width', $menu_elementor_template_width_enabled_value );
    }
}

add_action( 'wp_update_nav_menu_item', 'blonwe_mega_menu_nav_update', 10, 2 );

/*************************************************
## Blonwe Nav Menu Mega Menu Endpoints Output
*************************************************/ 
function blonwe_nav_menu_mega_menu_output( $itemOutput, $item ) {
	
	$menu_item_iconfield = get_post_meta( $item->ID, '_menu_item_elementor_template', true );
	
	if (! empty( $menu_item_iconfield ) && ! empty( $itemOutput ) && is_string( $itemOutput )&& strpos( $item->classes[0], 'klb-elementor-template' ) !== false) {

		wp_enqueue_script('klb-mega-menu');
		
		ob_start();
		do_action('blonwe_submenu', $menu_item_iconfield);
		$itemOutput = ob_get_clean();

	}

	return $itemOutput;
}
	
if ( !is_admin() ) {
	add_filter( 'walker_nav_menu_start_el','blonwe_nav_menu_mega_menu_output' , 50, 2 );
	add_filter( 'megamenu_walker_nav_menu_start_el', 'blonwe_nav_menu_mega_menu_output', 50, 2 );
}

/*************************************************
## Add Action for blonwe_submenu do_action 
*************************************************/
add_action( 'blonwe_submenu', 'blonwe_get_elementor_template', 10);

/*************************************************
## Add mega-menu class for parent if elementor template exist
*************************************************/
function blonwe_megamenu_nav_objects( $sorted_menu_items, $args ) {
    $last_top = 0;

    foreach ( $sorted_menu_items as $key => $obj ) {
		
		
		$menu_item_elementor_template_width = get_post_meta( $obj->ID, '_menu_item_elementor_template_width', true ) ? get_post_meta( $obj->ID, '_menu_item_elementor_template_width', true ) : '';;
		
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
			if ( 'klb-elementor-template' == $obj->classes[0] ) {
				if($args->theme_location == 'sidebar-menu'){
					if($menu_item_elementor_template_width == 'has-image'){
						$sorted_menu_items[$last_top]->classes['mega-menu'] = 'mega-menu-elementor sidebar-mega '.$menu_item_elementor_template_width;
					} else {
						$sorted_menu_items[$last_top]->classes['mega-menu'] = 'mega-menu mega-menu-elementor sidebar-mega';
					}
					
				} else {
					$sorted_menu_items[$last_top]->classes['mega-menu'] = 'mega-menu mega-menu-elementor';
				}
			}
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'blonwe_megamenu_nav_objects', 10, 2 );
