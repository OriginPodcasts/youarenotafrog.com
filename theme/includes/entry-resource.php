<?php $post_type = get_post_type();
$redirect = get_field('redirect'); ?>
<div class="resource entry grid-x grid-margin-x">
    <div class="cell medium-3">
        <a href="<?php if ($redirect) { echo $redirect; } else { the_permalink(); } ?>">
            <?php yanaf_img_srcset(
                get_post_thumbnail_id(get_the_ID()),
                get_the_title(),
                array(
                    'small' => 'f-sm-whole-9x16' /* Full-width on small devices */,
                    'medium' => 'f-md-third-9x16' /* Sixth-width on medium devices */,
                    'large' => 'f-lg-third-9x16' /* Sixth-width on large devices */
                ),
                true
            ); ?>
        </a>
    </div>
    <div class="cell medium-6 align-self-middle">
        <a href="<?php if ($redirect) { echo $redirect; } else { the_permalink(); } ?>">
            <h3 class="h5 resource-title"><?php the_title(); ?></h3>
            <div class="resource-meta">
                <span class="resource-author">Created by <?php the_author(); ?></span> /
                <span class="resource-date"><?php the_date('j F, Y'); ?></span>
            </div>
        </a>

        <div class="resource-excerpt"><?php the_excerpt(); ?></div>
        <?php if (!$redirect) {
            foreach (get_resource_ctas(null, false) as $cta) { ?>
                <a href="<?php echo $cta['url']; ?>"<?php if ($cta['external']) { ?> target="_blank"<?php } ?> class="small button">
                    <?php esc_html_e($cta['label']); ?>
                </a>
            <?php }
        } ?>
    </div>
</div>
