<?php add_action('after_setup_theme', 'yanaf_after_setup_theme');
function yanaf_after_setup_theme() {
    global $content_width;

    load_theme_textdomain('yanaf', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));

    // Remove unused image sizes
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    // Define image sizes compatible with Foundation
    // breakpoints.
    add_image_size('f-sm-whole', 620, 9999);
    add_image_size('f-sm-whole-sq', 620, 620, true);
    add_image_size('f-sm-whole-16x9', 620, 349, true);
    add_image_size('f-sm-whole-9x16', 620, 1102, true);
    add_image_size('f-sm-third-sq', 206, 206, true);
    add_image_size('f-sm-third-16x9', 206, 116, true);

    add_image_size('f-md-whole', 1004, 9999);
    add_image_size('f-md-half', 497, 9999);
    add_image_size('f-md-half-sq', 497, 497, true);
    add_image_size('f-md-half-16x9', 497, 280, true);
    add_image_size('f-md-third-16x9', 254, 143, true);
    add_image_size('f-md-third-9x16', 254, 393, true);
    add_image_size('f-md-sixth-sq', 166, 166, true);

    add_image_size('f-lg-whole', 1980, 9999);
    add_image_size('f-lg-half', 585, 9999);
    add_image_size('f-lg-half-sq', 585, 585, true);
    add_image_size('f-lg-half-16x9', 585, 329, true);
    add_image_size('f-lg-third-16x9', 282, 159, true);
    add_image_size('f-lg-third-9x16', 282, 437, true);
    add_image_size('f-lg-sixth-sq', 195, 195, true);

    add_image_size('f-xlarge-whole', 1420, 9999);

    add_image_size('y-sm-carousel-sq', 620, 620, true);
    add_image_size('y-md-carousel-long', 247, 342, true);
    add_image_size('y-lg-carousel-long', 247, 342, true);

    if (!isset($content_width)) {
        $content_width = 1920;
    }

    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'yanaf')
        )
    );

    register_nav_menus(
        array(
            'footer-menu' => esc_html__('Footer Menu', 'yanaf')
        )
    );

    remove_theme_support('widgets-block-editor');
}
