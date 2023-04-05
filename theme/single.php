<?php get_header(); ?>

<main>
	<?php if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('includes/header', get_post_type()); ?>

			<div class="grid-container">
			    <div class="grid-x grid-margin-x">
			        <aside class="sidebar cell medium-3">
					    <?php get_template_part('includes/sidebar-menu', get_post_type()); ?>
					</aside>

			        <article class="main single cell medium-9">
			            <?php get_template_part('includes/player', get_post_type());
			            get_template_part('includes/description', get_post_type());
			            get_template_part('includes/about', get_post_type());
			            get_template_part('includes/links', get_post_type());
			            get_template_part('includes/guests', get_post_type());
			            get_template_part('includes/reasons', get_post_type());
			            get_template_part('includes/highlights', get_post_type());
			            get_template_part('includes/transcript', get_post_type());
			            get_template_part('includes/buttons', get_post_type()); ?>
			        </article>
			    </div>
			</div>
		<?php }
	} ?>
</main>

<?php get_footer();