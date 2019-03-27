<?php
if(! defined('ABSPATH')){
	exit;
}

   vc_map( 
       array(
              "name"        => __( "Slider", "text-domain" ),
              "base"        => "slider",
              "category"    => __( "Gigabyte", "text-domain"),
              "params"      => array(
                     array(
                        "type"          => "textfield",
                        "heading"       => __( "Count", "text-domain" ),
                        "param_name"    => "count",
                        "value"         => __( "-1", "text-domain" ),
                        "description"   => __( "Type slides amount, if you want unlimited slides then type -1", "text-domain" )
                    ), 
                     array(
                        "type"          => "dropdown",
                        "heading"       => __( "Select slide", "text-domain" ),
                        "param_name"    => "slider_id",
                         "value"        => get_slide_as_list(),
                         "dependency"   => array(
                                                "element" => "count",
                                                "value" => array("1"),
                                            ),
                        "description"   => __( "Select a slide", "text-domain" )
                    ),  
                     array(
                        "type"          => "dropdown",
                        "heading"       => __( "Enable loop?", "text-domain" ),
                        "param_name"    => "loop",
                        "std"           => __( "true", "text-domain" ),
                         "value"        => array(
                                            'Yes' => 'true',
                                            'No' => 'false',
                                        ),
                         "dependency"   => array(
                                                "element" => "count",
                                                "value" => array("-1","2","3","4","5","6","7","8","9","10","11","12","13","14","15",),
                                            ),
                        "description"   => __( "Select yes for enable loop or select No for disable", "text-domain" )
                    ), 
                     array(
                        "type"          => "dropdown",
                        "heading"       => __( "Enable autoplay?", "text-domain" ),
                        "param_name"    => "autoplay",
                        "std"           => __( "true", "text-domain" ),
                         "value"        => array(
                                            'Yes' => 'true',
                                            'No' => 'false',
                                        ),
                         "dependency"   => array(
                                                "element" => "count",
                                                "value" => array("-1","2","3","4","5","6","7","8","9","10","11","12","13","14","15",),
                                            ),
                        "description"   => __( "Select yes for enable autoplay or select No for disable", "text-domain" )
                    ), 
                     array(
                        "type"          => "dropdown",
                        "heading"       => __( "Autoplay time", "text-domain" ),
                        "param_name"    => "autoplay_timeout",
                        "std"           => __( "5000", "text-domain" ),
                         "value"        => array(
                                            '1second'   => '1000',
                                            '2second'   => '2000',
                                            '3second'   => '3000',
                                            '4second'   => '4000',
                                            '5second'   => '5000',
                                            '6second'   => '6000',
                                            '7second'   => '7000',
                                            '8second'   => '8000',
                                            '9second'   => '9000',
                                            '10seconds' => '10000',
                                            '11seconds' => '11000',
                                            '12seconds' => '12000',
                                            '13seconds' => '13000',
                                            '14seconds' => '14000',
                                            '15seconds' => '15000',
                                            
                                        ),
                         "dependency"   => array(
                                                "element" => "count",
                                                "value" => array("-1","2","3","4","5","6","7","8","9","10","11","12","13","14","15",),
                                            ),
                        "description"   => __( "Select slide time", "text-domain" )
                    ), 
                     array(
                        "type"          => "dropdown",
                        "heading"       => __( "Enable nav?", "text-domain" ),
                        "param_name"    => "nav",
                        "std"           => __( "true", "text-domain" ),
                         "value"        => array(
                                            'Yes' => 'true',
                                            'No' => 'false',
                                        ),
                         "dependency"   => array(
                                                "element" => "count",
                                                "value" => array("-1","2","3","4","5","6","7","8","9","10","11","12","13","14","15",),
                                            ),
                        "description"   => __( "Select yes for enable nav or select No for disable", "text-domain" )
                    ), 
                     array(
                        "type"          => "dropdown",
                        "heading"       => __( "Enable dots?", "text-domain" ),
                        "param_name"    => "dots",
                        "std"           => __( "true", "text-domain" ),
                         "value"        => array(
                                            'Yes' => 'true',
                                            'No' => 'false',
                                        ),
                         "dependency"   => array(
                                                "element" => "count",
                                                "value" => array("-1","2","3","4","5","6","7","8","9","10","11","12","13","14","15",),
                                            ),
                        "description"   => __( "Select yes for enable dots or select No for disable", "text-domain" )
                    ),
                )         
            ) 
        );
