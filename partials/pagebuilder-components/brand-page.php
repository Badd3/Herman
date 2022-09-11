<?php
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$brand_text = get_sub_field('brand_text');

?>

<section>
  <div class="flex flex-col-reverse md:flex-row gap-10">
    <div class="px-2.5 pb-8 md:pt-28 sm:basis-2/3 md:basis-2/5 text-gray-900 text-base">
      <p><?php echo $brand_text; ?></p>
    </div>
    <div class="basis-full sm:basis-1/3 md:basis-3/5">
      <img class="md:h-screen w-full object-cover grayscale sm:sticky sm:top-0" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
  </div>
</section>