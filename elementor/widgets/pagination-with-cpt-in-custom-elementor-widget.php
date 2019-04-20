<?php
/**
 * Elementor Listings Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Listings_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Listings widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'listings';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Listings widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Listings', 'hmoinvest-ex' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Listings widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-header';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Listings widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hmoinvest' ];
	}

	/**
	 * Register Listings widget controls.
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
				'label' => __( 'Content', 'hmoinvest-ex' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'listing_per_page',
			[
				'label'       => __( 'Listing Per Page', 'hmoinvest-ex' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '-1', 'hmoinvest-ex' ),
				'description' => __( 'Type how many listing you want to show. If you want all listing then type -1', 'hmoinvest-ex' ),
			]
		);


		$this->add_control(
			'show_pagination',
			[
				'label'        => __( 'Show Pagination', 'hmoinvest-ex' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'hmoinvest-ex' ),
				'label_off'    => __( 'Hide', 'hmoinvest-ex' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);



		$this->end_controls_section();

	}

	/**
	 * Render Listings widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		if(is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
		}else {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		

		$args = array(
			'post_type'      => 'listing',
			'posts_per_page' => $settings['listing_per_page'],
			'paged'          => $paged
		);
		$listingsQ = new WP_Query( $args );





		?>


        	<div class="listing-items-wrapper">
			<div class="row">
				<?php while( $listingsQ -> have_posts() ): $listingsQ -> the_post(); ?>
				<div class="col-lg-6">
					<div class="single-listing-item" style="background-image:url(<?php the_post_thumbnail_url(); ?>); ">
						<div class="single-listing-inner">
							<h4><?php the_title(); ?></h4>
							<a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more', 'hmoinvest-ex'); ?></a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>

				<?php if( $settings['show_pagination'] == 'yes' ): ?>
				<div class="col-lg-12">
					<div class="post-pagination">
					<?php 
						if(function_exists('wp_pagenavi')) {
							wp_pagenavi( array( 'query' => $listingsQ ) );
						} ?>
					</div>
				</div>
				<?php 
					endif; 
					wp_reset_postdata(); 
				?>
			</div>
		</div>

	<?php

	}

}
