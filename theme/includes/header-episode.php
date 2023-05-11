<header class="post-header episode-header">
    <div class="grid-container">
        <p class="post-title episode-date"><?php the_date('jS F, Y'); ?></p>
        <h1 class="post-title episode-title"><?php the_title(); ?></h1>

        <?php if (yanaf_episode_has_guests()) { ?>
            <p class="episode-guests">With <?php yanaf_the_guest_names(); ?></p>
            <?php if (!yanaf_the_guest_photos(get_the_ID(), 'f-sm-whole')) {
                if ($image = get_the_post_thumbnail_url(get_the_ID(), 'f-sm-whole')) { ?>
                    <img alt="Episode thumbnail" src="<?php esc_attr_e($image); ?>" class="episode-image">
                <?php }
            }
        } else { ?>
            <p class="episode-guests">With Rachel Morris</p>

            <?php if ($image = get_the_post_thumbnail_url(get_the_ID(), 'f-sm-whole')) { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/no-guest-single.jpg" alt="Dr Rachel Morris" class="post-image episode-image">
            <?php }
        } ?>
    </div>
</header>