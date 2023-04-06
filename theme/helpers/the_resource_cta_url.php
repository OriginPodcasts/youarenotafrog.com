<?php function the_resource_cta_url($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    switch (get_post_meta($post_id, 'cta', true)) {
        case 'attend':
            foreach (get_post_meta($post_id, 'booking_url') as $url) {
                echo $url;
                return;
            }

            break;

        default:
            foreach (get_post_meta($post_id, 'media') as $media_id) {
                echo home_url(sprintf('/download/%s/', $post_id));
                return;
            }
    }
}