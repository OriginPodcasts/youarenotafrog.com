<?php /* Template Name: Contact page */

get_header(); ?>

<main>
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <div class="grid-container">
                <div class="grid-x grid-margin-x align-center">
                    <aside class="sidebar cell medium-2">
                        <?php yanaf_sidebar_menu(); ?>
                    </aside>

                    <div class="main single cell medium-7">
                        <header class="page-header">
                            <div class="grid-container">
                                <h1 class="page-title"><?php the_title(); ?></h1>
                                <?php if ($subtitle = get_field('subtitle')) { ?>
                                    <p class="page-subtitle"><?php esc_html_e($subtitle); ?></p>
                                <?php }

                                if ($cta = get_field('cta')) {
                                    if (is_array($cta) && isset($cta['url']) && $cta['url'] && isset($cta['label']) && $cta['label']) { ?>
                                        <a href="<?php esc_attr_e($cta['url']); ?>" class="button" rel="external" target="_blank">
                                            <?php esc_html_e($cta['label']); ?>
                                        </a>
                                    <?php }
                                } ?>
                            </div>
                        </header>

                        <article><?php the_content(); ?></article>

                        <?php if ($gallery = get_field('press_photos')) { ?>
                            <div class="grid-x grid-margin-x small-up-1 medium-up-2 gallery">
                                <?php foreach($gallery as $i => $photo) {
                                    $last = $i === count($gallery) - 1;
                                    $even = !($i % 2 == 1);

                                    if ($last && !$even) {
                                        $last = false;
                                    }

                                    $sizes = array(
                                        'small' => !$last ? 'f-sm-whole-sq' : 'f-sm-whole',
                                        'medium' => !$last ? 'f-md-whole-sq' : 'f-md-whole',
                                        'large' => !$last ? 'f-md-whole-sq' : 'f-lg-whole',
                                        'xlarge' => !$last ? 'f-md-whole-sq' : 'f-xlarge-whole'
                                    ); ?>

                                    <div class="cell <?php echo $even ? 'even' : 'odd'; ?>">
                                        <a href="<?php esc_attr_e($photo['url']); ?>" download>
                                            <?php yanaf_img_srcset(
                                                $photo,
                                                null,
                                                $sizes
                                            ); ?>
                                            <span class="button">Download</span>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</main>

<?php get_footer();