<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="h-[548px] lg:h-[90vh] w-full flex relative justify-center items-center">
		<div class="absolute left-0 top-0 flex overflow-hidden h-full w-full">
			<img src="<?php the_post_thumbnail_url(); ?>" class="object-cover w-full">
		</div>
		<h3 class="sticky top-[80px] max-w-[166px] text-center lg:max-w-none block text-white text-base lg:text-lg"><?php the_field('post_slogan'); ?></h3>
	</section>

	<section>
		<div class="max-w-[544px] mx-auto py-10 px-2.5">
			<?php the_content(); ?>

			<?php the_post_navigation(array(
				'prev_text'  => __('PREVIOUS'),
				'next_text'  => __('NEXT'),
			));
			?>
		</div>
	</section>

</article>