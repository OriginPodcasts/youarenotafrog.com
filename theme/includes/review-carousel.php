<?php $query = new WP_Query(
    array(
        'post_type' => 'review',
        'posts_per_page' => 5,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'video',
                'compare' => 'NOT EXISTS'
            ),
            array(
                'key' => 'video',
                'value' => ''
            )
        )
    )
); ?>

<div class="review-list">
    <?php while ($query->have_posts()) {
        $query->the_post(); ?>

        <div class="review">
            <blockquote class="review-content"><?php the_content(); ?></blockquote>
            <p class="review-author"><?php the_field('author'); ?></p>
            <p class="review-role"><?php the_field('role'); ?></p>
        </div>
    <?php }

    wp_reset_query(); ?>
</div>