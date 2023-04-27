<?php add_action('wp_enqueue_scripts', 'yanaf_enqueue_scripts');
function yanaf_enqueue_scripts() {
    wp_enqueue_style('yanaf-style', get_stylesheet_uri());
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');

    wp_register_script(
        'jquery',
        'https://code.jquery.com/jquery-2.1.4.min.js',
        array(),
        '2.1.4',
        true
    );

    wp_register_script(
        'foundation',
        'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js',
        array('jquery'),
        '6.4.3',
        true
    );

    wp_register_script(
        'motion-ui',
        'https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js',
        array(),
        '1.2.3',
        true
    );

    wp_register_script(
        'yanaf',
        get_stylesheet_directory_uri() . '/js/theme.js',
        array('foundation', 'motion-ui'),
        '2023.1',
        true
    );

    wp_enqueue_script('yanaf');
}