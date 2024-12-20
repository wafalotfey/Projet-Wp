<?php

/**
 * Add wp-rocket coolie for cache
 * @param array<string,mixed> $cookies
 * @return array<string,mixed>
 */
function weglot_mandatory_cookie( $cookies ) {
	$cookies[] = 'weglot_wp_rocket_cache';

	return $cookies;
}

/**
 * Flush wp-rocket htaccess and config file
 * @return bool
 */
function flush_wp_rocket() {

	if ( ! function_exists( 'flush_rocket_htaccess' )
	     || ! function_exists( 'rocket_generate_config_file' ) ) {
		return false;
	}

	// Update WP Rocket .htaccess rules.
	flush_rocket_htaccess();

	// Regenerate WP Rocket config file.
	rocket_generate_config_file();
	return true;
}
