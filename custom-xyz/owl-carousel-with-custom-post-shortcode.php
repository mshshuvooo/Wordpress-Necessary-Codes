<?php
if (!defined('ABSPATH')) {
    exit;
}

function custom_post_carousel_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
        'count' => -1,
        'slider_id' => '',
        'loop' => 'true',
        'autoplay' => 'true',
        'autoplay_timeout' => 5000,
        'nav' => 'true',
        'dots' => 'true',
    ), $atts));

    if ($count == 1) {
        $q = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC',
            'p' => $slider_id));
    } else {
        $q = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC'));
    }

    $carousel_random_id = rand(3298702, 5497022);

    if ($count == 1) {
        $markup = '';
    } else {
        $markup = '
            <script>
             jQuery(window).load(function(){
                jQuery("#custom-carousel-' . esc_attr($carousel_random_id) . '").owlCarousel({
                     loop: ' . $loop . ',
                     autoplay: ' . $autoplay . ',
                     autoplayTimeout: ' . $autoplay_timeout . ',
                     nav:' . $nav . ',
                     dots: ' . $dots . ',
		             autoplayHoverPause: true,
                     responsive:{
                         0:{
                             items:1,
                         },
                         600:{
                             items:4,
                         },
                         1000:{
                             items:6,
                         }
                     },
                     navText: ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"]
                    });
                });
            </script> ';
    }

    $markup .= '
    <div class="carousel-wrapper" id="custom-carousel-' . esc_attr($carousel_random_id) . '">';
    while ($q->have_posts()): $q->the_post();
        $idd = get_the_ID();
        $post_content = get_the_content();
        $markup .= '
	        <div class="single-carousel-item">
	            <h2>' . get_the_title() . '</h2>
	            ' . wpautop($post_content) . '
	        </div>
	        ';
    endwhile;
    $markup .=
        '</div>';
    wp_reset_postdata();
    return $markup;
}
add_shortcode('custom_post_carousel', 'custom_post_carousel_shortcode');
