<?php
/* Template Name: Login Page */
get_header('minimal'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<section style="background-image: url(<?php the_field('bg_image'); ?>);" class="bg-no-repeat bg-cover grid content-center bg-white-bg coming-soon items-center min-h-full justify-center relative coming-soon-mobile">
  <div class="container">
    <div class="text-white text-center">
      <h1 class="text-[20px] mb-[10px]"><?php the_field('titel'); ?></h1>
      <p class="text-base"><?php the_field('subtitel'); ?></p>
    </div>
  </div>

  <div class="text-base bg-white-bg border border-black centered-login-signup w-[90%] max-w-[343px] p-10 pop-up absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
    <p class="mb-4">Please log in to access the partners webshop.</p>

    <?php do_action('woocommerce_before_customer_login_form'); ?>

    <form class="woocommerce_form_field login w-full " method="post">
      <?php do_action('woocommerce_login_form_start'); ?>

      <input type="text" class="text-base w-full py-1 border-b woocommerce-Input woocommerce-Input--text input-text" required placeholder="EMAIL *" name="username" id="username" autocomplete="username" />

      <input class="text-base w-full py-1" type="password" placeholder="PASSWORD *" name="password" id="password" required autocomplete="current-password" />

      <?php do_action('woocommerce_login_form'); ?>

      <div class="flex">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="text-xs text-grey hover:underline hover:text-black mt-2">FORGOT PASSWORD?</a>
      </div>

      <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>

      <button type="submit" class="woocommerce-button button woocommerce-form-login__submit flex items-center justify-center border border-black px-4 py-1 text-base font-base text-black shadow-sm" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('LOGIN', 'woocommerce'); ?></button>

      <?php do_action('woocommerce_login_form_end'); ?>
    </form>

  </div>
</section>

<?php get_footer('minimal'); ?>
