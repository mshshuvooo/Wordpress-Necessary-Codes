/* Car Post Per Page For archive*/
add_action( 'pre_get_posts' ,'car_custom_post_perpage', 1, 1 );
function car_custom_post_perpage( $query )
{
    if ( ! is_admin() && is_post_type_archive( 'car' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 8 ); //set query arg ( key, value )
    }
}



/* Car Post Per Page For taxonomy template*/
function car_taxonomy_template_post_per_page( $query ) {
	if (! is_admin() && is_tax( 'car-brand' ) ) {
        $query->query_vars['posts_per_page'] = 8;
        return;
    }
}
add_filter( 'pre_get_posts', 'car_taxonomy_template_post_per_page' );
