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

</body>

</html>