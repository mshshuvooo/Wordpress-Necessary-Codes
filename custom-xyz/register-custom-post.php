add_action( 'init', 'my_theme_custom_post' );
function my_theme_custom_post() {
    register_post_type( 'cpt',
        array(
            'labels' => array(
                'name' => __( 'CPTs' ),
                'singular_name' => __( 'CPT' )
            ),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
            'public' => true
        )
    );
}


****************************************************************************************************************************
add_action( 'init', 'my_theme_custom_post' );
function my_theme_custom_post() {
    register_post_type( 'movie_reviews',
        array(
            'labels' => array(
                'name'               => esc_html__( 'Movie Reviews', 'text-domain' ),
                'singular_name'      => esc_html__( 'Movie Review', 'text-domain' ),
                'add_new'            => esc_html__( 'Add New', 'text-domain' ),
                'add_new_item'       => esc_html__( 'Add New Movie Review', 'text-domain' ),
                'edit'               => esc_html__( 'Edit', 'text-domain' ),
                'edit_item'          => esc_html__( 'Edit Movie Review', 'text-domain' ),
                'new_item'           => esc_html__( 'New Movie Review', 'text-domain' ),
                'view'               => esc_html__( 'View', 'text-domain' ),
                'view_item'          => esc_html__( 'View Movie Review', 'text-domain' ),
                'search_items'       => esc_html__( 'Search Movie Reviews', 'text-domain' ),
                'not_found'          => esc_html__( 'No Movie Reviews found', 'text-domain' ),
                'not_found_in_trash' => esc_html__( 'No Movie Reviews found in Trash', 'text-domain' ),
                'parent'             => esc_html__( 'Parent Movie Review', 'text-domain' )
            ),
 
            'public'        => true,
            'menu_position' => 15,
            'supports'      => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies'    => array( '' ),
            'menu_icon'     => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive'   => true
        )
    );
}



****************************************************************************************************************************

<?php
$args = array( 'post_type' => 'product', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
  <h2><?php the_title(); ?></h2>
<?php  
endwhile;
wp_reset_postdata();
?>
