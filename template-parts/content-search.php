<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ikpakjein
 */

?>
<?php
// var_dump(get_permalink($post->ID));
global $product;
$attachment_ids = $product->get_gallery_image_ids();
$thumbnail_url = wp_get_attachment_image_src($attachment_ids[0], 'full');

//als er geen image in gallery is dan word de hover image niet getoond
if ($thumbnail_url) {
	$hover_classes = "object-cover group-hover:hidden";
} else {
	$hover_classes = "object-cover";
}


$post_permalink = get_permalink($post->ID);


?>
<?php $price = get_post_meta(get_the_ID(), '_price', true); ?>
<li id="post-<?php the_ID(); ?>" <?php post_class('border border-black'); ?>>
	<a class="aspect-w-[54] aspect-h-[73] block group" href=" <?php echo $post_permalink; ?>">

		<?php
		echo the_post_thumbnail('thumbnail', array('class' => $hover_classes));
		?>
		<img class="hidden group-hover:block object-cover" src="<?php echo $thumbnail_url[0]; ?>">

	</a>
	<div class="border-t border-black flex flex-col md:flex-row justify-between md:gap-4 p-2.5 lg:p-5 text-sm lg:text-md font-medium">
		<h2 class="text-xs lg:text-base truncate"><?php the_title(); ?></h2>
		<span class="price"><?php echo wc_price($price); ?></span>
	</div>
</li><!-- #post-<?php the_ID(); ?> -->