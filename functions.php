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

require 'inc/navigation.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

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

remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );


 function get_breadcrumb() {
    global $post;
        if (is_category() || is_single()) {
            the_category(' / ');
            if (is_single()) {
                echo ' / ';
                the_title();
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    // $output = '<a class="uppercase text-xs inline" href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> <p class="text-xs inline">></p>';
					$output = '<p class="uppercase text-xs inline" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</p> <p class="text-xs inline">></p>';
				}
                echo $output;
                echo '<p class="uppercase text-xs inline" title="'.$title.'"> '.$title.'</p>';
            } else {
                echo '<strong> '.get_the_title().'</strong>';
            }
        }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive for "; the_time('F jS, Y');}
    elseif (is_month()) {echo"Archive for "; the_time('F, Y');}
    elseif (is_year()) {echo"Archive for "; the_time('Y');}
    elseif (is_author()) {echo"Author Archive";}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives";}
    elseif (is_search()) {echo"Search Results";}
}

// WooCommerce Checkout Fields Hook
add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');

// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function custom_wc_checkout_fields_no_label($fields) {
    // loop by category
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($value as $field => $property) {
            // remove label property
            unset($fields[$category][$field]['label']);
        }
    }
     return $fields;
}


/**
 Remove all possible fields
 **/
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    unset( $fields['billing']['billing_company'] );
    // unset( $fields['billing']['billing_email'] );
    unset( $fields['billing']['billing_phone'] );
    unset( $fields['billing']['billing_state'] );
    // unset( $fields['billing']['billing_first_name'] );
    // unset( $fields['billing']['billing_last_name'] );
    // unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    // unset( $fields['billing']['billing_city'] );
    // unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    unset( $fields['shipping']['shipping_company'] );
    unset( $fields['shipping']['shipping_phone'] );
    unset( $fields['shipping']['shipping_state'] );
    // unset( $fields['shipping']['shipping_first_name'] );
    // unset( $fields['shipping']['shipping_last_name'] );
    // unset( $fields['shipping']['shipping_address_1'] );
    unset( $fields['shipping']['shipping_address_2'] );
    // unset( $fields['shipping']['shipping_city'] );
    // unset( $fields['shipping']['shipping_postcode'] );

    // Order fields
    unset( $fields['order']['order_comments'] );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
 {
 $fields['billing']['billing_first_name']['placeholder'] = 'NAME';
 $fields['billing']['billing_last_name']['placeholder'] = 'SURNAME';
 $fields['billing']['billing_email']['placeholder'] = 'EMAIL'; 
 $fields['billing']['billing_address_1']['placeholder'] = 'ADDRESS';
 $fields['billing']['billing_address_1_field']['placeholder'] = 'ADDRESS';
 $fields['billing']['billing_postcode']['placeholder'] = 'POSTCODE';
 $fields['billing']['billing_city']['placeholder'] = 'CITY';    

 $fields['shipping']['shipping_first_name']['placeholder'] = 'NAME';
 $fields['shipping']['shipping_last_name']['placeholder'] = 'SURNAME';
 $fields['shipping']['shipping_email']['placeholder'] = 'EMAIL'; 
 $fields['shipping']['shipping_address_1']['placeholder'] = 'ADDRESS';
 $fields['shipping']['shipping_postcode']['placeholder'] = 'POSTCODE';
 $fields['shipping']['shipping_city']['placeholder'] = 'CITY';


 return $fields;
 }