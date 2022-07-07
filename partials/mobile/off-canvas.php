<section class="fixed h-full w-2/3 md:w-1/3 bg-white z-20 duration-700 ease-in-out lg:hidden" :class="navOpen ? 'left-0' : '-left-full'">
    <div class="relative h-full w-full ">
        <button @click="navOpen = !navOpen" class="absolute right-5 top-5 text-black">X</button>

        <div class="text-grey flex flex-col justify-center pl-5 uppercase gap-12 pt-24">
            <?php

            // Check rows exists.
            if (have_rows('main_navigation', 'options')) :
            ?>
                <ul class="flex flex-col gap-3">
                    <?php
                    // Loop through rows.
                    while (have_rows('main_navigation', 'options')) : the_row();

                        // Load sub field value.
                        $nav_item_title = get_sub_field('page')['title'];
                        $nav_item_url = get_sub_field('page')['url'];
                    ?>
                        <a class="hover:text-black" href="<?php echo $nav_item_url; ?>"><?php echo $nav_item_title; ?></a>
                    <?php

                    endwhile;
                    ?>
                </ul>
            <?php

            endif;


            // Check rows exists.
            if (have_rows('secondary_navigation', 'options')) :
            ?>
                <ul class="flex flex-col gap-3">
                    <?php
                    // Loop through rows.
                    while (have_rows('secondary_navigation', 'options')) : the_row();

                        // Load sub field value.
                        $nav_item_title = get_sub_field('page')['title'];
                        $nav_item_url = get_sub_field('page')['url'];
                    ?>
                        <a class="hover:text-black" href="<?php echo $nav_item_url; ?>"><?php echo $nav_item_title; ?></a>
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
<section @click="navOpen = !navOpen" :class="navOpen ? 'bg-black/50 block' : 'hidden'" class="fixed z-[19] h-full w-full lg:hidden">

</section>