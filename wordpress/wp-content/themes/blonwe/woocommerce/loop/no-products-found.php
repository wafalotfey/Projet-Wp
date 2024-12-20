<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="empty-content">
	<svg width="64" height="41" viewbox="0 0 64 41" xmlns="http://www.w3.org/2000/svg">
	  <g transform="translate(0 1)" fill="none" fill-rule="evenodd">
		<ellipse class="fill-slate-100" cx="32" cy="33" rx="32" ry="7"></ellipse>
		<g fill-rule="nonzero" class="stroke-slate-300" stroke="#d9d9d9">
		  <path d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z"></path>
		  <path class="fill-slate-50" d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z"></path>
		</g>
	  </g>
	</svg>

	<div class="empty-text">
		<h3 class="entry-title"><?php esc_html_e('No products found!', 'blonwe'); ?></h3>
		<div class="entry-description">
			<p><?php wc_print_notice( esc_html__( 'No products were found matching your selection.', 'blonwe' ), 'notice' ); ?></p>
		</div><!-- entry-description -->
	</div><!-- empty-text -->
</div><!-- empty-content -->
