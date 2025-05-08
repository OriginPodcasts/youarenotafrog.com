<?php if ($image_id = get_sub_field('photo')) {
    yanaf_img_srcset(
        $image_id,
        'Host',
        array(
            'small' => 'f-sm-whole',
            'medium' => 'f-medium-whole',
            'large' => 'f-large-whole',
            'xlarge' => 'f-xlarge-whole'
        ),
        true
    );
} ?>

<section class="host-wrapper">
    <div class="grid-container">
        <p class="host-subtitle"><?php the_sub_field('pretitle'); ?></p>
        <div class="host-heading"><?php the_sub_field('heading'); ?></div>
        <div class="host-bio"><?php the_sub_field('bio'); ?></div>

        <?php if ($cta = get_sub_field('cta')) { ?>
            <a href="<?php echo $cta['page']; ?>" class="button"><?php esc_html_e($cta['text']); ?></a>
        <?php } ?>
    </div>
</section>
