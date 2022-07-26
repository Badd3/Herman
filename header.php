<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<?php do_action('tailpress_site_before'); ?>

	<div x-data="{ navOpen: false, bagOpen: false }" id="page" class="min-h-screen flex flex-col">

		<?php do_action('tailpress_header'); ?>

		<?php get_template_part('partials/sidebar/navigation'); ?>

		<!-- Mobile header -->
		<?php get_template_part('partials/mobile/header'); ?>
		<?php get_template_part('partials/mobile/off-canvas'); ?>

		<!-- Desktop header -->
		<?php get_template_part('partials/desktop/header'); ?>

		<!-- Core -->
		<?php get_template_part('partials/core/off-canvas-bag'); ?>

		<div id="content" class="site-content flex-grow w-full lg:ml-auto lg:w-5/6">

			<?php do_action('tailpress_content_start'); ?>

			<main>