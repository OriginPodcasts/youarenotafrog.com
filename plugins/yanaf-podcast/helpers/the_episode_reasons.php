<?php function yanaf_the_episode_reasons($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if ($reasons = get_post_meta($post_id, 'reasons', true)) {
        echo apply_filters('the_content', $reasons);
    }
}