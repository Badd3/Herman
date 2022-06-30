<?php

if (have_rows('recrubo_builder')) :

    // Loop through rows.
    while (have_rows('recrubo_builder')) : the_row();

        if (get_row_layout() == 'hero_home') :

            get_template_part('partials/pagebuilder-components/hero-home');

        // elseif (get_row_layout() == 'client_slider') :

        //     get_template_part('partials/pagebuilder-components/client-slider');


        endif;

    // End loop.
    endwhile;

// No value.
else :

// Do something...
endif;
