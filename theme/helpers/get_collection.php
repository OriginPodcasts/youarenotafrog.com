<?php function yanaf_get_collection() {
    if (is_archive()) {
        if ($term = get_queried_object()) {
            if (is_object($term) && $term instanceof WP_Term) {
                if ($term->taxonomy === 'collection') {
                    return $term;
                }
            }
        }
    }
}