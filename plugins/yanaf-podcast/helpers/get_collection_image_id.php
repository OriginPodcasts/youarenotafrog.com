<?php function yanaf_get_collection_image_id($term_id) {
    foreach (get_term_meta($term_id, 'featured_image') as $id) {
        return intVal($id);
    }

    return 0;
}