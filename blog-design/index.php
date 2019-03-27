<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themename
 */

get_header();
?> 
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3><?php echo esc_html__('News', 'themename'); ?></h3>
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="themename-post-item-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
				<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile; ?>

						<?php if(function_exists('wp_pagenavi')): ?>
							<div class="themename-navigation"><?php wp_pagenavi(); ?></div>
						<?php endif; ?>
						
					<?php else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
