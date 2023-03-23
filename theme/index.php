<?php get_header(); ?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <?php get_sidebar(); ?>

        <main class="main cell medium-9">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('entry');
                }
            } ?>
        </main>
    </div>
</div>

<?php get_footer();