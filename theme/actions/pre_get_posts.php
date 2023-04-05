<?php add_action('pre_get_posts', 'yanaf_pre_get_posts');
function yanaf_pre_get_posts($query) {
    if (is_admin() || !$query->is_main_query() || is_post_type_archive()) {
        return;
    }

    if (is_archive() || is_search()) {
        $post_types = $query->get('post_type');

        if (!$post_types || (is_array($post_types) && !count($post_types))) {
            $post_types = array('post', 'episode', 'resource');
        } else if (is_array($post_types)) {
            $post_types[] = 'episode';
        }

        $query->set('post_type', $post_types);
    }
}