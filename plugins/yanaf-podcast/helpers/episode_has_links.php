<?php function yanaf_episode_has_links($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($links = get_post_meta($post_id, 'links', true)) {
        return intVal($links) > 0;
    }

    return false;
}