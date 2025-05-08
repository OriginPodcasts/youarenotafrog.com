<section class="promos-wrapper">
    <div class="grid-container">
        <p class="promos-title"><?php the_sub_field('title'); ?></p>
        <div class="promos-intro"><?php the_sub_field('intro'); ?></div>

        <?php $items = array();

        foreach(get_sub_field('items') as $item) {
            if ($item['archived']) {
                continue;
            }

            $items[] = $item;
        }

        if ($item_count = count($items)) {
            $col = min(4, round(12 / $item_count, 0)); ?>
            <div class="grid-x grid-margin-x align-center">
                <div class="cell medium-8">
                    <div class="grid-x grid-margin-x align-center">
                        <?php foreach ($items as $item) { ?>
                            <div class="cell medium-<?php echo $col; ?> promo-cell">
                                <?php $cta_url = $item['cta']['url'];
                                $cta_text = $item['cta']['text']; ?>

                                <a href="<?php esc_attr_e($cta_url); ?>">
                                    <div>
                                        <?php if ($image_id = isset($item['image']) ? $item['image'] : null) {
                                            yanaf_img_srcset(
                                                $image_id,
                                                'Promo image',
                                                array(
                                                    'small' => 'f-sm-whole-sq' /* Square for mobiless */,
                                                    'medium' => 'f-md-half-sq' /* Square for tablets */,
                                                    'large' => 'f-lg-half-sq' /* Square for laptops */
                                                )
                                            );
                                        } ?>

                                        <span class="promo-name"><?php esc_html_e($item['title']); ?></span>
                                    </div>

                                    <p class="small button"><?php esc_html_e($cta_text); ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php wp_reset_postdata();
