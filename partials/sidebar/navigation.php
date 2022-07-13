<section class="bg-white-bg w-1/6 hidden lg:block fixed h-full">
    <div class="px-7 pb-8 pt-28 h-full">

        <div class="text-grey flex flex-col justify-between h-full uppercase">
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
                        <a class="hover:text-black duration-300 text-base" href="<?php echo $nav_item_url; ?>"><?php echo $nav_item_title; ?></a>
                    <?php

                    endwhile;
                    ?>
                </ul>
            <?php

            endif;


            // Check rows exists.
            if (have_rows('secondary_navigation', 'options')) :
            ?>
                <ul class="flex flex-col gap-3 mb-2">
                    <?php
                    // Loop through rows.
                    while (have_rows('secondary_navigation', 'options')) : the_row();

                        // Load sub field value.
                        $nav_item_title = get_sub_field('page')['title'];
                        $nav_item_url = get_sub_field('page')['url'];
                    ?>
                        <a class="duration-300 hover:text-black text-base" href="<?php echo $nav_item_url; ?>"><?php echo $nav_item_title; ?></a>
                    <?php

                    endwhile;
                    ?>
                </ul>
            <?php

            endif;

            ?>
        </div>
        <h1 class="text-xl">fsdafdsa</h1>
    </div>
</section>