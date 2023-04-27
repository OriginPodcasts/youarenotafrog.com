<?php add_filter('wp_nav_menu', 'yanaf_nav_menu', 10, 2);
function yanaf_nav_menu($nav_menu, $args) {
    $pos = strpos($nav_menu, '>');

    if ($pos > -1) {
        $before = substr($nav_menu, 0, $pos);
        $after = substr($nav_menu, $pos);
        $nav_menu = $before . ' data-dropdown-menu data-responsive-menu="drilldown medium-drilldown"' . $after;
    }

    return $nav_menu;
}