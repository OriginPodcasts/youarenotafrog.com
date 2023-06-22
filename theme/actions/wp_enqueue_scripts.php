<?php add_action('wp_enqueue_scripts', 'yanaf_enqueue_scripts');
function yanaf_enqueue_scripts() {
    wp_enqueue_style('yanaf-style', get_stylesheet_uri());
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');

    wp_register_script(
        'yanaf',
        get_stylesheet_directory_uri() . '/js/theme.js',
        array(),
        '2023.1',
        true
    );

    wp_enqueue_script('yanaf');
}