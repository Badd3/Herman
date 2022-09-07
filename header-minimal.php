<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white-bg text-gray-900 antialiased'); ?>>

	<section class="flex justify-center mt-10 fixed w-full">
		<img class="w-44" src="<?php echo esc_url(get_template_directory_uri() . '/images/herman-logo-black.svg'); ?>" alt="logo-black">
	</section>
	<main class="h-screen">