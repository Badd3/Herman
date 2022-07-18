<?php
$image = get_sub_field('image_left');
$image_url = get_sub_field('image_left')['url'];
$image_alt = get_sub_field('image_left')['alt'];

$contact_title = get_sub_field('contact_title');
$email_info = get_sub_field('email_info');
$phone_info = get_sub_field('phone_info');
$phone_display = get_sub_field('phone_display');


?>

<section>
  <div class="flex flex-col sm:flex-row">
    <div class="px-7 pb-8 pt-16 sm:pt-28 sm:basis-2/3 md:basis-2/5 text-gray-900">
      <h1 class="mb-8"><?php the_field('titel'); ?></h1>
      <?php


      if (get_sub_field('contact_shortcode')) {
        echo do_shortcode(get_sub_field('contact_shortcode'));
      };
      ?>
      <h2 class="mt-5 mb-8"><?php echo $contact_title ?></h2>
      <!-- Email invuld laten zien -->
      <?php
      if ($email_info != "" && $email_info != NULL) {
      ?>
        <div class="grid py-2 lg:grid-cols-2 sm:border-y border-grey">
          <div class="text-base py-1">
            EMAIL
          </div>
          <div class="text-base py-1 lg:text-right">
            <a href="mailto:<?php echo $email_info; ?>"><?php echo $email_info; ?></a>
          </div>
        </div>
      <?php
      };
      ?>
      <!-- Telefoonnummer invuld laten zien -->
      <?php
      if ($phone_info != "" && $phone_info != NULL) {
      ?>
        <div class="grid lg:grid-cols-2 sm:border-b border-grey py-2">
          <div class="text-base py-1">
            PHONE
          </div>
          <div class="text-base lg:text-right py-1">
            <a href="tel:<?php echo $phone_info; ?>"><?php echo $phone_display; ?></a>
          </div>
        </div>
      <?php
      };
      ?>
    </div>
    <div class="sm:order-first basis-full sm:basis-1/3 sm:basis-3/5">
      <img class="sm:h-screen sm:w-full object-cover grayscale sm:sticky sm:top-0" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
  </div>
</section>