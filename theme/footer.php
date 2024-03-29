		<section class="app-links-wrapper">
            <div class="grid-container">
                <p class="apps-subtitle">Follow the podcast</p>
                <?php yanaf_subscription_buttons(false, 'small'); ?>
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
                        <?php get_sidebar('footer'); ?>

                        <div>
                            <a href="https://www.shapestoolkit.com" target="_blank" rel="me" class="wildmonday-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/wildmonday-logo.png" alt="Wild Monday" class="wildmonday-logo">
                            </a>
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
                                <a href="/privacy/">Privacy Policy</a>
                            </li>

                            <li class="menu-item">
                                <a href="/cookies/">Cookie Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

		<?php wp_footer(); ?>
	</body>
</html>