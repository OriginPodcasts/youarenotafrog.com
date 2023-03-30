<?php function yanaf_get_episode_links($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $links = array();
    if ($count = get_post_meta($post_id, 'links', true)) {
        for($i = 0; $i < $count; $i ++) {
            $link = array();
            
            if ($icon = get_post_meta($post_id, sprintf('links_%d_icon', $i), true)) {
                $link['icon'] = $icon;
            }

            if ($content = get_post_meta($post_id, sprintf('links_%d_content', $i), true)) {
                $link['content'] = $content;
            }

            $links[] = $link;
        }
    }

    return $links;
}