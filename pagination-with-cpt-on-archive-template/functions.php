<?php 

/* Post Per Page for archive template */
add_action( 'pre_get_posts' ,'custom_post_perpage', 1, 1 );
function custom_post_perpage( $query )
{
    if ( ! is_admin() && is_post_type_archive( 'post-type-name' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 4 ); //set query arg ( key, value )
    }
}
