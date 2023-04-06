<?php function the_resource_reasons_header($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    switch (get_post_meta($post_id, 'cta', true)) {
        case 'attend':
            print('Reasons to join');
            break;

        default:
            $terms = get_the_terms($post_id, 'resource_type');
            if (is_array($terms)) {
                foreach ($terms as $term) {
                    foreach (get_term_meta($term->term_id, 'singular_name') as $name) {
                        printf('Reasons to download this %s', $name);
                        return;
                    }
                    
                    printf('Reasons to download this %s', strtolower($term->name));
                    return;
                }
            }

            print('Reasons to download');
    }
}