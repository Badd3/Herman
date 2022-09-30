<?php
if (is_shop() || is_product_category() || is_product()) {
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);


    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);





    add_action('woocommerce_before_shop_loop_item', 'herman_template_loop_product_link_open', 10);

    function herman_template_loop_product_link_open()
    {
        echo '<a class="aspect-w-[54] aspect-h-[73] block group" href="' . get_the_permalink() . '">';
    }

    add_action('woocommerce_shop_loop_item_title', 'herman_template_loop_product_link_close', 5);


    function herman_template_loop_product_link_close()
    {
        echo '</a>';

        //wrapper for the price and title
        echo '<div class="border-t border-black flex flex-col md:flex-row justify-between md:gap-4 p-2.5 lg:p-5 text-sm lg:text-md font-medium">';
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

        global $product;
        $attachment_ids = $product->get_gallery_image_ids();
        $thumbnail_url = wp_get_attachment_image_src($attachment_ids[0], 'full');

        //als er geen image in gallery is dan word de hover image niet getoond
        if ($thumbnail_url) {
            $hover_classes = "object-cover group-hover:hidden";
        } else {
            $hover_classes = "object-cover";
        }
        echo the_post_thumbnail('thumbnail', array('class' => $hover_classes));
?>
        <img class="hidden group-hover:block object-cover" src="<?php echo $thumbnail_url[0]; ?>">
<?php


        // if ($attachment_ids = $product->get_gallery_image_ids()) {
        //     echo wc_get_gallery_image_html($attachment_ids[0], array('class' => 'object-cover'));
        // }
        // echo $img;
    }
}
