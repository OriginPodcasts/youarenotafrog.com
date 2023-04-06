<?php add_action('wp_head', 'yanaf_wp_head');
function yanaf_wp_head() {
    wp_enqueue_style('yanaf-style', get_stylesheet_uri());
    wp_deregister_style('acf-input');

    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }

    if ($css = get_option('yanaf_colours_css')) {
        printf('<style id="yanaf-collection-styles">%s</style>', $css);
    }
}
