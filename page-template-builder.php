<?php
/* Template Name: Herman Builder */
$customer_care_id = get_page_by_title('Customer Care')->ID;
$post_parent_id = wp_get_post_parent_id();
?>

<?php
get_header();

get_template_part('partials/pagebuilder-loop');

if ($customer_care_id === $post_parent_id) {
	get_template_part('partials/pagebuilder-components/customer-care-nav');
};



get_footer();
