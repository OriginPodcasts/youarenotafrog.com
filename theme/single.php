<?php get_header(); ?>

<main>
	<?php if (have_posts()) {
		while (have_posts()) {
			the_post(); ?>

			<header class="episode-header">
			    <div class="grid-container">
			    	<p class="episode-date"><?php the_date('jS F, Y'); ?></p>
			        <h1 class="episode-title"><?php the_title(); ?></h1>

			        <?php if (yanaf_episode_has_guests()) { ?>
			            <p class="episode-guests">With <?php yanaf_the_guest_names(); ?></p>
			            <?php if (!yanaf_the_guest_photos(get_the_ID(), 'f-sm-whole')) {
			            	if ($image = get_the_post_thumbnail_url(get_the_ID(), 'f-sm-whole')) { ?>
				                <img alt="Episode thumbnail" src="<?php esc_attr_e($image); ?>" class="episode-image">
				            <?php }
			            }
			        } else { ?>
			            <p class="episode-guests">With <?php the_author(); ?></p>

			            <?php if ($image = get_the_post_thumbnail_url(get_the_ID(), 'f-sm-whole')) { ?>
			                <img alt="Episode thumbnail" src="<?php esc_attr_e($image); ?>" class="episode-image">
			            <?php }
			        } ?>
			    </div>
			</header>
		<?php }
	} ?>

	<div class="grid-container">
	    <div class="grid-x grid-margin-x">
	        <aside class="sidebar cell medium-3">
			    <h2>Filter</h2>
			    <ul class="menu">
			    	<li><a href="#player">Listen</a></li>
			    	<li><a href="#description">Description</a></li>

			    	<?php if (yanaf_episode_has_links()) { ?>
			    		<li><a href="#links">Links</a></li>
			    	<?php } ?>

			    	<?php if ($guest_count = yanaf_get_episode_guest_count()) { ?>
			    		<li><a href="#guests">About the guest<?php echo $guest_count ? 's' : ''; ?></a></li>
			    	<?php } ?>
			    </ul>
			</aside>

	        <article class="main single cell medium-9">
	            <section id="player" class="episode-section episode-player">
	            	<h2>Listen to this episode</h2>
	            	<?php yanaf_the_episode_player(); ?>
            	</section>

            	<section id="description" class="episode-section episode-description">
	            	<h2>On this episode</h2>
	            	<?php the_content(); ?>
            	</section>

            	<?php if (yanaf_episode_has_links()) { ?>
	            	<section id="links" class="episode-section episode-links">
		            	<h2>Show links</h2>
		            	<div class="episode-links">
		            		<?php foreach(yanaf_get_episode_links() as $link) { ?>
		            			<div class="episode-link grid-x grid-margin-x">
		            				<?php if (isset($link['icon'])) { ?>
		            					<div class="episode-link-icon cell medium-3 text-right">
		            						<?php echo apply_filters('yanaf_episode_icon', $link['icon']); ?>
		            					</div>
		            				<?php } ?>

		            				<div class="episode-link-content cell medium-9">
		            					<?php echo apply_filters('the_content', $link['content']); ?>
		            				</div>
		            			</div>
			            	<?php } ?>
	            		</div>
	            	</section>
	            <?php }

	            if ($guest_count) { ?>
	            	<section id="guests" class="episode-section episode-guests">
		            	<h2>About the guest<?php echo $guest_count ? 's' : ''; ?></h2>
		            	<div class="episode-guests">
		            		<?php foreach(yanaf_get_episode_guests() as $guest) { ?>
		            			<div class="episode-guests grid-x grid-margin-x">
		            				<div class="episode-link-icon cell medium-3 text-right">
		            					<?php if (isset($guest['photo'])) {
			            					yanaf_img_srcset(
						                        $guest['photo'],
						                        sprintf('%s photo', $guest['name']),
						                        array(
						                            'small' => 'f-sm-third-sq' /* Third-width on small devices */,
						                            'medium' => 'f-md-sixth-sq' /* Sixth-width on medium devices */,
						                            'large' => 'f-lg-sixth-sq' /* Sixth-width on large devices */
						                        ),
						                        true
						                    );
			            				}

			            				if ($guest_count > 1) { ?>
				            				<h3 class="episode-guest-name"><?php esc_html_e($guest['name']); ?></h3>
				            			<?php } ?>
		            				</div>

		            				<div class="episode-link-content cell medium-9">
		            					<?php if (isset($guest['bio'])) {
			            					echo apply_filters('the_content', $guest['bio']);
			            				} ?>
		            				</div>
		            			</div>
			            	<?php } ?>
	            		</div>
	            	</section>
	            <?php } ?>
	        </article>
	    </div>
	</div>
</main>

<?php get_footer();