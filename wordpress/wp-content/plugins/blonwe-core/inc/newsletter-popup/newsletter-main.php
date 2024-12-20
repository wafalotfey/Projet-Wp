<?php 

/*************************************************
## Get Newsletter Types
*************************************************/
if(get_theme_mod('blonwe_newsletter_type') == 'type4'){
	require_once( __DIR__ . '/newsletter4/newsletter.php' );
}elseif(get_theme_mod('blonwe_newsletter_type') == 'type3'){
	require_once( __DIR__ . '/newsletter3/newsletter.php' );
}elseif(get_theme_mod('blonwe_newsletter_type') == 'type2'){
	require_once( __DIR__ . '/newsletter2/newsletter.php' );
} else {
	require_once( __DIR__ . '/newsletter1/newsletter.php' );
}