$options[]    = array(
  'id'        => 'gigabyte_slide_options',
  'title' 	  => esc_html__('Slide Options', 'gigabyte-shuvombm'),
  'post_type' => 'slide',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

	    // begin: a section
	    array(
	      'name'  => 'gigabyte_slide_options_meta',

	      // begin: fields
	      'fields' => array(

// begin: Slide Button field
			array(
			  'id'              => 'buttons',
			  'type'            => 'group',
			  'title'           => esc_html__('Slide Buttons'),
			  'button_title'    => esc_html__('Add New'),
			  'accordion_title' => esc_html__('Add New Button'),
			  'fields'          => array(
			    array(
			      'id'    => 'button_type',
			      'type'  => 'select',
			      'title' => esc_html__('Button Type'),
			      'options'        => array(
					    'bodered'  => esc_html__('Bodered Button'),
					    'boxed'    => esc_html__('Boxed Type'),
					  ),
			    ),
			    array(
			      'id'    => 'link_text',
			      'type'  => 'text',
			      'title' => esc_html__('Type Link Text'),
			    ),
			    array(
			      'id'    => 'link_type',
			      'type'  => 'select',
			      'title' => esc_html__('Select Link Type'),
			      'options'        => array(
					    '1'    => esc_html__('Wordpress Page'),
					    '2'    => esc_html__('External Link'),
					  ),
			    ),
			    array(
			      'id'       => 'link_to_page',
			      'type'     => 'select',
			      'title'    => esc_html__('Select Page'),
			      'options'  => 'page',
			      'dependency'   => array( 'link_type', '==', '1' ),
			    ),

			    array(
			      'id'    => 'external_link',
			      'type'  => 'text',
			      'title' => esc_html__('Type Link URL'),
			      'dependency'   => array( 'link_type', '==', '2' ),
			    ),
			  ),
			),

// end: Slide Button field


//Start Slide image field
                      
                      array(
                        'id'    => 'image_location',
                        'title' => esc_html__('Slide Image'),  
                        'type'  => 'select',
                        'default'  => 2,  
                        'options'        => array(
			    '1'          => 'Upload Image',
			    '2'          => 'Image URL',
			  ),  
                        ),



			array(
			  'id'            => 'upload_image',
			  'type'          => 'upload',
			  'title' 		  => esc_html__('Upload Slide Image'),
			  'dependency'    => array( 'image_location', '==', '1' ),
			  'settings'      => array(
			   'upload_type'  => 'image',
			   'button_title' => 'Upload',
			   'frame_title'  => 'Select an image Image',
			   'insert_title' => 'Use this image',
			  ),
			),



			array(
			  'id'    => 'image_url',
			  'type'  => 'text',
			  'title' => esc_html__('Type Slide Image URL'),
			  'dependency'   => array( 'image_location', '==', '2' ),
			),  

                          
 // End Slide image field


//Start Slide Background image field
                      
                      array(
                        'id'    => 'bg_image_location',
                        'title' => esc_html__('Slide Background Image'),  
                        'type'  => 'select',
                        'default'  => 2,  
                        'options'        => array(
			    '1'          => 'Upload Image',
			    '2'          => 'Image URL',
			  ),  
                        ),

                      	array(
			  'id'            => 'bg_image_upload',
			  'type'          => 'upload',
			  'title' 		  => esc_html__('Upload Slide Background Image'),
			  'dependency'    => array( 'bg_image_location', '==', '1' ),
			  'settings'      => array(
			   'upload_type'  => 'image',
			   'button_title' => 'Upload',
			   'frame_title'  => 'Select an  Image',
			   'insert_title' => 'Use this image',
			  ),
			),


			array(
			  'id'    => 'bg_image_url',
			  'type'  => 'text',
			  'title' => esc_html__('Type Slide Background Image URL'),
			  'dependency'   => array( 'bg_image_location', '==', '2' ),
			),  


// End Background Slide image field




// begin: slide overley  field
          
                  array(
                    'id'      => 'enable_overley',
                    'type'    => 'switcher',
                    'default' => true,    
                    'title'   => esc_html__('Enable overley?'),
                  ),
                  array(
                    'id'      => 'overley_percentage',
                    'type'    => 'text',
                    'title'   => esc_html__('Overley percentage'),
                    'default' => '.7',
                    'desc'    => esc_html__('Type overley percentage in floating number, max value is 1'),
                    'dependency'   => array( 'enable_overley', '==', 'true' ),  
                  ),
                  array(
                    'id'      => 'overley_color',
                    'type'    => 'color_picker',
                    'title'   => esc_html__('Overley color'),
                    'default' => '#000',
                    'dependency'   => array( 'enable_overley', '==', 'true' ),     
                  ),

	// end: slide overley  field  


		), // end: fields
	    ), // end: a section

	),
);
