<?php add_filter('body_class', 'yanaf_body_class');
function yanaf_body_class ($classes) {
    if (is_single() && get_post_type() === 'resource') {
        switch (get_post_meta(get_the_ID(), 'cta', true)) {
            case 'attend':
                $classes[] = 'resource-cta-event';
                break;

            default:
                $classes[] = 'resource-cta-download';
                break;
        }
    }

    return $classes;
}