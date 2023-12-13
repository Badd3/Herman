</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>



<?php if (!is_front_page() && !is_page(77)) {

    get_template_part('partials/mobile/footer');
}; ?>
<?php get_template_part('partials/desktop/footer'); ?>
</div> <!-- CLOSE #ID PAGE -->

<?php wp_footer(); ?>

<script>
jQuery(function($){
    $(document).on('change', '.cart_quantity', function(){
        var item_key = $(this).data('cart-item-key');
        var quantity = $(this).val();

        $.ajax({
            url: wc_cart_fragments_params.ajax_url,
            type: 'POST',
            data: {
                action : "update_cart_item_qty",
                item_key: item_key,
                quantity: quantity
            },
            success: function( response ) {
                $('body').trigger( 'wc_fragment_refresh' );
            }
        });
    });
});
</script>


</body>

</html>