<?php

namespace Elementor;

class Blonwe_Product_Carousel2_Widget extends Widget_Base {
    use Blonwe_Helper;

    public function get_name() {
        return 'blonwe-product-carousel2';
    }
    public function get_title() {
        return esc_html__('Product Carousel 2 (K)', 'blonwe-core');
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
		
		$this->add_control( 'content_type',
			[
				'label' => esc_html__( 'Content Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' 	=> esc_html__( 'Select Type', 'blonwe-core' ),
					'type1' 	=> esc_html__( 'Style 1', 'blonwe-core' ),
					'type2'		=> esc_html__( 'Style 2', 'blonwe-core' ),
					'type3'		=> esc_html__( 'Style 3', 'blonwe-core' ),
					'type4'		=> esc_html__( 'Style 4', 'blonwe-core' ),
					'type5'		=> esc_html__( 'Style 5', 'blonwe-core' ),
					'type6'		=> esc_html__( 'Style 6', 'blonwe-core' ),
					'type7'		=> esc_html__( 'Style 7', 'blonwe-core' ),
				],
			]
		);
		
		$this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Latest Deals',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Etiam eget faucibus turpis, sit amet viverra eros. Maecenas eget vehicula nisl. Quisque imperdiet iaculis dignissim. In hac habitasse platea dictumst.',
                'description'=> 'Add a description.',
				'label_block' => true,
				'condition' => ['content_type' => ['type5','type6']]
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' ),
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
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
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'blonwe-core' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows_type',
			[
				'label' => esc_html__( 'Arrows Type', 'blonwe-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'arrows-style-1',
				'options' => [
					'select-type' 		=> esc_html__( 'Select Type', 'blonwe-core' ),
					'arrows-style-1' 	=> esc_html__( 'Style 1', 'blonwe-core' ),
					'arrows-style-2'	=> esc_html__( 'Style 2', 'blonwe-core' ),
				],
				'condition' => ['arrows' => 'true']
			]
		);

        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1200',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'blonwe-core' ),
            ]
        );

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->blonwe_query_elementor_controls($post_count = 7, $column = 6, $carousel = 'yes');
		/***** END QUERY CONTROLS SECTION *****/
		
		/* Countdown Start*/
		$this->start_controls_section(
			'countdown_section',
			[
				'label' => esc_html__( 'Countdown', 'blonwe-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'countdown',
			[
				'label' => esc_html__( 'Countdown', 'blonwe-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'blonwe-core' ),
				'label_off' => esc_html__( 'False', 'blonwe-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control('due_date',
			[
				'label' => esc_html__( 'Due Date', 'blonwe-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => '2023/12/15',
				'picker_options' => ['enableTime' => false],
				'condition' => ['countdown' => 'true']
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
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'blonwe-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'title_size',
            [
                'label' => esc_html__( 'Title Size', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .entry-title' => 'font-size: {{SIZE}}px !important;' ],
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
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'blonwe-core' ),

                'selector' => '{{WRAPPER}} a.btn  ',
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'blonwe-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn' => 'opacity: {{VALUE}} ;'],
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'blonwe-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn' => 'color: {{VALUE}};'],
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'blonwe-core' ),
                'selector' => '{{WRAPPER}} a.btn ',
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'blonwe-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]				
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'blonwe-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} a.btn',
				'condition' => ['content_type' => ['type1', 'type2', 'type3', 'type4', 'type7']]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		$headerstyle = '';
		$contentstyle = '';
		$contenttype = '';
		
		if($settings['content_type'] == 'type7'){
			$headerstyle .= 'border-thin';
			$contentstyle .= 'default centered';
			$contenttype .= 'gutter-10 align-start';
		} elseif($settings['content_type'] == 'type6'){
			$headerstyle .= 'extra-space centered';
			$contentstyle .= '';
			$contenttype .= 'gutter-10 align-start';
		} elseif($settings['content_type'] == 'type5'){
			$headerstyle .= 'extra-space centered';
			$contentstyle .= 'centered';
			$contenttype .= 'gutter-10 align-start';
		} elseif($settings['content_type'] == 'type4'){
			$headerstyle .= 'border-thin';
			$contentstyle .= 'bordered';
			$contenttype .= 'gutter-15 align-start';
		} elseif($settings['content_type'] == 'type3'){
			$headerstyle .= 'border-thin';
			$contentstyle .= '';
			$contenttype .= 'gutter-15 align-start';
		} elseif($settings['content_type'] == 'type2'){
			$headerstyle .= '';
			$contentstyle .= 'default hot-product';
			$contenttype .= 'gutter-5 align-start';
		} else {
			$headerstyle .= '';
			$contentstyle .= 'default hot';
			$contenttype .= 'bordered';
		}
		
		$output .= '<div class="klb-module module-carousel '.esc_attr($contentstyle).'">';
		$output .= '<div class="module-header default '.esc_attr($headerstyle).'">';
		$output .= '<div class="module-header-inner">';
		$output .= '<div class="column order-1 order-sm-1">';
		$output .= '<h3 class="entry-title default-size">'.esc_html($settings['title']).'</h3>';
		$output .= '</div>';
		
		if($settings['countdown'] == 'true'){
			
			$output .= '<div class="column sub-column order-3 order-sm-2">';
			$output .= '<div class="module-header-counter">';
			
				$date = date_create($settings['due_date']);
				$output .= '<div class="klb-countdown-wrapper">';
				$output .= '<div class="klb-countdown filled red size-md separate-second" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
				$output .= '<div class="count-item"><div class="count days"></div> <div class="count-label">'.esc_html('d', 'blonwe-core').'</div></div>';
				$output .= '<span class="sep-h">:</span>';
				$output .= '<div class="count-item"><div class="count hours"></div><div class="count-label">'.esc_html('h', 'blonwe-core').'</div></div>';
				$output .= '<span class="sep-m">:</span>';
				$output .= '<div class="count-item"><div class="count minutes"></div><div class="count-label">'.esc_html('m', 'blonwe-core').'</div></div>';
				$output .= '<span class="sep-s">:</span>';
				$output .= '<div class="count-item"><div class="count second"></div><div class="count-label">'.esc_html('s', 'blonwe-core').'</div></div>';
				$output .= '</div>';
				$output .= '</div>';   
				
			$output .= '</div>';
			$output .= '</div>';
		}
		
		if($settings['content_type'] !== 'type5' && $settings['content_type'] !== 'type6'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
			$output .= '<div class="column button-column order-2 order-sm-3">';
			$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn link icon-right link" '.esc_attr($target.$nofollow).'>';
			$output .= '<span class="button-text">'.esc_html($settings['btn_title']).'</span>';
			$output .= '<div class="button-icon">';
			$output .= '<i class="klb-icon-right-arrow-large"></i>';
			$output .= '</div>';
			$output .= '</a>';
			$output .= '</div>';
		}
		
		$output .= '</div>';
		
		if($settings['content_type'] == 'type5' || $settings['content_type'] == 'type6'){
			$output .= '<div class="entry-excerpt">';
			$output .= '<p>'.esc_html($settings['desc']).'</p>';
			$output .= '</div>';
		}
		
		$output .= '</div>';
		
		
		$output .= '<div class="module-body klb-slider-wrapper">';
		$output .= '<div class="klb-loader-wrapper">';
		$output .= '<div class="klb-loader" data-size="md" data-color="primary" data-border="sm"></div>';
		$output .= '</div>';
		$output .= '<div class="klb-slider carousel-style products arrows-center arrows-white-border hidden-arrows zoom-effect dots-style-1 '.esc_attr($settings['arrows_type']).' '.esc_attr($contenttype).'" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-css="cubic-bezier(.48,0,.12,1)" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-infinite="false">';		
		
		$output .= $this->blonwe_elementor_product_loop($settings, $productslider = 'yes');
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';    

		echo $output;
	}

}
