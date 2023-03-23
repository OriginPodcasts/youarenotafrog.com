<?php function yanaf_updated_collection_image($term_id, $image_id) {
    if (!$image_id) {
        delete_term_meta($term_id, 'colour');
        do_action('yanaf_update_colours');
        return;
    }

    if ($colour = yanaf_get_image_colour($image_id)) {
        update_term_meta($term_id, 'colour', $colour);
    } else {
        delete_term_meta($term_id, 'colour');
    }

    do_action('yanaf_update_colours');
}

add_action('yanaf_updated_collection_image', 'yanaf_updated_collection_image', 10, 2);