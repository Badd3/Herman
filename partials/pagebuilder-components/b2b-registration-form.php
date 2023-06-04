<section class="flex justify-center items-center flex-col lg:pt-28">
    <div class="max-w-[500px] mx-auto [&_.wpcf7-submit]:mt-8 px-2.5">
        <div class="mb-6">
            <?php the_sub_field('uitleg_registratie'); ?>
        </div>
        <div>
            <?php echo do_shortcode(get_sub_field('contact_form')); ?>
        </div>
    </div>
</section>

