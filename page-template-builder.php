<?php
/* Template Name: Herman Builder */
?>

<?php get_header(); ?>

	<?php get_template_part('partials/pagebuilder-loop');

	var_dump(get_page_by_title('Customer Care')->ID);
	?>

<?php
get_footer();
