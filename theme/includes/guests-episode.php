<?php if ($guest_count = yanaf_get_episode_guest_count()) { ?>
    <section id="guests" class="post-section episode-section episode-guests">
        <h2>About the guest<?php echo $guest_count ? 's' : ''; ?></h2>
        <div class="episode-guests">
            <?php if ($combined = get_field('guest_bios')) {
                echo apply_filters('the_content', $combined);
            } else {
                foreach(yanaf_get_episode_guests() as $guest) { ?>
                    <div class="episode-guest grid-x grid-margin-x">
                        <div class="episode-guest-photo cell small-3 text-right">
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

                        <div class="episode-link-content cell small-9">
                            <?php if (isset($guest['bio'])) {
                                echo apply_filters('the_content', $guest['bio']);
                            }

                            if ($links = (isset($guest['links']) && is_array($guest['links'])) ? $guest['links'] : array()) {
                                if (count($links)) { ?>
                                    <h4 class="episode-guest-links-header">Follow <?php esc_html_e($guest['name']); ?></h4>
                                <?php } ?>

                                <ul class="episode-guest-links">
                                    <?php foreach ($links as $link) { ?>
                                        <li>
                                            <a href="<?php esc_attr_e($link['url']); ?>" title="<?php esc_attr_e(strtoupper(substr($link['icon'], 0, 1)) . substr($link['icon'], 1)); ?>" target="_blank">
                                                <?php echo apply_filters('yanaf_website_icon', $link['icon']); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </section>
<?php }
