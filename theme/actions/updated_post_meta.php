<?php function yanaf_updated_post_meta($meta_id, $post_id, $meta_key, $meta_value) {
    if ($meta_key !== '_thumbnail_id') {
        return;
    }

    if (!$meta_value) {
        delete_post_meta($post_id, 'colour');
        do_action('yanaf_update_colours');
        return;
    }

    if ($colour = yanaf_get_image_colour($meta_value)) {
        update_post_meta($post_id, 'colour', $colour);
    } else {
        delete_post_meta($post_id, 'colour');
    }

    do_action('yanaf_update_colours');
}

add_action('updated_post_meta', 'yanaf_updated_post_meta', 10, 4);