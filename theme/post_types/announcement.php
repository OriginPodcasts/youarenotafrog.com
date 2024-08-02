<?php register_post_type(
    'announcement',
    array(
        'label' => 'Announcement',
        'labels' => array(
            'name' => _x('Announcements', 'Post type general name', 'yanaf'),
            'singular_name' => _x('Announcement', 'Post type singular name', 'yanaf'),
            'menu_name' => _x('Announcements', 'Admin Menu text', 'yanaf'),
            'name_admin_bar' => _x('Announcement', 'Add New on Toolbar', 'yanaf'),
            'add_new' => __('Add New', 'yanaf'),
            'add_new_item' => __('Add New announcement', 'yanaf'),
            'new_item' => __('New Announcement', 'yanaf'),
            'edit_item' => __('Edit Announcement', 'yanaf'),
            'view_item' => __('View Announcement', 'yanaf'),
            'all_items' => __('All Announcement', 'yanaf'),
            'search_items' => __('Search Announcement', 'yanaf'),
            'parent_item_colon' => __('Parent Announcement:', 'yanaf'),
            'not_found' => __('No announcements found.', 'yanaf'),
            'not_found_in_trash' => __('No announcements found in Trash.', 'yanaf'),
            'featured_image' => _x('Announcement Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'yanaf'),
            'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'yanaf'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'yanaf'),
            'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'yanaf'),
            'archives' => _x('Announcement archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'yanaf'),
            'insert_into_item' => _x('Insert into announcement', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'yanaf'),
            'uploaded_to_this_item' => _x('Uploaded to this announcement', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'yanaf'),
            'filter_items_list' => _x('Filter announcements list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'yanaf'),
            'items_list_navigation' => _x('Announcements list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'yanaf'),
            'items_list' => _x('Announcements list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'yanaf')
        ),
        'description' => 'Training and coaching announcements',
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-open-folder',
        'supports' => array('title', 'editor'),
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'announcements',
            'with_front' => false,
            'feeds' => false
        ),
        'delete_with_user' => false
    )
);