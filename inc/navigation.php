<?php

function create_navigation_post_type()
{
    register_post_type(
        'navigation',
        array(
            'labels' => array(
                'name' => __('Navigation'),
                'singular_name' => __('Navigation'),
                'add_new_item' => __('Add New Navigation'),
                'edit_item' => __('Edit Navigation'),
                'new_item' => __('New Navigation'),
                'view_item' => __('View Navigation'),
                'search_items' => __('Search Navigation'),
                'not_found' => __('No Navigation found'),
                'not_found_in_trash' => __('No Navigation found in Trash'),
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-admin-page',
            'supports' => array('title'),
            'rewrite' => array('slug' => 'navigation'),
        )
    );
}
add_action('init', 'create_navigation_post_type');
