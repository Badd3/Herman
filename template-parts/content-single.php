<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="h-[70vh] lg:h-[90vh] w-full flex">
		<img src="<?php the_post_thumbnail_url(); ?>" class="object-cover w-full">
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