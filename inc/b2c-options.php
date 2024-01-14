<?php
function wc_remove_all_quantity_fields($return, $product)
{
    return true;
}

//Redirect user to login page if not logged in (WHOLESALE)
function redirect_location() {
  
  // Check if the current page is the 'Login' page and the user is logged in
  if (is_page('coming-soon') && is_user_logged_in()) {
    wp_redirect('/coming-soon');
      exit;
  }

  // If the user is not logged in and not on the 'Login' page, redirect to the 'Login' page
  if (!is_user_logged_in() && !is_page('coming-soon')) {
      wp_redirect('/coming-soon');
      exit;
  }
}
add_action('template_redirect', 'redirect_location');