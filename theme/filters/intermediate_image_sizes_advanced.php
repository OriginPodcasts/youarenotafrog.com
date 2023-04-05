<?php add_filter('intermediate_image_sizes_advanced', 'yanaf_image_insert_override');
function yanaf_image_insert_override($sizes) {
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}