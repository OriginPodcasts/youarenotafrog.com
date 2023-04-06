<?php function is_internal_resource_query($query=null) {
    if ($query === null) {
        global $wp_query;
        $query = $wp_query;
    }

    if (is_admin() || is_single()) {
        return false;
    }

    $post_types = $query->get('post_type');
    $has_resources = (is_array($post_types) && in_array('resource', $post_types)) || $post_types === 'resource';
    $external = isset($query->query_vars['external_resource']) && $query->query_vars['external_resource'] === 'true';

    if ($has_resources && $external) {
        return false;
    }
    
    return $has_resources;
}