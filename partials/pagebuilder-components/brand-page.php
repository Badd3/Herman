<?php 
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$brand_text = get_sub_field('brand_text');

?>


<div class="flex flex-col sm:flex-row">
    <div class="px-7 pb-8 pt-28 sm:basis-2/3 md:basis-2/5 text-gray-900">
        <p><?php echo $brand_text;?></p>
    </div> 
    <div class="basis-full sm:basis-1/3 md:basis-3/5">
      <img class="sm:h-screen sm:w-full object-cover grayscale" src="<?php echo $image_url;?>" alt="<?php echo $image_alt;?>">
    </div>
</div>