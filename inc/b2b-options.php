<?php
//Redirect user to login page if not logged in (WHOLESALE)
function redirect_location() {
  // Check if the user is on the login page
  if (is_page('login')) {
      // If the user is logged in, redirect to the shop page
      if (is_user_logged_in()) {
          wp_redirect('/shop'); // Replace '/shop' with the actual URL of your shop page
          exit;
      }
  } else {
      // Redirect to the login page if the user is not logged in and is not on the login page
      if (!is_user_logged_in()) {
          wp_redirect('/login');
          exit;
      }
  }
}
add_action('template_redirect', 'redirect_location');


function quantity_field(){
  global $product; ?>
  <div class="flex flex-row border-x border-black border-b border-b-black">
    <div class="border-r-black border-r w-[95px] shrink-0 lg:basis-[95px] py-1.5 px-3 flex flex-col justify-center">  
      <span class="uppercase">QTY</span>
    </div>
    
      <div class="w-full [&_input]:w-full">
    <?php woocommerce_quantity_input(
      array(
        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
      )
    ); ?>
    </div>
  </div>
  <?php
}
add_action('woocommerce_after_variations_table', 'quantity_field');

function hide_signup_b2b_for_b2b_users() {
  if (is_page('my-account')) {
          echo '<style>.signup-b2b { display: none; }</style>';
  }
}
add_action('wp_head', 'hide_signup_b2b_for_b2b_users');

