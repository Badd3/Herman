<?php
/* Template Name: Subscribe Page */
get_header(); ?>

<section class="flex justify-center items-center min-h-screen bg-no-repeat bg-cover" style="background-image: url(<?php the_field('bg_image'); ?>)">
	<div class="bg-white border border-black w-[90%] max-w-[343px] p-10 m-auto">
		<p class="mb-4"><?php the_field('titel'); ?></p>
		<?php
		if (get_field('shortcode')) {
			echo do_shortcode(get_field('shortcode'));
		};
		?>
	</div>
</section>

<?php get_footer('minimal'); ?>

