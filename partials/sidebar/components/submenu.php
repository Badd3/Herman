<template x-teleport="body">
    <?php
    $i = $args['count'];
    $mobile = $args['mobile'];
    $expanded_menu = $args['expanded'];
    $parent_id = $args['parent_id'];
    $post_parent_id = wp_get_post_parent_id();

    // if ($expanded_menu) {
    //     $expanded = 'true';
    // } else {
    //     $expanded = 'false';
    // }
    // echo $expanded;

    if ($mobile) {
        $section_classes = 'hidden w-1/2 !right-0 !z-[21]';
        $motion_classes = '!block lg:!hidden';
        $wrapper_classes = 'pt-[134px]';
        $keep_menu_open = '';
    } else {
        $section_classes = 'hidden lg:block w-[208px] left-0 z-[1] xx';
        $motion_classes = 'left-[208px]';
        $wrapper_classes = 'pt-28';
        $keep_menu_open = 'left-[209px]';
    }

    ?>
    <section x-data="{open : false, parent_id: <?php echo $parent_id; ?>}" :open="[selected == <? echo $i; ?>, parent_id == <?php echo $post_parent_id; ?>] ? open = true : open = false" @click.outside="open ? [selected = null, parent_id = null] : ''" class="duration-300 fixed h-full top-0 bg-white-bg <?php echo $section_classes; ?>" :class="{'<?php echo $motion_classes; ?>': selected == <? echo $i; ?> , '<?php echo $keep_menu_open; ?>': parent_id == <?php echo $post_parent_id; ?>}">
        <?php if ($mobile) { ?>
            <button @click="navOpen = !navOpen, selected = null" class="absolute right-5 top-5 text-black z-[22] text-lg">X</button>
        <?php }; ?>

        <?php
        if (have_rows('submenu_items')) : ?>
            <div class="px-7 pb-8 pt- h-full <?php echo $wrapper_classes; ?>">
                <ul class="flex flex-col gap-3 mb-2 text-grey justify-between uppercase">
                    <?php

                    // loop through rows (sub repeater)
                    while (have_rows('submenu_items')) : the_row();

                        if (get_sub_field('link_type') == 'page_link') {
                            $sub_nav_item = get_sub_field('submenu_link_default');
                            $sub_nav_item_link = $sub_nav_item['url'];
                            $link_target = $sub_nav_item['target'] ? $sub_nav_item['target'] : '_self';
                            $sub_nav_item_label = $sub_nav_item['title'];
                        } elseif (get_sub_field('link_type') == 'product_category') {

                            $sub_nav_item_link = get_term_link((int)get_sub_field('submenu_link_product'), 'product_cat');
                            $sub_nav_item_label = get_sub_field('submenu_label');
                        }



                    ?>
                        <li>
                            <a class="hover:text-black duration-300 text-base" href="<?php echo $sub_nav_item_link; ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo $sub_nav_item_label; ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif;
        ?>



    </section>



</template>