<?php
/* Template Name: Coming Soon Page */
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
    <p class="mb-4">We are currently updating our website. We will be back shortly!</p>
  </div>
</section>

<?php get_footer('minimal'); ?>
