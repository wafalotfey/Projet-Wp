<?php 
/*************************************************
## Blonwe Nav Menu Endpoints
*************************************************/ 

function blonwe_add_nav_menu_meta_boxes() {
	add_meta_box( 'blonwe_endpoints_nav_link', esc_html__( 'Blonwe endpoints', 'blonwe-core' ), 'blonwe_nav_menu_links' , 'nav-menus', 'side', 'low' );
}
add_action( 'admin_head-nav-menus.php', 'blonwe_add_nav_menu_meta_boxes');

function blonwe_nav_menu_links() {
	?>
	<div id="posttype-blonwe-endpoints" class="posttypediv">
		<div id="tabs-panel-blonwe-endpoints" class="tabs-panel tabs-panel-active">
			<ul id="blonwe-endpoints-checklist" class="categorychecklist form-no-clear">
				
				<!-- Location -->
				<?php if(get_theme_mod('blonwe_location_filter',0) == 1){ ?>
				<li>
					<label class="menu-item-title">
						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="0" /> <?php esc_html_e('Find a Store', 'blonwe-core'); ?>
					</label>
					<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom" />
					<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="Find a Store" />
					<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#" />
					<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="location-button" />
				</li>
				<?php } ?>
				
				<li>
					<label class="menu-item-title">
						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="0" /> <?php esc_html_e('Elementor Template', 'blonwe-core'); ?>
					</label>
					<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom" />
					<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="Elementor Template" />
					<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#" />
					<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="klb-elementor-template" />
				</li>

			</ul>
		</div>
		<p class="button-controls">
			<span class="list-controls">
				<a href="<?php echo esc_url( admin_url( 'nav-menus.php?page-tab=all&selectall=1#posttype-blonwe-endpoints' ) ); ?>" class="select-all"><?php esc_html_e( 'Select all', 'blonwe-core' ); ?></a>
			</span>
			<span class="add-to-menu">
				<button type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to menu', 'blonwe-core' ); ?>" name="add-post-type-menu-item" id="submit-posttype-blonwe-endpoints"><?php esc_html_e( 'Add to menu', 'blonwe-core' ); ?></button>
				<span class="spinner"></span>
			</span>
		</p>
	</div>
	<?php
}

/*************************************************
## Blonwe Nav Menu Endpoints Output
*************************************************/ 
function blonwe_nav_menu_links_output( $itemOutput, $item ) {
	
	if (! empty( $itemOutput )&& is_string( $itemOutput )&& strpos( $item->classes[0], 'klb-location' ) !== false) {
		if(get_theme_mod('blonwe_location_filter',0) == 1){
			if( blonwe_location() != 'all'){
				$term = get_term_by('slug', blonwe_location(), 'location');
				
				$itemOutput = '<a href="#" class="location-button"><i class="klb-ecommerce-icon-location"></i> '.esc_html($term->name).'</a>';
			} else {
				$itemOutput = '<a href="#" class="location-button"><i class="klb-ecommerce-icon-location"></i> '.esc_html($item->title).'</a>';
			}
		}
	}

	return $itemOutput;
}

if ( !is_admin() ) {
	add_filter( 'walker_nav_menu_start_el','blonwe_nav_menu_links_output' , 50, 2 );
	add_filter( 'megamenu_walker_nav_menu_start_el', 'blonwe_nav_menu_links_output', 50, 2 );
}

/*************************************************
## Mega Menu
*************************************************/ 
require_once( __DIR__ . '/mega-menu/mega-menu.php' );