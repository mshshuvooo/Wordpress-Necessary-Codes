<?php 
function themename_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'themename' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'themename' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'themename_widgets_init' );