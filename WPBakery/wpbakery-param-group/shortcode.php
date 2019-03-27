<?php
if(! defined('ABSPATH')){
	exit;
}

function like_us_shortcode($atts){
    extract( shortcode_atts( array(
        'like_btns' => '',
    ), $atts) );
     
      $like_buttons = vc_param_group_parse_atts($atts['like_btns']);
         
    $markup = '
    <div class="like-us-buttons">';
    
        foreach ($like_buttons as $button) {
    $markup .= '<a href="'.esc_url( $button['link'] ).'" target="_blank"><i class="'.esc_attr( $button['icon'] ).'"></i></a>'; 
        }
        
    $markup .= '    
    </div>';
    wp_reset_postdata();
    return $markup;
}
add_shortcode('like_us', 'like_us_shortcode'); 