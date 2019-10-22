<?php
/**
 * Elementor PNW Slider Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_slider_Widget extends \Elementor\Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve PNW Slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pnw-slider';
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve PNW Slider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'PNW Slider', 'wt-pnw-ex' );
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve PNW Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-product-hunt';
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the PNW Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'pnw' ];
	}
	/**
	 * Register PNW Slider widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'wt-pnw-ex' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slideText',
			[
				'label'       => __( 'Slide Text', 'wt-pnw-ex' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type Slider Text Here', 'wt-pnw-ex' ),
			]
		);
		$repeater->add_control(
			'btnText',
			[
				'label'       => __( 'Button Text', 'wt-pnw-ex' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type Button Text', 'wt-pnw-ex' ),
			]
		);
		$repeater->add_control(
			'btnUrl',
			[
				'label'         => __( 'Button URL', 'wt-pnw-ex' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'wt-pnw-ex' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);
		$repeater->add_control(
			'slideImage',
			[
				'label' => __( 'Slide Image', 'wt-pnw-ex' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'slides',
			[
				'label'  => __( 'Slides', 'wt-pnw-ex' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'slide_settings',
			[
				'label' => __( 'Slides Settings', 'wt-pnw-ex' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'nav',
			[
				'label'        => __( 'Navigation Arrow', 'wt-pnw-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'wt-pnw-ex' ),
				'label_off'    => __( 'Hide', 'wt-pnw-ex' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'dots',
			[
				'label'        => __( 'Dots', 'wt-pnw-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'wt-pnw-ex' ),
				'label_off'    => __( 'Hide', 'wt-pnw-ex' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'        => __( 'Auto Play', 'wt-pnw-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'wt-pnw-ex' ),
				'label_off'    => __( 'No', 'wt-pnw-ex' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'loop',
			[
				'label'        => __( 'Loop', 'wt-pnw-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'wt-pnw-ex' ),
				'label_off'    => __( 'No', 'wt-pnw-ex' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'mouseDrag',
			[
				'label'        => __( 'Mouse Drag', 'wt-pnw-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'wt-pnw-ex' ),
				'label_off'    => __( 'No', 'wt-pnw-ex' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'touchDrag',
			[
				'label'        => __( 'Touch Drag', 'wt-pnw-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'wt-pnw-ex' ),
				'label_off'    => __( 'No', 'wt-pnw-ex' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'autoplayTimeout',
			[
				'label'     => __( 'Autoplay Timeout', 'wt-pnw-ex' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => '5000',
				'condition' => [
					'autoplay' => 'true',
				],
				'options' => [
					'5000'  => __( '5 Seconds', 'wt-pnw-ex' ),
					'10000' => __( '10 Seconds', 'wt-pnw-ex' ),
					'15000' => __( '15 Seconds', 'wt-pnw-ex' ),
					'20000' => __( '20 Seconds', 'wt-pnw-ex' ),
					'25000' => __( '25 Seconds', 'wt-pnw-ex' ),
					'30000' => __( '30 Seconds', 'wt-pnw-ex' ),
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Render PNW Slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if( $settings['slides'] ){
			$sliderDynamicId = rand(10, 100000);
			$countSlide      = count($settings['slides']);
			$nav             = $settings['nav'] ? $settings['nav'] : 'false';
			$dots            = $settings['dots'] ? $settings['dots'] : 'false';
			$autoplay        = $settings['autoplay'] ? $settings['autoplay'] : 'false';
			$loop            = $settings['loop'] ? $settings['loop'] : 'false';
			$mouseDrag       = $settings['mouseDrag'] ? $settings['mouseDrag'] : 'false';
			$touchDrag       = $settings['touchDrag'] ? $settings['touchDrag'] : 'false';
			$autoplayTimeout = $settings['autoplayTimeout'] ? $settings['autoplayTimeout'] : '0';
            
            $this->add_render_attribute(
                'slider-wrapper',
                [
                    'class'                 => 'pnw-slider-wrapper owl-carousel',
                    'id'                    => 'pnw-slider-'.esc_attr($sliderDynamicId),
                    'data-countslide'       => $countSlide,
                    'data-dots'             => $dots,
                    'data-nav'              => $nav,
                    'data-loop'             => $loop,
                    'data-autoplay'         => $autoplay,
                    'data-autoplay-timeout' => $autoplayTimeout,
                    'data-mouse-drag'       => $mouseDrag,
                    'data-touch-drag'       => $touchDrag
                ]
            );
                
            ?>
			
			<div <?php echo $this->get_render_attribute_string('slider-wrapper'); ?>>
			<?php foreach ($settings['slides'] as $slide): ?>
				<div class = "single-pnw-slide text-center" style = "background-image:url(<?php echo wp_get_attachment_image_url( $slide['slideImage']['id'], 'large' ) ?>);">
					<div class = "container">
						<div class = "row">
							<div class = "col-lg-12">
								<?php
									echo wpautop( $slide['slideText'] );
									$target   = $slide['btnUrl']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $slide['btnUrl']['nofollow'] ? ' rel="nofollow"' : '';
									if( !empty( $slide['btnText'] && $slide['btnUrl']['url'] ) ){
										echo '<a href="'.esc_url( $slide['btnUrl']['url'] ).'" '. $target . $nofollow .' class="boxed-btn">'.esc_html( $slide['btnText'] ).'</a>';
									}
								 ?>
							</div>
						</div>
					</div>
				</div>
            <?php endforeach; ?>
			</div>
    		<?php
		}
	}
}
