<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="h-[70vh] lg:h-[90vh] w-full grid grid-rows-3 grid-cols-3 overflow-hidden relative">
		<img src="<?php the_post_thumbnail_url(); ?>" class="z-[0] object-cover w-full col-start-1 row-start-1 col-span-3 row-span-3 object-center">
		<h3 class="col-start-2 col-end-3 row-start-2 row-end-3 z-[2] self-center justify-self-center sticky top-5">TEST SENTENCE</div>
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