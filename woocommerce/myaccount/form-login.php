<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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

$image = get_sub_field('image_left_login');
$image_url = get_sub_field('image_left_login')['url'];
$image_alt = get_sub_field('image_left_login')['alt'];
$intro_text = get_sub_field('intro_text');
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>
<section id="login" class="bg-white-bg">
	<div class="flex flex-col sm:flex-row lg:h-screen">
		<div class="basis-full sm:basis-1/3 md:basis-2/6">
			<img class="accountImage sm:h-screen w-full object-cover sm:sticky sm:top-0 sm:mt-[-2rem]" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
		</div>

		<div class="px-2.5 mt-4 md:mt-0 sm:px-7 sm:pt-28 sm:basis-2/3 md:basis-2/6 text-gray-900 flex flex-col content-center bg-white-bg coming-soon items-center justify-center">

			<div class="lg:max-w-[400px] lg:mx-auto w-full">
				<?php do_action('herman_woocommerce_notice'); ?>
				<?php 
				if($intro_text){
					echo '<div class="mb-8">'; 
					echo $intro_text;
					echo '</div>'; 
				}; ?>
				<div class="flex  justify-between mb-8 w-full">

					<div class="flex h-5">
						<p class="text-base text-black">SIGN IN
						</p>
					</div>
				</div>

				<form class=" woocommerce_form_field login w-full " method="post">
					<?php do_action('woocommerce_login_form_start'); ?>
					<div>
						<input type="text" class="text-base w-full py-1 border-b woocommerce-Input woocommerce-Input--text input-text woocommerce-invalid-required-field" required placeholder="EMAIL *" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																										?>
					</div>
					<div>
						<input class="text-base w-full py-1" type="password" placeholder="PASSWORD *" name="password" id="password" required autocomplete="current-password" />
						<!-- <input type="password" name="password" id="password" placeholder="PASSWORD" class="text-base w-full py-1 woocommerce-Input woocommerce-Input--text input-text" required="" autocomplete="current-password" /> -->
					</div>
					<?php do_action('woocommerce_login_form'); ?>
					<div class="flex">
						<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="text-xs text-grey hover:underline hover:text-black mt-2">FORGOT PASSWORD?</a>
					</div>

					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>

					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit flex items-center justify-center border border-black  px-4 py-1 text-base font-base text-black shadow-sm" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('LOGIN', 'woocommerce'); ?></button>
					<?php do_action('woocommerce_login_form_end'); ?>
				</form>
			</div>
		</div>
	</div>

</section>