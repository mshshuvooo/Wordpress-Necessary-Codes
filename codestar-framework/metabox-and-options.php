<?php if (!defined('ABSPATH')) {
    die;
}

function themename_metabox_options($options){
    $options = array(); 


// Page Metabox Options                    -
// -----------------------------------------
    $options[] = array(
        'id' => 'themename_page_options',
        'title' => esc_html__('Page Options', 'textdomain'),
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'high',
        'sections' => array(


            array(
                'name' => 'themename_page_title_meta',

                'fields' => array(

                    array(
                        'id' => 'enable_title',
                        'type' => 'switcher',
                        'title' => esc_html__('Enable title?', 'textdomain'),
                        'default' => true,
                        'desc' => esc_html__('If you want page title then select on, else select off.', 'textdomain'),
                    ),
                    array(
                        'id' => 'custom_title',
                        'type' => 'text',
                        'title' => esc_html__('Custom title', 'textdomain'),
                        'dependency' => array('enable_title', '==', 'true'),
                        'desc' => esc_html__('If you want custom page title then input your title here', 'textdomain'),
                    ),
                ),

            ),
        ),
    );

    return $options;
}
add_filter('cs_metabox_options', 'themename_metabox_options');






// Theme Options
// -----------------------------------------

function themename_theme_settings($options){
    $settings = array();

    $settings = array(
        'menu_title' => esc_html__('Theme Options', 'textdomain'),
        'menu_type' => 'menu', // menu, submenu, options, theme, etc.
        'menu_slug' => 'themename-theme-option',
        'ajax_save' => true,
        'show_reset_all' => true,
        'framework_title' => 'themename<small> <span style="color: #ffffff;">by</span> <a style="text-decoration: none; color: #FFCD43;" target="_blank" href="https://shuvombm.com">Shahadat Shuvo</a></small>',
    );

    return $settings;

}
add_filter('cs_framework_settings', 'themename_theme_settings');


function themename_theme_options($options){

    $options = array();


    $options[] = array(
        'name' => 'footer_options',
        'title' => esc_html__('Footer', 'textdomain'),
        'icon' => 'fa fa-heart',
        'fields' => array(

            array(
                'id' => 'copyright_text',
                'type' => 'text',
                'title' => esc_html__('Copyright Text', 'textdomain'),
            ),
            array(
                'id' => 'social_icon',
                'type' => 'group',
                'title' => esc_html__('Social Icon', 'textdomain'),
                'button_title' => esc_html__('Add New', 'textdomain'),
                'accordion_title' => esc_html__('Add New Icon', 'textdomain'),
                'fields' => array(
                    array(
                        'id' => 'select_icon',
                        'type' => 'icon',
                        'title' => esc_html__('Select Icon', 'textdomain'),
                    ),
                    array(
                        'id' => 'icon_url',
                        'type' => 'text',
                        'title' => esc_html__('Type URL', 'textdomain'),
                    ),
                    array(
                        'id' => 'icon_color',
                        'type' => 'color_picker',
                        'title' => esc_html__('Select Icon Color', 'textdomain'),
                    ),
                ),

            ),


        )
    );



    return $options;

}
add_filter('cs_framework_options', 'themename_theme_options');
  
