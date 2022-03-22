<?php

add_filter( 'woocommerce_register_post_type_product', 'msh_products_post_type_name_change' );
 
function msh_products_post_type_name_change( $args ){
    $labels = array(
        'name'               => __( 'Tours', 'your-custom-plugin' ),
        'singular_name'      => __( 'Tour', 'your-custom-plugin' ),
        'menu_name'          => _x( 'Tours', 'Admin menu name', 'your-custom-plugin' ),
        'add_new'            => __( 'Add Tour', 'your-custom-plugin' ),
        'add_new_item'       => __( 'Add New Tour', 'your-custom-plugin' ),
        'edit'               => __( 'Edit', 'your-custom-plugin' ),
        'edit_item'          => __( 'Edit Tour', 'your-custom-plugin' ),
        'new_item'           => __( 'New Tour', 'your-custom-plugin' ),
        'view'               => __( 'View Tour', 'your-custom-plugin' ),
        'view_item'          => __( 'View Tour', 'your-custom-plugin' ),
        'search_items'       => __( 'Search Tours', 'your-custom-plugin' ),
        'not_found'          => __( 'No Tours found', 'your-custom-plugin' ),
        'not_found_in_trash' => __( 'No Tours found in trash', 'your-custom-plugin' ),
        'parent'             => __( 'Parent Tour', 'your-custom-plugin' )
    );
 
    $args['labels'] = $labels;
    $args['description'] = __( 'This is where you can add new tours to your store.', 'your-custom-plugin' );
    return $args;
}
