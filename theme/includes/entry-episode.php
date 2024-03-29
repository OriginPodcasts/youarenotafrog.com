<a href="<?php the_permalink(); ?>" class="episode entry">
    <?php if ($thumbnail_id = get_post_thumbnail_id(get_the_ID())) {
        yanaf_img_srcset(
            $thumbnail_id,
            get_the_title(),
            array(
                'small' => 'f-sm-whole-16x9' /* Full-width on small devices */,
                'medium' => 'f-md-third-16x9' /* Sixth-width on medium devices */,
                'large' => 'f-lg-third-16x9' /* Sixth-width on large devices */
            ),
            true
        );
    } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/no-guest-list.jpg" alt="Dr Rachel Morris">
    <?php } ?>

    <div class="episode-meta">
        <span class="episode-number">Episode <?php yanaf_the_episode_number(); ?></span> |
        <span class="episode-date"><?php the_date('j F'); ?></span>
    </div>

    <h3 class="h5 episode-title"><?php the_title(); ?></h3>

    <?php if (yanaf_episode_has_guests()) { ?>
        <p class="episode-guests">With <?php yanaf_the_guest_names(); ?></p>
    <?php } else { ?>
        <p class="episode-guests">With Rachel Morris</p>
    <?php } ?>

    <div class="episode-excerpt"><?php the_excerpt(); ?></div>
</a>