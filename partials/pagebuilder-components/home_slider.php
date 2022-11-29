<?php

$overlay = get_sub_field('overlay');
// Check rows exists.
if (have_rows('slider_afbeeldingen')) :
?>
    <section class="h-screen grid z-[0] grid-cols-12 lg:grid-cols-3 grid-rows-3 relative">
        <?php

        if ($overlay) {
            $overlay_classes = "after:absolute after:w-full after:h-full after:bg-black/[0.4] after:z-[2]";
        }; ?>

        <!-- Slider main container -->
        <div class="swiper w-screen lg:w-[calc(100vw-208px)] row-span-full col-span-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php
                // Loop through rows.
                while (have_rows('slider_afbeeldingen')) : the_row();
                    // error_log(print_r(get_sub_field('media_type'), true));
                    $media_type = get_sub_field('media_type');
                    // Load sub field value.
                    if ($media_type === 'video') {
                        $video_url = get_sub_field('video');
                        if (get_sub_field('video_poster')) {
                            $video_poster = get_sub_field('video_poster');
                            $video_poster_html = 'poster=' . $video_poster;
                        }
                ?>
                        <div class="swiper-slide flex <?php echo $overlay_classes; ?>">
                            <video autoplay muted loop playsinline class="object-center object-cover w-full" <?php echo $video_poster_html; ?>>
                                <source src="<?php echo $video_url; ?>" type="video/mp4">
                            </video>
                        </div>
                    <?php
                    }
                    if ($media_type === 'image') {
                        $image_url = get_sub_field('afbeelding')['url'];
                        $image_alt = get_sub_field('afbeelding')['alt'];

                    ?>
                        <div class="swiper-slide flex <?php echo $overlay_classes; ?>"><img class="object-center object-cover w-full" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" srcset=""></div>
                <?php
                    }

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
        <div class="z-10 text-center row-span-full col-start-3 col-end-11 lg:col-start-2 lg:col-end-3 row-start-2 row-end-3 flex justify-center items-center flex-col">
            <h1 class="text-white uppercase lg:text-lg mb-3 text-[14px]"><?php the_sub_field('slider_tekst'); ?></h1>
            <a class="text-white uppercase text-[14px] lg:text-lg" href="<?php echo $slider_button_url; ?>"><?php echo $slider_button_label; ?></a>
        </div>
    </section>


<?php

// Do something...
endif;
