<ul class="menu">
    <li><a href="#player">Listen</a></li>
    <li><a href="#description">Description</a></li>

    <?php if (yanaf_episode_has_links()) { ?>
        <li><a href="#links">Links</a></li>
    <?php }

    if ($guest_count = yanaf_get_episode_guest_count()) { ?>
        <li><a href="#guests">About the guest<?php echo $guest_count ? 's' : ''; ?></a></li>
    <?php }

    if (yanaf_episode_has_reasons()) { ?>
        <li><a href="#reasons">Reasons to listen</a></li>
    <?php }

    if (yanaf_episode_has_highlights()) { ?>
        <li><a href="#highlights">Highlights</a></li>
    <?php }

    if (yanaf_episode_has_transcript()) { ?>
        <li><a href="#transcript">Transcript</a></li>
    <?php } ?>
</ul>