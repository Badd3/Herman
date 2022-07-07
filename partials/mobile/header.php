<section class="fixed z-10 top-0 w-full lg:hidden">
    <div class="relative h-8">
        <button @click="navOpen = !navOpen" class="text-white absolute left-5 top-4 border border-white px-2 cursor-pointer">
            <span class="text-2xl -mt-0.5 block">+</span>
        </button>

        <div class="w-40 absolute left-1/2 -translate-x-1/2 top-5">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/herman-logo-white.svg'); ?>" alt="logo-white">
        </div>
    </div>
</section>