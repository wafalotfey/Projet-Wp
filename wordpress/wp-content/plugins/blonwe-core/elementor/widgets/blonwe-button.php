<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Blonwe_Button_Widget extends Widget_Base {
    use Blonwe_Helper;
    public function get_name() {
        return 'blonwe-button';
    }
    public function get_title() {
        return esc_html__('Button (K)', 'blonwe-core');
    }
    public function get_icon() {
        return 'eicon-button';
    }
    public function get_categories() {
        return [ 'blonwe' ];
    }
    public function get_style_depends() {
        return [ 'jquery-ui','magnific' ];
    }
    public function get_script_depends() {
        return [ 'jquery-ui', 'magnific' ];
    }
    // Registering Controls
    protected function register_controls() {

        /*****   Button Options   ******/
        $this->start_controls_section('blonwe_btn_settings',
            [
                'label' => esc_html__( 'Button', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'btn_action',
            [
                'label' => esc_html__( 'Action Type', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'link',
                'options' => [
                    'link' => esc_html__( 'Link', 'blonwe-core' ),
                    'image' => esc_html__( 'Single Image', 'blonwe-core' ),
                    'youtube' => esc_html__( 'Youtube', 'blonwe-core' ),
                    'vimeo' => esc_html__( 'Vimeo', 'blonwe-core' ),
                    'map' => esc_html__( 'Google Map', 'blonwe-core' ),
                    'html5' => esc_html__( 'HTML5 Video', 'blonwe-core' ),
                    'modal' => esc_html__( 'Modal Content', 'blonwe-core' ),
                ]
            ]
        );
        $this->add_control( 'link_type',
            [
                'label' => esc_html__( 'Link Type', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'external',
                'options' => [
                    'external' => esc_html__( 'External', 'blonwe-core' ),
                    'internal' => esc_html__( 'Internal', 'blonwe-core' ),
                ],
                'condition' => ['btn_action' => 'link']
            ]
        );
        $this->add_control( 'text',
            [
                'label' => esc_html__( 'Button Text', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Button Text', 'blonwe-core' )
            ]
        );
        $this->add_control( 'link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true,
                'condition' => ['btn_action' => 'link']
            ]
        );
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'blonwe-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()],
                'condition' => ['btn_action' => 'image']
            ]
        );
        $this->add_control( 'ltitle',
            [
                'label' => esc_html__( 'Lightbox Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Phone Name',
                'condition' => ['btn_action' => 'image']
            ]
        );
        $this->add_control( 'youtube',
            [
                'label' => esc_html__( 'Youtube Video URL', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'http://www.youtube.com/watch?v=AeeE6PyU-dQ',
                'condition' => ['btn_action' => 'youtube']
            ]
        );
        $this->add_control( 'vimeo',
            [
                'label' => esc_html__( 'Vimeo Video URL', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'https://vimeo.com/39493181',
                'condition' => ['btn_action' => 'vimeo']
            ]
        );
        $this->add_control( 'map',
            [
                'label' => esc_html__( 'Iframe Map URL', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom',
                'condition' => ['btn_action' => 'map']
            ]
        );
        $this->add_control( 'html5',
            [
                'label' => esc_html__( 'HTML5 Video URL', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => '',
                'pleaceholder' => esc_html__( 'Add your local video here', 'blonwe-core' ),
                'condition' => ['btn_action' => 'html5']
            ]
        );
        $this->add_control( 'modal_content',
            [
                'label' => esc_html__( 'Modal Content', 'blonwe-core' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => '<h3>Modal</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla rhoncus pharetra dui, nec tempus tellus maximus et. Sed sed elementum ligula, id cursus leo. Duis imperdiet tortor id condimentum hendrerit.</p>',
                'pleaceholder' => esc_html__( 'Add html content here', 'blonwe-core' ),
                'condition' => ['btn_action' => 'modal']
            ]
        );
        $this->add_control( 'modal_width',
            [
                'label' => esc_html__( 'Modal Content Width', 'blonwe-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 2000
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 600,
                ],
                'condition' => ['btn_action' => 'modal']
            ]
        );
        $this->add_responsive_control( 'alignment',
            [
                'label' => esc_html__( 'Alignment', 'blonwe-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .blonwe-button:not(.btn-justify)' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'blonwe-core' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'blonwe-core' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'blonwe-core' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                'default' => 'left'
            ]
        );
        $this->add_control( 'use_icon',
            [
                'label' => esc_html__( 'Use Icon', 'blonwe-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
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
			]
		);
        $this->add_control( 'icon',
            [
                'label' => esc_html__( 'Button Icon', 'blonwe-core' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => '',
                    'library' => 'solid'
                ],
                'condition' => ['use_icon' => 'yes', 'switcher_icon' => '']
            ]
        );
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klb-icon-right-arrow-large',
                'description'=> 'You can add icon code. for example: klb-icon-right-arrow-large',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
        $this->add_control( 'icon_pos',
            [
                'label' => esc_html__( 'Icon Position', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'btn-icon-right',
                'options' => [
                    'btn-icon-left' => esc_html__( 'Before', 'blonwe-core' ),
                    'btn-icon-right' => esc_html__( 'After', 'blonwe-core' )
                ],
                'condition' => ['use_icon' => 'yes']
            ]
        );
        $this->add_control( 'icon_spacing',
            [
                'label' => esc_html__( 'Icon Spacing', 'blonwe-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 60
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .blonwe-button .btn-icon-left i' => 'margin-right: {{SIZE}}px;',
                    '{{WRAPPER}} .blonwe-button .btn-icon-right i' => 'margin-left: {{SIZE}}px;'
                ],
                'condition' => ['use_icon' => 'yes']
            ]
        );
        $this->add_control( 'full',
            [
                'label' => esc_html__( 'Full width', 'blonwe-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'separator' => 'before'
            ]
        );
        $this->add_control( 'tooltips',
            [
                'label' => esc_html__( 'Tooltips', 'blonwe-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'separator' => 'before'
            ]
        );
        $this->add_control( 'tooltip_pos',
            [
                'label' => esc_html__( 'Tooltip Position', 'blonwe-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => esc_html__( 'Top', 'blonwe-core' ),
                    'right' => esc_html__( 'Right', 'blonwe-core' ),
                    'bottom' => esc_html__( 'Bottom', 'blonwe-core' ),
                    'left' => esc_html__( 'Left', 'blonwe-core' ),
                ],
                'condition' => ['tooltips' => 'yes']
            ]
        );
        $this->add_control( 'tooltiptext',
            [
                'label' => esc_html__( 'Tooltip Text', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Button Text', 'blonwe-core' ),
                'condition' => ['tooltips' => 'yes']
            ]
        );
        $this->end_controls_section();
        /*****   End Button Options   ******/

        /***** Button Style ******/
        $this->start_controls_section('blonwe_btn_styling',
            [
                'label' => esc_html__( 'Button Style', 'blonwe-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs('blonwe_btn_tabs');
        $this->start_controls_tab( 'blonwe_btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'blonwe-core' ) ]
        );

            $this->add_control( 'btn_color',
                [
                    'label' => esc_html__( 'Color', 'blonwe-core' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => ['{{WRAPPER}} .blonwe-btn' => 'color: {{VALUE}};']
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'btn_typo',
                    'label' => esc_html__( 'Typography', 'blonwe-core' ),
                    'selector' => '{{WRAPPER}} .blonwe-button .blonwe-btn'
                ]
            );
            $this->add_responsive_control( 'btn_padding',
                [
                    'label' => esc_html__( 'Padding', 'blonwe-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'selectors' => ['{{WRAPPER}} .blonwe-btn' => 'padding-top: {{TOP}}{{UNIT}};padding-right: {{RIGHT}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};padding-left: {{LEFT}}{{UNIT}};'],
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                    ],
                    'separator' => 'before'
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'btn_border',
                    'label' => esc_html__( 'Border', 'blonwe-core' ),
                    'selector' => '{{WRAPPER}} .blonwe-btn',
                    'separator' => 'before'
                ]
            );
            $this->add_responsive_control( 'btn_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'blonwe-core' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'selectors' => ['{{WRAPPER}} .blonwe-btn' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-left-radius: {{BOTTOM}}{{UNIT}};border-bottom-right-radius: {{LEFT}}{{UNIT}};'],
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                    ],
                    'separator' => 'before'
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_background',
                    'label' => esc_html__( 'Background', 'blonwe-core' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .blonwe-btn',
                    'separator' => 'before'
                ]
            );
        $this->end_controls_tab();

        $this->start_controls_tab('blonwe_btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'blonwe-core' ) ]
        );
         $this->add_control( 'btn_hvr_color',
            [
                'label' => esc_html__( 'Color', 'blonwe-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .blonwe-btn:hover' => 'color: {{VALUE}};']
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'blonwe-core' ),
                'selector' => '{{WRAPPER}} .blonwe-btn:hover',
                'separator' => 'before'
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'blonwe-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .blonwe-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /***** End Button Styling *****/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $settingsid = $this->get_id();
        $iconpos    = isset( $settings['icon']['value'] ) != '' ? ' '.$settings['icon_pos'] : '';
        $btnicon    = $settings['use_icon'] == 'yes' ? ' has-icon' : '';
        $full       = $settings['full'] == 'yes' ? ' is-block' : '';
        $target     = !empty( $settings['link']['is_external'] ) ? ' target="_blank"' : '';
        $nofollow   = !empty( $settings['link']['nofollow'] ) ? ' rel="nofollow"' : '';
        $href       = !empty( $settings['link']['url'] ) ? $settings['link']['url'] : '';
        $tooltips   = $settings['tooltips'] == 'yes' ? ' data-blonwe-ui-tooltip=\'{"position":"'.$settings['tooltip_pos'].'","content":"'.$settings['tooltiptext'].'"}\'' : '';
        $data       = $target.$nofollow;
        switch ($settings['btn_action']) {
            case 'image':
                $title = $settings['ltitle'] ? ' title="'.$settings['ltitle'].'"' : '';
                $data = ' data-blonwe-lightbox=\'{"type":"image"}\'';
                $href = $settings['image']['url'];
                break;
            case 'youtube':
                $data = ' data-blonwe-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['youtube'] ? $settings['youtube'] : 'http://www.youtube.com/watch?v=AeeE6PyU-dQ';
                break;
            case 'vimeo':
                $data = ' data-blonwe-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['vimeo'] ? $settings['vimeo'] : 'https://vimeo.com/39493181';
                break;
            case 'map':
                $data = ' data-blonwe-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['map'] ? $settings['map'] : 'https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom';
                break;
            case 'html5':
                $data = ' data-blonwe-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['html5'] ? $settings['html5'] : '';
                break;
            case 'modal':
                $data = ' data-blonwe-lightbox=\'{"type":"modal"}\'';
                $href = '#modal_'.$settingsid;
                break;
            default:
                $data = $target.$nofollow;
                $href = $settings['link']['url'];
                break;
        }
        $link_type = 'link' == $settings['btn_action'] && 'internal' == $settings['link_type'] ? ' data-scroll-to' : '';
        echo '<div class="blonwe-button'.$btnicon.'">';
            if ( $settings['icon_pos'] == 'btn-icon-left' ) {
                echo '<a'.$link_type.' class="btn link button light medium wide blonwe-btn '.$color.$size.$iconpos.$full.'" href="'.$href.'"'.$data.$tooltips.'>'; 
				if ( !empty( $settings['icon']['value'] || $settings['switcher_icon'] == 'yes'  ) ) { 
					if($settings['switcher_icon'] == 'yes'){
						echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
					} else {
						Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
					}
				} 
				echo $settings['text'].'</a>';
            } else {
                echo '<a'.$link_type.' class="btn blonwe-btn icon-right '.$iconpos.$full.'" href="'.$href.'"'.$data.$tooltips.'>'.$settings['text'].' ';
                if ( !empty( $settings['icon']['value'] ) || $settings['switcher_icon'] == 'yes' ) { 
					if($settings['switcher_icon'] == 'yes'){
						echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
					} else {
						Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
					}
				} echo '</a>';
            }
            if ( $settings['btn_action'] == 'modal' && $settings['modal_content'] ) {
                echo '<div id="modal_'.$settingsid.'" class="mfp-hide" style="position:relative; max-width:'.$settings['modal_width']['size'].'px; margin:auto; padding:30px; background-color:#ffffff;">';
                    echo $settings['modal_content'];
                echo '</div>';
            }
        echo '</div>';
        // Not in edit mode
        if ( \Elementor\Plugin::$instance->editor->is_edit_mode() && $settings['btn_action'] != 'link' ) {
            if ( $settings['btn_action'] != 'link' ) { ?>
                <script>jQuery(document).ready(function($){function blonweLightbox(){var myLightboxes=$('[data-blonwe-lightbox]'); if(myLightboxes.length){myLightboxes.each(function(i, el){var myLightbox=$(el);var myData=myLightbox.data('blonweLightbox');var myOptions={};if(!myData||!myData.type){return true;}if(myData.type==='gallery'){if(!myData.selector){return true;}myOptions={ delegate:myData.selector,type: 'image',gallery:{enabled:true}};}if(myData.type==='image'){myOptions={type:'image'};}if(myData.type==='iframe'){myOptions={type:'iframe'};}if(myData.type==='inline'){myOptions={type:'inline'};}if (myData.type==='modal'){myOptions={type:'inline',modal:false};}if(myData.type==='ajax'){myOptions={type:'ajax',overflowY:'scroll'};}myLightbox.magnificPopup(myOptions);});}}blonweLightbox();})
                </script>
            <?php }
            if ( $settings['tooltips'] == 'yes' ) { ?>
                <script>jQuery(document).ready(function ($) { function blonweUITooltip(){var e=$("[data-blonwe-lightbox]");e.length&&e.each(function(e,t){var a=$(t),i=a.data("blonweLightbox"),l={};if(!i||!i.type)return!0;if("gallery"===i.type){if(!i.selector)return!0;l={delegate:i.selector,type:"image",gallery:{enabled:!0}}}"image"===i.type&&(l={type:"image"}),"iframe"===i.type&&(l={type:"iframe"}),"inline"===i.type&&(l={type:"inline"}),"modal"===i.type&&(l={type:"inline",modal:!1}),"ajax"===i.type&&(l={type:"ajax",overflowY:"scroll"}),a.magnificPopup(l)})}blonweUITooltip();})</script>
                <?php
            }
        }
    }
}
