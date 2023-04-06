<?php function get_resource_ctas($post_id=null, $full=true) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $links = array();

    switch (get_post_meta($post_id, 'cta', true)) {
        case 'attend':
            foreach (get_post_meta($post_id, 'booking_url') as $url) {
                $links[] = array(
                    'url' => $url,
                    'label' => 'Register today',
                    'external' => true
                );

                break;
            }

            break;

        default:
            if (get_post_meta($post_id, 'external', true)) {
                $links[] = array(
                    'url' => get_post_meta($post_id, 'download_url', true),
                    'label' => 'Download',
                    'external' => true
                );
            } else {
                foreach (get_post_meta($post_id, 'media') as $media_id) {
                    $links[] = array(
                        'url' => home_url(sprintf('/download/%s/', $post_id)),
                        'label' => $full ? 'Signup and download' : 'Download',
                        'external' => false
                    );

                    break;
                }
            }
    }

    if ($count = get_post_meta($post_id, 'secondary_ctas', true)) {
        for ($i = 0; $i < intVal($count); $i ++) {
            $links[] = array(
                'label' => get_post_meta($post_id, sprintf('secondary_ctas_%d_label', $i), true),
                'url' => get_post_meta($post_id, sprintf('secondary_ctas_%d_url', $i), true),
                'external' => true
            );
        }
    }

    return $links;
}