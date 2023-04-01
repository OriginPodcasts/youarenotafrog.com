<?php function yanaf_the_episode_transcript($post_id=null, $full=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();

        if ($full === null) {
            $full = isset($_GET['transcript']) ? ($_GET['transcript'] === 'full') : false;
        }
    }

    if ($full === null) {
        $full = false;
    }

    if ($transcript = get_post_meta($post_id, 'transcript', true)) {
        if (!$full) {
            $transcript = wp_trim_words($transcript, 100);
            echo apply_filters('the_content', $transcript);
            return 'excerpt';
        } else {
            echo apply_filters('the_content', $transcript);
            return 'full';
        }
    }
}