<section class="resources-wrapper">
    <div class="grid-container">
        <div class="resources-heading"><?php the_sub_field('heading'); ?></div>
        <div class="resources-body"><?php the_sub_field('intro'); ?></div>

        <?php $count = get_sub_field('count');
        $query = new WP_Query(
            array(
                'post_type' => 'resource',
                'posts_per_page' => $count
            )
        );

        if ($query->have_posts()) {
            $count = min($count, $query->found_posts);
            $col = min(4, round(12 / $count, 0)); ?>
            <div class="grid-x resource-grid grid-margin-x align-center">
                <?php while ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="cell medium-<?php echo $col; ?> resource-cell">
                        <a href="<?php esc_attr_e($cta_url); ?>" target="_blank">
                            <div>
                                <?php yanaf_img_srcset(
                                    get_post_thumbnail_id(get_the_ID()),
                                    get_the_title(),
                                    array(
                                        'small' => 'f-sm-whole-sq' /* Square for mobiless */,
                                        'medium' => 'f-md-half-sq' /* Square for tablets */,
                                        'large' => 'f-lg-half-sq' /* Square for laptops */
                                    )
                                ); ?>

                                <span class="resource-name"><?php the_title(); ?></span>
                            </div>

                            <p class="small button">Learn more</p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php wp_reset_postdata();
