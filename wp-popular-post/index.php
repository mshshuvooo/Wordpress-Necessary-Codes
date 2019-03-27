<ul>
  <?php $popular = new WP_Query(array('posts_per_page'=>7, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
  while ($popular->have_posts()) : $popular->the_post(); ?>
  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php endwhile; wp_reset_postdata(); ?>
</ul>
