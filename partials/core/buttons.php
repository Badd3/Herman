<?php
if (have_rows('buttons')) : ?>
    <div class="flex flex-row gap-4">
        <?php
        // Loop through rows.
        while (have_rows('buttons')) : the_row();

            // Load sub field value.    
            $button = get_sub_field('button');
            $button_style = get_sub_field('button_style');
            // var_dump($button);
            // echo $button_style;

            if ($button_style == 'outlined') { ?>
                <a class="block flex items-center bg-white font-bold text-blue border-2 border-blue rounded-xl py-3.5 px-6" href="<?php echo $button['url']; ?>"> <?php echo $button['title']; ?></a>
            <?php
            } elseif ($button_style == 'filled') { ?>

                <a class="block flex items-center font-bold text-white bg-gradient-to-r from-[#0267C1] to-[#79ADDC] rounded-xl py-3.5 px-6" href="<?php echo $button['url']; ?>"> <?php echo $button['title']; ?></a>
            <?php
            }
            ?>



        <?php
        // Do something...

        // End loop.
        endwhile; ?>
    </div>
<?php
endif;
?>