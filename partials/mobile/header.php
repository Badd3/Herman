<?php

if (is_front_page() || is_page('home')) {
    $logo_url = '/images/herman-logo-white-1.svg';
    $text_color = 'text-white border-white';
    $bg_color = 'bg-white';
} else {
    // Voor nu op mobiel altijd zwarte header
    $logo_url = '/images/herman-logo-black.svg';
    $text_color = 'text-black border-black';
    $bg_color = 'bg-black';
};
?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<section class="fixed z-10 top-5 w-full lg:hidden h-5">
    <div class="relative ">
        <button @click="navOpen = !navOpen" class="<?php echo $text_color; ?> absolute left-[10px] top-0 border w-6 h-6 cursor-pointer">
            <span class="absolute w-[7px] h-[1px] left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 <?php echo $bg_color; ?>"></span>
            <span class="absolute rotate-90 w-[7px] h-[1px] left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 <?php echo $bg_color; ?>"></span>
        </button>

        <div class="absolute left-1/2 -translate-x-1/2 top-0">
            <a href="<?php echo home_url(); ?>">
                <img class="h-5 mt-[3px]" src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="logo-white">
            </a>
        </div>

        <?php if (!is_page('checkout')) { ?>
            <div class="absolute right-[10px] top-[-3px] <?php echo   $text_color; ?>">
                <button @click="$store.bagOpen = !$store.bagOpen" class="uppercase closeMenu">[<?php echo WC()->cart->get_cart_contents_count() ?>]</button>
            </div>
        <?php } ?>
    </div>
</section>