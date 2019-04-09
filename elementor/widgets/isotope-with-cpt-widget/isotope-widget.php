<?php
/**
 * Elementor BlueLion Food Menus Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BlueLion_Food_Menus_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve BlueLion Food Menus widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'BlueLion_Food_Menus';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve BlueLion Food Menus widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'BlueLion Food Menus', 'bluelion-ex' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve BlueLion Food Menus widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-cutlery';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the BlueLion Food Menus widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bluelion' ];
	}

	/**
	 * Register BlueLion Food Menus widget controls.
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
				'label' => __( 'Content', 'bluelion-ex' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'url',
			[
				'label' => __( 'URL', 'bluelion-ex' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'bluelion-ex' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render BlueLion Food Menus widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$menuDynamicId = rand(10, 100000);
		

		$foodMenus = new WP_Query( array(
            'post_type'         => 'food-menus',
            'posts_per_page'    => -1,
		) );

		?>

		
			<div class="food-menus">
				<div class="row">
					<div class="col-lg-12">
						<ul class="food-menu-filter">
							<li data-filter="*">all</li>
							<?php 
								$terms = get_terms( 'food_menu_cat' );
								if (! empty( $terms ) && ! is_wp_error( $terms )):
									foreach ($terms as $term):
							?>
								<li data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html( $term->name ) ?></li>
							<?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<div class="food-menus-wrapper row" id="food-menus-<?php echo esc_attr($menuDynamicId) ?>">
					<?php 
						while( $foodMenus -> have_posts() ): $foodMenus -> the_post(); 
					
						$foodCategorys = get_the_terms( get_the_ID(), 'food_menu_cat' );
						if ($foodCategorys && ! is_wp_error( $foodCategorys) ){
							$foodCatList = array();
							foreach ($foodCategorys as $category) {
								$foodCatList[] = $category->slug;
							}
							$foodAssignedCat = join( " ", $foodCatList );
						}else{
							$foodAssignedCat ='';
						}
					
					?>
						<div class="col-lg-4 <?php echo esc_attr( $foodAssignedCat ); ?>">
							<div class="single-food-item">
								<div class="food-thumbnail" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
								<h4><?php the_title(); ?></h4>
								<?php 
									if( function_exists('the_field') ):
									$foodPrice = get_field('food_price');
									if( $foodPrice ):
								?>
									<p><span><?php echo esc_html("Price: ")?></span><?php echo $foodPrice; ?></p>
								<?php endif; endif;  ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		
		<?php 
		


        

	}

}