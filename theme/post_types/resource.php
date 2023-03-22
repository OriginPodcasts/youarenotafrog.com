<?php register_post_type(
    'resource',
    array(
        'label' => 'Resource',
        'description' => 'Training and coaching resources',
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-open-folder',
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'author')
    )
);