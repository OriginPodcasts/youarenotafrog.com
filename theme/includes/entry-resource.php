<?php $post_type = get_post_type(); ?>
<div class="resource entry grid-x grid-margin-x">
    <div class="cell medium-3">
        <a href="<?php the_permalink(); ?>">
            <?php yanaf_img_srcset(
                get_post_thumbnail_id(get_the_ID()),
                get_the_title(),
                array(
                    'medium' => 'f-md-third-9x16' /* Half-width on medium devices */,
                    'large' => 'f-lg-third-9x16' /* Half-width on large devices */
                ),
                true
            ); ?>
        </a>
    </div>
    <div class="cell medium-6 align-self-middle">
        <a href="<?php the_permalink(); ?>">
            <h3 class="h5 resource-title"><?php the_title(); ?></h3>
            <div class="resource-meta">
                <span class="resource-author">Created by <?php the_author(); ?></span> /
                <span class="resource-date"><?php the_date('j F, Y'); ?></span>
            </div>
        </a>

        <div class="resource-excerpt"><?php the_excerpt(); ?></div>
        <a href="<?php the_resource_cta_url(); ?>" class="button" download>Download</a>
    </div>
</div>