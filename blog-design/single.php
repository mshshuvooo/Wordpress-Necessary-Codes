<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themename
 */

get_header();
?>

	<div class="breadcrumb-area post-details-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3><?php the_title(); ?></h3>
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="post-details-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile; ?>
				</div>
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
