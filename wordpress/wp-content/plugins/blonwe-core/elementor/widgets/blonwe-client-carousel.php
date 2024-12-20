<?php

namespace Elementor;

class Blonwe_Client_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-client-carousel';
    }
    public function get_title() {
        return esc_html__('Client Carousel (K)', 'blonwe-core');
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
				'label' => esc_html__( 'Content', 'blonwe-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '7',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'2' 	  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
					'4'		  => esc_html__( '4 Columns', 'blonwe-core' ),
					'5'		  => esc_html__( '5 Columns', 'blonwe-core' ),
					'6'		  => esc_html__( '6 Columns', 'blonwe-core' ),
					'7'		  => esc_html__( '7 Columns', 'blonwe-core' ),
					'8'		  => esc_html__( '8 Columns', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'blonwe-core' ),
					'1' 	  => esc_html__( '1 Column', 'blonwe-core' ),
					'2'		  => esc_html__( '2 Columns', 'blonwe-core' ),
					'3'		  => esc_html__( '3 Columns', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '5000',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'blonwe-core' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$defaultbg = plugins_url( 'images/logo-1.png', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Image Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
        $this->add_control( 'client_items',
            [
                'label' => esc_html__( 'Client Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
					[
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
					[
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],

                ]
            ]
        );
		
		$this->add_control( 'image_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '0.5',
                'selectors' => ['{{WRAPPER}} .logo-block a img ' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_control( 'image_hover_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity Hover', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '0.5',
                'selectors' => ['{{WRAPPER}} .logo-block a:hover img ' => 'opacity: {{VALUE}} ;'],
            ]
        );

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if ( $settings['client_items'] ) {
			echo '<div class="klb-module module-logofolio">';
			echo '<div class="module-body klb-slider-wrapper">';
			echo '<div class="klb-loader-wrapper">';
			echo '<div class="klb-loader" data-size="" data-color="" data-border=""></div>';
			echo '</div>';    
			echo '<div class="klb-slider carousel-style products arrows-center arrows-style-1 arrows-white-border hidden-arrows dots-style-1 gutter-15" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="4" data-css="cubic-bezier(.48,0,.12,1)" data-speed="600" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="false" data-dots="false" data-infinite="true">';
			
			foreach ( $settings['client_items'] as $item ) {
				$target = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="slider-item">';
				echo '<div class="logo-block">';
				echo '<a href="'.esc_url($item['btn_link']['url']).'" '.esc_attr($target.$nofollow).'><img src="'.esc_url($item['image']['url']).'" alt="image"></a>';
				echo '</div>';
				echo '</div>';
			}
		
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
		
	}

}
