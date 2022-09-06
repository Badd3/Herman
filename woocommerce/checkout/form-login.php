<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>
<div class="woocommerce-form-login-toggle bg-white-bg text-base pt-20 pb-16 px-4 sm:pt-28 sm:px-6 lg:px-8">
	<?php wc_print_notice( apply_filters( 'woocommerce_checkout_login_message', esc_html__( 'RETURNING CUSTOMER?', 'woocommerce' ) ) . ' <br><a href="#" class="showlogin w-40 mt-5 flex items-center justify-center border border-black  px-6 py-3 text-base font-base text-black shadow-sm  ">' . esc_html__( 'GO TO LOGIN', 'woocommerce' ) . '</a>', 'notice' ); ?>
</div>
<?php
woocommerce_login_form(
	array(
		'message'  => esc_html__( 'IF YOU HAVE SHOPPED WITH US BEFORE, PLEASE ENTER YOUR DETAILS BELOW. IF YOU ARE A NEW CUSTOMER, PLEASE PROCEED TO THE BILLING SECTION BELOW.', 'woocommerce' ),
		'redirect' => wc_get_checkout_url(),
		'hidden'   => true,
	)
);
