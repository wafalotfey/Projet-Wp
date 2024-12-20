<?php

namespace WeglotWP\Models;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Hooks interface
 *
 * @since 2.0
 *
 */
interface Hooks_Interface_Weglot {
	/**
	 * @return mixed
	 */
	public function hooks();
}
