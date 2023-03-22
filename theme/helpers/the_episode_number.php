<?php function the_episode_number($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    foreach (get_post_meta($post_id, 'itunes_number') as $number) {
        echo $number;
    }
}