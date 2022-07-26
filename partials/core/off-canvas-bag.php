<section class="fixed h-full w-2/3 md:w-1/3 bg-white z-20 duration-700 ease-in-out" :class="bagOpen ? 'left-0' : '-left-full'">
    <div class="relative h-full w-full ">
        <button @click="bagOpen = !bagOpen" class="absolute right-5 top-5 text-black">X</button>

        <div class="text-grey flex flex-col justify-center pl-5 uppercase gap-12 pt-24">
            <?php

            $main_navigation = get_field('main_nav', 'option');

            // Check rows exists.
            if (have_rows('navigation_items', $main_navigation)) :
            ?>
                <ul class="flex flex-col gap-3">
                    <?php
                    // Loop through rows.
                    while (have_rows('navigation_items', $main_navigation)) : the_row();

                        // Load sub field value.
                        $nav_item_label = get_sub_field('item_label');
                        $nav_item_link = get_sub_field('item_link');
                    ?>
                        <a class="hover:text-black" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                    <?php

                    endwhile;
                    ?>
                </ul>
            <?php

            endif;


            $secondary_navigation = get_field('secondary_nav', 'option');

            // Check rows exists.
            if (have_rows('navigation_items', $secondary_navigation)) :
            ?>
                <ul class="flex flex-col gap-3">
                    <?php
                    // Loop through rows.
                    while (have_rows('navigation_items', $secondary_navigation)) : the_row();

                        // Load sub field value.
                        $nav_item_label = get_sub_field('item_label');
                        $nav_item_link = get_sub_field('item_link');
                    ?>
                        <a class="hover:text-black" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                    <?php

                    endwhile;
                    ?>
                </ul>
            <?php

            endif;

            ?>
        </div>
    </div>
</section>

<!-- Overlay -->
<section @click="bagOpen = !bagOpen" :class="bagOpen ? 'bg-black/50 block' : 'hidden'" class="fixed z-[19] h-full w-full lg:hidden">

</section>