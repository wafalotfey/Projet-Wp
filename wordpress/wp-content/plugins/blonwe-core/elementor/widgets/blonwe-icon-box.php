<?php

namespace Elementor;

class Blonwe_Icon_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-icon-box';
    }
    public function get_title() {
        return esc_html__('Icon Box (K)', 'blonwe-core');
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
				'label' => esc_html__( 'Icon Box Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'blonwe-core' ),
					'type1'	  => esc_html__( 'Type 1', 'blonwe-core' ),
					'type2'	  => esc_html__( 'Type 2', 'blonwe-core' ),
					'type3'	  => esc_html__( 'Type 3', 'blonwe-core' ),
					'type4'	  => esc_html__( 'Type 4', 'blonwe-core' ),
					'type5'	  => esc_html__( 'Type 5', 'blonwe-core' ),
				],
			]
		);
		
		$defaultbg = plugins_url( 'images/coupon-custom-image-01.png', __DIR__ );
		
		$this->start_controls_tabs( 'icon_tabs');
		$this->start_controls_tab( 'image_tab',
			[ 'label'  => esc_html__( 'Image', 'blonwe-core' ) ]
		);
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
		/*****   END CONTROLS TAB ******/
		$this->end_controls_tab();
		/*****  CONTROLS TAB START   ******/
        $this->start_controls_tab( 'icon_tab',
            [ 'label' => esc_html__( 'Icon', 'blonwe-core' ) ]
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
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klb-delivery-icon-ship-o',
                'description'=> 'You can add icon code. for example: klb-delivery-icon-ship-o',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
		
		$this->end_controls_tab();
        $this->end_controls_tabs();
		/*****   END CONTROLS TABS ******/

       $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter title here', 'blonwe-core' ),
                'default' => 'Free Delivery',
            ]
        );
		
       $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'blonwe-core' ),
                'default' => 'Free shipping on all order',
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Browse Cash Back',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
				'condition' => ['box_type' => ['type4']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' ),
				'condition' => ['box_type' => ['type4']]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('blonwe_styling',
            [
                'label' => esc_html__( ' Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
		
		$this->add_responsive_control( 'icon_right',
            [
                'label' => esc_html__( 'Icon Right', 'blonwe-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox-icon' => 'margin-right: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'blonwe-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox-icon' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_bg_color',
           [
               'label' => esc_html__( 'Icon Background Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox-icon' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_color',
           [
               'label' => esc_html__( 'Icon Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox-icon' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .iconbox-icon:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'icon_text_shadow',
				'selector' => '{{WRAPPER}} .iconbox-icon',
			]
		);
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .iconbox-icon' => 'opacity: {{VALUE}};'],
				
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .entry-title',
				
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .iconbox-content p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'blonwe-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox-content p:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .iconbox-content p' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .iconbox-content p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} .iconbox-content p',
				
            ]
        );

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';

		$icontype= '';
			
		if($settings['box_type'] == 'type5'){
			$icontype .= 'with-image dark-style';
		} elseif($settings['box_type'] == 'type4'){
			$icontype .= 'with-image';
		} elseif($settings['box_type'] == 'type3'){
			$icontype .= 'colored';
		} elseif($settings['box_type'] == 'type2'){
			$icontype .= 'style-2';
		} else {
			$icontype .= '';
		}
			
		echo '<div class="klb-module module-iconbox '.esc_attr($icontype).'">';
		echo '<div class="module-body">';
		echo '<div class="iconbox-icon">';
		
		if($settings['image']['url']){
			echo '<img src="'.esc_url($settings['image']['url']).'">';
		} else {
			if($settings['switcher_icon'] == 'yes'){
				echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
			} else {
				Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
			}
		}			
		
		echo '</div>';
		echo '<div class="iconbox-content">';
		echo '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
		echo '<p>'.blonwe_sanitize_data($settings['desc']).'</p>';
		
		if($settings['box_type'] == 'type4'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button link icon-right">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
		}
		
		echo '</div> ';
		echo '</div> ';
		echo '</div>'; 
		
	}

}
