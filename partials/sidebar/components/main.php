<?php
$main_navigation = get_field('main_nav', 'option');


?>
<?php

// Check rows exists.
if (have_rows('navigation_items', $main_navigation)) :
?>
    <ul x-data="{openSidebar : false}" @slideout="openSidebar =! openSidebar" class="flex flex-col gap-3">
        <?php
        // Loop through rows.
        while (have_rows('navigation_items', $main_navigation)) : the_row();

            // Load sub field value.
            $nav_item_label = get_sub_field('item_label');
            $nav_item_link = get_sub_field('item_link');
            $submenu = get_sub_field('submenu');

        ?>
            <?php if ($submenu) { ?>
                <li x-data="{ open: false }">
                    <a @click.stop @click.prevent="open = !open" class="hover:text-black duration-300 text-base" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                    <?php
                    if ($submenu) {
                        get_template_part('partials/sidebar/components/submenu');
                    }
                    ?>
                </li>

            <?php } else { ?>
                <li>
                    <a class="hover:text-black duration-300 text-base" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                </li>
        <?php
            }


        endwhile;
        ?>
    </ul>
<?php

endif;