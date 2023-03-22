<?php register_post_type(
    'review',
    array(
        'label' => 'Reviews',
        'description' => 'Apple Podcasts reviews and testimonials',
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-thumbs-up',
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'supports' => array('editor', 'thumbnail')
    )
);