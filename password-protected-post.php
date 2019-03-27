function alpha_the_excerpt($excerpt){
	if(!post_password_required()){
		return $excerpt;
	}else{
		echo get_the_password_form();
	}
}
add_filter( "the_excerpt", "alpha_the_excerpt" );

function alpha_excerpt_protected_title_format_change(){
	return "%s";
}
add_filter("protected_title_format", "alpha_excerpt_protected_title_format_change");
