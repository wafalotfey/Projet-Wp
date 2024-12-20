<?php

namespace Elementor;

class Blonwe_Image_Search_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-image-search-box';
    }
    public function get_title() {
        return esc_html__('Image Search Box (K)', 'blonwe-core');
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'blonwe' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultimage = plugins_url( 'images/book-custom-image-1.png', __DIR__ );
		$defaultimage2 = plugins_url( 'images/book-custom-image-2.png', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$this->add_control( 'decorative_image',
            [
                'label' => esc_html__( 'Decorative Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage2],
            ]
        );
		
		$this->add_control( 'sale_title',
            [
                'label' => esc_html__( 'Sale Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '<span>%</span>50',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' ),
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Find the book youre looking for easier to read.',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' ),
            ]
        );
		
		$this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Mauris urna ligula, luctus a molestie non, placerat id odio. Morbi dolor tortor, hendrerit sed tellus a, scelerisque ullamcorper nunc. Vestibulum vel tellus vel eros tincidunt volutpat.',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'blonwe-core' ),
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Buy your first book <strong class="color-red">-50%</strong> and start reading now',
                'pleaceholder' => esc_html__( 'Enter item description here.', 'blonwe-core' )
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		echo '<div class="custom-background pt-40 pt-md-10" style="background-color: #faf8f6;">';
		echo '<div class="container">';
		echo '<div class="row align-items-center justify-content-between">';
		echo '<div class="col col-12 col-lg-5 pb-md-40">';
		echo '<div class="text-block">';
		echo '<h1 class="entry-title font-md-66 weight-700 mb-15">'.esc_html($settings['title']).'</h1>';
		echo '<div class="entry-description color-dark-gray">';
		echo '<p>'.esc_html($settings['subtitle']).'</p>';
		echo '</div>';
		echo '</div>';
		
		echo '<div class="content-search mt-20 mt-md-40">';
		echo '<div class="search-holder">';
		echo '<form action="' . wc_get_page_permalink( 'shop' ) . '" class="search-form">';
		echo '<input class="form-control search-input variation-default" type="search" name="s" value="' . get_search_query() . '" placeholder="'.esc_attr__('Which book are you looking for?','blonwe-core').'" autocomplete="off">';
		echo '<button type="submit" class="btn primary">'.esc_html__('Search','blonwe-core').'</button>';
		echo '</form>';
		echo '</div><!-- search-holder -->';
		echo '</div><!-- content-search -->';
		
		echo '<div class="entry-description color-dark-gray font-13 mt-20">';
		echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col col-12 col-lg-6 mt-30 mt-md-0 position-relative">';
		echo '<div class="entry-decorative min-1024" style="left: 10%; top: 7%;">';
		echo '<img src="'.esc_url($settings['decorative_image']['url']).'">';
		echo '</div>';
		if($settings['sale_title']){
		echo '<div class="entry-decorative min-1024 animation-float-bob-y" style="left: 6%; top: 22%;">';
		echo '<div class="sale-stamp background-secondary">';
		echo '<p>'.blonwe_sanitize_data($settings['sale_title']).'</p>';
		echo '</div>';
		echo '</div>';
		}
		echo '<div class="entry-media image-block">';
		echo '<img src="'.esc_url($settings['image']['url']).'">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

}
