<?php add_filter('yanaf_episode_icon', 'yanaf_episode_icon');
function yanaf_episode_icon($icon) {
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