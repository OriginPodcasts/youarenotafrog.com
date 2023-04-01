<?php function yanaf_episode_has_transcript($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($transcript = get_post_meta($post_id, 'transcript', true)) {
        return !!$transcript;
    }

    return false;
}