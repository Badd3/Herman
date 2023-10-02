<?php
//Redirect user to my-account page if not logged in (WHOLESALE)
function redirect_location(){

    if(   ! is_user_logged_in() && !is_page('my-account') && !is_page('sign-up')  )  {
		wp_redirect( '/my-account' );
		exit;
    }

}
add_action('template_redirect', 'redirect_location');