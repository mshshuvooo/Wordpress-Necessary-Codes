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

function create_movie_review() {
    register_post_type( 'movie_reviews',
        array(
            'labels' => array(
                'name' => 'Movie Reviews',
                'singular_name' => 'Movie Review',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Movie Review',
                'edit' => 'Edit',
                'edit_item' => 'Edit Movie Review',
                'new_item' => 'New Movie Review',
                'view' => 'View',
                'view_item' => 'View Movie Review',
                'search_items' => 'Search Movie Reviews',
                'not_found' => 'No Movie Reviews found',
                'not_found_in_trash' => 'No Movie Reviews found in Trash',
                'parent' => 'Parent Movie Review'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
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
