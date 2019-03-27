<?php
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) :
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args=array(
'tag__in' => $tag_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=>2, // Number of related posts to display.
'ignore_sticky_posts'=>1
);

$my_query = new wp_query( $args ); 
if($my_query->have_posts()):?>
<div class="related-posts-after-content">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="related-post-title"><?php echo  esc_html( "Releted Posts" ); ?></h3>
		</div>
		<?php
			while( $my_query->have_posts()):
			$my_query->the_post();
		?>
		<div class="col-lg-6">
			<a href="<?php the_permalink(); ?>" class=" related-post ">
				<div class="related-post-thumbnail">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				</div>
				<h4><?php the_title(); ?></h4>
			</a>
		</div>
	<?php endwhile; ?>
		</div>
	</div>
<?php endif; endif;
wp_reset_query(); ?>
