<div class="container">
<?php if ( have_posts() ) : ?>
    <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-12">
                <h5><?php the_title();?></h5>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="post-pagination">
                <?php
                    the_posts_pagination( array(
                        'prev_text' => 'Previous',
                        'next_text' => 'Next',
                    ) );
                ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>    
        </div>
    </div>
<?php endif; ?>
</div>
