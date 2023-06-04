<?php

if (have_rows('herman_builder')) :

    // Loop through rows.
    while (have_rows('herman_builder')) : the_row();

        if (get_row_layout() == 'home_slider') :

            get_template_part('partials/pagebuilder-components/home_slider');

        elseif (get_row_layout() == 'info_page') :

            get_template_part('partials/pagebuilder-components/info-page');

        elseif (get_row_layout() == 'brand_page') :

            get_template_part('partials/pagebuilder-components/brand-page');

        elseif (get_row_layout() == 'contact_page') :

            get_template_part('partials/pagebuilder-components/contact-page');

        elseif (get_row_layout() == 'post_overview') :

            get_template_part('partials/pagebuilder-components/post-overview-v2');

        elseif (get_row_layout() == 'account_page') :

            get_template_part('partials/pagebuilder-components/registration-page');

        elseif (get_row_layout() == 'b2b_registration_form') :

            get_template_part('partials/pagebuilder-components/b2b-registration-form');

        // elseif (get_row_layout() == 'post_overview_v2') :

        //     get_template_part('partials/pagebuilder-components/post-overview-v2');

        endif;

    // End loop.
    endwhile;

// No value.
else :

// Do something...
endif;
