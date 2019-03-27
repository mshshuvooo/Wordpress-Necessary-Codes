<?php
if (!defined('ABSPATH')) {
    exit;
}

vc_map(
    array(
        'name' => esc_html__('Gallery', 'textdomain'),
        'base' => 'themename_gallery',
        'category' => esc_html__('Category', 'textdomain'),
        'params' => array(
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Upload Images', 'textdomain'),
                'param_name' => 'images',
            ),
        ),
    )
);
