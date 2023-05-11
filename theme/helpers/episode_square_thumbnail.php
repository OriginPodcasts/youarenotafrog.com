<?php function yanaf_episode_square_thumbnail($id=null) {
    if ($id === null) {
        $id = get_the_ID();
    }

    if (yanaf_the_guest_photos($id, 'f-sm-whole')) {
        return;
    }

    if (!yanaf_episode_has_guests()) { ?>
        <img alt="Dr Rachel Morris" src="<?php echo get_template_directory_uri(); ?>/img/no-guest-single.jpg" class="post-image episode-image">
        <?php return;
    }

    if ($thumbnail_id = get_post_thumbnail_id($id)) {
        return yanaf_img_srcset(
            $thumbnail_id,
            get_the_title(),
            array(
                'small' => 'f-sm-third-sq' /* Third-width on small devices */,
                'medium' => 'f-md-sixth-sq' /* Sixth-width on medium devices */,
                'large' => 'f-lg-sixth-sq' /* Sixth-width on large devices */
            ),
            true
        );
    }
}