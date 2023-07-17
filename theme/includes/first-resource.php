<?php $query = new WP_Query(
    array(
        'post_type' => 'resource',
        'posts_per_page' => 1
    )
);

while ($query->have_posts()) {
    $query->the_post(); ?>

    <a href="<?php if ($redirect = get_field('redirect')) { echo $redirect; } else { the_permalink(); } ?>" class="first-resource resource-<?php echo get_post_field('post_name'); ?>">
        <?php yanaf_img_srcset(
            get_post_thumbnail_id(get_the_ID()),
            get_the_title(),
            array(
                'medium' => 'f-md-third-9x16' /* Half-width on medium devices */,
                'large' => 'f-lg-third-9x16' /* Half-width on large devices */
            ),
            true
        ); ?>

        <div class="resource-meta">
            <h3 class="resource-title"><?php the_title(); ?></h3>
            <span class="resource-download">
                <svg height="1em" viewBox="0 0 17 35" version="1.1">
                    <path id="Line" d="M8.01709032,0.983196887 L10.0168031,1.01709032 L9.99985639,2.01694672 L9.69010983,20.2919941 L9.551,28.451 L14.5765392,19.8610447 L15.0815004,18.9979027 L16.8077845,20.007825 L16.3028233,20.8709671 L9.35043202,32.7548535 L8.45272325,34.2893282 L7.60753127,32.7253128 L1.06186123,20.6126457 L0.586440741,19.732887 L2.34595813,18.782046 L2.82137862,19.6618047 L7.552,28.415 L7.69039704,20.2581006 L8.00014361,1.98305328 L8.01709032,0.983196887 Z" fill="#fff" fill-rule="nonzero"></path>
                </svg>
                Sign up and download
            </span>
        </div>
    </a>
<?php }

wp_reset_postdata();