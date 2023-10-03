<?php
//Redirect user to my-account page if not logged in (WHOLESALE)
function redirect_location(){

    if(   ! is_user_logged_in() && !is_page('my-account') && !is_page('sign-up')  )  {
		wp_redirect( '/my-account' );
		exit;
    }

}
add_action('template_redirect', 'redirect_location');


function quantity_field(){
  global $product; ?>
  <div class="flex flex-row border-x border-black border-b border-b-black">
    <div class="border-r-black border-r w-[95px] shrink-0 lg:basis-[95px] py-1.5 px-3 flex flex-col justify-center">  
      <span class="uppercase">QTY</span>
    </div>
    
      <div>
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