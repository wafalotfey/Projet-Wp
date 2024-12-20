<?php

namespace Elementor;

class Blonwe_Banner_Box4_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-banner-box4';
    }
    public function get_title() {
        return esc_html__('Banner Box 4 (K)', 'blonwe-core');
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

		$defaultbg = plugins_url( 'images/glasses-custom-image-01.png', __DIR__ );
		
		$repeater = new Repeater();
		
		/*****  CONTROLS TABS START   ******/
		$repeater->start_controls_tabs( 'image_tabs');
		$repeater->start_controls_tab( 'image_tab',
			[ 'label'  => esc_html__( 'Image', 'blonwe-core' ) ]
		);
		
        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
		/*****   END CONTROLS TAB ******/
		$repeater->end_controls_tab();
		/*****  CONTROLS TAB START   ******/
        $repeater->start_controls_tab( 'video_tab',
            [ 'label' => esc_html__( 'Video', 'blonwe-core' ) ]
        );
		
		$repeater->add_control( 'video',
            [
                'label' => esc_html__( 'Video', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
				'media_type' => 'video',
            ]
        );
		
		$repeater->end_controls_tab();
        $repeater->end_controls_tabs();
		/*****   END CONTROLS TABS ******/
		
		$repeater->add_control( 'image_position',
			[
				'label' => esc_html__( 'Image Position', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'left'	  => esc_html__( 'Left', 'blonwe-core' ),
					'right'	  => esc_html__( 'Right', 'blonwe-core' ),
				],
			]
		);
		
		$repeater->add_control( 'border',
			[
				'label' => esc_html__( 'Border', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'yes'	  => esc_html__( 'Yes', 'blonwe-core' ),
					'no'	  => esc_html__( 'No', 'blonwe-core' ),
				],
			]
		);

        $repeater->add_control( 'title',
            [
                'label' => esc_html__( 'Item Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'An easy way to choose the perfect lenses for your frame!',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'blonwe-core' )
            ]
        );
		
        $repeater->add_control( 'desc',
            [
                'label' => esc_html__( 'Item Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Duis varius viverra diam, eget volutpat lacus pellentesque non. Maecenas eros velit, lobortis eget neque at, tincidunt vehicula sem. Quisque nec sapien imperdiet, tristique massa in, dictum lorem.',
                'pleaceholder' => esc_html__( 'Enter item desc here.', 'blonwe-core' )
            ]
        );

        $repeater->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' )
            ]
        );
		
        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
		$this->add_control( 'banner_items',
            [
                'label' => esc_html__( 'Banner Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => ['url' => $defaultbg],
                        'title' => 'An easy way to choose the perfect lenses for your frame!',
						'desc' => 'Duis varius viverra diam, eget volutpat lacus pellentesque non. Maecenas eros velit, lobortis eget neque at, tincidunt vehicula sem. Quisque nec sapien imperdiet, tristique massa in, dictum lorem.',
                        'btn_title' => ' Shop Now ',
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $defaultbg],
                        'title' => 'An easy way to choose the perfect lenses for your frame!',
						'desc' => 'Duis varius viverra diam, eget volutpat lacus pellentesque non. Maecenas eros velit, lobortis eget neque at, tincidunt vehicula sem. Quisque nec sapien imperdiet, tristique massa in, dictum lorem.',
                        'btn_title' => ' Shop Now ',
                        'btn_link' => '#',
                    ],
                ]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		
		echo '<div class="custom-background padding">';
		echo '<div class="custom-background-inner pt-60 pt-md-120 pb-60 pb-md-120" style="background: linear-gradient(156.65deg, #92A3BB 0.61%, #BDC7D5 36.45%, #C6D2E2 61.16%, #7289AB 101.84%) !important;">';
		echo '<div class="container">';
		
		foreach ( $settings['banner_items'] as $item ) {
			$target = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';	
			
			
			$imageposition= '';
			
			if($item['image_position'] == 'right'){
				$imageposition .= 'reverse';
			} else {
				$imageposition .= '';
			}
			
			echo '<div class="glasses-banner-slider '.esc_attr($imageposition).'">';
			echo '<div class="image-content">';
			if($item['video']['url']){
				echo '<video autoplay playsinline loop muted src="'.esc_url($item['video']['url']).'"></video>';
				
			} else {
				echo '<img src="'.esc_url($item['image']['url']).'" data-sizes="auto" />';
			}
			echo '</div><!-- image-content -->';
			echo '<div class="text-content">';
			echo '<h3 class="entry-title font-md-46 weight-400 mb-md-20">'.esc_html($item['title']).'</h3>';
			echo '<div class="entry-description font-md-18 mb-20">';
			echo '<p>'.esc_html($item['desc']).'</p>';
			echo '</div><!-- entry-description -->';
			if($item['btn_title']){
				echo '<a href="'.esc_url($item['btn_link']['url']).'" class="btn text icon-right radius-rounded" '.esc_attr($target.$nofollow).'>'.esc_html($item['btn_title']).'  <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div><!-- text-content -->';
			echo '</div><!-- glasses-banner-slider -->';
			
			if($item['border'] == 'yes'){
				echo '<div class="klb-separator mt-30"></div>';
			}
		}
		
		echo '</div><!-- container -->';
		echo '</div><!-- custom-background-inner -->';
		echo '</div><!-- custom-background -->';
		
		
	}

}
