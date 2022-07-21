<?php
if (is_shop()) {
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);


    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);



    add_action('woocommerce_before_shop_loop_item', 'herman_template_loop_product_link_open', 10);

    function herman_template_loop_product_link_open()
    {
        echo '<a class="aspect-w-[54] aspect-h-[73] block" href="' . get_the_permalink() . '">';
    }

    add_action('woocommerce_shop_loop_item_title', 'herman_template_loop_product_link_close', 5);


    function herman_template_loop_product_link_close()
    {
        echo '</a>';

        //wrapper for the price and title
        echo '<div class="flex flex-row justify-between p-2.5 lg:p-5 text-xs lg:text-md">';
    }


    function herman_template_loop_product_wrapper_close()
    {
        echo '</div>';
    }

    add_action('woocommerce_after_shop_loop_item', 'herman_template_loop_product_wrapper_close', 5);

    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    add_action('woocommerce_before_shop_loop_item_title', 'loop_product_custom_thumbnail', 10);

    function loop_product_custom_thumbnail()
    {
        echo the_post_thumbnail('thumbnail', array('class' => 'object-cover'));
    }
}
