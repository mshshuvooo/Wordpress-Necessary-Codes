<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
  sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
    esc_url( $product->add_to_cart_url() ),
    esc_attr( $product->get_id() ),
    esc_attr( $product->get_sku() ),
    esc_attr( isset( $quantity ) ? $quantity : 1 ),
    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
    esc_attr( $product->get_type() ),
    esc_html( $product->add_to_cart_text() )
  ),
$product );?>
