/* Register Basic Taxonomy */
function project_custom_taxonomy() {
    register_taxonomy(
        'project_cat',  
        'project',                  
        array(
            'hierarchical'          => true,
            'label'                 => 'Project Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'project-category', 
                'with_front'    => true 
                )
            )
    );
}
add_action( 'init', 'project_custom_taxonomy');


****************************************************************************************************************************************



/* Register Custom Taxonomy In Details */
function music_genre_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Genres', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Genre', 'text_domain' ),
		'all_items'                  => __( 'All Genres', 'text_domain' ),
		'parent_item'                => __( 'Parent Genre', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'text_domain' ),
		'new_item_name'              => __( 'New Genre Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Genre', 'text_domain' ),
		'edit_item'                  => __( 'Edit Genre', 'text_domain' ),
		'update_item'                => __( 'Update Genre', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate genres with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove genres', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used genres', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search genres', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genre', array( 'post' ), $args );

}
add_action( 'init', 'music_genre_taxonomy', 0 );




******************************************************** Example *************************************************************************

/* Car Taxonomy*/
function car_custom_taxonomy() {
    $labels = array(
		'name'                       => _x( 'Brands', 'carfleet' ),
		'singular_name'              => _x( 'Brand',  'carfleet' ),
		'menu_name'                  => __( 'Car Brands', 'carfleet' ),
		'all_items'                  => __( 'All Brands', 'carfleet' ),
		'new_item_name'              => __( 'New Brand', 'carfleet' ),
		'add_new_item'               => __( 'Add New Brand', 'carfleet' ),
		'edit_item'                  => __( 'Edit Brand', 'carfleet' ),
		'update_item'                => __( 'Update Brand', 'carfleet' ),
		
    );
    $args = array(
	'labels'                     => $labels,
        'public'                     => true,
        'hierarchical'               => true,
		'rewrite'               => array(
            'slug'              => 'car-brands', 
            'with_front'    => true ,
            )
        );
	register_taxonomy( 'car-brand', array( 'car' ), $args );

}
add_action( 'init', 'car_custom_taxonomy', 0 );
