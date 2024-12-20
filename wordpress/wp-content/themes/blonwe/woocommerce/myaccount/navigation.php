<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

$current_user = wp_get_current_user();
?>

<div class="woocommerce-page-header style-1">
	<h1 class="woocommerce-page-title"><?php esc_html_e('My Account', 'blonwe'); ?></h1>
</div><!-- woocommerce-page-header -->
<div class="row content-wrapper">
    <div class="col col-12 col-lg-12 primary-column">
		<div class="my-account-wrapper">
			<div class="my-account-navigation">
				<nav class="woocommerce-MyAccount-navigation">
					<div class="user-detail">
						<div class="user-avatar"><?php echo substr($current_user->display_name, 0, 2); ?></div>
						<div class="user-info">
							<span><?php esc_html_e('Welcome back,', 'blonwe'); ?></span>
							<h4 class="entry-name"><?php echo esc_html($current_user->display_name); ?></h4>
						</div><!-- user-info -->
						<div class="user-menu-button">
							<i class="klb-icon-ellipsis"></i>
						</div><!-- user-menu-button -->
					</div><!-- user-detail -->
					<div class="woocommerce-MyAccount-navigation-menu" aria-label="<?php esc_html_e( 'Account pages', 'blonwe' ); ?>">
						<ul>
							<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
								<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
									<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
										<?php echo esc_html( $label ); ?>
									</a>

								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</nav>
			</div>
<?php do_action( 'woocommerce_after_account_navigation' ); ?>
