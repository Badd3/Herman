<?php
$selected_navigation = $args['selected_nav'];
$mobile = $args['mobile'];
$current_url = strtolower($args['current_url']);

// error_log(print_r($current_url, true));

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
            $nav_item_link = get_sub_field('item_link');
            $nav_item_label = $nav_item_link['title'];
            $link_target = $nav_item_link['target'] ? $nav_item_link['target'] : '_self';
            $submenu = get_sub_field('submenu');
            $basename_url = strtolower(basename($nav_item_label));
            $nav_post_id = url_to_postid($nav_item_link['url']);
            $current_page_id = get_the_id();
            $expanded = get_sub_field('expanded');
            $nav_item_id = get_page_by_title($nav_item_link['title'])->ID;


            //Vraag me niet de logica hierachter. Het werkt iig.
            if ($nav_post_id ===  $current_page_id || ((is_shop() || is_product_category() || is_product()) && $nav_item_label === 'Shop') || (str_contains(strtolower($nav_item_label), strtolower('Library')) && get_post_type() === 'post')) {
                $navigation_item_active = 'text-black';
            } else {
                $navigation_item_active = '';
            }
        ?>
            <?php if ($submenu) { ?>

                <li>
                    <?php $i = rand(10000, 99999); ?>
                    <a @click.prevent.stop="selected !== <?php echo $i; ?> ? selected = <?php echo $i; ?> : selected = null;" class="hover:text-black duration-300 text-base <?php echo $navigation_item_active; ?>" href="<?php echo $nav_item_link['url']; ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo $nav_item_label; ?></a>
                    <?php
                    if ($submenu) {
                        get_template_part('partials/sidebar/components/submenu', null, array('count' => $i, 'mobile' => $mobile, 'expanded' => $expanded, 'parent_id' => $nav_item_id));
                    }
                    ?>
                </li>

            <?php } else { ?>
                <li>
                    <a class="hover:text-black duration-300 text-base <?php echo $navigation_item_active; ?>" href="<?php echo $nav_item_link['url']; ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo $nav_item_label; ?></a>
                </li>
        <?php
            }

        // $i++;
        endwhile;
        ?>
    </ul>
<?php

endif;
