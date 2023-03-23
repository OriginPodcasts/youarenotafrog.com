<?php get_header(); ?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <?php get_sidebar(); ?>

        <main class="main cell medium-9">
            <article id="post-0" class="post not-found">
				<header class="header">
					<h1 class="entry-title" itemprop="name"><?php esc_html_e('Not Found', 'yanaf'); ?></h1>
				</header>
				
				<div class="entry-content" itemprop="mainContentOfPage">
					<p><?php esc_html_e('Nothing found for the requested page. Try a search instead?', 'yanaf'); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>
        </main>
    </div>
</div>

<?php get_footer();