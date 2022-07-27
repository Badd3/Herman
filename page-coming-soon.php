<?php
/* Template Name: Coming Soon Page */
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
<?php get_header('minimal'); ?>

<section class="grid content-center bg-white-bg coming-soon items-center min-h-full justify-center">
	<div class="container">
		<h1 class="mb-8"><?php the_field('titel'); ?></h1>
		<?php
		if (get_field('shortcode')) {
			echo do_shortcode(get_field('shortcode'));
		};
		?>
	</div>
</section>


<?php
get_footer('minimal');
