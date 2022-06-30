<?php 
$image = get_sub_field('image_right');
$image_url = get_sub_field('image_right')['url'];
$image_alt = get_sub_field('image_right')['alt'];

$info_text = get_sub_field('info_text');

?>
<p><?php echo $info_text;?></p>
<img src="<?php echo $image_url;?>" class="" alt="<?php echo $image_alt;?>">