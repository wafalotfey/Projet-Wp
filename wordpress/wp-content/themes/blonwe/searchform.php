<?php
/**
 * searchform.php
 * @package WordPress
 * @subpackage Blonwe
 * @since Blonwe 1.0
 * 
 */
 ?>
<div class="search_form">
	<form class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<input class="form_control" type="text" name="s" placeholder="<?php esc_attr_e('Search...', 'blonwe') ?>" autocomplete="off">
		<button type="submit"><i class="klb-icon-search-feather"></i></button>
	</form>
</div>