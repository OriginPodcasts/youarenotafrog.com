<?php $post_type = get_post_type(); ?>
<a href="<?php the_permalink(); ?>" class="<?php echo $post_type; ?> entry">
    <?php yanaf_img_srcset(
        get_post_thumbnail_id(get_the_ID()),
        get_the_title(),
        array(
            'small' => 'f-sm-whole-16x9' /* Full-width on small devices */,
            'medium' => 'f-md-third-16x9' /* Sixth-width on medium devices */,
            'large' => 'f-lg-third-16x9' /* Sixth-width on large devices */
        ),
        true
    );

    if ($post_type === 'post' || $post_type === 'episode') { ?>
        <div class="<?php echo $post_type; ?>-meta">
            <span class="<?php echo $post_type; ?>-date"><?php the_date('j F'); ?></span>
        </div>
    <?php } ?>

    <h3 class="h5 <?php echo $post_type; ?>-title"><?php the_title(); ?></h3>
    <div class="<?php echo $post_type; ?>-excerpt"><?php the_excerpt(); ?></div>
</a>