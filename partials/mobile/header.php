<?php
if (get_field('header_kleur') == 'light') {
    $logo_url = '/images/herman-logo-white-1.svg';
    $text_color = 'text-white';
} else {
    $logo_url = '/images/herman-logo-black.svg';
    $text_color = 'text-black';
};


?>



<section class="fixed z-10 top-0 w-full lg:hidden">
    <div class="relative ">
        <button @click="navOpen = !navOpen" class="text-white absolute left-5 top-4 border border-white px-2 cursor-pointer">
            <span class="text-2xl -mt-0.5 block">+</span>
        </button>

        <div class="w-40 absolute left-1/2 -translate-x-1/2 top-5">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="logo-white">
            </a>
        </div>

        <div class="absolute right-5 top-5 text-white">
            <button @click="bagOpen = !bagOpen" class="uppercase">[<?php echo WC()->cart->get_cart_contents_count() ?>]</button>
        </div>
    </div>
</section>