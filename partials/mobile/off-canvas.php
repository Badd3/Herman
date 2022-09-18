<section x-data="{ selected: null }" class="fixed h-full w-full bg-white-bg z-20 duration-700 ease-in-out lg:hidden text-base offcanvas" :class="navOpen ? 'left-0' : '-left-full'">
    <div class="relative h-full w-full ">
        <button @click="navOpen = !navOpen" class="absolute right-5 top-5 text-black z-[22]">X</button>

        <div class="text-grey flex flex-col justify-center px-2.5 uppercase gap-12 pt-16">
            <?php get_search_form(); ?>
            <?php
            $main_navigation = get_field('main_nav', 'option');

            get_template_part('partials/sidebar/components/sidebar-nav', null, array('selected_nav' => $main_navigation, 'mobile' => true));


            $secondary_navigation = get_field('secondary_nav', 'option');

            get_template_part('partials/sidebar/components/sidebar-nav', null, array('selected_nav' => $secondary_navigation, 'mobile' => true));
            ?>
        </div>
    </div>
</section>

<!-- Overlay -->
<section @click="navOpen = !navOpen" :class="navOpen ? 'bg-black/50 block' : 'hidden'" class="fixed z-[19] h-full w-full lg:hidden">

</section>