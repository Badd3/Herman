<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fromherman
 */

get_header();
?>
<section class="py-16 lg:py-28">
    <div class="px-2.5 lg:px-7.5">
        <!-- <div class="container">
        <div class="flex-wrapper"> -->
        <main id="primary" class="site-main">

            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="text-grey mb-3">
                        <?php
                        /* translators: %s: search query. */
                        printf(esc_html__('SEARCH RESULTS FOR: %s', 'fromherman'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h1>
                </header><!-- .page-header -->
                <ul class="products grid grid-cols-2 gap-2.5 lg:grid-cols-3 lg:gap-5">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */

                        get_template_part('template-parts/content', 'search');

                    endwhile;

                    the_posts_navigation();
                    ?>
                </ul>
            <?php

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </main><!-- #main -->
        <!-- </div> -->
    </div>
</section>

<?php

get_footer();
