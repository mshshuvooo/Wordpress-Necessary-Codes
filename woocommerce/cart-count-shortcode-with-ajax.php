<?php

function get_cart_count() {
	//Check if WooCommerce is active
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		global $woocommerce;
		$cart_url = wc_get_cart_url();
		$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'FreshySites'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
	  	
	  	// link for cart with icon
	  	$the_cart_data = '<a class="fs-cart-contents" href="'. $cart_url .'" title="View your shopping cart"><i class="fa fa-shopping-cart"></i>';
		// If more than one item in the cart, then show the qty and cost
		if ( $cart_contents_count > 0 ) {
			$the_cart_data .= ' <span class="cart-quantity">'. $cart_contents_count .'</span> <span class="cart-total">'. $cart_total .'</span>';
		}
	  	// close the cart link
		$the_cart_data .= '</a>';
	  
		return $the_cart_data;
	}
}
add_shortcode( 'cart_total', 'get_cart_count' );


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * We essentially duplicated what we added above
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
	ob_start();

	$cart_url =  wc_get_cart_url();
	$cart_contents_count = WC()->cart->cart_contents_count;
	$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'FreshySites'), $cart_contents_count);
	$cart_total = WC()->cart->get_cart_total();

	?><a class="fs-cart-contents" href="<?php echo $cart_url; ?>" title="View your shopping cart"><i class="fa fa-shopping-cart"></i><?php
	if ( $cart_contents_count > 0 ) {
	?>
		<span class="cart-quantity"><?php echo $cart_contents_count; ?></span> <span class="cart-total"><?php echo $cart_total; ?></span>
		<?php            
	}
	?></a><?php
 
	$fragments['a.fs-cart-contents'] = ob_get_clean();
     
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );
