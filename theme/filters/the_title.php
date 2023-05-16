<?php add_filter('the_title', 'yanaf_the_title');
function yanaf_the_title($title) {
    if ($title == '') {
        return esc_html('...');
    }

    if (is_singular('page') && get_post_status() === 'private') {
        $title = str_replace('Private:', '', $title);
    }

    return wp_kses_post($title);
}