<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themename
 */

?>
<?php if ( !is_singular() ) : ?>
<div class="single-post-box">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url();?>);"></div>
		<div class="post-inner">
			<div class="post-meta">
				<?php
					textdomain_posted_on();
					textdomain_posted_by();
				?>
			</div>
			<a href="<?php the_permalink(); ?>" class="single-post-title"><?php the_title(); ?></a>
			<div class="single-post-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="post-read-more">read more</a>
		</div>
	</article>
</div>
<?php else: ?>
<div class="post-details">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url();?>);"></div>
		<div class="post-inner">
			<div class="post-meta">
				<?php
					textdomain_posted_on();
					textdomain_posted_by();
				?>
			</div>
			<div class="post-details-content">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
</div>
<?php endif; ?>


