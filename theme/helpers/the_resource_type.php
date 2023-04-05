<?php function the_resource_type($post_id=null, $capfirst=false) {
    if($post_id === null) {
        $post_id = get_the_ID();
    }

    $terms = get_the_terms($post_id, 'resource_type');
    if (is_array($terms)) {
        foreach ($terms as $term) {
            foreach (get_term_meta($term->term_id, 'singular_name') as $name) {
                if ($capfirst) {
                    esc_html_e(ucfirst($name));
                } else {
                    esc_html_e($name);
                }

                return;
            }

            if ($capfirst) {
                esc_html_e(ucfirst(strtolower($term->name)));
            } else {
                esc_html_e(strtolower($term->name));
            }

            return;
        }
    }

    echo 'Resource';
}