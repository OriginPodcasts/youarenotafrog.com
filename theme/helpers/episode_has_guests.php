<?php function episode_has_guests($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($guests = get_post_meta($post_id, 'guests', true)) {
        return intVal($guests) > 0;
    }

    return false;
}