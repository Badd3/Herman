<?php
/* Template Name: Coming Soon Page */
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php get_header('minimal'); ?>

<section style="background-image: url(<?php the_field('bg_image'); ?>" class="bg-no-repeat bg-cover grid content-center bg-white-bg coming-soon items-center min-h-full justify-center relative coming-soon-mobile">
	<div class="container">
		<div class="text-white text-center">
			<h1 class="text-[20px] mb-[10px]"><?php the_field('titel'); ?></h1>
			<p class="text-base"><?php the_field('subtitel'); ?></p>
		</div>
	</div>
	<div class="text-base bg-white-bg border border-black left-1/2 translate-x-[-50%] bottom-16 w-[90%] absolute lg:translate-x-0 lg:left-auto lg:right-[76px] lg:bottom-[45px] max-w-[343px] p-10 pop-up">
		<p class="mb-4">HERMAN will launch soon. Subscribe to the newsletter and be the first to know.</p>
		<?php
		if (get_field('shortcode')) {
			echo do_shortcode(get_field('shortcode'));
		};
		?>
	</div>
</section>


<?php
get_footer('minimal');
