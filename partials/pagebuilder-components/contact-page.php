<?php
$contact_title_top = get_sub_field('contact_title_top');
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
    <div class="px-2.5 px- md:px-10 pb-8 pt-16 sm:pt-28 sm:basis-2/3 md:basis-2/5 text-gray-900">
      <h1 class="mb-8"><?php echo $contact_title_top; ?></h1>
      <?php


      if (get_sub_field('contact_shortcode')) {
        echo '<div class="mb-[60px]">';
        echo do_shortcode(get_sub_field('contact_shortcode'));
        echo '</div>';
      };
      ?>
      <h2 class="mt-5 mb-8"><?php echo $contact_title ?></h2>
      <!-- Email invuld laten zien -->
      <?php
      if ($email_info) {
      ?>
        <div class="flex py-2 lg:grid-cols-2 border-y border-black">
          <div class="text-base w-1/4 py-1">
            EMAIL
          </div>
          <div class="text-base w-3/4 py-1 text-right">
            <a href="mailto:<?php echo $email_info; ?>"><?php echo $email_info; ?></a>
          </div>
        </div>
      <?php
      };
      ?>
      <!-- Telefoonnummer invuld laten zien -->
      <?php
      if ($phone_info) {
      ?>
        <div class="flex py-2 lg:grid-cols-2 border-b border-black">
          <div class="text-base w-1/4 py-1">
            PHONE
          </div>
          <div class="text-base w-3/4 py-1 text-right">
            <a href="tel:<?php echo $phone_info; ?>"><?php echo $phone_display; ?></a>
          </div>
        </div>
      <?php
      };
      ?>
    </div>
    <div class="sm:order-first basis-full sm:basis-3/5">
      <img class="sm:h-screen sm:w-full object-cover grayscale sm:sticky sm:top-0" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
  </div>
</section>