<?php $post_type = get_post_type(); ?>
<a href="<?php the_permalink(); ?>" class="<?php echo $post_type; ?> entry">
    <?php yanaf_img_srcset(
        get_post_thumbnail_id(get_the_ID()),
        get_the_title(),
        array(
            'small' => 'f-sm-third-16x9' /* Third-width on small devices */,
            'medium' => 'f-md-third-16x9' /* Sixth-width on medium devices */,
            'large' => 'f-lg-third-16x9' /* Sixth-width on large devices */
        ),
        true
    ); ?>
    
    <div class="<?php echo $post_type; ?>-meta">
        <?php if ($post_type === 'episode') { ?>
            <span class="<?php echo $post_type; ?>-number">Episode <?php yanaf_the_episode_number(); ?></span> |
        <?php } ?>
        <span class="<?php echo $post_type; ?>-date"><?php the_date('j F'); ?></span>
    </div>

    <h3 class="h5 <?php echo $post_type; ?>-title"><?php the_title(); ?></h3>

    <?php if ($post_type === 'episode') {
        if (yanaf_episode_has_guests()) { ?>
            <p class="<?php echo $post_type; ?>-guests">With <?php yanaf_the_guest_names(); ?></p>
        <?php } else { ?>
            <p class="<?php echo $post_type; ?>-guests">With <?php the_author(); ?></p>
        <?php }
    } ?>

    <div class="<?php echo $post_type; ?>-excerpt"><?php the_excerpt(); ?></div>
</a>