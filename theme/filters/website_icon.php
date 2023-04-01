<?php add_filter('yanaf_website_icon', 'yanaf_website_icon');
function yanaf_website_icon($icon) {
    $filename = sprintf(
        '%s/icons/%s.svg',
        dirname(dirname(__file__)),
        $icon
    );

    if (is_file($filename)) {
        return file_get_contents($filename);
    }

    return $icon;
}