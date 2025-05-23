<?php if (get_sub_field('type') === 'video') {
    $meta_query = array(
        'relation' => 'AND',
        array(
            'key' => 'video',
            'compare' => 'EXISTS'
        ),
        array(
            'key' => 'video',
            'value' => '',
            'compare' => '!='
        )
    );
} else {
    $meta_query = array(
        'relation' => 'OR',
        array(
            'key' => 'video',
            'compare' => 'NOT EXISTS'
        ),
        array(
            'key' => 'video',
            'value' => ''
        )
    );
}

$query = new WP_Query(
    array(
        'post_type' => 'review',
        'posts_per_page' => get_sub_field('count'),
        'meta_query' => $meta_query
    )
);

if ($query->have_posts()) { ?>
    <section class="review-wrapper">
        <div class="grid-container">
            <?php switch (get_sub_field('type')) {
                case 'video':
                    while ($query->have_posts()) {
                        $query->the_post(); ?>

                        <div class="featured-review">
                            <div class="grid-container">
                                <div class="grid-x grid-margin-x">
                                    <div class="cell medium-3">
                                        <figure class="avatar">
                                             <?php yanaf_img_srcset(
                                                get_post_thumbnail_id(get_the_ID()),
                                                get_the_title(),
                                                array(
                                                    'small' => 'f-sm-whole-sq',
                                                    'md' => 'f-md-half-sq',
                                                    'lg' => 'f-lg-half-sq'
                                                ),
                                                true
                                            ); ?>
                                        </figure>
                                    </div>

                                    <div class="cell medium-9">
                                        <blockquote class="review-content"><?php the_content(); ?></blockquote>
                                        <p class="review-role">
                                            <?php the_field('author'); ?>,
                                            <?php the_field('role'); ?>
                                        </p>

                                        <?php if ($video = get_field('video')) { ?>
                                            <button type="button" class="button video-button" data-open="testimonial-<?php echo get_the_ID(); ?>">Watch the video testimonial</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($video) { ?>
                            <div class="reveal" id="testimonial-<?php echo get_the_ID(); ?>" data-reveal>
                                <h3><?php the_field('author'); ?></h3>
                                <div class="widescreen responsive-embed"><?php echo $video; ?></div>

                                <button class="close-button" data-close aria-label="Close modal" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php }
                    }

                    break;

                default: ?>
                    <div class="review-list">
                        <?php while ($query->have_posts()) {
                            $query->the_post(); ?>

                            <div class="review">
                                <blockquote class="review-content"><?php the_content(); ?></blockquote>
                                <p class="review-author"><?php the_field('author'); ?></p>
                                <p class="review-role"><?php the_field('role'); ?></p>
                            </div>
                        <?php } ?>
                    </div>
            <?php } ?>
        </div>
    </section>
<?php }

wp_reset_postdata();
wp_reset_query();
