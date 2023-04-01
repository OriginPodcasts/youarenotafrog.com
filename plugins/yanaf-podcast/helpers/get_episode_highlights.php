<?php function yanaf_get_episode_highlights($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $highlights = array();
    if ($count = get_post_meta($post_id, 'highlights', true)) {
        for($i = 0; $i < $count; $i ++) {
            $highlight = array();
            
            if ($timestamp = get_post_meta($post_id, sprintf('highlights_%d_timestamp', $i), true)) {
                $highlight['timestamp'] = $timestamp;
            }

            if ($description = get_post_meta($post_id, sprintf('highlights_%d_description', $i), true)) {
                $highlight['description'] = $description;
            }

            $highlights[] = $highlight;
        }
    }

    return $highlights;
}