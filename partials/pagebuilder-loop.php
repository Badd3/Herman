<?php

if (have_rows('herman_builder')) :

    // Loop through rows.
    while (have_rows('herman_builder')) : the_row();

        if (get_row_layout() == 'home_slider') :

            get_template_part('partials/pagebuilder-components/home_slider');

        elseif (get_row_layout() == 'info_page') :

            get_template_part('partials/pagebuilder-components/info-page');


        endif;

    // End loop.
    endwhile;

// No value.
else :

// Do something...
endif;
