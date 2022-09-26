<?php

add_shortcode('wc_reg_form_herman', 'herman_separate_registration_form');

function herman_separate_registration_form()
{
  // if (is_admin()) return;
  // if (is_user_logged_in()) return;
  ob_start();

  $image = get_sub_field('image_left_login');
  $image_url = get_sub_field('image_left_login')['url'];
  $image_alt = get_sub_field('image_left_login')['alt'];

  do_action('woocommerce_before_customer_login_form');

?>

  <section id="registration" class="bg-white-bg mb-[-3rem]">
	<div class="flex flex-col sm:flex-row">
		<div class="basis-full sm:basis-1/3 md:basis-2/6">
			<img class="accountImage sm:h-screen w-full object-cover grayscale sm:sticky sm:top-0 sm:mt-[-2rem]" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
		</div>
		<div class="sm:px-7 pb-8 pt-8 sm:pt-28 sm:basis-2/3 md:basis-2/6 text-gray-900 grid content-center bg-white-bg coming-soon items-center justify-center">
			<div class="flex items-center justify-between mb-8">
				<div class="flex items-start">
					<div class="flex items-center h-5">
						<p class="text-base">
							<a href="/my-account/" class="font-base hover:underline text-gray-500 active:text-black">SIGN IN</a>
						</p>	 
					</div>
					</div>
						<p class="text-base text-black">SIGN UP
						</p>
					</div>




          <form method="post" class="woocommerce-form woocommerce-form-register register w-[21rem]" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
          
          <?php do_action( 'woocommerce_register_form_start' ); ?>

          <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
              </p>
            </div>
          </div>
          <p class="text-base text-black">SIGN UP
          </p>
        </div>




        <form method="post" class="woocommerce-form woocommerce-form-register register w-80" <?php do_action('woocommerce_register_form_tag'); ?>>

          <?php do_action('woocommerce_register_form_start'); ?>

          <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?> <span class="required">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                        ?>
            </p>

          <?php endif; ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

          </p>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                
                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text mb-2" name="password" id="reg_password" placeholder="PASSWORD" autocomplete="new-password" />
              </p>


          <?php else : ?>

            <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

          <?php endif; ?>

          <?php do_action('woocommerce_register_form'); ?>

          <p class="woocommerce-FormRow form-row">

              <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
              <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit flex items-center justify-center border border-black  px-4 py-1 text-base font-base text-black shadow-sm " name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'CREATE ACCOUNT', 'woocommerce' ); ?></button>

          </p>

          <?php do_action('woocommerce_register_form_end'); ?>

        </form>

      </div>
    </div>
    </div>
    </div>
  </section>

<?php

  return ob_get_clean();
}

$shortcode = get_sub_field('account_shortcode');
echo do_shortcode($shortcode);
