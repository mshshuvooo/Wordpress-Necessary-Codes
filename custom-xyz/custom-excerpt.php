
/**
 *custom excerpt
 *
 */

function custom_excerpt_length( $post_excerp_length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

function excerpt_more_dot( $custom_excerpt_more_dot ) {
	return '...';
}
add_filter( 'excerpt_more', 'excerpt_more_dot' );
