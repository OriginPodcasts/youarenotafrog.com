<?php get_header(); ?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <?php get_sidebar(); ?>

        <section class="main archive cell medium-9">
            <?php if (is_search()) { ?>
                <form action="<?php esc_attr_e(home_url()); ?>" class="search-form">
                    <button type="submit" class="button">
                        <svg height="1.5em" version="1.1" viewBox="0 0 1200 1200" xmlns="http://www.w3.org/2000/svg">
                            <path d="m524.43 305.27c-120.86 0-219.16 98.297-219.16 219.16 0 120.86 98.297 219.16 219.16 219.16 55.031 0 105.31-20.484 143.82-54.078l200.73 200.73c5.5859 5.75 15.855 5.9336 21.492 0.23828 5.6367-5.6992 5.5742-16.207-0.23828-21.727l-200.5-200.5c33.535-38.496 53.844-88.848 53.844-143.82 0-120.86-98.297-219.16-219.16-219.16zm0 30.227c104.52 0 188.93 84.41 188.93 188.93 0 104.52-84.406 188.93-188.93 188.93-104.52 0-188.93-84.406-188.93-188.93 0-104.52 84.41-188.93 188.93-188.93z"/>
                        </svg>
                    </button>

                    <input type="search" name="s" placeholder="What are you looking for?">
                </form>
            <?php }

            if (have_posts()) { ?>
                <header>
                    <h2 class="archive-title"><?php yanaf_archive_title(); ?></h2>
                    <span class="archive-count">
                        /
                        <?php echo $wp_query->found_posts; ?>
                        result<?php if ($wp_query->found_posts !== 1) { ?>s<?php } ?>
                    </span>
                </header>

                <main class="grid-x grid-margin-x">
                    <?php while (have_posts()) {
                        the_post(); ?>
                        <div class="cell medium-4">
                            <?php get_template_part('includes/entry', 'archive'); ?>
                        </div>
                    <?php } ?>
                </main>

                <?php get_template_part('includes/pagination');
            } ?>
        </section>
    </div>
</div>

<?php get_footer();