<main>
    <?php while (have_posts()) {
        the_post();
        get_template_part('includes/entry', get_post_type());
    } ?>
</main>