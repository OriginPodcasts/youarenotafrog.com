<?php get_header(); ?>

<main>
    <header class="page-header">
        <div class="grid-container">
            <h1 class="page-title"><?php esc_html_e('Page not found', 'yanaf'); ?></h1>
        </div>
    </header>

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <article class="main single cell medium-9">
                <p><?php esc_html_e('Nothing found for the requested page. Try a search instead?', 'yanaf'); ?></p>
				<?php get_search_form(); ?>
            </article>
        </div>
    </div>
</main>

<?php get_footer();