<?php function the_resource_download_url($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();

        foreach (get_post_meta($post_id, 'media') as $media_id) {
            echo home_url(sprintf('/download/%s/', $post_id));
        }
    }
}