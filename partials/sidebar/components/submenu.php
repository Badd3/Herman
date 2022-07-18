<section x-on:click.away="open = false" class="duration-300 absolute h-full left-0 top-0 w-full bg-white z-[-1]" :class="open && !openSidebar ? 'left-[188px]' : ''">
    <?php
    if (have_rows('items')) : ?>
        <ul>
            <?php

            // loop through rows (sub repeater)
            while (have_rows('items')) : the_row();

                // display each item as a list - with a class of completed ( if completed )
            ?>
                <li <?php if (get_sub_field('completed')) {
                        echo 'class="completed"';
                    } ?>><?php the_sub_field('name'); ?></li>
            <?php endwhile; ?>
        </ul>
    <?php endif; //if( get_sub_field('items') ): 
    ?>
</section>