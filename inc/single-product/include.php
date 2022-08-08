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
    echo '<div class="product-images  flex-col gap-y-5 hidden lg:flex">';
    echo '<div class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover">';
    the_post_thumbnail();
    echo '</div>';


    foreach ($attachment_ids as $attachment_id) {
        echo '<div class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover">';
        echo wp_get_attachment_image($attachment_id, 'full');
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="swiper-single-product overflow-hidden relative lg:hidden">';
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
    echo '<div class="swiper-pagination !left-[5px] !w-[50px]"></div>';
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

?>
    <section class="mb-5">
        <div class="flex flex-col border-b border-black pb-3">
            <div class="w-full flex flex-row justify-between">
                <div><?php the_title(); ?></div>
                <div><?php woocommerce_template_single_price(); ?></div>
            </div>
        </div>
        <?php woocommerce_template_single_add_to_cart(); ?>
    </section>
    <?php if ($description_content || $care_guide_content || $size_guide_content || $history_content) { ?>
        <section class="space-y-5">
            <?php if (get_the_content()) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>DESCRIPTION</button>

                    <div x-show="expanded" x-collapse>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php
            }
            if ($care_guide_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>CARE GUIDE</button>

                    <div x-show="expanded" x-collapse>
                        <?php echo $care_guide_content ?>
                    </div>
                </div>
            <?php
            }
            if ($size_guide_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>SIZE GUIDE</button>

                    <div x-show="expanded" x-collapse>
                        <?php echo $size_guide_content ?>
                    </div>
                </div>
            <?php
            }
            if ($history_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded"><span :class="expanded ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>HISTORY CONTENT</button>

                    <div x-show="expanded" x-collapse>
                        <?php echo $history_content ?>
                    </div>
                </div>
            <?php
            } ?>
        </section>
<?php
    }
}
