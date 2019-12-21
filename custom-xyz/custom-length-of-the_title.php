/*** Word Limit ***/
<?php echo wp_trim_words( $text, $num_words = 15, $more = null ); ?>


/*** Characters Limit ***/
<?php echo mb_strimwidth( get_the_title(), 0, 50, '...' ); ?>
