<?php function yanaf_archive_title() {
    if (is_search()) {
        echo 'Search';
        return;
    }

    if ($term = get_queried_object()) {
        if (is_object($term) && $term instanceof WP_Term) {
            echo $term->name;
            return;
        }
    }
    
    if ($post_type_name = get_post_type()) {
        if ($post_type = get_post_type_object($post_type_name)) {
            $labels = &$post_type->labels;
            if (isset($labels->name)) {
                echo 'All ' . $labels->name;
                return;
            }
        }
    }
}