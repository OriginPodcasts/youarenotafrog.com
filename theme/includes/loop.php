<main class="grid-x grid-margin-x">
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="cell medium-4">
            <?php get_template_part('includes/entry', get_post_type()); ?>
        </div>
    <?php } ?>
</main>