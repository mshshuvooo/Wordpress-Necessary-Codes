<?php 
if(! defined('ABSPATH')){
	exit;
}

function portfolios_shortcode($atts, $content = null){
	extract( shortcode_atts( array(
		'posts_per_page' => 6,
	), $atts) );
    
    global $paged;
    $settings = array(
        'posts_per_page' => $posts_per_page, 
        'post_type' => 'portfolio', 
        'orderby' => 'menu_order', 
        'order' => 'ASC', 
        'paged' => $paged
    );
	
    $post_query = new WP_Query( $settings );	
    
    $total_found_posts = $post_query->found_posts;
    $total_page = ceil($total_found_posts / $posts_per_page);
		
	$markup = '<div class="portfolio-item-markup">';
	while($post_query->have_posts()) : $post_query->the_post();
		$markup .= '
		<div class="single-portfolio-item">
        
		</div>
		';        
	endwhile;
	$markup.= '</div>';
    
    if(function_exists('wp_pagenavi')) {
        $markup .='<div class="page-navigation">'.wp_pagenavi(array('query' => $post_query, 'echo' => false)).'</div>';
    } else {
        $markup.='
        <span class="next-posts-links">'.get_next_posts_link('Next page', $total_page).'</span>
        <span class="prev-posts-links">'.get_previous_posts_link('Previous page').'</span>
        ';
    }
    
	wp_reset_postdata();
	return $markup;
}
add_shortcode('portfolios', 'portfolios_shortcode');	
