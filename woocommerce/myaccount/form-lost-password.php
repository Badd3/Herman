<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<section id="lost-password" class="bg-white-bg">
  <div class="flex flex-col items-center justify-center px-6 py-16 lg:py-28 mx-auto">
      <div class="w-full  md:mt-0 sm:max-w-md xl:p-0 ">
        <?php do_action('herman_woocommerce_notice'); ?>
          <div class="space-y-4 md:space-y-6">
              <h1 class="text-base">
			  <?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?><?php // @codingStandardsIgnoreLine ?>
              </h1>
              <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                  <div>
                      <input type="text" name="user_login" id="user_login" autocomplete="username" placeholder="EMAIL *" class="text-base w-full py-1 border-b woocommerce-Input woocommerce-Input--text input-text" required="" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                  </div>
                
				  
				  <?php do_action( 'woocommerce_lostpassword_form' ); ?>

                  <input type="hidden" name="wc_reset_password" value="true" />
				  <button type="submit" class="woocommerce-Button button flex items-center justify-center border border-black  px-6 py-3 text-base font-base text-black shadow-sm w-full mt-4 hover:bg-black hover:text-white" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'RESET PASSWORD', 'woocommerce' ); ?></button>
	
				  <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

              </form>
 			<?php do_action( 'woocommerce_after_lost_password_form' ); ?>
          </div>
      </div>
  </div>
</section>
