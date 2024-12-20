<?php

namespace Elementor;

class Blonwe_Counter_Widget extends Widget_Base {

    public function get_name() {
        return 'blonwe-counter';
    }
    public function get_title() {
        return esc_html__('Counter (K)', 'blonwe-core');
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
		
		$this->add_control( 'counter_type',
			[
				'label' => esc_html__( 'Counter Type', 'blonwe-core' ),
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
		
		$this->add_control('due_date',
			[
				'label' => esc_html__( 'Due Date', 'blonwe-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => '2023/06/14',
				'picker_options' => ['enableTime' => false],
			]
		);
		
		$this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Next Opportunity',
                'description'=> 'Add a title.',
				'label_block' => true,
				'condition' => ['counter_type' => ['select-type', 'type1', 'type2']]
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'blonwe-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sign up to be the first to know when the collection is live!',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
				'condition' => ['counter_type' => ['select-type', 'type1']]
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'blonwe-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Get in Touch',
                'pleaceholder' => esc_html__( 'Enter button title here', 'blonwe-core' ),
				'condition' => ['counter_type' => ['select-type', 'type1']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'blonwe-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'blonwe-core' ),
				'condition' => ['counter_type' => ['select-type', 'type1']]
            ]
        );
		

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if($settings['counter_type'] == 'type3'){
			
			$date = date_create($settings['due_date']);
			
			echo '<div class="klb-countdown-wrapper">';
			echo '<div class="klb-countdown size-lg style-minimal" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
			echo '<div class="count-item">';
			echo '<div class="count days color-secondary"></div>';
			echo '<div class="count-label">'.esc_html__('days','blonwe-core').'</div>';
			echo '</div>';
			echo '<span class="sep-h">:</span>';
			echo '<div class="count-item">';
			echo '<div class="count hours color-secondary"></div>';
			echo '<div class="count-label">'.esc_html__('hours','blonwe-core').'</div>';
			echo '</div>';
			echo '<span class="sep-m">:</span>';
			echo '<div class="count-item">';
			echo '<div class="count minutes color-secondary"></div>';
			echo '<div class="count-label">'.esc_html__('minutes','blonwe-core').'</div>';
			echo '</div>';
			echo '<span class="sep-s">:</span>';
			echo '<div class="count-item">';
			echo '<div class="count second color-secondary"></div>';
			echo '<div class="count-label">'.esc_html__('second','blonwe-core').'</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
					
		} elseif($settings['counter_type'] == 'type2'){
			
			$date = date_create($settings['due_date']);
			
			echo '<div class="klb-text-notification text-center background-primary-light color-primary font-14 weight-500">';
			echo '<p>'.blonwe_sanitize_data($settings['title']).'</p>';
			echo '<div class="klb-countdown-wrapper">';
			echo '<div class="klb-countdown filled opacity-primary radius" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
			echo '<div class="count-item">';
			echo '<div class="count days"></div>';
			echo '<div class="count-label">'.esc_html__('d','blonwe-core').'</div>';
			echo '</div>';
			echo '<span>:</span>';
			echo '<div class="count-item">';
			echo '<div class="count hours"></div>';
			echo '<div class="count-label">'.esc_html__('h','blonwe-core').'</div>';
			echo '</div>';
			echo '<span>:</span>';
			echo '<div class="count-item">';
			echo '<div class="count minutes"></div>';
			echo '<div class="count-label">'.esc_html__('m','blonwe-core').'</div>';
			echo '</div>';
			echo '<span>:</span>';
			echo '<div class="count-item">';
			echo '<div class="count second"></div>';
			echo '<div class="count-label">'.esc_html__('s','blonwe-core').'</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
		} else {
			
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			$date = date_create($settings['due_date']);
			
			echo '<div class="custom-color-row custom-gradient-green pt-30 pt-lg-40 pb-30 pb-lg-40">';
			echo '<div class="container">';
			echo '<div class="klb-countodnw-banner">';
			echo '<div class="column">';
			echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';     
			echo '<div class="klb-countdown-wrapper">';
			echo '<div class="klb-countdown size-md" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','blonwe-core').'">';
			echo '<div class="count-item">';
			echo '<div class="count days"></div>';
			echo '<div class="count-label">'.esc_html__('days','blonwe-core').'</div>';
			echo '</div>';
			echo '<span class="sep-h">:</span>';
			echo '<div class="count-item">';
			echo '<div class="count hours"></div>';
			echo '<div class="count-label">'.esc_html__('hours','blonwe-core').'</div>';
			echo '</div>';
			echo '<span class="sep-m">:</span>';
			echo '<div class="count-item">';
			echo '<div class="count minutes"></div>';
			echo '<div class="count-label">'.esc_html__('minutes','blonwe-core').'</div>';
			echo '</div>';
			echo '<span class="sep-s">:</span>';
			echo '<div class="count-item">';
			echo '<div class="count second"></div>';
			echo '<div class="count-label">'.esc_html__('second','blonwe-core').'</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="column">';
			echo '<div class="entry-description">';
			echo '<p>'.$settings['desc'].'</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="column">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn default outline">'.esc_html($settings['btn_title']).' <i class="klb-icon-right-arrow-large"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
		}
	}

}
