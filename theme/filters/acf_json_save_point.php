<?php add_filter('acf/settings/save_json', 'yanaf_acf_json_save_point');
 
function yanaf_acf_json_save_point($path) {
    $path = get_stylesheet_directory() . '/acf';
    return $path;
}