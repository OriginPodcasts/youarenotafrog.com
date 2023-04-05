<?php function yanaf_schema_type() {
    $schema = 'https://schema.org/';
    if (is_single()) {
        $type = 'Article';
    } elseif (is_author()) {
        $type = 'ProfilePage';
    } elseif (is_search()) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }

    echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}