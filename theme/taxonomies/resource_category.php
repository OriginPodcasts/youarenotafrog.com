<?php register_taxonomy(
    'resource_category',
    'resource',
    array(
        'labels' => array(
            'name' => _x('Resource Categories', 'taxonomy general name'),
            'singular_name' => _x('Resource Category', 'taxonomy singular name'),
            'all_items' => __('All Categories'),
            'edit_item' => __('Edit Category'),
            'view_item' => __('View Category'),
            'update_item' => __('Update Category'),
            'add_new_item' => __('Add New Category'),
            'new_item_name' => __('New Category Name'),
            'parent_item' => __('Parent Category'),
            'parent_item_colon' => __('Parent Category:'),
            'search_items' => __('Search Categories'),
            'popular_items' => __('Popular Categories'),
            'separate_items_with_commas' => __('Separate Categories with commas'),
            'add_or_remove_items' => __('Add or remove categories'),
            'choose_from_most_used' => __('Choose from the most used categories'),
            'not_found' => __('No categories found'),
            'back_to_items' => __('Back to categories')
        ),
        'description' => 'Curated lists of resources',
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'resources-categories',
            'with_front' => false
        )
    )
);