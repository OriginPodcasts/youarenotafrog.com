<?php add_filter('nav_menu_link_attributes', 'yanaf_schema_url', 10);
function yanaf_schema_url($atts) {
    $atts['itemprop'] = 'url';
    return $atts;
}