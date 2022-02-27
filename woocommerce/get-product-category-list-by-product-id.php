<?php 
    global $product;
    $terms = get_the_terms ( $product->get_id(), 'product_cat' );
    foreach ( $terms as $term ) {
        echo $term->name;
    }
?>
