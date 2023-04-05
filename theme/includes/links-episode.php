<?php if (yanaf_episode_has_links()) { ?>
    <section id="links" class="post-section episode-section episode-links">
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