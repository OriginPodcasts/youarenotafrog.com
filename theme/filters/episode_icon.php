<?php add_filter('yanaf_episode_icon', 'yanaf_episode_icon');
function yanaf_episode_icon($icon) {
    if ($icon === 'calendar') {
        require(
            dirname(dirname(__file__)) . '/icons/calendar.svg'
        );
    }
}