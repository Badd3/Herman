<?php
$selected_navigation = $args['selected_nav'];

?>
<?php

// Check rows exists.
if (have_rows('navigation_items', $selected_navigation)) :
?>
    <ul x-data="{ selected: null }" class="flex flex-col gap-3">
        <?php
        // Loop through rows.
        $i = 0;
        while (have_rows('navigation_items', $selected_navigation)) : the_row();

            // Load sub field value.
            $nav_item_label = get_sub_field('item_label');
            $nav_item_link = get_sub_field('item_link');
            $submenu = get_sub_field('submenu');

        ?>
            <?php if ($submenu) { ?>
                <li>
                    <a @click.prevent.stop="selected !== <?php echo $i; ?> ? selected = <?php echo $i; ?> : selected = null;" class="hover:text-black duration-300 text-base" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                    <?php
                    if ($submenu) {
                        get_template_part('partials/sidebar/components/submenu', null, array('count' => $i));
                    }
                    ?>
                </li>

            <?php } else { ?>
                <li>
                    <a class="hover:text-black duration-300 text-base" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                </li>
        <?php
            }

            $i++;
        endwhile;
        ?>
    </ul>
<?php

endif;
