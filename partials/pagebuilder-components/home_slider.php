<?php

$overlay = get_sub_field('overlay');
// Check rows exists.
if (have_rows('slider_afbeeldingen')) :
?>
    <section class="h-screen grid z-[0] grid-cols-3 grid-rows-3 relative">
        <?php

        if ($overlay) { ?>
            <div class="absolute w-full h-full bg-black/[0.4] z-[2]"></div>
        <?php }; ?>

        <!-- Slider main container -->
        <div class="swiper w-screen lg:w-[calc(100vw-16.67vw)] row-span-full row-col-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php
                // Loop through rows.
                while (have_rows('slider_afbeeldingen')) : the_row();

                    // Load sub field value.
                    $image_url = get_sub_field('afbeelding')['url'];
                    $image_alt = get_sub_field('afbeelding')['alt'];

                    // Do something...
                ?>
                    <div class="swiper-slide flex"><img class="object-center object-cover w-full" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" srcset=""></div>
                <?php
                // End loop.
                endwhile;

                ?>


            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination z-10"></div>
        <?php
        $slider_button_url = get_sub_field('slider_button')['url'];
        $slider_button_label = get_sub_field('slider_button')['title'];

        ?>
        <div class="z-10 text-center row-span-full col-start-2 col-end-3 row-start-2 row-end-3 flex justify-center items-center flex-col">
            <h1 class="text-white uppercase text-lg	mb-3"><?php the_sub_field('slider_tekst'); ?></h1>
            <a class="text-white uppercase text-lg" href="<?php echo $slider_button_url; ?>"><?php echo $slider_button_label; ?></a>
        </div>
    </section>


<?php

// Do something...
endif;
