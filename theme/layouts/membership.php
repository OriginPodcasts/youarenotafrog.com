<section class="members-wrapper">
    <div class="grid-container">
        <div class="members-content">
            <h1 class="members-heading"><?php the_sub_field('heading'); ?></h1>
            <div class="members-body"><?php the_sub_field('body'); ?></div>

            <?php if ($cta = get_sub_field('cta')) { ?>
                <a href="<?php echo $cta['url']; ?>" class="large button"><?php esc_html_e($cta['text']); ?></a>
            <?php } ?>
        </div>
    </div>
</section>
