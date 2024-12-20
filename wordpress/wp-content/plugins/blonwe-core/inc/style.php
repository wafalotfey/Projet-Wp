<?php 
/*************************************************
## Blonwe Typography
*************************************************/

function blonwe_rgba_selector($rgbacolor = ''){
	$explode = array_slice(explode(',',$rgbacolor), 0, -1);
	$implode = implode(',', $explode);

	return str_replace("rgba(", "",$implode);
}


function blonwe_custom_styling() { ?>

<style type="text/css">

<?php if (get_theme_mod( 'blonwe_mobile_sticky_header',0 ) == 1) { ?>
@media(max-width:64rem){
	header.sticky-header .header-mobile {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		z-index: 9;
		border-bottom: 1px solid #e3e4e6;
	}
	header.site-header.sticky-header {
	    position: relative;
	    z-index: 99;
	}
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_sticky_header',0 ) == 1) { ?>
header.site-header.sticky-header {
    position: relative;
    z-index: 99;
}
.sticky-header .header-main {
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 10;
}

.sticky-header .header-main::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 0.0625rem;
    bottom: 0;
    background-color: currentColor;
    opacity: 0.1;
}

.site-header.header-type5.sticky-header .header-main .site-brand .light-logo{
	opacity: 0 !important;
}

.site-header.sticky-header.header-type5 .header-main .site-brand .dark-logo{
	opacity: 1 !important;
}

.site-header.sticky-header .header-main,
.site-header.header-type5.sticky-header .header-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_sticky_header_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_sticky_header_font_color' ) ); ?> !important;
}

.site-header.header-type5.sticky-header .header-main a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_sticky_header_font_color' ) ); ?> !important;
}

