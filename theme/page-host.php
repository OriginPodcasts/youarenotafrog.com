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
                        <?php the_field('subtitle'); ?>
                    </div>
                </div>
            </header>
        <?php }
    } ?>

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <article class="main single cell medium-9">
                <?php the_content(); ?>
            </article>
        </div>
    </div>
</main>

<?php get_footer();