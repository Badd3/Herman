<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-register.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
'<section class="bg-white-bg">'.

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

  <div class="flex flex-col items-center justify-center px-6 py-16 lg:py-28 mx-auto">
      <div class="w-full  md:mt-0 sm:max-w-md xl:p-0 ">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-md font-base ">
			  <?php esc_html_e( 'SIGN IN TO YOUR ACCOUNT', 'woocommerce' ); ?>
              </h1>
              <form class="space-y-4 md:space-y-6" method="post">
			  <?php do_action( 'woocommerce_login_form_start' ); ?>
                  <div>
                      <input type="username" placeholder="EMAIL" class="text-base w-full py-1 border-b woocommerce-Input woocommerce-Input--text input-text" required="" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                  </div>
                  <div>
                      <input type="password" name="password" id="password" placeholder="PASSWORD" class="text-base w-full py-1 woocommerce-Input woocommerce-Input--text input-text" required="" autocomplete="current-password" />
                  </div>
				  
				  <?php do_action( 'woocommerce_login_form' ); ?>

                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme" class="woocommerce-form__input woocommerce-form__input-checkbox text-gray-500 text-xs dark:text-gray-300">REMEMBER ME </label>
                          </div>
                      </div>
                      <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">FORGOT PASSWORD?</a>
                  </div>
				  
				  <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

                  <button type="submit" class="flex items-center justify-center border border-black  px-6 py-3 text-base font-base text-black shadow-sm  w-full">SIGN IN</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      DON'T HAVE AN ACCOUNT YET? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">SIGN UP</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>

<section id="herman_login" class="py-16 lg:py-28 bg-white-bg">
<div class="bg-white-bg flex-grow w-full lg:ml-auto lg:w-1/2" id="customer_login">

<div>

<?php endif; ?>

		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( '', 'woocommerce' ); ?>&nbsp;<span class="required"></span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="ACCOUNTNAME" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( '', 'woocommerce' ); ?>&nbsp;<span class="required"></span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" placeholder="PASSWORD" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class=" bg-white-bg flex-grow w-full lg:w-1/2">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
			</section>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
