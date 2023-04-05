<?php function yanaf_get_popular_post_tags() {
    return get_terms(
        array(
            'taxonomy' => 'post_tag',
            'orderby' => 'count',
            'order' => 'DESC'
        )
    );
}