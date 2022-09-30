<?php
//  * @hooked woocommerce_template_single_title - 5
//  * @hooked woocommerce_template_single_rating - 10
//  * @hooked woocommerce_template_single_price - 10
//  * @hooked woocommerce_template_single_excerpt - 20
//  * @hooked woocommerce_template_single_add_to_cart - 30
//  * @hooked woocommerce_template_single_meta - 40
//  * @hooked woocommerce_template_single_sharing - 50

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

add_action('woocommerce_before_single_product_summary', 'single_product_images', 20);

function single_product_images()
{
    global $product;
    $attachment_ids = $product->get_gallery_attachment_ids();
    $thumbnail_url = get_the_post_thumbnail_url(get_the_id(), 'full');
    echo '<div class="product-images flex-col gap-y-5 hidden md:flex">';
    echo '<a class="chocolat-image zoom-cursor" href="' . $thumbnail_url . '" class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover">';
    the_post_thumbnail();
    echo '</a>';


    foreach ($attachment_ids as $attachment_id) {
        $attachment_url = wp_get_attachment_url($attachment_id, 'full');
        echo '<a class="chocolat-image zoom-cursor" href="' . $attachment_url . '" class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover">';
        echo wp_get_attachment_image($attachment_id, 'full');
        echo '</a>';
    }
    echo '</div>';

    echo '<div class="swiper-single-product overflow-hidden relative md:hidden">';
    echo '<div class="swiper-wrapper">';
    echo '<div class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover swiper-slide">';
    the_post_thumbnail();
    echo '</div>';


    foreach ($attachment_ids as $attachment_id) {
        echo '<div class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover swiper-slide">';
        echo wp_get_attachment_image($attachment_id, 'full');
        echo '</div>';
    }
    echo '</div>';
    echo '<div class="swiper-pagination left-[5px] !w-[300px] flex"></div>';
    echo '</div>';

?>

<?php
}

function wc_remove_all_quantity_fields($return, $product)
{
    return true;
}
add_filter('woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2);

add_action('woocommerce_single_product_summary', 'single_product_description', 20);

function single_product_description()
{
    $description_content = get_the_content();
    $care_guide_content = get_field('care_guide_content');
    $size_guide_content = get_field('size_guide_content');
    $history_content = get_field('history_content');
    $color = get_field('color');
    $related_colors = get_field('related_products');

    // echo $related_colors[0];
    // var_dump(get_field('color', $related_colors[0]));

?>

    <section class="mb-5">
        <div class="flex flex-col border-b border-black pb-3">
            <div class="w-full flex flex-row justify-between">
                <div>
                    <h1 class="text-base"><?php the_title(); ?></h1>
                </div>
                <div><?php woocommerce_template_single_price(); ?></div>
            </div>
        </div>
        <?php if ($color || $related_colors) { ?>
            <div class="flex flex-row border-x border-black border-b border-b-black">
                <div class="border-r-black border-r w-[95px] shrink-0 lg:basis-[95px] py-1.5 px-3 flex flex-col justify-center">
                    <span class="uppercase">Color</span>
                </div>

                <div class=" py-1 flex flex-row flex-wrap gap-x-4 px-3">
                    <?php if ($color) { ?>
                        <div class="flex flex-row gap-2 items-center">
                            <span class="uppercase"> <?php echo $color[0]; ?></span>
                            <div class="block w-[10px] h-[10px] bg-black border-black border"></div>
                        </div>
                    <?php }; ?>

                    <?php
                    if ($related_colors) {
                        foreach ($related_colors as $item_color) {
                            $product_color = get_field('color', $item_color);
                    ?>
                            <a class="flex flex-row flex-nowrap items-center gap-2" href="<?php the_permalink($item_color); ?>">
                                <span class="uppercase"><?php echo $product_color[0]; ?></span>
                                <div class="block w-[10px] h-[10px] bg-white border-black border"></div>
                            </a>
                    <?php
                        }
                    }
                    ?>

                </div>

            </div>
        <?php }; ?>
        <?php woocommerce_template_single_add_to_cart(); ?>
    </section>
    <?php if ($description_content || $care_guide_content || $size_guide_content || $history_content) { ?>
        <section class="space-y-5 text-base">
            <?php if (get_the_content()) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded" class="duration-300" :class="expanded ? 'mb-[10px]' : ''"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>DESCRIPTION</button>

                    <div x-show="expanded" x-collapse>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php
            }
            if ($care_guide_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded" class="duration-300" :class="expanded ? 'mb-[10px]' : ''"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>CARE GUIDE</button>

                    <div x-show="expanded" x-collapse>
                        <?php echo $care_guide_content ?>
                    </div>
                </div>
            <?php
            }
            if ($size_guide_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded" class="duration-300" :class="expanded ? 'mb-[10px]' : ''"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>SIZE GUIDE</button>

                    <div x-show="expanded" x-collapse>
                        <?php echo $size_guide_content ?>
                    </div>
                </div>
            <?php
            }
            if ($history_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded" class="duration-300" :class="expanded ? 'mb-[10px]' : ''"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>HISTORY CONTENT</button>

                    <div x-show="expanded" x-collapse>
                        <?php echo $history_content ?>
                    </div>
                </div>
            <?php
            } ?>
        </section>

    <?php
        // woocommerce_output_related_products();
    }
}


add_action('woocommerce_after_single_product_summary', 'custom_related_products', 20);

function custom_related_products()
{
    ?>
    <section class="py-12">
        <?php
        woocommerce_output_related_products();
        ?>
    </section>
<?php
}


add_filter('woocommerce_product_related_products_heading', function () {
    return 'More to love';
});

/**
 * Change number of related products output
 */
function woo_related_products_limit()
{
    global $product;

    $args['posts_per_page'] = 4;

    return $args;
}
add_filter('woocommerce_output_related_products_args', 'woo_related_products_limit', 20);
