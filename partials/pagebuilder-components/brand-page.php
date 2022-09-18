<?php
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$brand_text = get_sub_field('brand_text');

$herman_sound_text = get_sub_field('sound_text');
$herman_sound_image = get_sub_field('sound_image');
$herman_sound_file = get_sub_field('sound_file');

?>

<section>
  <div class="flex flex-col-reverse md:flex-row gap-10">
    <div class="px-3 pb-8 md:pt-28 sm:basis-2/3 md:basis-2/5 text-gray-900 text-base">
    <?php
      if ($herman_sound_text || $herman_sound_image || $herman_sound_file ) {
        ?>
        <div class="flex">
          <p><?php echo $herman_sound_text; ?></p>
          <img class="h-[20px] mt-6 pl-2 cursor-pointer" src="<?php echo $herman_sound_image; ?>" value="PLAY" @click="$refs.audio.play()">
          <audio x-ref="audio" src="<?php echo $herman_sound_file; ?>"></audio>
      </div>

        <?php
      }
    ?>

      <p class="mt-4"><?php echo $brand_text; ?></p>

    </div>
    <div class="basis-full sm:basis-1/3 md:basis-3/5">
      <img class="md:h-screen w-full object-cover grayscale sm:sticky sm:top-0" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </div>
  </div>
</section>