<?php

function brightnight_product_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => '9',
    ), $atts) );
    $i = 0;
    $q = new WP_Query(
        array(
            'posts_per_page' => $count, 
            'post_type' => 'product',
        )
    );

    

    $post_count = $q->post_count;
    $found_posts = $q->found_posts;
    $total_page = ceil($found_posts / $post_count);
          
    $markup = '<div class="row more-product">';


    while($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        $i++;
        $product_meta = get_post_meta($idd, 'product_options', true);
        

        $markup .= '
            <div class="col-lg-4">
                <a href="'.esc_url( get_the_permalink() ).'" class="single-product-box">
                    <div class="product-bg" style="background-image:url('.get_the_post_thumbnail_url($idd, 'large').');"></div>'; 
                    if (!empty($product_meta['sub_title'])) {
        $markup .= '<p>'.esc_html($product_meta['sub_title']).'</p>';               
                    }
            $markup .= '
                    <h4>'.esc_html(get_the_title()).'</h4>      
                </a>
            </div>
        ';        
    endwhile;
     
    $markup.= '</div>
    <script>
        var page = 2;

        jQuery(document).ready(function($) {
            $(".load-more-product").on(\'click\', function() {
                $.ajax({
                    type: \'POST\',
                    url: "'.esc_url(site_url()).'/wp-admin/admin-ajax.php",
                    dataType: \'html\',
                    data: {
                        action: \'product_load_function\',
                        nonce: $(this).data(\'nonce\'),
                        count: $(this).attr("data-count"),
                        height: $(this).attr("data-height"),
                        page: page,
                    },
                    beforeSend: function(data) {
                        // $("#load-more-message").append("Loading now");
                        $("#load-more-message").css("display", "block");
                        $(".load-more-product").hide();
                    },
                    success: function(data, result){
                        if( result != \'error\' ) {
                            $(".more-product").append(data);
                            $("#load-more-message").hide();
                            $(".load-more-product").show();
                            
                            page++;

                            if(page > '.$total_page.') {
                                $(".load-more-product").hide();
                            }
                            

                        } else {
                            $(".load-more-product").hide();
                        }
                    }
                }); 

                return false;
            });
        });
    </script>

    <div class="load-more-button text-center">
     <div id="load-more-message" style="display:none">Loading...</div>

    <a data-nonce="'.wp_create_nonce('product_load_function_nonce').'" data-count="'.$count.'" href="" class="load-more-product">Load More</a>
    </div>';


    wp_reset_query();
    return $markup;
}
add_shortcode('product', 'brightnight_product_shortcode');


add_action('wp_ajax_nopriv_product_load_function', 'product_load_function_callback');
add_action('wp_ajax_product_load_function', 'product_load_function_callback');

function product_load_function_callback() {
 
    $permission = check_ajax_referer( 'product_load_function_nonce', 'nonce', false );


    $paged = $_POST['page'];

    if( $permission == false ) {
        echo 'error';
        $markup = '
            <div class="light-ajax-error-content">
                <i class="fa fa-warning"></i>
                <h3>'.esc_html__('I don\'t know what happened, but there is an error!', 'light-toolkit').'</h3>
            </div>
        ';        
    }
    else {
        $post_count  = (isset($_POST['count'])) ? $_POST['count'] : 0;

        $settings = array(
            'showposts' => $post_count, 
            'post_type' => 'product',
            'paged' => $paged,
        );

        $qq = new WP_Query($settings);



        $post_no = 0;
        
        while($qq->have_posts()) : $qq->the_post();
            $idd = get_the_ID();
            $i++;
            $product_meta = get_post_meta($idd, 'product_options', true);


            $post_no++;

            $markup .='
            <div class="col-lg-4">
                <a href="'.esc_url( get_the_permalink() ).'" class="single-product-box">
                    <div class="product-bg" style="background-image:url('.get_the_post_thumbnail_url($idd, 'large').');"></div>'; 
                    if (!empty($product_meta['sub_title'])) {
        $markup .= '<p>'.esc_html($product_meta['sub_title']).'</p>';               
                    }
            $markup .= '
                    <h4>'.esc_html(get_the_title()).'</h4>      
                </a>
            </div>
            ';
        
        
        endwhile;
        wp_reset_postdata(); 
    }
 
    wp_die($markup);
   
}
