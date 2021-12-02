<?php

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
	function yith_wcwl_get_items_count() {
	  ob_start();
	  ?>
		<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
		  <span class="yith-wcwl-items-count">
			<i class="fa fa-heart"></i>
			<span><?php echo esc_html( yith_wcwl_count_all_products() ); ?></span>
		  </span>
		</a>
	  <?php
	  return ob_get_clean();
	}
  
	add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
  }
  
  if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
	function yith_wcwl_ajax_update_count() {
	  wp_send_json( array(
		'count' => yith_wcwl_count_all_products()
	  ) );
	}

	add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
  }
  
  if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
	function yith_wcwl_enqueue_custom_script() {
	  wp_add_inline_script(
		'jquery-yith-wcwl',
		"
		  jQuery( function( $ ) {
			$( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
			  $.get( yith_wcwl_l10n.ajax_url, {
				action: 'yith_wcwl_update_wishlist_count'
			  }, function( data ) {
				$('.yith-wcwl-items-count').children('i').html( data.count );
			  } );
			} );
		  } );
		"
	  );
	}
  
	add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
  }  
