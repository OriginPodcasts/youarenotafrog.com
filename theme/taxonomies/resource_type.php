<?php register_taxonomy(
    'resource_type',
    'resource',
    array(
        'labels' => array(
            'name' => _x('Resource Types', 'taxonomy general name'),
            'singular_name' => _x('Resource Type', 'taxonomy singular name'),
            'all_items' => __('All Types'),
            'edit_item' => __('Edit Type'),
            'view_item' => __('View Type'),
            'update_item' => __('Update Type'),
            'add_new_item' => __('Add New Type'),
            'new_item_name' => __('New Type Name'),
            'parent_item' => __('Parent Type'),
            'parent_item_colon' => __('Parent Type:'),
            'search_items' => __('Search Types'),
            'popular_items' => __('Popular Types'),
            'separate_items_with_commas' => __('Separate types with commas'),
            'add_or_remove_items' => __('Add or remove types'),
            'choose_from_most_used' => __('Choose from the most used types'),
            'not_found' => __('No types found'),
            'back_to_items' => __('Back to types')
        ),
        'description' => 'Types of resource',
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'resources-types',
            'with_front' => false
        )
    )
);