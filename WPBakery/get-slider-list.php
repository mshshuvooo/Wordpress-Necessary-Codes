 //////// For King Composer/////////
 function get_slider_list(){
       
        $args = wp_parse_args(array(
            'post_type' => 'slider',
            'posts_per_page' => -1,
        ) );
       
        //get all slide list
        $all_slides_list = get_posts(  $args );
       
        $slide_options = array(esc_html__('-- Select slider --', '')=> '');
       
        if($all_slides_list){
           
            foreach($all_slides_list as $single_slide){
               
                $slide_options[ $single_slide->ID ] = $single_slide->post_title;
               
            } //end foreach
           
        } //end if
       
        return $slide_options;
    }
    
    
    
    
    
/////// For Visual Composer /////////

function get_slide_as_list(){
    $args = wp_parse_args(array(
        'post_type'   => 'slider',
        'numberposts' => -1,
    ));
    
    $posts = get_posts($args);
    
    $post_options = array (esc_html__('--Select slide--', 'text-domain')=>'');
    if($posts){
        foreach($posts as $post){
            $post_options[$post -> post_title] = $post -> ID;
        }
    }
    return $post_options;
}
