<?php

namespace Elementor;

class Blonwe_Image_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-image-box';
    }
    public function get_title() {
        return esc_html__('Image Box (K)', 'blonwe-core');
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
		
		$this->add_control( 'box_type',
			[
				'label' => esc_html__( 'Box Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'	  => esc_html__( 'Type 3', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'bg_color',
           [
               'label' => esc_html__( 'Background Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '#d2f4fe',
               'selectors' => ['{{WRAPPER}} .klb-promo-box' => 'background-color: {{VALUE}};'],
			   'condition' => ['box_type' => ['type1', 'type2']]
           ]
        );
		
		$defaultimage = plugins_url( 'images/promo-image-medical-01.png', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Medicine',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' ),
            ]
        );
		
		$this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'New Collection',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' ),
				'condition' => ['box_type' => ['type3']]
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Class aptent taciti sociosqu ad...',
                'pleaceholder' => esc_html__( 'Enter item description here.', 'blonwe-core' )
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		if($settings['box_type'] == 'type3'){
			echo '<div class="product-promotion list-style">';
			echo '<div class="product">';
			echo '<div class="product-wrapper">';
			echo '<div class="product-inner">';
			echo '<div class="thumbnail-wrapper entry-media">';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="product-thumbnail">';
			echo '<img src="'.esc_url($settings['image']['url']).'">';
			echo '</a>';
			echo '</div>';
			echo '<div class="content-wrapper">';
			echo '<div class="product-badge">'.esc_html($settings['subtitle']).'</div>';
			echo '<h3 class="product-title"><a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($settings['title']).'</a></h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			if($settings['btn_title']){
				echo '<div class="entry-footer">';
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn black outline icon-right">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
				echo '</div><!-- entry-footer -->';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['box_type'] == 'type2'){
			echo '<div class="klb-promo-box color-black">';
			echo '<div class="promo-content text-center">';
			echo '<h3 class="entry-title font-20 font-md-24 weight-500">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description font-md-18 weight-300">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn primary icon-right mt-10">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			echo '</div>';
			echo '<div class="promo-image">';
			echo '<img src="'.esc_url($settings['image']['url']).'" alt="">';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="klb-promo-box style-2 color-black">';
			echo '<div class="promo-image bordered-bottom border-theme-10">';
			echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto" />';
			echo '</div>';
			echo '<div class="promo-content text-center">';
			echo '<h3 class="entry-title font-15 font-md-18 weight-600">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description font-md-14 weight-300">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn primary icon-right mt-10">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			echo '</div>';
			echo '</div>';
		}
	}

}
