<div class="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php 
        if(has_custom_logo()): 
            the_custom_logo();
        else: ?>
            <h3><?php bloginfo( 'name' ); ?></h3> 
        <?php 
        endif;
        ?>
    </a>
</div>
