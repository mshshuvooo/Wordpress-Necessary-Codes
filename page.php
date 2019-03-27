<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themename
 */

get_header(); 

    if( get_post_meta($post->ID, 'themename_page_options', true)){
        $page_meta = get_post_meta($post->ID, 'themename_page_options', true);
    }else{
         $page_meta =  array();
    }


    if(array_key_exists('enable_title', $page_meta)){
        $enable_title = $page_meta['enable_title'];
    }else{
         $enable_title = true;
    }
  
    if(array_key_exists('custom_title', $page_meta)){
        $custom_title = $page_meta['custom_title'];
    }else{
         $custom_title = '';
    }

?>
		<?php if($enable_title == true) : ?>  
	       <div <?php if(has_post_thumbnail()) : ?>style="background-image:url(<?php the_post_thumbnail_url('large'); ?>)"  <?php endif; ?> class="breadcrumb-area">
	              <?php if(has_post_thumbnail()) : ?> 
	                  <div class="breadcrumb-overley"></div>
	              <?php endif; ?>  
	           <div class="container">
	               <div class="row">
	                   <div class="col-lg-12">
	                        <h3><?php if(!empty($custom_title)){echo $custom_title;}else{the_title(); }?></h3>
	                        <?php if(function_exists('bcn_display')) bcn_display(); ?>
	                   </div>
	               </div>
	           </div>
	       </div>
    	<?php endif; ?>
	
		<div class="themename-internal-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
					</div>
				</div>
			</div>
		</div>
			

		

<?php
get_footer();
