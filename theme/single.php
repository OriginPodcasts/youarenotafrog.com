<?php get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();
		get_template_part('entry');
		if (comments_open() && !post_password_required()) {
			comments_template('', true);
		}
	endwhile;
endif; ?>

<footer class="footer">
	<?php get_template_part('nav', 'below-single'); ?>
</footer>

<?php get_footer();