<?php

namespace Elementor;

class Blonwe_Address_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-address-box';
    }
    public function get_title() {
        return esc_html__('Address Box (K)', 'blonwe-core');
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
		
		$this->add_control( 'box_type',
			[
				'label' => esc_html__( 'Address Box Type', 'blonwe-core' ),
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
		
		$this->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'blonwe-core' ),
				'label_off' => esc_html__( 'No', 'blonwe-core' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => ['box_type' => ['type3']]
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'blonwe-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '', 'box_type' => ['type3']],
			]
		);
		
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klb-ecommerce-icon-online-store-thin',
                'description'=> 'You can add icon code. for example: klb-delivery-icon-ship-o',
				'condition' => ['switcher_icon' => 'yes', 'box_type' => ['type3']],
            ]
        );
		
		$this->add_control( 'icon_number',
            [
                'label' => esc_html__( 'Icon Number', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '01',
				'label_block' => true,
				'condition' => ['box_type' => ['select-type', 'type1']]
            ]
        );
		
        $this->add_control( 'country',
            [
                'label' => esc_html__( 'Country', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'United States',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'country_subtitle',
            [
                'label' => esc_html__( 'Country Subtitle', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'United States Office',
				'label_block' => true,
				'condition' => ['box_type' => ['select-type', 'type1']]
            ]
        );
		
        $this->add_control( 'address',
            [
                'label' => esc_html__( 'Address', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '205 Middle Road, 2nd Floor, New York',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'phone',
            [
                'label' => esc_html__( 'phone', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '+02 1234 567 88',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'email',
            [
                'label' => esc_html__( 'Email', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'info@example.com',
				'label_block' => true,
            ]
        );
		
		/*****   END CONTROLS SECTION   ******/
		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if($settings['box_type'] == 'type3'){
			echo '<div class="klb-address-detail style-3">';
			echo '<div class="address-icon color-red">';
			
			if($settings['switcher_icon'] == 'yes'){
				echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
			} else {
				Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
			}	
			
			echo '</div>';
			echo '<div class="address-detail">';
			echo '<div class="address-title">'.esc_html($settings['country']).'</div>';
			echo '<p class="address">'.blonwe_sanitize_data($settings['address']).'</p>';
			if($settings['phone']){
				echo '<p class="phone"><a href="tel:'.esc_attr($settings['phone']).'">'.esc_html($settings['phone']).'</a></p>';
			}
			if($settings['email']){
				echo '<a href="mailto:'.esc_attr($settings['email']).'" class="email">'.esc_html($settings['email']).'</a>';
			}
			echo '</div>';
			echo '</div>';
		} elseif($settings['box_type'] == 'type2'){	
			echo '<div class="klb-address-detail style-2">';
			echo '<div class="address-detail">';
			echo '<div class="address-title">'.esc_html($settings['country']).'</div>';
			echo '<p class="address">'.blonwe_sanitize_data($settings['address']).'</p>';
			if($settings['phone']){
				echo '<p class="phone"><a href="tel:'.esc_attr($settings['phone']).'">'.esc_html($settings['phone']).'</a></p>';
			}
			if($settings['email']){
				echo '<a href="mailto:'.esc_attr($settings['email']).'" class="email">'.esc_html($settings['email']).'</a>';
			}
			echo '</div>';
			echo '</div>';
		} else {			  		  
			echo '<div class="klb-address-detail style-1">';
			echo '<div class="address-icon number">'.esc_html($settings['icon_number']).'</div>';
			echo '<div class="address-detail">';
			echo '<div class="address-country">'.esc_html($settings['country']).'</div>';
			echo '<div class="address-title">'.esc_html($settings['country_subtitle']).'</div>';
			echo '<p class="address">'.esc_html($settings['address']).'</p>';
			echo '<p class="phone"><a href="tel:'.esc_attr($settings['phone']).'">'.esc_html($settings['phone']).'</a></p>';
			echo '<a href="mailto:'.esc_attr($settings['email']).'" class="email">'.esc_html($settings['email']).'</a>';
			echo '</div>';
			echo '</div>';
		}
		
	}

}
