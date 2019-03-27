<?php
if(! defined('ABSPATH')){
    exit;
}

   vc_map( 
       array(
              "name"        => esc_html__( "Like Us", "bright-crazycafe" ),
              "base"        => "like_us",
              "category"    => esc_html__( "Bright Night", "bright-crazycafe"),
              "params"      => array(
                      
                   
                       array(
                        'type' => 'param_group',
                        'param_name' => 'like_btns',
                        'params' => array(
                          array(
                            'type' => 'textfield',
                            'heading' => __('Button URL', 'bright-crazycafe'),
                            'param_name' => 'link',
                          ),
                          array(
                            'type' => 'iconpicker',
                            'heading' => __('Select Icon', 'bright-crazycafe'),
                            'param_name' => 'icon',
                          )
                        )

                  ),    
                     
                )         
            ) 
        );



