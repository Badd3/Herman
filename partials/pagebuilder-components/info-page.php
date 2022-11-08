<?php
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$info_text = get_sub_field('info_text');

?>
<section class="bg-white-bg infoList">
  <div class="flex justify-center">
    <div class="basis-full sm:basis-2/5 text-base pb-16 px-2.5 lg:py-28 lg:max-w-5xl tableView">
      <p><?php echo $info_text; ?></p>
    </div>
  </div>


</section>