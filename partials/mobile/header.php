<?php
if (get_field('header_kleur') == 'light') {
    $logo_url = '/images/herman-logo-white-1.svg';
    $text_color = 'text-white border-white';
} else {
    $logo_url = '/images/herman-logo-black.svg';
    $text_color = 'text-black border-black';
};


?>



<section class="fixed z-10 top-0 w-full lg:hidden">
    <div class="relative ">
        <button @click="navOpen = !navOpen" class="<?php echo $text_color; ?> absolute left-5 top-5 border w-6 cursor-pointer">
            <span class="text-regular -mt-0.5 block">+</span>
        </button>

        <div class="w-40 absolute left-1/2 -translate-x-1/2 top-5">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="logo-white">
            </a>
        </div>

        <div class="absolute right-5 top-5">
            <span class="<?php echo $text_color; ?>">[<?php echo WC()->cart->get_cart_contents_count() ?>]</span>
        </div>
    </div>
</section>