<?php 
    global $product;
    echo wc_get_rating_html( $product->get_average_rating() ); 
?>