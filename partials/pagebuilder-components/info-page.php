<?php
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$info_text = get_sub_field('info_text');

?>
<section>
  <div class="flex flex-col sm:flex-row">
    <div class="basis-full sm:basis-2/3">
      <div class="pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-5xl">
        <p><?php echo $info_text; ?></p>
      </div>
    </div>
    <div class="basis-full sm:basis-1/3">
      <img class="sm:sticky top-0 sm:h-screen object-cover grayscale" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
  </div>
</section>