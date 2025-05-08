<section class="collections-wrapper">
    <div class="grid-container">
        <p class="collections-subtitle"><?php the_sub_field('pretitle'); ?></p>
        <div class="collections-heading"><?php the_sub_field('intro'); ?></div>
        <div class="collection-carousel">
            <?php foreach (yanaf_get_collections() as $collection) { ?>
                <a href="<?php echo get_term_link($collection->term_id); ?>" class="collection-item collection-<?php echo $collection->slug; ?>">
                    <?php if ($image_id = yanaf_get_collection_image_id($collection->term_id)) {
                        yanaf_img_srcset(
                            $image_id,
                            $collection->name,
                            array(
                                'small' => 'y-sm-carousel-sq' /* Carousel square for mobiless */,
                                'medium' => 'y-md-carousel-long' /* Carousel long for table */,
                                'large' => 'y-lg-carousel-long' /* Carousel long for laptops */,
                                'xlarge' => 'y-lg-carousel-long' /* Carousel long for desktops */
                            )
                        );
                    } ?>

                    <span class="collection-name"><?php esc_html_e($collection->name); ?></span>
                </a>
            <?php } ?>
        </div>
    </div>
</section>
