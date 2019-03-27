<?php 
/* Post Per Page For taxonomy template*/
function taxonomy_template_post_per_page( $query ) {
	if (! is_admin() && is_tax( 'taxonomy-id' ) ) {
        $query->query_vars['posts_per_page'] = 4;
        return;
    }
}
add_filter( 'pre_get_posts', 'taxonomy_template_post_per_page' );
