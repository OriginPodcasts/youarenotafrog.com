<?php $query = new WP_Query(
    array(
        'post_type' => 'episode',
        'posts_per_page' => 1
    )
);

while ($query->have_posts()) {
    $query->the_post(); ?>

    <a href="<?php the_permalink(); ?>" class="first-episode has-guests">
        <?php yanaf_img_srcset(
            get_post_thumbnail_id(get_the_ID()),
            get_the_title(),
            array(
                'small' => 'f-sm-whole-16x9' /* Full-width on small devices */,
                'medium' => 'f-md-half-16x9' /* Half-width on medium devices */,
                'large' => 'f-lg-half-16x9' /* Half-width on large devices */
            ),
            true
        ); ?>

        <div class="episode-meta">
            <span class="episode-number">Episode <?php yanaf_the_episode_number(); ?></span> |
            <span class="episode-date"><?php the_date('j F'); ?></span>
        </div>

        <h3 class="h4 episode-title"><?php the_title(); ?></h3>
        <?php if (yanaf_episode_has_guests()) { ?>
            <p class="episode-guests">With <?php the_guest_names(); ?></p>
        <?php } else { ?>
            <p class="episode-guests">With <?php the_author(); ?></p>
        <?php }

        the_excerpt(); ?>
    </a>
<?php }

wp_reset_postdata();