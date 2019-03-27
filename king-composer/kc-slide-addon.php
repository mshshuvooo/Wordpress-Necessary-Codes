<?php
 
 if(! defined('ABSPATH')){
	exit;
}
add_action('init', 'kc_slides', 99 );
 
function kc_slides() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(

	            'homepage_slider' => array(
	                'name' => esc_html__( 'Homepage Slider' ),
	                'description' => esc_html__('Display Homepage Slider', 'wtint-shuvombm'),
	                'icon' => 'sl-paper-plane',
	                'category' => 'Wtint',
	                'params' => array(
	                    array(
	                        'name' => 'count',
	                        'label' =>esc_html__('Slide amount'),
	                        'type' => 'select',
	                        'options' => array(  
				      '-1' => esc_html__('All Slide'),
				      '1' => esc_html__('1 Slide'),
				      '2' => esc_html__('2 Slide'),
				      '3' => esc_html__('3 Slide'),
				      '4' => esc_html__('4 Slide'),
				      '5' => esc_html__('5 Slide'),
				      '6' => esc_html__('6 Slide'),
				      '7' => esc_html__('7 Slide'),
				      '8' => esc_html__('8 Slide'),
				      '9' => esc_html__('9 Slide'),
				      '10' => esc_html__('10Slide'),
				    ),
	                        'value' => -1,
	                        'description' => esc_html__('Select how many slide you want to show.', 'wtint-shuvombm')
	                    ),

	                    array(
	                        'name' => 'slider_id',
	                        'label' => esc_html__('Select a slide'),
	                        'type' => 'select',
				'options' => get_slider_list(),
	                        'relation' => array(
				    'parent'    => 'count',
				    'show_when' => '1'
				)
	                    ),
	                    array(
	                        'name' => 'loop',
	                        'label' =>esc_html__('Enable loop?'),
	                        'type' => 'select',  
				  'options' => array(  
				    'true' => esc_html__('Yes'),
				    'false' => esc_html__('No'),
				  ),
						 
				 'value' => 'true',
	                        'description' => esc_html__('If you want loop then select yes, else select no', 'wtint-shuvombm')
	                    ),
	                    array(
	                        'name' => 'autoplay',
	                        'label' => esc_html__('Enable autoplay?'),
	                        'type' => 'select',
				  'options' => array(  
				    'true' => esc_html__('Yes'),
				    'false' => esc_html__('No'),
				  ),

                          	'value' => 'true',
	                        'description' => esc_html__('If you want autoplay then select yes, else select no', 'wtint-shuvombm')
	                    ),
	                    array(
	                        'name' => 'nav',
	                        'label' => esc_html__('Enable nav?'),
	                        'type' => 'select', 
				  'options' => array(  
				    'true' => esc_html__('Yes'),
				    'false' => esc_html__('No'),
				  ),

                          	'value' => 'true',
	                        'description' => esc_html__('If you want nav then select yes, else select no', 'wtint-shuvombm')
	                    ),
	                    array(
	                        'name' => 'dots',
	                        'label' => esc_html__('Enable dots?'),
	                        'type' => 'select',
				  'options' => array(  
				    'true' => esc_html__('Yes'),
				    'false' => esc_html__('No'),
				  ),

                          	'value' => 'true',
	                        'description' => esc_html__('If you want dots then select yes, else select no', 'wtint-shuvombm')
	                    )
	                )
	            ),  // End of elemnt kc_icon 

	        )
	    ); // End add map
	
	} // End if

}  
 
?>
