<?php /* Template Name: Host biography */

get_header();

if ($image_id = get_field('image')) {
    $full = wp_get_attachment_image_src($image_id, 'full');
    print('<style id="yanaf-host-header-style">');
    $sizes = array(
        '641' => 'f-sm-whole',
        '1025' => 'f-medium-whole',
        '1201' => 'f-large-whole'
    );

    foreach ($sizes as $width => $size) {
        if ($resized = wp_get_attachment_image_src($image_id, $size)) {
            printf(
                '@media screen and (min-width: %dpx) { body.page-template-page-host-php header.page-header { background-image: url(\'%s\'); } }',
                $width,
                $resized[0]
            );

            print("\n");
        }
    }

    print('</style>');
} ?>

<main>
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <header class="page-header">
                <div class="grid-container">
                    <div class="page-header-container">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <p class="page-greeting"><?php the_field('greeting'); ?></p>
                        <img alt="Dr Rachel Morris" src="<?php echo get_template_directory_uri(); ?>/img/no-guest-single.jpg" class="img-host">
                        <?php the_field('subtitle');

                        if (($links = get_field('socials')) && is_array($links) && count($links)) { ?>
                            <ul class="host-social-links">
                                <?php foreach ($links as $link) { ?>
                                    <li>
                                        <a href="<?php esc_attr_e($link['url']); ?>" title="<?php esc_attr_e(strtoupper(substr($link['site'], 0, 1)) . substr($link['site'], 1)); ?>" target="_blank">
                                            <?php echo apply_filters('yanaf_website_icon', $link['site']); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </header>

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="main single cell medium-9">
                        <section class="profile-section host-bio"><?php the_content(); ?></section>

                        <?php if ($story = get_field('story')) { ?>
                            <section class="profile-section host-story">
                                <h2>My story</h2>
                                <?php echo apply_filters('the_content', $story); ?>
                            </section>
                        <?php }

                        if ($experience = get_field('experience')) { ?>
                            <section class="profile-section host-experience">
                                <h2>Qualifications + experience</h2>
                                <?php echo apply_filters('the_content', $experience); ?>
                            </section>
                        <?php } 

                        if ($links = get_field('links')) { ?>
                            <ul class="host-link-buttons">
                                <?php foreach ($links as $link) { ?>
                                    <li>
                                        <a href="<?php esc_attr_e($link['url']); ?>" class="small button">
                                            <?php esc_html_e($link['label']); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</main>

<?php get_footer();