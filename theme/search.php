<?php get_header();

if (have_posts()) : ?>
	<header class="header">
		<h1 class="entry-title" itemprop="name"><?php printf(esc_html__('Search Results for: %s', 'yanaf'), get_search_query()); ?></h1>
	</header>
	
	<?php while (have_posts()) :
		the_post();
		get_template_part('entry');
	endwhile;
	
	get_template_part('nav', 'below');
else : ?>
	<article id="post-0" class="post no-results not-found">
		<header class="header">
			<h1 class="entry-title" itemprop="name"><?php esc_html_e('Nothing Found', 'yanaf'); ?></h1>
		</header>
	
		<div class="entry-content" itemprop="mainContentOfPage">
			<p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'yanaf'); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>
<?php endif;

get_footer();