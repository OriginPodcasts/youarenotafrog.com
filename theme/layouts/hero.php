<?php if ($hero = get_sub_field('image')) {
    $hero_sizes = array(
        '640' => wp_get_attachment_image_src($hero, 'f-sm-whole'),
        '1024' => wp_get_attachment_image_src($hero, 'f-medium-whole'),
        '1200' => wp_get_attachment_image_src($hero, 'f-large-whole'),
        '1440' => wp_get_attachment_image_src($hero, 'f-xlarge-whole')
    ); ?>

    <style id="yanaf-hero-styles">
        <?php foreach ($hero_sizes as $width => $image) {
            if ($image) { ?>
                @media screen and (max-width: <?php echo $width; ?>px) {
                    .hero {
                        background-image: url('<?php echo $image[0]; ?>');
                    }
                }
            <?php }
        }

        if (isset($image)) { ?>
            .hero {
                background-image: url('<?php echo $image[0]; ?>');
                background-position: center;
            }
        <?php } ?>
    </style>
<?php } ?>

<section class="hero">
    <div class="grid-container">
        <p class="h1"><?php the_sub_field('headline'); ?></p>
        <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>

        <?php if (get_sub_field('subscription_buttons')) {
            yanaf_subscription_buttons(3);
        }

        if (get_sub_field('scroll_to_explore')) { ?>
            <p class="scroll-link-container">
                <a href="#main">
                    <i class="fi-arrow-down"></i>
                    Scroll to explore
                </a>
            </p>
        <?php } ?>
    </div>
</section>
