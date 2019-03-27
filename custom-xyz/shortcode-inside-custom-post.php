<?php 
if(! defined('ABSPATH')){
	exit;
}

function post_markup_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'count' => '',
    ), $atts) );
     
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'posttype', 'orderby' => 'menu_order','order' => 'ASC')
        );      
         
    $markup = '<div class="custom_post_markup">';
    while($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        $custom_field = get_post_meta($idd, 'custom_field', true);
        $post_content = get_the_content();
        $markup .= '
        <div class="single_post_item">
            <h2>' . get_the_title(). '</h2>
            '.wpautop( $post_content ).'
            <p>'.$custom_field.'</p>
        </div>
        ';        
    endwhile;
    $markup.= '</div>';
    wp_reset_postdata();
    return $markup;
}
add_shortcode('post_markup', 'post_markup_shortcode'); 
