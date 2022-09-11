<?php
if (get_field('header_kleur') == 'light') {
    $logo_url = '/images/herman-logo-white-1.svg';
    $text_color = 'text-white border-white';
    $bg_color = 'bg-white';
} else {
    $logo_url = '/images/herman-logo-black.svg';
    $text_color = 'text-black border-black';
    $bg_color = 'bg-black';
};


?>



<section class="fixed z-10 top-5 w-full lg:hidden h-5">
    <div class="relative ">
        <button @click="navOpen = !navOpen" class="<?php echo $text_color; ?> absolute left-[10px] top-0 border w-4 h-4 cursor-pointer">
            <span class="absolute w-[7px] h-[1px] left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 <?php echo $bg_color; ?>"></span>
            <span class="absolute rotate-90 w-[7px] h-[1px] left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 <?php echo $bg_color; ?>"></span>
        </button>

        <div class="absolute left-1/2 -translate-x-1/2 top-0">
            <a href="<?php echo home_url(); ?>">
                <img class="h-4" src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="logo-white">
            </a>
        </div>

        <div class="absolute right-[10px] top-[-6px] <?php echo   $text_color; ?>">
            <button @click="bagOpen = !bagOpen" class="uppercase">[<?php echo WC()->cart->get_cart_contents_count() ?>]</button>
        </div>
    </div>
</section>