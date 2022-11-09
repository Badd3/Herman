<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="h-[140vh] w-full flex relative ">
		<div class="absolute left-0 top-0 flex overflow-hidden h-full w-full">
			<img src="<?php the_post_thumbnail_url(); ?>" class="object-cover w-full">
		</div>

		<h3 class="sticky top-1/2 translate-y-[-50%] mx-auto h-max max-w-[544px] text-center lg:max-w-none block text-white text-base "><?php the_field('post_slogan'); ?></h3>
	</section>

	<section>
		<div class="max-w-[544px] mx-auto py-10 px-2.5">
			<?php the_content(); ?>

			<?php
			echo '<div class="nav-links">';
			/* Infinite next and previous post looping */
			if (get_adjacent_post(false, '', true)) {
				echo '<div class="nav-next hover:bg-black hover:text-white">';
				previous_post_link('%link', 'PREVIOUS');
				echo '</div>';
			} else {
				$first = new WP_Query('posts_per_page=1&order=DESC');
				$first->the_post();
				echo '<div class="nav-previous hover:bg-black hover:text-white" <a class="nav-previous" href="' . get_permalink() . '">PREVIOUS</a></div>';
				wp_reset_query();
			};

			if (get_adjacent_post(false, '', false)) {
				echo '<div class="nav-next hover:bg-black hover:text-white">';
				next_post_link('%link', 'NEXT');
				echo '</div>';
			} else {
				$last = new WP_Query('posts_per_page=1&order=ASC');
				$last->the_post();
				echo '<div class="nav-previous hover:bg-black hover:text-white"><a href="' . get_permalink() . '">NEXT</a></div>';
				wp_reset_query();
			};
			echo '</div>';
			?>
		</div>
	</section>

</article>