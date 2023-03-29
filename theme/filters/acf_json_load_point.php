<?php add_filter('acf/settings/load_json', 'yanaf_acf_json_load_point');

function yanaf_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf';
    return $paths;
}
