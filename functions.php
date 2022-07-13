<?php

/**
 * Theme setup.
 */
function tailpress_setup()
{
	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'tailpress'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');

	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'tailpress_setup');



/**
 * Load WooCommerce compatibility file.
 */
// if (class_exists('WooCommerce')) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts()
{
	$theme = wp_get_theme();

	wp_enqueue_style('tailpress', tailpress_asset('css/app.css'), array(), $theme->get('Version'));
	wp_enqueue_script('tailpress', tailpress_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3);


//Defer parsing of JS
function defer_parsing_of_js($url)
{
	if (is_user_logged_in()) return $url; //don't break WP Admin
	if (FALSE === strpos($url, '.js')) return $url;
	if (strpos($url, 'jquery.js')) return $url;
	return str_replace(' src', ' defer src', $url);
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);


if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Thema Opties',
		'menu_title'	=> 'Thema Opties',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Navigatie',
		'menu_title'	=> 'Navigatie',
		'parent_slug'	=> 'theme-general-settings',
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

}

function remove_editor()
{
	remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');


add_filter('wpcf7_autop_or_not', '__return_false');


//redirect non-admins to the coming soon page
// function coming_soon_redirect()
// {
// 	global $pagenow;

// 	if (!current_user_can('manage_options') && !is_page("login") && !is_page("coming-soon") && $page_now != "wp-login.php") {
// 		wp_redirect(home_url("coming-soon"));
// 		exit;
// 	}
// }
// add_action('template_redirect', 'coming_soon_redirect');
