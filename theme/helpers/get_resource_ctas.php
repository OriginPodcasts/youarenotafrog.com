<?php function get_resource_ctas($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $links = array();
    if ($count = get_post_meta($post_id, 'ctas', true)) {
        for ($i = 0; $i < intVal($count); $i ++) {
            $links[] = array(
                'label' => get_post_meta($post_id, sprintf('ctas_%d_label', $i), true),
                'url' => get_post_meta($post_id, sprintf('ctas_%d_url', $i), true),
                'external' => true
            );
        }
    }

    return $links;
}