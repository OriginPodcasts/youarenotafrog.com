<?php if (yanaf_episode_has_transcript()) { ?>
    <section id="transcript" class="post-section episode-section episode-transcript">
        <h2>Episode transcript</h2>
        <div class="grid-x grid-margin-x">
            <div class="cell medium-9 medium-offset-3">
                <div class="episode-transcript-<?php echo isset($_GET['transcript']) && $_GET['transcript'] === 'full' ? 'full' : 'excerpt'; ?>">
                    <div class="episode-transcript-text"><?php $excerpt = yanaf_the_episode_transcript(); ?></div>
                    <?php if ($excerpt === 'excerpt') { ?>
                        <a href="?transcript=full#transcript" rel="noindex" class="small episode-transcript-loader button">Show more</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php }