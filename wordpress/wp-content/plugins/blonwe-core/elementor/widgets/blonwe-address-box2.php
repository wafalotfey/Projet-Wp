<?php

namespace Elementor;

class Blonwe_Address_Box2_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-address-box2';
    }
    public function get_title() {
        return esc_html__('Address Box 2 (K)', 'blonwe-core');
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
		
		$defaultimage = plugins_url( 'images/book-custom-image-8.jpg', __DIR__ );
		
		$this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'country',
            [
                'label' => esc_html__( 'Country', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'BERLIN',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'country_subtitle',
            [
                'label' => esc_html__( 'Country Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Vestibulum condimen elit ut sagittis',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'country_desc',
            [
                'label' => esc_html__( 'Country Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Mauris quis leo id lacus volutpat rutrum. Ut arcu sapien.',
				'label_block' => true,
            ]
        );
		
		$repeater = new Repeater();
		$repeater->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'blonwe-core' ),
				'label_off' => esc_html__( 'No', 'blonwe-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'blonwe-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $repeater->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klb-ecommerce-icon-badge',
                'description'=> 'You can add icon code. for example: klb-ecommerce-icon-badge',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
		
		$repeater->add_control( 'address_type',
			[
				'label' => esc_html__( 'Address Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'address',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'address' 	  => esc_html__( 'Address ', 'blonwe-core' ),
					'phone'	 	  => esc_html__( 'Phone ', 'blonwe-core' ),
					'mail'	 	  => esc_html__( 'Mail ', 'blonwe-core' ),
				],
			]
		);
		
		$repeater->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter title here', 'blonwe-core' ),
                'default' => 'Autoseligen syr. Nek diarask fröbomba.',
            ]
        );
		
		$repeater->add_control( 'link',
            [
                'label' => esc_html__( 'Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' )
            ]
        );
		
		$this->add_control( 'address_items',
            [
                'label' => esc_html__( 'Address Items', 'blonwe-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'custom_icon' => 'klb-icon-location-dot',
						'title' => 'Autoseligen syr. Nek diarask fröbomba.',
						'address_type' => 'address',
						'link' => '#',
                    ],
                    [
						'custom_icon' => 'klb-icon-square-phone',
						'title' => ' 0 800 300-353',
						'address_type' => 'phone',
						'link' => '#',
                    ],
                    [
						'custom_icon' => 'klb-icon-envelope-alt',
						'title' => 'info@example.com',
						'address_type' => 'mail',
						'link' => '#',
                    ],
                ]
            ]
        );
		
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		echo '<div class="shop-block style-2">';
		echo '<div class="shop-cover entry-medi">';
		echo '<img src="'.esc_url($settings['image']['url']).'" data-sizes="auto"/>';
		echo '</div>';
		echo '<div class="shop-content">';
		echo '<p class="entry-subtitle font-11 weight-600 letter-spacing-1 color-secondary mb-10">'.esc_html($settings['country']).'</p>';
		echo '<h3 class="entry-teaser font-md-18 weight-500 mb-10">'.esc_html($settings['country_subtitle']).'</h3>';
		echo '<div class="entry-description font-13 color-dark-gray">';
		echo '<p>'.esc_html($settings['country_desc']).'</p>';
		echo '</div>';
		echo '<div class="klb-separator mt-20"></div>';
		echo '<ul>';
		
			foreach($settings['address_items'] as $item){
				$target = $item['link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';	
			
				$addresstype= '';
			
				if($item['address_type'] == 'mail'){
					$addresstype .= 'mail';
				} elseif($item['address_type'] == 'phone'){
					$addresstype .= 'phone';
				} else {
					$addresstype .= 'address';
				}
			
				echo '<li class="'.esc_attr($addresstype).'">';
					if($item['switcher_icon'] == 'yes'){
						echo '<i class="'.esc_attr($item['custom_icon']).'"></i>';
					} else {
						Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'false' ] );						
					}  
				echo '<a href="'.esc_url($item['link']['url']).'" '.esc_attr($target.$nofollow).'>'.blonwe_sanitize_data($item['title']).'</a>';
				echo '</li>';
				
			}
			
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		
	}

}
