<?php
  $settings  = array(
        'posts_per_page' => -1, 
        'post_type' => 'portfolio',/*Post Type*/
        'orderby' => 'menu_order',
        'order' => 'ASC', 
        'tax_query' => array(
            array (
            'taxonomy' => 'portfolio_cat',/*Taxonomy ID*/
            'field' => 'slug',
            'terms' => 'wordpress',/*Category Slug*/
            )
        )
    );  
    
    
    $post_query = new WP_Query( $settings );
    
    /*Start Loop*/
    while($post_query->have_posts()) : $post_query->the_post();
      the_title();
    endwhile;
    /*End Loop*/
?>
