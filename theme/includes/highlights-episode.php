<?php if (yanaf_episode_has_highlights()) { ?>
    <section id="highlights" class="post-section episode-section episode-highlights">
        <h2>Episode highlights</h2>
        <?php foreach (yanaf_get_episode_highlights() as $highlight) { ?>
            <div class="grid-x grid-margin-x">
                <div class="cell medium-3 text-right episode-highlight-timestamp">
                    <code><?php esc_html_e($highlight['timestamp']); ?></code>
                </div>
                <div class="cell medium-9 episode-highlight-description">
                    <?php echo apply_filters(
                        'the_content',
                        isset($highlight['description']) ? $highlight['description'] : ''
                    ); ?>
                </div>
            </div>
        <?php } ?>
    </section>
<?php }