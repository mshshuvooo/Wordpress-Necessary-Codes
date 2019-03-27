<?php
if(! defined('ABSPATH')){
	exit;
}

vc_map( 
       array(
              "name"        => esc_html__( "Addon Name", "textdomain" ),
              "base"        => "shortcode_name",
              "category"    => esc_html__( "Category", "textdomain"),
              "params"      => array(
                      
                     array(
                        "type"          => "textfield",
                        "heading"       => esc_html__( "Title", "textdomain" ),
                        "param_name"    => "title",
                    ), 
                )         
            ) 
        );




********************************************************************************************************************************



textarea_html
Text area with default WordPress WYSIWYG Editor. Important: only one html textarea is permitted per shortcode 
and it should have “content” as a param_name

array(
  "type" => "textarea_html",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)

********************************************************************************************************************************

textfield/textarea
Simple input / textarea field

array(
  "type" => "textfield",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => __( "", "my-text-domain" ),
  "description" => __( "Enter description.", "my-text-domain" )
)

array(
  "type" => "textarea",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => __( "", "my-text-domain" ),
  "description" => __( "Enter description.", "my-text-domain" )
)


*******************************************************************************************************************************

dropdown
Dropdown input field with set of available options. Array containing the drop down values 
(either should be a normal array, or an associative array)

 array(
    "type" => "dropdown",
    "heading" => __("Button Link Type", "my-text-domain"),
    "value"      => array(
      esc_html__( "Wordpress Page", "my-text-domain" )    => "1",
      esc_html__( "External Link", "my-text-domain" )    => "2",
     ),
     "std" => "1",
     "param_name" => "btn_link_type",
),


*******************************************************************************************************************************

attach_image / attach_images
Single image selection/Multiple images selection

array(
  "type" => "attach_image",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '',
  "description" => __( "Enter description.", "my-text-domain" )
)

array(
  "type" => "attach_images",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '',
  "description" => __( "Enter description.", "my-text-domain" )
)


*******************************************************************************************************************************


posttypes
Checkboxes with available post types (automatically finds all post types)

array(
  "type" => "posttypes",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => __( "", "my-text-domain" ),
  "description" => __( "Enter description.", "my-text-domain" )
)



*******************************************************************************************************************************

colorpicker
Color picker

array(
  "type" => "colorpicker",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
  "dependency" => array(
	"element" => "btn_link_type",
	"value" => "1"
    )
)






*******************************************************************************************************************************

iconpicker
Icon picker

array(
  "type" => "iconpicker",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)



*******************************************************************************************************************************


exploded_textarea
Text area, where each line will be imploded with comma (,)

array(
  "type" => "exploded_textarea",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)


*******************************************************************************************************************************



widgetised_sidebars
Dropdown element with set of available widget regions, that are registered in the active wp theme

array(
  "type" => "widgetised_sidebars",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)


*******************************************************************************************************************************


textarea_raw_html
Text area, its content will be coded into base64 (this allows you to store raw js or raw html code)

array(
  "type" => "textarea_raw_html",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)



*******************************************************************************************************************************


vc_link
Link selection. Then in shortcodes html output, use $href = vc_build_link( $href ); to parse link attribute

array(
  "type" => "vc_link",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)



*******************************************************************************************************************************


checkbox
Creates checkboxes, can have 1 or multiple checkboxes within one attribute

array(
  "type" => "checkbox",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => __( "", "my-text-domain" ),
  "description" => __( "Enter description.", "my-text-domain" )
)


*******************************************************************************************************************************


loop
Loop builder. Lets your users to construct loop which can later be used during the shortcode’s output

array(
  "type" => "loop",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)



*******************************************************************************************************************************


css
Basic CSS style editor for your content element. Check “Add “Design Options” Tab with CSS Editor 
to Your Element” page for more details

array(
  "type" => "css",
  "class" => "",
  "heading" => __( "Field Label", "my-text-domain" ),
  "param_name" => "field_name",
  "value" => '', 
  "description" => __( "Enter description.", "my-text-domain" )
)
