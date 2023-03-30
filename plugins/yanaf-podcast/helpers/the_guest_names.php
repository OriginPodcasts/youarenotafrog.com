<?php function yanaf_the_guest_names($post_id=null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $names = array();
    if ($guests = get_post_meta($post_id, 'guests', true)) {
        if ($guests = intVal($guests)) {
            for($i = 0; $i < $guests; $i ++) {
                if ($name = get_post_meta($post_id, sprintf('guests_%d_name', $i), true)) {
                    if ($i === $guests - 1) {
                        $names[] = sprintf('and %s', $name);
                    } else if ($i) {
                        $names[] = sprintf('%s', $name);
                    } else {
                        $names[] = $name;
                    }
                }
            }
        }
    }

    if (count($names) > 2) {
        echo implode(', ', $names);
    } else {
        echo implode(' ', $names);
    }
}