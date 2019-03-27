<?php
if (!defined('ABSPATH')) {
    exit;
}

function themename_gallery_shortcode($atts = array(), $content = null)
{
    extract(shortcode_atts(array(
        'images' => '',
    ), $atts));

    $image_ids =explode(',', $images);

    $markup = '
        <div class="wagtail-gallery">';
            foreach ($image_ids as $img) {
                $attachment = wp_get_attachment_image_src( $img, 'full' ); 
                $markup .= '<img src="'.esc_url($attachment[0]).'">';
            }
    $markup .= '
        </div>';
    return $markup;
}
add_shortcode('themename_gallery', 'themename_gallery_shortcode');
