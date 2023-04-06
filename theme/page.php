<?php get_header(); ?>

<main>
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <header class="page-header">
                <div class="grid-container">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            </header>

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <article class="main single cell medium-9">
                        <?php the_content(); ?>
                    </article>
                </div>
            </div>
        <?php }
    } ?>
</main>

<?php get_footer();