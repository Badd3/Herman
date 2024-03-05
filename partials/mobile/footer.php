<?php
$logo_url = '/images/herman_sign.svg';
?>

<section class="lg:hidden footer py-5">
    <div class="px-2.5">
        <div class="flex flex-col footerSubscribe">
            <?php echo do_shortcode(get_field('footer_shortcode', 'options')); ?>
        </div>

        <div class="flex flex-row justify-between mt-2.5 items-end">
            <div>
                <img class="w-[90px] h-auto" src="<?php echo esc_url(get_template_directory_uri() . $logo_url); ?>" alt="">
            </div>

            <span class="uppercase text-[11px]">© Herman <?php echo date("Y"); ?></span>
        </div>
    </div>
</section>