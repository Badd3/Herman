<?php 
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$info_text = get_sub_field('info_text');

?>

<div class="flex flex-col md:flex-row">
  <div class="basis-full lg:basis-2/3">
    <div class="pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-5xl text-gray-500">
      <p><?php echo $info_text;?></p>
    </div>
  </div>  
  <div class="lg:basis-1/3">
    <img class="lg:fixed lg:h-screen object-cover grayscale" src="<?php echo $image_url;?>" alt="<?php echo $image_alt;?>">
  </div>
</div>