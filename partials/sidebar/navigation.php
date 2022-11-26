<?php
$current_url = basename(get_permalink());

// var_dump($current_url);


?>

<section x-data="{ selected: null }" class="bg-white-bg w-[208px] hidden lg:block fixed h-full z-[2] ">
    <div class="px-7 pb-8 pt-[40px] h-full">


        <div class="text-grey flex flex-col justify-between h-full uppercase">

            <div class="flex flex-col gap-12">

                <?php get_search_form(); ?>


                <?php
                $main_navigation = get_field('main_nav', 'option');
                get_template_part('partials/sidebar/components/sidebar-nav', null, array('selected_nav' => $main_navigation, 'current_url' => $current_url, 'mobile' => false));
                ?>
            </div>
            <?php
            $secondary_navigation = get_field('secondary_nav', 'option');
            get_template_part('partials/sidebar/components/sidebar-nav', null, array('selected_nav' => $secondary_navigation, 'current_url' => $current_url, 'mobile' => false));
            ?>

        </div>

    </div>
</section>