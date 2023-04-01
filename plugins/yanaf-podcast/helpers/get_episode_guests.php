<?php function yanaf_get_episode_guests($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $guests = array();
    if ($count = get_post_meta($post_id, 'guests', true)) {
        for($i = 0; $i < $count; $i ++) {
            $guest = array();
            
            if ($name = get_post_meta($post_id, sprintf('guests_%d_name', $i), true)) {
                $guest['name'] = $name;
            }

            if ($photo = get_post_meta($post_id, sprintf('guests_%d_photo', $i), true)) {
                $guest['photo'] = $photo;
            }

            if ($bio = get_post_meta($post_id, sprintf('guests_%d_bio', $i), true)) {
                $guest['bio'] = $bio;
            }

            if ($link_count = get_post_meta($post_id, sprintf('guests_%d_links', $i), true)) {
                $links = array();

                for($x = 0; $x < intVal($link_count); $x ++) {
                    $link = array();
                    
                    if ($icon = get_post_meta($post_id, sprintf('guests_%d_links_%d_icon', $i, $x), true)) {
                        $link['icon'] = $icon;
                    }

                    if ($url = get_post_meta($post_id, sprintf('guests_%d_links_%d_url', $i, $x), true)) {
                        $link['url'] = $url;
                    }

                    $links[] = $link;
                }

                $guest['links'] = $links;
            }

            $guests[] = $guest;
        }
    }

    return $guests;
}