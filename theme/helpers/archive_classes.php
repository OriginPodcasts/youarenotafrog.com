<?php function yanaf_archive_classes() {
    $classes = array();

    if (is_search()) {
        $classes[] = 'search-list';
    } else if ($term = get_queried_object()) {
        if (is_object($term) && $term instanceof WP_Term) {
            $classes[] = 'taxonomy-' . $term->taxonomy . '-archive';
            $classes[] = 'term-' . $term->slug . '-archive';
        }
    }

    if ($post_type = get_post_type()) {
        $classes[] = 'post-type-' . $post_type . '-archive';
    }

    if (count($classes)) {
        echo ' ';
    }

    echo implode(' ', $classes);
}