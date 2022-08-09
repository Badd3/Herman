<?php

if (get_field('header_kleur') == 'light') {
    $logo_url = '/images/herman-logo-white-1.svg';
    $text_color = 'text-white';
} else {
    $logo_url = '/images/herman-logo-black.svg';
    $text_color = 'text-black';
};

?>
<section class="fixed top-0 w-full z-10 w-[calc(100vw-16.67vw)] ml-auto right-0 hidden lg:block">
    <div class="flex justify-center">
        <div class="w-40 absolute left-1/2 -translate-x-1/2 top-5">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="logo-white">
            </a>
        </div>
        <div class="absolute right-8 top-5 <?php echo $text_color; ?>">
            <span class="uppercase">bag (<?php echo WC()->cart->get_cart_contents_count() ?>)</span>
        </div>
    </div>
</section>