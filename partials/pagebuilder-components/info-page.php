<?php
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$info_text = get_sub_field('info_text');

?>
<section class="bg-white-bg">
    <div class="flex justify-center">
      <div class="basis-full sm:basis-2/5 text-base pt-20 pb-16 px-4 sm:pt-24 sm:px-6 lg:px-8 lg:max-w-5xl">
      <div class="sm:invisible breadcrumb text-grey mb-4"><?php get_breadcrumb(); ?></div>
        <p><?php echo $info_text; ?></p>
      </div>
    </div>
    <!-- <div class="basis-full sm:basis-1/3">
      <img class="sm:sticky top-0 sm:h-screen object-cover grayscale" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div> -->
</section>