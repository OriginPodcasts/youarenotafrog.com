<?php function yanaf_menu_item_is_active($item) {
    $current_uri = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];    

    if (isset($item['url'])) {
        return strpos($current_uri, $item['url']) === 0;
    }

    return false;
}