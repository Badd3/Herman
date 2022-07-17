<?php
$image = get_sub_field('image_left');
$image_url = get_sub_field('image_left')['url'];
$image_alt = get_sub_field('image_left')['alt'];

$contact_info = get_sub_field('contact_info');

?>

<section>
  <div class="flex flex-col sm:flex-row">
  <div class="basis-full sm:basis-1/3 md:basis-3/5">
      <img class="sm:h-screen sm:w-full object-cover grayscale sm:sticky sm:top-0" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
    <div class="px-7 pb-8 pt-28 sm:basis-2/3 md:basis-2/5 text-gray-900">
      <h1 class="mb-8"><?php the_field('titel'); ?></h1>
      <?php
      if (get_field('shortcode')) {
        echo do_shortcode(get_field('shortcode'));
      };
      ?>
    </div>
  </div>
</section>