.single-product-sticky.active {
    margin-top: 78px;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_mobile_single_sticky_cart',0 ) == 1) { ?>
@media(max-width:64rem){
	.single .product-type-simple form.cart {
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 100001;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
		width: 100%;
	}

	@media (max-width: 64rem) {
		[data-theme=dark].single .product-type-simple form.cart {
		    background-color: var(--color-dark700);
		    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
		    box-shadow: 0 -2px 5px rgb(255 255 255 / 28%);
		}
	}

	.single .woocommerce-variation-add-to-cart {
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 999999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
    	width: 100%;
		flex-wrap: wrap;
		width: 100%; 
	}

	.single .site-footer .footer-row.footer-copyright {
	    margin-bottom: 79px;
	}

}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_main_color' )) { ?>
:root {
    --theme-primary-color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_main_color_rgb' )) { ?>
:root {
    --theme-primary-color-RGB: <?php echo esc_attr(blonwe_rgba_selector(get_theme_mod( 'blonwe_main_color_rgb' ))); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_secondary_color' )) { ?>
:root {
    --theme-secondary-color: <?php echo esc_attr(get_theme_mod( 'blonwe_secondary_color' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_secondary_color_rgb' )) { ?>
:root {
    --theme-secondary-color-RGB: <?php echo esc_attr(blonwe_rgba_selector(get_theme_mod( 'blonwe_secondary_color_rgb' ))); ?>;
}
<?php } ?>


<?php if (get_theme_mod( 'blonwe_dark_theme_main_color' )) { ?>
[data-theme=dark] {
     --theme-primary-color: <?php echo esc_attr(get_theme_mod( 'blonwe_dark_theme_main_color' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_dark_theme_main_color_rgb' )) { ?>
[data-theme=dark] {
    --theme-primary-color-RGB: <?php echo esc_attr(blonwe_rgba_selector(get_theme_mod( 'blonwe_dark_theme_main_color_rgb' ))); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_dark_theme_secondary_color' )) { ?>
[data-theme=dark] {
     --theme-secondary-color: <?php echo esc_attr(get_theme_mod( 'blonwe_dark_theme_secondary_color' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_dark_theme_secondary_color_rgb' )) { ?>
[data-theme=dark] {
    --theme-secondary-color-RGB: <?php echo esc_attr(blonwe_rgba_selector(get_theme_mod( 'blonwe_dark_theme_secondary_color_rgb' ))); ?>;
}
<?php } ?>


<?php if(function_exists('dokan')){ ?>

	input[type='submit'].dokan-btn-theme,
	a.dokan-btn-theme,
	.dokan-btn-theme {
		background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
		border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	input[type='submit'].dokan-btn-theme .badge,
	a.dokan-btn-theme .badge,
	.dokan-btn-theme .badge {
		color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.dokan-announcement-uread {
		border: 1px solid <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?> !important;
	}
	.dokan-announcement-uread .dokan-annnouncement-date {
		background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?> !important;
	}
	.dokan-announcement-bg-uread {
		background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover {
		background: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover {
		background: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active {
		background: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.dokan-product-listing .dokan-product-listing-area table.product-listing-table td.post-status label.pending {
		background: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.product-edit-container .dokan-product-title-alert,
	.product-edit-container .dokan-product-cat-alert {
		color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.product-edit-container .dokan-product-less-price-alert {
		color: <?php echo esc_attr(get_theme_mod( 'blonwe_main_color' ) ); ?>;
	}
	.dokan-store-wrap {
	    margin-top: 3.5rem;
	}
	.dokan-widget-area ul {
	    list-style: none;
	    padding-left: 0;
	    font-size: .875rem;
	    font-weight: 400;
	}
	.dokan-widget-area ul li a {
	    text-decoration: none;
	    color: var(--color-text-lighter);
	    margin-bottom: .625rem;
	    display: inline-block;
	}
	form.dokan-store-products-ordeby:before, 
	form.dokan-store-products-ordeby:after {
		content: '';
		display: table;
		clear: both;
	}
	.dokan-store-products-filter-area .orderby-search {
	    width: auto;
	}
	input.search-store-products.dokan-btn-theme {
	    border-top-left-radius: 0;
	    border-bottom-left-radius: 0;
	}
	.dokan-pagination-container .dokan-pagination li a {
	    display: -webkit-inline-box;
	    display: -ms-inline-flexbox;
	    display: inline-flex;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    -webkit-box-pack: center;
	    -ms-flex-pack: center;
	    justify-content: center;
	    font-size: .875rem;
	    font-weight: 600;
	    width: 2.25rem;
	    height: 2.25rem;
	    border-radius: 50%;
	    color: currentColor;
	    text-decoration: none;
	    border: none;
	}
	.dokan-pagination-container .dokan-pagination li.active a {
	    color: #fff;
	    background-color: var(--color-secondary) !important;
	}
	.dokan-pagination-container .dokan-pagination li:last-child a, 
	.dokan-pagination-container .dokan-pagination li:first-child a {
	    width: auto;
	}

	.vendor-customer-registration label {
	    margin-right: 10px;
	}

	.woocommerce-mini-cart dl.variation {
	    display: none;
	}

	.product-name dl.variation {
	    display: none;
	}

	.seller-rating .star-rating span.width + span {
	    display: none;
	}
	
	.seller-rating .star-rating {width: 70px;display: block;}

<?php } ?>

<?php if (function_exists('get_wcmp_vendor_settings') && is_user_logged_in()) {
	if(is_vendor_dashboard()){	
} ?>

.woosc-popup, div#woosc-area {
    display: none;
}
	
.select-location {
    display: none;
}
	
<?php } ?>

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-topbar{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-topbar a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-topbar a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_top_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-main,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-mobile-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_main_bg_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-mobile-main{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-action.row-style .action-text{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-action .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_main_icon_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-action .action-count {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_main_icon_count_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_main_icon_count_color' ) ); ?>;
}
	
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-bottom{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-bottom a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-bottom a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-bottom .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type1 .header-bottom .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header1_bottom_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-topbar{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-topbar a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-topbar a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_top_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-mobile-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-action.row-style .action-text,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-action .action-text{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-action .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_icon_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-action .action-count {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_icon_count_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_main_icon_count_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-bottom{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-bottom a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_font_color' ) ); ?>;
}


body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-bottom a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-bottom .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type2 .header-bottom .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header2_bottom_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom a.help-center-color{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_help_center_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-topbar{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-topbar a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-topbar a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_top_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-main,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-mobile-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-main a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-main a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-main .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-main .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-action .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_icon_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type3 .header-action .action-count {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_icon_count_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header3_main_icon_count_color' ) ); ?>;
}

<?php if (get_theme_mod( 'blonwe_toggle_menu_button' )) { ?>
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.custom-toggle .action-link{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_toggle_button_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_toggle_button_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.custom-toggle .action-link:hover{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_toggle_button_bg_hvrcolor' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.toggle-button .action-icon,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.toggle-button .action-text{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_toggle_button_font_color' ) ); ?> !important;
}
<?php } ?>

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom .dropdown-categories > a.gray::before{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_title_bg_color' ) ); ?> ;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_title_border_color' ) ); ?> ;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom .dropdown-categories > a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_title_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom .dropdown-categories .dropdown-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_bg_color' ) ); ?> ;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom:not(.color-layout-black) .dropdown-categories .dropdown-menu{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom:not(.color-layout-black) .dropdown-categories .dropdown-menu #category-menu a,
.mega-grouped-items .mega-grouped-label{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_font_color' ) ); ?> ;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom:not(.color-layout-black) .dropdown-categories .dropdown-menu #category-menu a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_font_hvrcolor' ) ); ?> ;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom .dropdown-categories .dropdown-menu .menu-item-object-product_cat a i,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .header-bottom .dropdown-categories .dropdown-menu .menu-item-object-custom a i {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_sidebar_menu_icon_color' ) ); ?> !important ;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .klb-count-notification{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_top_notification_count_date_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_top_notification_count_date_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .klb-count-notification .klb-countdown-wrapper .klb-countdown .count-item{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_top_notification_countdown_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_top_notification_countdown_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-main .header-decorator{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header_main_decorator_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-search-form .search-form button{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header_search_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header_search_icon_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-search-form .search-form button:hover{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header_search_bg_hvrcolor' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-search-form .search-form.form-style-primary input{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header_search_border_color' ) ); ?> !important;
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header_search_input_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-topbar{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-topbar a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-topbar a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_top_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-main,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-mobile-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-main a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-main a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-main .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-main .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-action .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_icon_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type4 .header-action .action-count {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_icon_count_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header4_main_icon_count_color' ) ); ?>;
}


body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-topbar{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-topbar a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-topbar a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_top_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5.header-transparent-desktop .header-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-main a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-main a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-main .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-main .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-action .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_icon_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type5 .header-action .action-count {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_icon_count_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header5_main_icon_count_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-topbar{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_font_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-topbar a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-topbar a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-topbar .klb-menu-nav .klb-menu > li .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_top_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-main{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-mobile-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-action.row-style .action-text,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-action .action-text{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-action .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_icon_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-action .action-count {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_icon_count_bg_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_main_icon_count_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-bottom{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_bg_color' ) ); ?> !important;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-bottom a{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_font_color' ) ); ?>;
}


body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-bottom a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-bottom .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_submenu_font_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .header-bottom .klb-menu-nav.primary-menu .klb-menu .mega-menu > .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_submenu_font_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header.header-type6 .klb-menu-nav.primary-menu.menu-seperate .klb-menu > .menu-item + .menu-item{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_header6_bottom_menu_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-newsletter{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_subscribe_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer_subscribe_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-newsletter .newsletter-text .entry-title {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_subscribe_title_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-newsletter .newsletter-text .entry-caption p {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_subscribe_subtitle_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-widgets {
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_main_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_main_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_main_title_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-widgets .widget .widget-title {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_main_title_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-widgets .widget_nav_menu ul li a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_main_subtitle_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-social{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_social_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_social_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-social .footer-inner{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_social_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-copyright{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_bottom_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-copyright .payment-cards-label,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-copyright .card-item {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_bottom_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type1 .footer-row.footer-copyright .site-copyright p{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer1_copyright_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-widgets {
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_main_border_color' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_main_title_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-widgets .widget .widget-title {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_main_title_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-widgets .widget_nav_menu ul li a {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_main_subtitle_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-social{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_social_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_social_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-social .footer-inner{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_social_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-copyright{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_bottom_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_bottom_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-copyright .payment-cards-label,
body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-copyright .card-item {
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_bottom_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .footer-type2 .footer-row.footer-copyright .site-copyright p{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_footer2_copyright_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button.bordered a{
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_border_color' ) ); ?> !important;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button.bordered a:hover{
	border-color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_border_hvrcolor' ) ); ?> !important;
	background-color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_bg_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button .action-text span{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button .action-text span:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button a .action-text p{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_scnd_color' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button a .action-text p:hover{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_scnd_hvrcolor' ) ); ?>;
}

body[data-theme=<?php echo get_theme_mod('blonwe_skin_type','light'); ?>] .site-header .header-action.location-button a .action-icon{
	color: <?php echo esc_attr(get_theme_mod( 'blonwe_lct_icon_color' ) ); ?>;
}
:root {
<?php
	// Body Typography
    $bodyfont = get_theme_mod('blonwe_body_typography', []); 
	
	if ( isset( $bodyfont['font-family'] ) ) {
		echo '--theme-body-font: '.$bodyfont['font-family'].';'; 
	}
	
	if ( isset( $bodyfont['font-size'] ) ) {
		echo '--theme-body-font-size: '.$bodyfont['font-size'].';'; 
	}
	
	if ( isset( $bodyfont['variant'] ) ) {
		echo '--theme-body-font-weight: '.$bodyfont['variant'].';'; 
	}
	
	if ( isset( $bodyfont['letter-spacing'] ) ) {
		echo '--theme-body-letter-spacing: '.$bodyfont['letter-spacing'].';'; 
	}
	
	if ( isset( $bodyfont['color'] ) ) {
		echo '--color-text: '.$bodyfont['color'].';'; 
	}
	
	// Heading Typography
    $headingfont = get_theme_mod('blonwe_heading_typography', []); 
	
	if ( isset( $headingfont['font-family'] ) ) {
		echo '--theme-heading-font: '.$headingfont['font-family'].';'; 
	}
	
	if ( isset( $headingfont['variant'] ) ) {
		echo '--theme-heading-font-weight: '.$headingfont['variant'].';'; 
	}
	
	if ( isset( $headingfont['letter-spacing'] ) ) {
		echo '--theme-heading-letter-spacing: '.$headingfont['letter-spacing'].';'; 
	}
	
	// Main Menu Typography
    $menufont = get_theme_mod('blonwe_menu_typography', []); 
	
	if ( isset( $menufont['font-family'] ) ) {
		echo '--theme-menu-font: '.$menufont['font-family'].';'; 
	}
	
	if ( isset( $menufont['font-size'] ) ) {
		echo '--theme-menu-font-size: '.$menufont['font-size'].';'; 
	}
	
	if ( isset( $menufont['variant'] ) ) {
		echo '--theme-menu-font-weight: '.$menufont['variant'].';'; 
	}
	
	if ( get_theme_mod('blonwe_menu_submenu_font_size') ) {
		echo '--theme-submenu-font-size: '.get_theme_mod('blonwe_menu_submenu_font_size').';'; 
	}
	
	if ( get_theme_mod('blonwe_menu_submenu_font_weight') ) {
		echo '--theme-sub-menu-font-weight: '.get_theme_mod('blonwe_menu_submenu_font_weight').';'; 
	}

	// Form Typography
    $formfont = get_theme_mod('blonwe_form_typography', []); 
	
	if ( isset( $formfont['font-family'] ) ) {
		echo '--theme-form-font: '.$formfont['font-family'].';'; 
	}
	
	if ( isset( $formfont['variant'] ) ) {
		echo '--theme-form-font-weight: '.$formfont['variant'].';'; 
	}
	
	if ( isset( $formfont['font-size'] ) ) {
		echo '--theme-form-font-size: '.$formfont['font-size'].';'; 
	}
	
	if ( isset( $formfont['letter-spacing'] ) ) {
		echo '--theme-form-letter-spacing: '.$formfont['letter-spacing'].';'; 
	}
	
	// Button Typography
    $buttonfont = get_theme_mod('blonwe_button_typography', []); 
	
	if ( isset( $buttonfont['font-family'] ) ) {
		echo '--theme-button-font: '.$buttonfont['font-family'].';'; 
	}
	
	if ( isset( $buttonfont['variant'] ) ) {
		echo '--theme-button-font-weight: '.$buttonfont['variant'].';'; 
	}
	
	if ( isset( $buttonfont['font-size'] ) ) {
		echo '--theme-button-font-size: '.$buttonfont['font-size'].';'; 
	}
	
	if ( isset( $buttonfont['letter-spacing'] ) ) {
		echo '--theme-button-letter-spacing: '.$buttonfont['letter-spacing'].';'; 
	}
	
	// Price Typography
    $pricefont = get_theme_mod('blonwe_price_typography', []); 
	
	if ( isset( $pricefont['font-family'] ) ) {
		echo '--theme-product-price-font: '.$pricefont['font-family'].';'; 
	}
	
	if ( isset( $pricefont['variant'] ) ) {
		echo '--theme-product-price-weight: '.$pricefont['variant'].';'; 
	}
	
	if ( isset( $pricefont['font-size'] ) ) {
		echo '--theme-product-price-font-size-desktop: '.$pricefont['font-size'].';'; 
	}
	
	if ( get_theme_mod('blonwe_price_font_size_mobile') ) {
		echo '--theme-product-price-font-size-mobile: '.get_theme_mod('blonwe_price_font_size_mobile').';'; 
	}
	
	// Product Name Typography
    $productnamefont = get_theme_mod('blonwe_product_name_typography', []); 
	
	if ( isset( $productnamefont['font-family'] ) ) {
		echo '--theme-product-name-font: '.$productnamefont['font-family'].';'; 
	}
	
	if ( isset( $productnamefont['variant'] ) ) {
		echo '--theme-product-name-weight: '.$productnamefont['variant'].';'; 
	}
	
	if ( isset( $productnamefont['font-size'] ) ) {
		echo '--theme-product-name-font-size-desktop: '.$productnamefont['font-size'].';'; 
	}
	
	if ( get_theme_mod('blonwe_product_name_font_size_mobile') ) {
		echo '--theme-product-name-font-size-mobile: '.get_theme_mod('blonwe_product_name_font_size_mobile').';'; 
	}

	// Top Bar Typography
    $topbarfont = get_theme_mod('blonwe_topbar_typography', []); 
	
	if ( isset( $topbarfont['font-family'] ) ) {
		echo '--theme-topbar-font: '.$topbarfont['font-family'].';'; 
	}
	
	if ( isset( $topbarfont['variant'] ) ) {
		echo '--theme-topbar-font-weight: '.$topbarfont['variant'].';'; 
	}
	
	if ( isset( $topbarfont['font-size'] ) ) {
		echo '--theme-topbar-font-size: '.$topbarfont['font-size'].';'; 
	}
	
	if ( get_theme_mod('blonwe_topbar_submenu_font_size') ) {
		echo '--theme-topbar-submenu-font-size: '.get_theme_mod('blonwe_topbar_submenu_font_size').';'; 
	}
	
	if ( get_theme_mod('blonwe_topbar_submenu_font_weight') ) {
		echo '--theme-topbar-submenu-font-weight: '.get_theme_mod('blonwe_topbar_submenu_font_weight').';'; 
	}

	if ( get_theme_mod('blonwe_topbar_height') ) {
		echo '--theme-topbar-height: '.get_theme_mod('blonwe_topbar_height').';'; 
	}
	
	// Border Radius
	if ( get_theme_mod('blonwe_border_radius_base') ) {
		echo '--theme-radius-base: '.get_theme_mod('blonwe_border_radius_base').';'; 
	}

	if ( get_theme_mod('blonwe_border_radius_form') ) {
		echo '--theme-radius-form: '.get_theme_mod('blonwe_border_radius_form').';'; 
	}
	
	if ( get_theme_mod('blonwe_site_width') ) {
		echo '--theme-site-width: '.get_theme_mod('blonwe_site_width').';'; 
	}
?>
}


<?php if (get_theme_mod( 'blonwe_header_main_padding_top' )) { ?>
.header-main .header-inner {
    padding-top: <?php echo esc_attr(get_theme_mod( 'blonwe_header_main_padding_top' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_header_main_padding_bottom' )) { ?>
.header-main .header-inner {
    padding-bottom: <?php echo esc_attr(get_theme_mod( 'blonwe_header_main_padding_bottom' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'blonwe_header_bottom_height' )) { ?>
.header-bottom .header-inner,
.klb-menu-nav.primary-menu .klb-menu > .menu-item > a {
    height: <?php echo esc_attr(get_theme_mod( 'blonwe_header_bottom_height' ) ); ?>;
}
<?php } ?>

.product-title {
    font-family: var(--theme-product-name-font);
}

</style>
<?php }
add_action('wp_head','blonwe_custom_styling');

?>