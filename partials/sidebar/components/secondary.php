<?php
$secondary_navigation = get_field('secondary_nav', 'option');

// Check rows exists.
if (have_rows('navigation_items', $secondary_navigation)) :
?>
    <ul class="flex flex-col gap-3 mb-2">
        <?php
        // Loop through rows.
        while (have_rows('navigation_items', $secondary_navigation)) : the_row();

            // Load sub field value.
            $nav_item_label = get_sub_field('item_label');
            $nav_item_link = get_sub_field('item_link');

        ?>
            <a class="duration-300 hover:text-black text-base" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
        <?php


        endwhile;
        ?>
    </ul>
<?php

endif;
