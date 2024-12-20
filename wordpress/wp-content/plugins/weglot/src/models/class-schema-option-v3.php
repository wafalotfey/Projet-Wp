<?php

namespace WeglotWP\Models;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WeglotWP\Helpers\Helper_Flag_Type;


class Schema_Option_V3 {

	/**
	 * @var string
	 */
	public $api_key;
	/**
	 * @var string
	 */
	public $api_key_private;
	/**
	 * @var bool
	 */
	public $allowed;
	/**
	 * @var string
	 */
	public $original_language;
	/**
	 * @var string
	 */
	public $language_from_custom_flag;
	/**
	 * @var string
	 */
	public $language_from_custom_name;
	/**
	 * @var string
	 */
	public $translation_engine;
	/**
	 * @var string
	 */
	public $destination_language;
	/**
	 * @var string
	 */
	public $private_mode;
	/**
	 * @var string
	 */
	public $auto_redirect;
	/**
	 * @var string
	 */
	public $autoswitch_fallback;
	/**
	 * @var string
	 */
	public $exclude_urls;
	/**
	 * @var string
	 */
	public $exclude_blocks;
	/**
	 * @var string
	 */
	public $custom_settings;
	/**
	 * @var string
	 */
	public $is_dropdown;
	/**
	 * @var string
	 */
	public $is_fullname;
	/**
	 * @var string
	 */
	public $with_name;
	/**
	 * @var string
	 */
	public $with_flags;
	/**
	 * @var string
	 */
	public $type_flags;
	/**
	 * @var string
	 */
	public $override_css;
	/**
	 * @var string
	 */
	public $email_translate;
	/**
	 * @var string
	 */
	public $active_search;
	/**
	 * @var string
	 */
	public $translate_amp;
	/**
	 * @var string
	 */
	public $wp_user_version;
	/**
	 * @var string
	 */
	public $has_first_settings;
	/**
	 * @var string
	 */
	public $show_box_first_settings;
	/**
	 * @var string
	 */
	public $custom_urls;
	/**
	 * @var string
	 */
	public $media_enabled;
	/**
	 * @var string
	 */
	public $external_enabled;
	/**
	 * @var string
	 */
	public $page_views_enabled;
	/**
	 * @var string
	 */
	public $flag_css;
	/**
	 * @var string
	 */
	public $menu_switcher;
	/**
	 * @var string
	 */
	public $active_wc_reload;
	/**
	 * @var string
	 */
	public $versions;
	/**
	 * @var string
	 */
	public $slugTranslation;
	/**
	 * @var string
	 */
	public $translation;
	/**
	 * @var string
	 */
	public $category;
	/**
	 * @var string
	 */
	public $organization_slug;
	/**
	 * @var string
	 */
	public $project_slug;

	/**
	 * @return array<string,mixed>
	 * @since 3.0.0
	 */
	public static function get_schema_options_v3_compatible() {
		$schema = array(
			'api_key'                   => 'api_key',
			'api_key_private'           => 'api_key_private',
			'allowed'                   => 'allowed',
			'original_language'         => 'language_from',
			'language_from_custom_flag' => 'language_from_custom_flag',
			'language_from_custom_name' => 'language_from_custom_name',
			'translation_engine'        => 'translation_engine',
			'destination_language'      => (object) array(
				'path' => 'languages',
				'fn'   => function ( $languages ) {
					$destinations = array();
					if ( ! $languages ) {
						return $destinations;
					}
					foreach ( $languages as $item ) {
						$destinations[] = array(
							'language_to'       => $item['language_to'],
							'custom_code'       => $item['custom_code'],
							'custom_name'       => $item['custom_name'],
							'custom_local_name' => $item['custom_local_name'],
							'public'            => $item['enabled'],
						);
					}

					return $destinations;
				},
			),
			'private_mode'              => (object) array(
				'path' => 'languages',
				'fn'   => function ( $languages ) {
					$private = array();
					foreach ( $languages as $item ) {
						if ( ! $item['enabled'] ) {
							$private[ $item['language_to'] ] = true;
						} else {
							$private[ $item['language_to'] ] = false;
						}
					}

					return $private;
				},
			),
			'auto_redirect'             => 'auto_switch',
			'autoswitch_fallback'       => 'auto_switch_fallback',
			'exclude_urls'              => 'excluded_paths',
			'exclude_blocks'            => (object) array(
				'path' => 'excluded_blocks',
				'fn'   => function ( $excluded_blocks ) {
					$excluded = array();
					if ( ! $excluded_blocks ) {
						return $excluded;
					}
					foreach ( $excluded_blocks as $item ) {
						$excluded[] = $item['value'];
					}

					return $excluded;
				},
			),
			'custom_settings'           => 'custom_settings',
			'is_dropdown'               => 'custom_settings.button_style.is_dropdown',
			'is_fullname'               => 'custom_settings.button_style.full_name',
			'with_name'                 => 'custom_settings.button_style.with_name',
			'with_flags'                => 'custom_settings.button_style.with_flags',
			'type_flags'                => (object) array(
				'path' => 'custom_settings.button_style.flag_type',
				'fn'   => function ( $flag_type ) {
					if ( $flag_type ) {
						return $flag_type;
					}

					return Helper_Flag_Type::RECTANGLE_MAT;
				},
			),
			'override_css'              => 'custom_settings.button_style.custom_css',
			'email_translate'           => 'custom_settings.translate_email',
			'active_search'             => 'custom_settings.translate_search',
			'translate_amp'             => 'custom_settings.translate_amp',
			'wp_user_version'           => 'custom_settings.wp_user_version',
			'has_first_settings'        => 'has_first_settings',
			'show_box_first_settings'   => 'show_box_first_settings',
			'custom_urls'               => (object) array(
				'path' => 'custom_urls',
				'fn'   => function ( $custom_urls ) {
					if ( $custom_urls ) {
						return $custom_urls;
					}

					return array();
				},
			),
			'media_enabled'             => 'media_enabled',
			'external_enabled'          => 'external_enabled',
			'page_views_enabled'        => 'page_views_enabled',
			'flag_css'                  => 'flag_css',
			'menu_switcher'             => 'menu_switcher',
			'active_wc_reload'          => 'active_wc_reload',
			'versions'                  => 'versions',
			'slugTranslation'           => 'versions.slugTranslation',
			'translation'               => 'versions.translation',
			'category'               => 'category',
			'organization_slug'               => 'organization_slug',
			'project_slug'               => 'project_slug',
		);

		return $schema;
	}
}
