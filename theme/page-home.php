<?php /* Template Name: Home */

get_header(); ?>

<main>
    <?php while (have_posts()) {
        the_post();

        while (have_rows('content')) {
            the_row();
            get_template_part('layouts/' . get_row_layout());
        } ?>
    <?php } ?>
</main>

<?php get_footer();