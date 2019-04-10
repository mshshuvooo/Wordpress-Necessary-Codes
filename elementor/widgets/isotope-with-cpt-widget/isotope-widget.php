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
			'item_per_page',
			[
				'label' => __( 'Menu Per Page', 'bluelion-ex' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '-1', 'bluelion-ex' ),
				'description' => __( 'Type how many food menus you want to show. Type -1 for showing all menus.', 'bluelion-ex' ),
			]
		);

		$this->add_control(
			'menu-column',
			[
				'label' => __( 'Menu Column', 'bluelion-ex' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-lg-4 ',
				'options' => [
					'col-lg-6 ' => __( '2 Column  ', 'bluelion-ex' ),
					'col-lg-4 ' => __( '3 Column', 'bluelion-ex' ),
				],
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
            		'posts_per_page'    => $settings['item_per_page'],
		) );




		?>

		
			<div class="food-menus">
				<div class="row">
					<div class="col-lg-12">
						<div class="food-filter-btns" data-target=".food-menu-filter-<?php echo esc_attr($menuDynamicId); ?>" id="">
							<button class="active" data-filter="*">all</button>
							<?php 
								$terms = get_terms( 'food_menu_cat' );
								if (! empty( $terms ) && ! is_wp_error( $terms )):
									foreach ($terms as $term):
							?>
								<button data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html( $term->name ) ?></button>
							<?php endforeach; endif; ?>
						</div>
					</div>
				</div>

				<div class="food-menu-filter-<?php echo esc_attr($menuDynamicId); ?> row">
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
						<div class="single-food-item <?php echo esc_attr( $settings['menu-column'] . $foodAssignedCat ); ?>">
							<div class="food-thumbnail" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
							<h4><?php the_title(); ?></h4>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		
		<?php 
		

	}

}
