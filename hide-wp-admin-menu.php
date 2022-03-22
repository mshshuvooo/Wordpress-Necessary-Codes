function msh_hide_admin_menus() {
	remove_menu_page('woocommerce'); // Remove Woococommerce
	remove_menu_page('user-registration'); //Add page slug to hide any admin page
}

add_action('admin_menu', 'msh_hide_admin_menus', 71);

