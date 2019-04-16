<div class="logo">
    <?php 
    if(has_custom_logo()): 
        the_custom_logo();
    else: ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h3><?php bloginfo( 'name' ); ?></h3></a>
    <?php 
    endif;
    ?>
</div>
