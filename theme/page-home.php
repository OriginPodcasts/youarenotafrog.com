<?php /* Template Name: Home */

get_header(); ?>

<main>
    <?php while (have_posts()) {
        the_post(); ?>

        <section class="hero">
            <div class="grid-container">
                <p class="h1"><?php the_field('headline'); ?></p>
                <p class="subtitle"><?php the_field('subtitle'); ?></p>
                <p class="scroll-link-container">
                    <a href="#main">
                        <i class="fi-arrow-down"></i>
                        Scroll to explore
                    </a>
                </p>
            </div>
        </section>
    <?php } ?>

    <section class="review-wrapper">
        <div class="grid-container">
            <?php get_template_part('includes/review-carousel'); ?>
        </div>
    </section>

    <section class="mission-wrapper">
        <div class="grid-container">
            <div class="mission-statement">
                <p class="mission-subtitle">Our mission</p>
                <h1 class="mission-heading">Welcome to <?php esc_html_e(get_bloginfo('site_name')); ?></h1>
                <div class="mission-statement"><?php the_field('mission'); ?></div>

                <?php if ($story = get_field('story')) { ?>
                    <a href="<?php esc_attr_e($story['page']); ?>" class="button"><?php esc_html_e($story['text']); ?></a>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="episodes-wrapper">
        <div class="grid-container">
            <p class="episodes-subtitle">Episodes</p>
            <div class="episodes-heading"><?php the_field('episode_list_intro'); ?></div>

            <div class="grid-x medium-up-2 grid-margin-x">
                <div class="cell">
                    <?php get_template_part('includes/first-episode'); ?>
                </div>
                <div class="cell">
                    <?php get_template_part('includes/subsequent-episodes'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="collections-wrapper">
        <div class="grid-container">
            <p class="collections-subtitle">Episode collections</p>
            <div class="collections-heading"><?php the_field('collection_list_intro'); ?></div>
            <?php get_template_part('includes/collection-carousel'); ?>
        </div>
    </section>

    <section class="resources-wrapper">
        <div class="grid-container">
            <p class="resources-subtitle">Resources</p>
            <div class="resources-heading"><?php the_field('resource_list_intro'); ?></div>
            <div class="resources-body"><?php the_field('resource_list_body'); ?></div>

            <div class="grid-x grid-margin-x">
                <div class="cell medium-4">
                    <?php get_template_part('includes/first-resource'); ?>
                </div>
                <div class="cell medium-8">
                    <?php get_template_part('includes/subsequent-resources'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($image_id = get_field('host_photo')) { ?>
        <div class="host-photo-wrapper">
            <div class="grid-container">
                <?php yanaf_img_srcset(
                    $image_id,
                    'Host',
                    array(
                        'small' => 'f-sm-whole',
                        'medium' => 'f-medium-whole',
                        'large' => 'f-large-whole',
                        'xlarge' => 'f-xlarge-whole'
                    ),
                    true
                ); ?>
            </div>
        </div>
    <?php } ?>

    <section class="host-wrapper">
        <div class="grid-container">
            <p class="host-subtitle">Meet your host</p>
            <div class="host-heading"><?php the_field('host_headline'); ?></div>
            <div class="host-bio"><?php the_field('host_bio'); ?></div>

            <?php if ($page = get_field('host_page')) { ?>
                <a href="<?php esc_attr_e($page['page']); ?>" class="button"><?php esc_html_e($page['text']); ?></a>
            <?php } ?>
        </div>
    </section>

    <section class="review-wrapper">
        <div class="grid-container">
            <?php get_template_part('includes/featured-review'); ?>
        </div>
    </section>

    <section class="tags-wrapper">
        <div class="grid-container">
            <p class="tags-subtitle">Explore episodes on</p>
            <?php get_template_part('includes/tag-carousel'); ?>
        </div>
    </section>
</main>

<?php get_footer();