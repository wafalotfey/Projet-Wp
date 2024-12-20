<?php

/*************************************************
## blonwe Metabox
*************************************************/

if ( ! function_exists( 'rwmb_meta' ) ) {
  function rwmb_meta( $key, $args = '', $post_id = null ) {
   return false;
  }
 }

add_filter( 'rwmb_meta_boxes', 'blonwe_register_page_meta_boxes' );

function blonwe_register_page_meta_boxes( $meta_boxes ) {
	
$prefix = 'klb_';
$meta_boxes = array();

/* ----------------------------------------------------- */
// Product Specification Tab
/* ----------------------------------------------------- */

$meta_boxes[] = [
	'id'      => 'klb_product_specification_tab',
	'title'   => esc_html__( 'Product Specification', 'blonwe' ),
	'pages' => array( 'product' ),
	'context' => 'normal',
	'priority' => 'low',
	'fields'  => [
		[
			'type'    => 'wysiwyg',
			'id'      => $prefix . 'product_specification',
		],
	],
];

/* ----------------------------------------------------- */
// Blog Post Slides Metabox
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-gallery',
	'title'		=> esc_html__('Blog Post Image Slides','blonwe'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> esc_html__('Blog Post Slider Images','blonwe'),
			'desc'	=> esc_html__('Upload unlimited images for a slideshow - or only one to display a single image.','blonwe'),
			'id'	=> $prefix . 'blogitemslides',
			'type'	=> 'image_advanced',
		)
		
	)
);

/* ----------------------------------------------------- */
// Blog Audio Post Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'klb-blogmeta-audio',
	'title' => esc_html('Audio Settings','blonwe'),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		array(
			'name'		=> esc_html('Audio Code','blonwe'),
			'id'		=> $prefix . 'blogaudiourl',
			'desc'		=> esc_html__('Enter your Audio URL(Oembed) or Embed Code.','blonwe'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'sanitize_callback' => 'none'
		),
	)
);



/* ----------------------------------------------------- */
// Blog Video Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-video',
	'title'		=> esc_html__('Blog Video Settings','blonwe'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> esc_html__('Video Type','blonwe'),
			'id'		=> $prefix . 'blog_video_type',
			'type'		=> 'select',
			'options'	=> array(
				'youtube'		=> esc_html__('Youtube','blonwe'),
				'vimeo'			=> esc_html__('Vimeo','blonwe'),
				'own'			=> esc_html__('Own Embed Code','blonwe'),
			),
			'multiple'	=> false,
			'std'		=> array( 'no' ),
			'sanitize_callback' => 'none'
		),
		array(
			'name'	=> blonwe_sanitize_data(__('Embed Code<br />(Audio Embed Code is possible, too)','blonwe')),
			'id'	=> $prefix . 'blog_video_embed',
			'desc'	=> blonwe_sanitize_data(__('Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br />This will show the Video <strong>INSTEAD</strong> of the Image Slider.<br /><strong>Of course you can also insert your Audio Embedd Code!</strong>','blonwe')),
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		)
	)
);

return $meta_boxes;
}
