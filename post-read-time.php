<?php 

function serinity_post_read_time() {
 
    // get the post content
    $content = get_post_field( 'post_content', $post->ID );
     
    // count the words
    $word_count = str_word_count( strip_tags( $content ) );
     
    // reading time itself
    $readingtime = ceil($word_count / 200);
     
    if ($readingtime == 1) {
     $timer = " minute read";
    } else {
     $timer = " minute read"; // or your version :) I use the same wordings for 1 minute of reading or more
    }
     
    // I'm going to print 'X minute read' above my post
    $totalreadingtime = $readingtime . $timer;
    echo $totalreadingtime;
    return $totalreadingtime;
     
}
    
