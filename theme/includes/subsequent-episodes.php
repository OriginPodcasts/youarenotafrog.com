<?php $query = new WP_Query(
    array(
        'post_type' => 'episode',
        'offset' => 1,
        'posts_per_page' => 4
    )
);

if ($query->have_posts()) { ?>
    <div class="subsequent-episode-list">
        <hr class="episode-separator">
        <?php while ($query->have_posts()) {
            $query->the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="grid-x grid-margin-x grid-margin-y subsequent-episode">
                <div class="cell small-2">
                    <?php yanaf_episode_square_thumbnail(); ?>
                </div>
                <div class="cell small-10">
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
                </div>
            </a>

            <hr class="episode-separator">
        <?php } ?>
    </div>
<?php }

wp_reset_postdata();