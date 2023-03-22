<div class="tags-carousel">
    <div>
        <?php $i = 0;
        foreach (yanaf_get_popular_post_tags() as $tag) { ?>
            <a href="<?php echo get_term_link($tag->term_id); ?>" class="tag-item button">
                <?php esc_html_e($tag->name); ?>
            </a>
            <?php $i ++;
            if ($i === 4) { ?>
    </div>
    <div>
                <?php $i = 0;
            }
        } ?>
    </div>
</div>