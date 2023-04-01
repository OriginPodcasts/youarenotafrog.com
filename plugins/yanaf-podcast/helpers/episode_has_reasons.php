<?php function yanaf_episode_has_reasons($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($reasons = get_post_meta($post_id, 'reasons', true)) {
        return !!$reasons;
    }

    return false;
}