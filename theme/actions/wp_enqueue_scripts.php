<?php add_action('wp_enqueue_scripts', 'yanaf_enqueue_scripts');
function yanaf_enqueue_scripts() {
    wp_enqueue_style('yanaf-style', get_stylesheet_uri());
    wp_enqueue_script('yanaf');
}