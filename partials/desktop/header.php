<?php

if (get_field('header_kleur') == 'light') {
    $logo_url = '/images/herman-logo-white-1.svg';
    $text_color = 'text-white';
} else {
    $logo_url = '/images/herman-logo-black.svg';
    $text_color = 'text-black';
};

?>

<section class="fixed h-5 top-[40px] z-10 w-[calc(100vw-208px)] ml-auto right-0 hidden lg:block">
    <div class="flex justify-center">
        <div class="w-40 absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
            <a class="block" href="<?php echo home_url(); ?>">
                <img class="h-5" src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="logo-white">
            </a>
        </div>
        <?php if( ! is_page( 'checkout' ) ) { ?>
        <div class="absolute right-8 gotham-book <?php echo $text_color; ?>">
            <button @click="$store.bagOpen = !$store.bagOpen" class="uppercase text-base">bag [<?php echo WC()->cart->get_cart_contents_count() ?>]</button>
        </div>
        <?php } ?>
    </div>
</section>