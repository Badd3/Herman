<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package herman
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function herman_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 500,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	// add_theme_support('wc-product-gallery-zoom');
	// add_theme_support('wc-product-gallery-lightbox');
	// add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'herman_woocommerce_setup');



//Verwijder sidebar op product en product categories
function disable_woo_commerce_sidebar()
{
	if (is_product() || is_product_category() || is_shop()) {
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	}
}
add_action('wp', 'disable_woo_commerce_sidebar');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
// function herman_woocommerce_scripts()
// {
// 	wp_enqueue_style('herman-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array());

// 	$font_path   = WC()->plugin_url() . '/assets/fonts/';
// 	$inline_font = '@font-face {
// 			font-family: "star";
// 			src: url("' . $font_path . 'star.eot");
// 			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
// 				url("' . $font_path . 'star.woff") format("woff"),
// 				url("' . $font_path . 'star.ttf") format("truetype"),
// 				url("' . $font_path . 'star.svg#star") format("svg");
// 			font-weight: normal;
// 			font-style: normal;
// 		}';

// 	wp_add_inline_style('herman-woocommerce-style', $inline_font);
// }
// add_action('wp_enqueue_scripts', 'herman_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function herman_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'herman_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function herman_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'herman_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



if (!function_exists('herman_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function herman_woocommerce_wrapper_before()
	{
?>
		<main id="primary" class="site-main">

		<?php
	}
}
add_action('woocommerce_before_main_content', 'herman_woocommerce_wrapper_before');

if (!function_exists('herman_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function herman_woocommerce_wrapper_after()
	{
		?>
		</main><!-- #main -->
		<?php
	}
}
add_action('woocommerce_after_main_content', 'herman_woocommerce_wrapper_after');

//CUSTOM WRAPPERS

if (!function_exists('herman_woocommerce_flex_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function herman_woocommerce_flex_wrapper_before()
	{
		if (is_shop()) {
		?>

			<section class="herman-shop">
				<div class="container">

				<?php
			}
		}
	}
	add_action('woocommerce_before_main_content', 'herman_woocommerce_flex_wrapper_before', 5);

	if (!function_exists('herman_woocommerce_flex_wrapper_after')) {
		/**
		 * After Content.
		 *
		 * Closes the wrapping divs.
		 *
		 * @return void
		 */
		function herman_woocommerce_flex_wrapper_after()
		{

			if (is_shop()) {
				?>

				</div>
			</section>
		<?php
			}
		}
	}
	add_action('woocommerce_sidebar', 'herman_woocommerce_flex_wrapper_after', 11);

	/**
	 * Sample implementation of the WooCommerce Mini Cart.
	 *
	 * You can add the WooCommerce Mini Cart to header.php like so ...
	 *
	<?php
		if ( function_exists( 'herman_woocommerce_header_cart' ) ) {
			herman_woocommerce_header_cart();
		}
	?>
	 */

	if (!function_exists('herman_woocommerce_cart_link_fragment')) {
		/**
		 * Cart Fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @param array $fragments Fragments to refresh via AJAX.
		 * @return array Fragments to refresh via AJAX.
		 */
		function herman_woocommerce_cart_link_fragment($fragments)
		{
			ob_start();
			herman_woocommerce_cart_link();
			$fragments['a.cart-contents'] = ob_get_clean();

			return $fragments;
		}
	}
	add_filter('woocommerce_add_to_cart_fragments', 'herman_woocommerce_cart_link_fragment');

	if (!function_exists('herman_woocommerce_cart_link')) {
		/**
		 * Cart Link.
		 *
		 * Displayed a link to the cart including the number of items present and the cart total.
		 *
		 * @return void
		 */
		function herman_woocommerce_cart_link()
		{
		?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'herman'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'herman'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
		</a>
	<?php
		}
	}

	if (!function_exists('herman_woocommerce_header_cart')) {
		/**
		 * Display Header Cart.
		 *
		 * @return void
		 */
		function herman_woocommerce_header_cart()
		{
			if (is_cart()) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
	?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php herman_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
<?php
		}
	}



	/* PRODUCT ARCHIVE */


	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
	remove_action('woocommerce_before_shop_loop', 'woocommerce-products-header');



	/*** PRODUCT LOOP ***/


		// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);



		//Product categorie toevoegen aan product loop
		// add_action('woocommerce_before_shop_loop_item_title', 'display_category_shop_loop', 10);
		// add_action('woocommerce_after_shop_loop_item_title', 'close_flex_divs', 9);
		// add_action('woocommerce_after_shop_loop_item_title', 'close_flex_divs_after_price', 11);



		// function facetwp_flyout()
		// {

		// 	echo '<button class="facetwp-flyout-open">filter</button>';
		// }
		// add_action('woocommerce_before_shop_loop', 'facetwp_flyout');
