<?php
$selected_navigation = $args['selected_nav'];
$mobile = $args['mobile'];
$current_url = $args['current_url'];

?>
<?php

// Check rows exists.
if (have_rows('navigation_items', $selected_navigation)) :
?>
    <ul class="flex flex-col gap-3">
        <?php
        // Loop through rows.
        $i = 0;

        while (have_rows('navigation_items', $selected_navigation)) : the_row();

            // Load sub field value.
            $nav_item_label = get_sub_field('item_label');
            $nav_item_link = get_sub_field('item_link');
            $submenu = get_sub_field('submenu');
            $basename_url = basename($nav_item_link);
            $expanded = get_sub_field('expanded');

            // var_dump($expanded);


            if ($basename_url === $current_url || (is_shop() || is_product_category()) && $nav_item_label === 'Shop') {
                $navigation_item_active = 'text-black';
            } else {
                $navigation_item_active = '';
            }
        ?>
            <?php if ($submenu) { ?>

                <li>
                    <?php $i = rand(10000, 99999); ?>
                    <a @click.prevent.stop="selected !== <?php echo $i; ?> ? selected = <?php echo $i; ?> : selected = null;" class="hover:text-black duration-300 text-base <?php echo $navigation_item_active; ?>" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                    <?php
                    if ($submenu) {

                        get_template_part('partials/sidebar/components/submenu', null, array('count' => $i, 'mobile' => $mobile, 'expanded' => $expanded));
                    }
                    ?>
                </li>

            <?php } else { ?>
                <li>

                    <a class="hover:text-black duration-300 text-base <?php echo $navigation_item_active; ?>" href="<?php echo $nav_item_link; ?>"><?php echo $nav_item_label; ?></a>
                </li>
        <?php
            }

        // $i++;
        endwhile;
        ?>
    </ul>
<?php

endif;
