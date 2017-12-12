<?php

function cpt_sample()
{
    register_taxonomy_for_object_type('category', 'sample');
    register_taxonomy_for_object_type('post_tag', 'sample');

    register_post_type('sample',
        array(
            'labels' => array(
                'name' => __('Sample CPT', 'mokka'),
                'singular_name' => __('sample item', 'mokka'),
                'add_new' => __('Add New', 'mokka'),
                'add_new_item' => __('Add New sample item', 'mokka'),
                'edit' => __('Edit', 'mokka'),
                'edit_item' => __('Edit sample item', 'mokka'),
                'new_item' => __('New sample item', 'mokka'),
                'view' => __('View sample item', 'mokka'),
                'view_item' => __('View sample item', 'mokka'),
                'search_items' => __('Search sample items', 'mokka'),
                'not_found' => __('No sample items found', 'mokka'),
                'not_found_in_trash' => __('No sample items found in Trash', 'mokka')
            ),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            ),
            'can_export' => true,
            'taxonomies' => array(
                'post_tag',
                'category'
            )
        ));
}
