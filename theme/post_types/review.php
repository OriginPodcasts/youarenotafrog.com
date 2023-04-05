<?php register_post_type(
    'review',
    array(
        'label' => 'Reviews',
        'labels' => array(
            'name' => _x('Reviews', 'Post type general name', 'yanaf'),
            'singular_name' => _x('Review', 'Post type singular name', 'yanaf'),
            'menu_name' => _x('Reviews', 'Admin Menu text', 'yanaf'),
            'name_admin_bar' => _x('Review', 'Add New on Toolbar', 'yanaf'),
            'add_new' => __('Add New', 'yanaf'),
            'add_new_item' => __('Add New Review', 'yanaf'),
            'new_item' => __('New Review', 'yanaf'),
            'edit_item' => __('Edit Review', 'yanaf'),
            'view_item' => __('View Review', 'yanaf'),
            'all_items' => __('All Reviews', 'yanaf'),
            'search_items' => __('Search Reviews', 'yanaf'),
            'parent_item_colon' => __('Parent Reviews:', 'yanaf'),
            'not_found' => __('No reviews found.', 'yanaf'),
            'not_found_in_trash' => __('No reviews found in Trash.', 'yanaf'),
            'featured_image' => _x('Review Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'yanaf'),
            'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'yanaf'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'yanaf'),
            'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'yanaf'),
            'archives' => _x('Review archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'yanaf'),
            'insert_into_item' => _x('Insert into review', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'yanaf'),
            'uploaded_to_this_item' => _x('Uploaded to this review', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'yanaf'),
            'filter_items_list' => _x('Filter reviews list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'yanaf'),
            'items_list_navigation' => _x('Reviews list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'yanaf'),
            'items_list' => _x('Reviews list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'yanaf')
        ),
        'description' => 'Apple Podcasts reviews and testimonials',
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-thumbs-up',
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'supports' => array('editor', 'thumbnail')
    )
);