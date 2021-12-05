<?php
/**
 * Elementor Plista Showroom Carousel.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Plista_Showroom_Carousel extends \Elementor\Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve Plista Showroom Carousel name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'plista-showroom-carousel';
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve Plista Showroom Carousel title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Plista Showroom Carousel', 'plista-addons-msh' );
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve Plista Showroom Carousel icon.
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
	 * Retrieve the list of categories the Plista Showroom Carousel belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'plista-addons' ];
	}




    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
 
        wp_register_script( 'plista-showroom-carousel-script', plugin_dir_url(__FILE__).  '/widget.js', [ 'elementor-frontend', 'jquery' ], '1.0.0', true );
        wp_register_script( 'plista-owl-carousel-script', plugin_dir_url(__FILE__).  '../../assets/js/owl.carousel.min.js', [ 'elementor-frontend', 'jquery' ], '1.3.3', true );

        wp_register_style( 'plista-owl-carousel-css',  plugin_dir_url(__FILE__). '../../assets/css/owl.carousel.css' );
        wp_register_style( 'plista-showroom-carousel-css',  plugin_dir_url(__FILE__). '/widget.css' );
    }
 
    public function get_script_depends() {
       return [ 'plista-showroom-carousel-script', 'plista-owl-carousel-script' ];
    }

    public function get_style_depends() {
        return [ 'plista-owl-carousel-css', 'plista-showroom-carousel-css' ];
    }
 






	/**
	 * Register Plista Showroom Carousel controls.
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
				'label' => __( 'Content', 'plista-addons-msh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slideText',
			[
				'label'       => __( 'Slide Text', 'plista-addons-msh' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type Slider Text Here', 'plista-addons-msh' ),
			]
		);
		$repeater->add_control(
			'btnText',
			[
				'label'       => __( 'Button Text', 'plista-addons-msh' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type Button Text', 'plista-addons-msh' ),
			]
		);
		$repeater->add_control(
			'btnUrl',
			[
				'label'         => __( 'Button URL', 'plista-addons-msh' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'plista-addons-msh' ),
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
				'label' => __( 'Slide Image', 'plista-addons-msh' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'slides',
			[
				'label'  => __( 'Slides', 'plista-addons-msh' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'slide_settings',
			[
				'label' => __( 'Slides Settings', 'plista-addons-msh' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'nav',
			[
				'label'        => __( 'Navigation Arrow', 'plista-addons-msh' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plista-addons-msh' ),
				'label_off'    => __( 'Hide', 'plista-addons-msh' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'dots',
			[
				'label'        => __( 'Dots', 'plista-addons-msh' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'plista-addons-msh' ),
				'label_off'    => __( 'Hide', 'plista-addons-msh' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'        => __( 'Auto Play', 'plista-addons-msh' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'plista-addons-msh' ),
				'label_off'    => __( 'No', 'plista-addons-msh' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'loop',
			[
				'label'        => __( 'Loop', 'plista-addons-msh' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'plista-addons-msh' ),
				'label_off'    => __( 'No', 'plista-addons-msh' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'mouseDrag',
			[
				'label'        => __( 'Mouse Drag', 'plista-addons-msh' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'plista-addons-msh' ),
				'label_off'    => __( 'No', 'plista-addons-msh' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'touchDrag',
			[
				'label'        => __( 'Touch Drag', 'plista-addons-msh' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'plista-addons-msh' ),
				'label_off'    => __( 'No', 'plista-addons-msh' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'autoplayTimeout',
			[
				'label'     => __( 'Autoplay Timeout', 'plista-addons-msh' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => '5000',
				'condition' => [
					'autoplay' => 'true',
				],
				'options' => [
					'5000'  => __( '5 Seconds', 'plista-addons-msh' ),
					'10000' => __( '10 Seconds', 'plista-addons-msh' ),
					'15000' => __( '15 Seconds', 'plista-addons-msh' ),
					'20000' => __( '20 Seconds', 'plista-addons-msh' ),
					'25000' => __( '25 Seconds', 'plista-addons-msh' ),
					'30000' => __( '30 Seconds', 'plista-addons-msh' ),
				],
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Render Plista Showroom Carousel output on the frontend.
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
                    'class'                 => 'plista-showroom-carousel-wrapper owl-carousel',
                    'id'                    => 'plista-showroom-carousel-'.esc_attr($sliderDynamicId),
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
