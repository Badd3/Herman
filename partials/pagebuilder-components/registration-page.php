<?php
$image = get_sub_field('image_left_login');
$image_url = get_sub_field('image_left_login')['url'];
$image_alt = get_sub_field('image_left_login')['alt'];

?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

  <section id="registration" class="bg-white-bg mb-[-3rem]">
	<div class="flex flex-col sm:flex-row">
		<div class="basis-full sm:basis-1/3 md:basis-2/6">
			<div class="mt-16 mb-4 text-grey sm:mt-0 pl-5 text-xs sm:invisible"><p>ACCOUNT</p></div>
			<img class="sm:h-screen w-full object-cover grayscale sm:sticky sm:top-0 sm:mt-[-2rem]" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
		</div>
		<div class="px-7 pb-8 pt-8 sm:pt-28 sm:basis-2/3 md:basis-2/6 text-gray-900 grid content-center bg-white-bg coming-soon items-center min-h-full justify-center">
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

					<form method="post" class="woocommerce-form woocommerce-form-register register space-y-4 md:space-y-6 w-80" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
							

            <?php do_action( 'woocommerce_register_form_start' ); ?>						
						
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" class="woocommerce-button button woocommerce-form-register__submit flex items-center justify-center border border-black  px-6 py-3 text-base font-base text-black shadow-sm  w-20" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'SIGN UP', 'woocommerce' ); ?></button>
										
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>