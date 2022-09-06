<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

?>

<section class="password-reset">
    <?php do_action( 'woocommerce_before_lost_password_confirmation_message' ); ?>
    <div class="flex flex-col items-center justify-center px-6 py-16 lg:py-28 mx-auto">
      <div class="w-full  md:mt-0 sm:max-w-md xl:p-0 ">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-md font-base ">
			  <?php wc_print_notice( esc_html__( 'PASSWORD RESET MAIL HAS BEEN SENT.', 'woocommerce' ) );?>
              </h1>
                 <p class"uppercase"><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'A PASSWORD RESET EMAIL HAS BEEN SENT TO THE EMAIL ADDRESS ON FILE FOR YOUR ACCOUNT, BUT MAY TAKE SEVERAL MINUTES TO SHOW UP IN YOUR INBOX. PLEASE WAIT AT LEAST 10 MINUTES BEFORE ATTEMPTING ANOTHER RESET.', 'woocommerce' ) ) ); ?></p>

                <?php do_action( 'woocommerce_after_lost_password_confirmation_message' ); ?>
            </div>
        </div>
    </div>
</section>