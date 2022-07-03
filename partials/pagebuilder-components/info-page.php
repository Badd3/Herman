<?php 
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$info_text = get_sub_field('info_text');

?>


  <div class="relative bg-white">
  <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:mx-auto lg:grid lg:grid-cols-2">
    <div class="lg:col-start-1">
      <div class="text-base max-w-prose mx-auto lg:ml-auto lg:mr-0">
       <div class="mt-5 prose prose-indigo text-gray-500">
          <p><?php echo $info_text;?></p>
      </div>
      </div>
    </div>
  </div>
  <div class="lg:fixed lg:inset-0">
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/3">
      <img class="h-full w-full object-cover lg:absolute lg:h-full" src="<?php echo $image_url;?>" alt="<?php echo $image_alt;?>">
    </div>
  </div>
</div>