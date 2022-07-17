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
      if (get_field('shortcode')) {
        echo do_shortcode(get_field('shortcode'));
      };
      ?>
      <h2 class="mt-5 mb-8"><?php echo $contact_title ?></h2>
      <!-- Email invuld laten zien -->
      <?php
        if($email_info != "" && $email_info != NULL) {
          ?>
          <div class="grid grid-cols-2">
            <div class="text-base py-1 border-y border-grey">
              EMAIL
            </div>
            <div class="text-base py-1 text-right border-y border-grey">
              <a href="mailto:<?php echo $email_info; ?>"><?php echo $email_info; ?></a>
            </div>
        </div>
        <?php
        };
      ?>
      <!-- Telefoonnummer invuld laten zien -->
      <?php
        if($phone_info != "" && $phone_info != NULL) {
          ?>
          <div class="grid grid-cols-2">
            <div class="text-base py-1 border-b border-grey">
              PHONE
            </div>
            <div class="text-base text-right py-1 border-b border-grey">
              <a href="tel:<?php echo $phone_info; ?>"><?php echo $phone_display; ?></a>
            </div>
        </div>
        <?php
        };
      ?>
    </div>
    <div class="md:order-first basis-full sm:basis-1/3 md:basis-3/5">
      <img class="sm:h-screen sm:w-full object-cover grayscale sm:sticky sm:top-0" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
  </div>
</section>