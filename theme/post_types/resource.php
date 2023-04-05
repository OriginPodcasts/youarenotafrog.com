<?php register_post_type(
    'resource',
    array(
        'label' => 'Resource',
        'description' => 'Training and coaching resources',
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-open-folder',
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'resources',
            'with_front' => false,
            'feeds' => false
        ),
        'delete_with_user' => false
    )
);