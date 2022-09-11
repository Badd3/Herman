<section class="bg-white-bg w-[208px] hidden lg:block fixed h-full z-[2] ">
    <div class="px-7 pb-8 pt-[40px] h-full">


        <div class="text-grey flex flex-col justify-between h-full uppercase">

            <div class="flex flex-col gap-12">
                <?php get_search_form(); ?>


                <?php

                get_template_part('partials/sidebar/components/main');
                ?>
            </div>
            <?php
            get_template_part('partials/sidebar/components/secondary');


            ?>

        </div>

    </div>
</section>