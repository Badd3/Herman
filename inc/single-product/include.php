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
    echo '<div class="product-images flex-col gap-y-5 hidden md:flex  h-fit">';
    echo '<a class="chocolat-image zoom-cursor border border-black [&_>img]:w-full" href="' . $thumbnail_url . '" class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover">';
    the_post_thumbnail();
    echo '</a>';


    foreach ($attachment_ids as $attachment_id) {
        $attachment_url = wp_get_attachment_url($attachment_id, 'full');
        echo '<a class="chocolat-image zoom-cursor border border-black [&_>img]:w-full" href="' . $attachment_url . '" class="aspect-w-[54] aspect-h-[73] [&>*]:object-cover">';
        echo wp_get_attachment_image($attachment_id, 'full w-full');
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
    $badges = get_field('badges');
    $care_guide_content = get_field('care_guide_content');
    $size_guide_content = get_field('size_guide_content');
    $history_content = get_field('history_content');
    $color = get_field('color');
    $current_page_id = get_the_ID();
    $term_obj_list = get_the_terms($post->ID, 'product_group');
?>




    <section class="mb-5">
        <?php
        if ($badges) {
            echo '<div class="w-full flex flex-row-reverse mb-2">

                        
                        <span class="bg-white-bg h-fit w-fit px-1 border border-black text-base pointer-events-none">' . $badges;
            echo '
                        </span></div>';
        }; ?>

        <div class="flex flex-col border-b border-black pb-3">
            <div class="w-full flex flex-row justify-between">
                <div>
                    <h1 class="text-base"><?php the_title(); ?></h1>
                </div>
                <div><?php woocommerce_template_single_price(); ?></div>
            </div>
        </div>
        <?php if ($color) { ?>
            <div class="flex flex-row border-x border-black border-b border-b-black">
                <div class="border-r-black border-r w-[95px] shrink-0 lg:basis-[95px] py-1.5 px-3 flex flex-col justify-center">
                    <span class="uppercase">Color</span>
                </div>
                <?php

                $args = array(
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_group',
                            'field' => 'slug',
                            'terms' => $term_obj_list[0]->slug
                        )
                    ),
                    'post_type' => 'product',
                    'orderby' => 'title',
                );
                $query = new WP_Query($args);

                ?>


                <div class=" py-1 flex flex-row flex-wrap gap-x-4 px-3">

                    <?php

                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                            $loop_id = get_the_id();
                            $product_color = get_field('color');

                            if ($loop_id === $current_page_id) {
                                $fill_box_classes = 'bg-black';
                            } else {
                                $fill_box_classes = 'bg-white';
                            }
                    ?>


                            <a class="flex flex-row flex-nowrap items-center gap-2" href="<?php the_permalink(); ?>">
                                <span class="uppercase"><?php echo $product_color[0]; ?></span>
                                <div class="block w-[10px] h-[10px] border-black border <?php echo $fill_box_classes; ?> hoverBlack"></div>
                            </a>
                    <?php


                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>

                </div>

            </div>
        <?php }; ?>

        <?php woocommerce_template_single_add_to_cart(); ?>
    </section>
    <?php if ($description_content || $care_guide_content || $size_guide_content || $history_content) { ?>
        <section x-data="{selected: null}" class="space-y-5 text-base">

            <?php if (get_the_content()) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="selected !== 0 ? selected = 0 : selected = null" class="duration-300" :class="selected === 0 ? 'mb-[10px]' : ''"><span :class="selected === 0 ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>DESCRIPTION</button>

                    <div x-show="selected === 0" x-collapse>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php
            }
            if ($care_guide_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="selected !== 1 ? selected = 1 : selected = null" class="duration-300" :class="selected === 1 ? 'mb-[10px]' : ''"><span :class="selected === 1 ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>GARMENT CARE</button>

                    <div x-show=" selected === 1" x-collapse>
                        <?php echo $care_guide_content ?>
                    </div>
                </div>
            <?php
            }
            if ($size_guide_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="selected !== 2 ? selected = 2 : selected = null" class="duration-300" :class="selected === 2 ? 'mb-[10px]' : ''"><span :class="selected === 2 ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>SIZE ASSISTANCE</button>

                    <div x-show=" selected === 2" x-collapse>
                        <?php echo $size_guide_content ?>
                    </div>
                </div>
            <?php
            }
            if ($history_content) { ?>
                <div x-data="{ expanded: false }">
                    <button @click="selected !== 3 ? selected = 3 : selected = null" class="duration-300" :class="selected === 3 ? 'mb-[10px]' : ''"><span :class="selected === 3 ? 'rotate-45' : ''" class="mr-3 duration-300 inline-block">+</span>DELIVERY</button>

                    <div x-show="selected === 3" x-collapse>
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
    return 'More from Herman';
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
