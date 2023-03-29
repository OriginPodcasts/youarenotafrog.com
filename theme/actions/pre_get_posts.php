<?php add_action('pre_get_posts', 'yanaf_pre_get_posts');

function yanaf_pre_get_posts($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (is_archive() || is_search()) {
        $query->set('post_type', array('post', 'episode'));
    }
}