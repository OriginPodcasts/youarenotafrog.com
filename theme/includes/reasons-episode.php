 <?php if (yanaf_episode_has_reasons()) { ?>
    <section id="reasons" class="post-section episode-section episode-reasons">
        <h2>Reasons to listen</h2>
        <div class="grid-x grid-margin-x">
            <div class="cell medium-9 medium-offset-3">
                <?php yanaf_the_episode_reasons(); ?>
            </div>
        </div>
    </section>
<?php }