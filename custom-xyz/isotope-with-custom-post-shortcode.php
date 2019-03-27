<?php
if(! defined('ABSPATH')){
    exit;
}

function project_filter_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => -1,
    ), $atts) );
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'project', 'orderby' => 'menu_order','order' => 'ASC')
        );
          
    $project_daynamic_id = rand(78434, 8989668);         
    $markup = '
    <script>
        jQuery(document).ready(function(){
        
        jQuery(".project-filter-menu li").on("click", function(){
            
            jQuery(".project-filter-menu li").removeClass("active");
            jQuery(this).addClass("active");
            
            var selector = jQuery(this).attr("data-filter");
            jQuery(".project-filter-'.$project_daynamic_id.'").isotope({
                filter: selector
            });
        });
    });


    jQuery(window).load(function(){
        jQuery(".project-filter-'.$project_daynamic_id.'").isotope();
    });
    </script>
    <div class="project-filter-wrapper">
        <div class="row ">
            <div class="col-lg-12">
                <ul class="project-filter-menu">
                    <li class="active" data-filter="*">all project</li>';
                    $terms = get_terms( 'project_cat' );
                    if (! empty( $terms ) && ! is_wp_error( $terms )) {
                        foreach ($terms as $term) {
        $markup .= '<li data-filter=".'.$term->slug.' ">'.esc_html( $term->name ).'</li>';                    
                        }
                    }
        $markup .= '
            </ul>
            </div>
        </div>
        <div class="row all-project  project-filter-'.$project_daynamic_id.'">';
        while($q->have_posts()) : $q->the_post();
            $idd = get_the_ID();
                $project_categorys = get_the_terms( get_the_ID(), 'project_cat' );
                if ($project_categorys && ! is_wp_error( $project_categorys) ){
                    $project_cat_list = array();

                    foreach ($project_categorys as $category) {
                        $project_cat_list[] = $category->slug;
                    }
                    $project_assigned_cat = join( " ", $project_cat_list );
                }else{
                    $project_assigned_cat ='';
                }

             $markup .= '
                <div class="col-lg-4 '.$project_assigned_cat.'">
                    <div  class="single-project-box">
                         <a href="'.esc_url( get_the_permalink() ).'">view full details <i class="fa fa-angle-right"></i></a>    
                    </div>
                </div>
            ';        
        endwhile;
        $markup.= '
        </div>
    </div>';
    wp_reset_postdata();
    return $markup;
}
add_shortcode('project_filter', 'project_filter_shortcode');
