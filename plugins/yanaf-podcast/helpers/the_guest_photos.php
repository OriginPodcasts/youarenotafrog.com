<?php function yanaf_the_guest_photos($post_id=null, $size='full') {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    $photos = array();
    if ($guests = get_post_meta($post_id, 'guests', true)) {
        if ($guests = intVal($guests)) {
            for($i = 0; $i < $guests; $i ++) {
                $name = get_post_meta($post_id, sprintf('guests_%d_name', $i), true);
                if ($photo = get_post_meta($post_id, sprintf('guests_%d_photo', $i), true)) {
                    if ($image = wp_get_attachment_image_src($photo, $size)) {
                        $photos[] = array($image[0], $name, $image[1]);
                    }
                }
            }
        }
    }

    if (count($photos)) {
        print('<div class="episode-guest-photos">');
        $percent = 100 / count($photos);

        foreach ($photos as $photo) {
            printf(
                '<img alt="Photo of %s" src="%s" width="%d%%" class="episode-guest-photo">',
                $photo[1] ? esc_attr($photo[1]) : 'guest',
                $photo[0],
                $percent
            );
        }

        print('</div>');
        return true;
    }

    return false;
}