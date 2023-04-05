<?php add_filter('the_title', 'yanaf_the_title');
function yanaf_the_title($title) {
    if ($title == '') {
        return esc_html('...');
    }
    
    return wp_kses_post($title);
}