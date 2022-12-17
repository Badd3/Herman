<?php

/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?> px-6">
		<?php
		do_action('woocommerce_before_mini_cart_contents');

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			if ($cart_item['variation_id'] != 0) {
				// Getting attribute size selected value
				$attribute_color = $cart_item['variation']['attribute_color'];
				$attribute_size = $cart_item['variation']['attribute_size'];
				$attribute_length = $cart_item['variation']['attribute_length'];
			}
			$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
			$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
				$product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
				$thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
				$product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
				$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);


				if (get_field('color', $cart_item['product_id'])) {
					$item_color = get_field('color', $cart_item['product_id']);
				};
		?>
				<li class="flex flex-col md:flex-row woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">

					<?php if (empty($product_permalink)) : ?>
						<?php echo $thumbnail . wp_kses_post($product_name); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					<?php else : ?>
						<div class="mt-8 w-full">
							<div class="flow-root">
								<ul role="list" class="-mt-6 mb-2 divide-y divide-gray-200 border-t border-gray-200">
									<li class="flex pt-6 pb-4">
										<div class="h-32 w-20 flex-shrink-0 overflow-hidden">
											<a href="<?php echo esc_url($product_permalink); ?>">
												<?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?>
											</a>
										</div>
									<?php endif; ?>


									<div class="ml-4 flex flex-1 flex-col">
										<div>
											<div class="flex justify-between text-base text-black">
												<h3>
													<a href="<?php echo esc_url($product_permalink); ?>"> <?php echo $product_name ?> </a>
												</h3>
												<p class="ml-4">
													<?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?>
												</p>
											</div>
											<!-- <?php  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													echo (wc_get_formatted_cart_item_data($cart_item));
													?> -->
											<?php
											if ($attribute_color != "" && $attribute_color != NULL) {
											?>
												<div class="flex justify-between py-1 border-b border-black text-black">
													<p class="text-xs py-1">COLOR:</p>
													<p class="text-xs py-1"><?php echo $attribute_color; ?></p>
												</div>
											<?php
											};
											?>
											<?php
											if ($attribute_size != "" && $attribute_size != NULL) {
											?>
												<div class="flex justify-between py-1 border-b border-black text-black">
													<p class="text-xs py-1">SIZE: </p>
													<p class="text-xs py-1"><?php echo $attribute_size; ?></p>
												</div>
											<?php
											};
											?>
											<?php
											if ($attribute_length != "" && $attribute_length != NULL) {
											?>
												<div class="flex justify-between py-1 border-b border-black text-black">
													<p class="text-xs py-1">LENGTH: </p>
													<p class="text-xs py-1"><?php echo $attribute_length; ?></p>
												</div>
											<?php
											};
											?>
										</div>
										<?php if ($item_color) { ?>
											<div class="flex justify-between py-1 border-b border-black text-black">
												<p class="text-xs py-1">COLOR: </p>
												<p class="text-xs py-1 uppercase"><?php echo $item_color[0]; ?></p>
											</div>
										<?php }; ?>
										<div class="flex justify-between py-1 border-b border-black text-black">
											<p class="text-xs py-1">QUANTITY: </p>
											<p class="text-xs py-1"><?php echo $cart_item['quantity'] ?></p>
										</div>
										<div class="flex flex-row-reverse mt-2">
											<?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<div class="flex">
								<button type="button" class="text-xs text-black items-center justify-center border border-black hover:border-black  px-4 py-1 hover:bg-black hover:text-white"><a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">REMOVE</a></button>
							  	</div>',
													esc_url(wc_get_cart_remove_url($cart_item_key)),
													esc_attr__('Remove this item', 'woocommerce'),
													esc_attr($product_id),
													esc_attr($cart_item_key),
													esc_attr($_product->get_sku())
												),
												$cart_item_key
											);
											?>

										</div>
									</div>
									</li>
								</ul>
							</div>

					<?php
				}
			}

			do_action('woocommerce_mini_cart_contents');
					?>
					<div class="border-t border-gray-200 py-6">
						<div class="flex flex-row-reverse justify-between md:flex-row text-base text-black">
							<p class="hidden md:block"></p>
							<p class="woocommerce-mini-cart__total total fontnormal uppercase">
								<?php
								/**
								 * Hook: woocommerce_widget_shopping_cart_total.
								 *
								 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
								 */
								do_action('woocommerce_widget_shopping_cart_total');
								?>
							</p>
						</div>

						<?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>


						<div class="mt-6">
							<a href="<?php echo wc_get_checkout_url() ?>" class="hover:bg-black hover:text-white flex items-center justify-center border border-black  px-6 py-3 text-base font-base text-black shadow-sm  ">CHECKOUT</a>
						</div>
					</div>

					<?php do_action('woocommerce_widget_shopping_cart_after_buttons'); ?>
						</div>
						</div>
	</ul>



<?php else : ?>
	<p class="woocommerce-mini-cart__empty-message ml-6"><?php esc_html_e('NO PRODUCTS IN THE CART.', 'woocommerce'); ?></p>
	<div class="px-6 mt-6">
		<a href="/shop" class="hover:bg-black hover:text-white flex items-center justify-center border border-black  px-6 py-3 text-base font-base text-black shadow-sm">CHECK PRODUCTS</a>
	</div>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>