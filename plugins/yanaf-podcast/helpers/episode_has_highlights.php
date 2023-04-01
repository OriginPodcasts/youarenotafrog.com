<?php function yanaf_episode_has_highlights($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($highlights = get_post_meta($post_id, 'highlights', true)) {
        return intVal($highlights) > 0;
    }

    return false;
}