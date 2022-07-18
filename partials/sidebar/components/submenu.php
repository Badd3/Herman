<template x-teleport="#sub-menu-container">
    <?php
    $i = $args['count'];
    ?>
    <div x-data="{open : false}">
        <section :open="selected == <? echo $i; ?> ? open = true : open = false" @click.outside="open ? selected = null : ''" class="duration-300 absolute h-full left-0 top-0 w-1/6 bg-white z-[1]" :class="selected == <? echo $i; ?> ? 'left-[16.6667%]' : ''">

            <?php

            echo $args['count'];
            if (have_rows('submenu_items')) : ?>
                <div class="px-7 pb-8 pt-28 h-full">
                    <ul class="flex flex-col gap-3 mb-2 text-grey justify-between uppercase">
                        <?php

                        // loop through rows (sub repeater)
                        while (have_rows('submenu_items')) : the_row();

                            if (get_sub_field('link_type') == 'page_link') {

                                $sub_nav_item_link = get_sub_field('submenu_link_default');
                            } elseif (get_sub_field('link_type') == 'product_category') {

                                $sub_nav_item_link = get_term_link(get_sub_field('submenu_link_product'), 'product_cat');
                            }


                            $sub_nav_item_label = get_sub_field('submenu_label');



                        ?>
                            <li>
                                <a class="hover:text-black duration-300 text-base" href="<?php echo $sub_nav_item_link; ?>"><?php echo $sub_nav_item_label; ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; //if( get_sub_field('items') ): 
            ?>


        </section>
    </div>



</template>