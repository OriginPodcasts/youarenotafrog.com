<?php function yanaf_get_episode_guest_count($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($guests = get_post_meta($post_id, 'guests', true)) {
        return intVal($guests);
    }

    return 0;
}