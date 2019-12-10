<?php
/**
 * Edit defalut excerpt length
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

?>





<?php
/**
 * Make a custom excerpt
 */

function prefix_post_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}
?>

<?php echo prefix_post_excerpt(20); ?>

