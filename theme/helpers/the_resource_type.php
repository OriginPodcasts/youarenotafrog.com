<?php function the_resource_type($post_id=null) {
    if($post_id === null) {
        $post_id = get_the_ID();
    }

    $terms = get_the_terms($post_id, 'resource_type');
    if (is_array($terms)) {
        foreach ($terms as $term) {
            esc_html_e($term->name);
            return;
        }
    }

    echo 'Resource';
}