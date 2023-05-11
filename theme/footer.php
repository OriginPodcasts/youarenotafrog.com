		<section class="tags-wrapper">
            <div class="grid-container">
                <p class="tags-subtitle">Explore episodes on</p>
                <?php get_template_part('includes/tag-carousel'); ?>
            </div>
        </section>

        <footer>
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="cell medium-4 logo-cell">
                        <div class="grid-x grid-margin-x">
                            <div class="cell small-4">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php printf(__('%s logo', 'yanaf'), get_bloginfo('name')); ?>" class="yanaf-logo">
                            </div>
                            <div class="cell small-8 tags">
                                <p class="tagline"><?php bloginfo('description'); ?></p>
                                <p class="subtag">Beat burnout. Work happier</p>
                            </div>
                        </div>
                    </div>

                    <div class="cell medium-4">
                        <?php yanaf_footer_menu(); ?>
                    </div>

                    <div class="cell medium-4">
                        <div class="newsletter-cell">
                            <h2>Connect</h2>
                            <p>Receive updates from You Are Not a Frog (YANAF) straight to your inbox.</p>
                            <?php get_template_part('includes/newsletter-form'); ?>
                            <p>By submitting, I am agreeing to the <a href="">Terms of Use</a> and <a href="">Privacy Policy</a>.</p>
                        </div>

                        <div class="follow-cell">
                            <h2>Follow</h2>
                            <ul class="follow-menu">
                                <?php foreach (yanaf_get_social_links() as $link) { ?>
                                    <li>
                                        <a href="<?php esc_attr_e($link['url']); ?>" class="<?php esc_attr_e($link['slug']); ?>" title="<?php esc_attr_e($link['name']); ?>" rel="me external" target="_blank">
                                            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title><?php esc_html_e($link['name']); ?></title>
                                                <?php echo $link['icon']; ?>
                                            </svg>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell medium-4">
                        <div class="copyright">&copy; <?php echo date('Y'); ?> Wild Monday</div>
                    </div>

                    <div class="cell medium-4">
                        <ul class="legal-menu">
                            <li class="menu-item">
                                <a href="">Terms of Use</a>
                            </li>

                            <li class="menu-item">
                                <a href="">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

		<?php wp_footer(); ?>
	</body>
</html>