<!-- Related Posts -->
<?php if(function_exists("the_field")):  
    $related_posts = get_field("related_posts");
    if(!empty($related_posts)): ?>
<div class="related-posts">
    <h1><?php _e("Related Posts", "text-domain"); ?></h1>
    <?php 
    $related_post_q = new WP_Query(
        array(
            'post__in' => $related_posts,
            'orderby' => 'post__in',
        )
    );
        
    while ($related_post_q -> have_posts()):
    $related_post_q -> the_post(); ?>
        <div class="single-related-post">
            <h4><?php the_title(); ?></h4>
        </div>
    <?php endwhile;  wp_reset_query(); ?>

</div>
<?php endif; endif; ?>
<!-- End Related Posts -->