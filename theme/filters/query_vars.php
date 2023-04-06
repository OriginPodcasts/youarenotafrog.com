<?php add_filter('query_vars', 'yanaf_query_vars');
function yanaf_query_vars($query_vars) {
    $query_vars[] = 'download_resource_id';
    $query_vars[] = 'external_resource';
    return $query_vars;
}